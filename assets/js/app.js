(() => {
  const i18n = window.BG_I18N || {};

  const codesEl = document.getElementById('codes');
  const formatEl = document.getElementById('format');
  const displayValueEl = document.getElementById('displayValue');
  const statusEl = document.getElementById('status');
  const gridEl = document.getElementById('barcode-grid');
  const summaryEl = document.getElementById('result-summary');
  const bulkActionsEl = document.getElementById('bulk-actions');

  const btnGenerate = document.getElementById('btn-generate');
  const btnSample = document.getElementById('btn-sample');
  const btnClear = document.getElementById('btn-clear');
  const btnDownloadAll = document.getElementById('btn-download-all');
  const btnPrint = document.getElementById('btn-print');

  /** @type {{ code: string, canvas: HTMLCanvasElement, ok: boolean }[]} */
  let generated = [];

  function t(key, vars) {
    let text = i18n[key] || key;
    if (vars) {
      Object.keys(vars).forEach((name) => {
        text = text.split('{' + name + '}').join(String(vars[name]));
      });
    }
    return text;
  }

  function setStatus(message, type) {
    statusEl.textContent = message;
    statusEl.className = 'status' + (type ? ' is-' + type : '');
  }

  function parseCodes(raw) {
    return raw
      .split(/\r?\n/)
      .map((line) => line.trim())
      .filter((line) => line.length > 0);
  }

  function safeFilename(code) {
    return String(code).replace(/[\\/:*?"<>|]+/g, '_').slice(0, 80) || 'barcode';
  }

  function sampleCodes() {
    const base = Date.now().toString().slice(-8);
    const list = [];
    for (let i = 0; i < 10; i += 1) {
      list.push(base + String(i).padStart(2, '0'));
    }
    return list.join('\n');
  }

  function clearResults() {
    generated = [];
    gridEl.innerHTML = '<div class="empty-state">' + t('empty_state') + '</div>';
    bulkActionsEl.hidden = true;
    summaryEl.textContent = t('empty_state');
  }

  function downloadCanvas(canvas, filename) {
    canvas.toBlob((blob) => {
      if (!blob) {
        setStatus(t('js_dl_fail'), 'error');
        return;
      }
      saveAs(blob, filename);
    });
  }

  function renderBarcode(code, format, showText) {
    const canvas = document.createElement('canvas');
    try {
      JsBarcode(canvas, code, {
        format: format,
        displayValue: showText,
        fontSize: 14,
        height: 80,
        margin: 10,
        background: '#ffffff',
        lineColor: '#0f1c1a',
        width: 2,
      });
      return { ok: true, canvas: canvas, error: null };
    } catch (err) {
      return {
        ok: false,
        canvas: null,
        error: err && err.message ? err.message : t('js_render_fail'),
      };
    }
  }

  function buildCard(code, result, index) {
    const card = document.createElement('article');
    card.className = 'barcode-card' + (result.ok ? '' : ' is-error');
    card.style.animationDelay = Math.min(index, 12) * 40 + 'ms';

    if (result.ok) {
      card.appendChild(result.canvas);

      const meta = document.createElement('div');
      meta.className = 'barcode-meta';

      const label = document.createElement('span');
      label.className = 'barcode-code';
      label.textContent = code;

      const dl = document.createElement('button');
      dl.type = 'button';
      dl.className = 'btn btn-ghost btn-sm';
      dl.textContent = t('btn_download_png');
      dl.addEventListener('click', () => {
        downloadCanvas(result.canvas, safeFilename(code) + '.png');
      });

      meta.appendChild(label);
      meta.appendChild(dl);
      card.appendChild(meta);
    } else {
      const label = document.createElement('span');
      label.className = 'barcode-code';
      label.textContent = code;

      const err = document.createElement('p');
      err.className = 'barcode-error';
      err.textContent = result.error;

      card.appendChild(label);
      card.appendChild(err);
    }

    return card;
  }

  function saveBatch(codes, format) {
    try {
      fetch('api/save_batch.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ codes: codes, format: format }),
      });
    } catch (e) {
      // Optional history — ignore failures.
    }
  }

  function generate() {
    const codes = parseCodes(codesEl.value);
    const format = formatEl.value;
    const showText = displayValueEl.value === '1';

    if (codes.length === 0) {
      setStatus(t('js_need_one'), 'error');
      clearResults();
      return;
    }

    if (codes.length > 200) {
      setStatus(t('js_max_200'), 'error');
      return;
    }

    generated = [];
    gridEl.innerHTML = '';

    let okCount = 0;
    let failCount = 0;

    codes.forEach((code, index) => {
      const result = renderBarcode(code, format, showText);
      if (result.ok) {
        okCount += 1;
        generated.push({ code: code, canvas: result.canvas, ok: true });
      } else {
        failCount += 1;
      }
      gridEl.appendChild(buildCard(code, result, index));
    });

    bulkActionsEl.hidden = okCount === 0;
    summaryEl.textContent = t('js_summary', {
      total: codes.length,
      ok: okCount,
      fail: failCount,
      format: format,
    });

    if (okCount === 0) {
      setStatus(t('js_all_fail'), 'error');
    } else if (failCount > 0) {
      setStatus(t('js_partial', { ok: okCount, fail: failCount }), 'error');
    } else {
      setStatus(t('js_success', { ok: okCount }), 'ok');
    }

    saveBatch(codes, format);
  }

  function downloadAllZip() {
    const items = generated.filter((item) => item.ok);
    if (items.length === 0) {
      setStatus(t('js_no_download'), 'error');
      return;
    }

    setStatus(t('js_zipping'));
    btnDownloadAll.disabled = true;

    const zip = new JSZip();
    const folder = zip.folder('barcodes');
    const usedNames = {};
    let index = 0;

    function next() {
      if (index >= items.length) {
        zip.generateAsync({ type: 'blob' }).then((content) => {
          const stamp = new Date().toISOString().slice(0, 19).replace(/[:T]/g, '-');
          saveAs(content, 'barcodes_' + stamp + '.zip');
          setStatus(t('js_zip_ok', { n: items.length }), 'ok');
          btnDownloadAll.disabled = false;
        }).catch(() => {
          setStatus(t('js_zip_fail'), 'error');
          btnDownloadAll.disabled = false;
        });
        return;
      }

      const item = items[index];
      index += 1;

      item.canvas.toBlob((blob) => {
        if (blob) {
          let name = safeFilename(item.code) + '.png';
          const count = usedNames[name] || 0;
          usedNames[name] = count + 1;
          if (count > 0) {
            name = safeFilename(item.code) + '_' + count + '.png';
          }
          folder.file(name, blob);
        }
        next();
      });
    }

    next();
  }

  btnGenerate.addEventListener('click', generate);
  btnSample.addEventListener('click', () => {
    codesEl.value = sampleCodes();
    formatEl.value = 'CODE128';
    setStatus(t('js_sample_ok'));
  });
  btnClear.addEventListener('click', () => {
    codesEl.value = '';
    setStatus('');
    clearResults();
  });
  btnDownloadAll.addEventListener('click', downloadAllZip);
  btnPrint.addEventListener('click', () => {
    window.print();
  });

  clearResults();
})();
