<?php
require_once dirname(__FILE__) . '/includes/lang.php';
$bg_page = 'manual';
$bg_show_note = false;
$is_zh = (bg_lang() === 'zh');
?>
<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars(bg_t('html_lang'), ENT_QUOTES, 'UTF-8'); ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars(bg_t('manual_title'), ENT_QUOTES, 'UTF-8'); ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="page-manual">
  <div class="bg-grid" aria-hidden="true"></div>

  <?php require dirname(__FILE__) . '/includes/header.php'; ?>

  <main class="manual-shell">
    <div class="manual-hero">
      <p class="manual-kicker"><?php echo htmlspecialchars(bg_t('brand_name'), ENT_QUOTES, 'UTF-8'); ?></p>
      <h1><?php echo htmlspecialchars(bg_t('manual_heading'), ENT_QUOTES, 'UTF-8'); ?></h1>
      <p class="manual-lead"><?php echo htmlspecialchars(bg_t('manual_sub'), ENT_QUOTES, 'UTF-8'); ?></p>
      <a class="btn btn-primary" href="index.php"><?php echo htmlspecialchars(bg_t('manual_back'), ENT_QUOTES, 'UTF-8'); ?></a>
    </div>

    <div class="manual-layout">
      <aside class="manual-toc panel" aria-label="<?php echo htmlspecialchars(bg_t('manual_toc'), ENT_QUOTES, 'UTF-8'); ?>">
        <h2><?php echo htmlspecialchars(bg_t('manual_toc'), ENT_QUOTES, 'UTF-8'); ?></h2>
        <ol>
          <?php if ($is_zh) : ?>
            <li><a href="#overview">功能概览</a></li>
            <li><a href="#quickstart">快速上手</a></li>
            <li><a href="#formats">条码格式说明</a></li>
            <li><a href="#preview">预览区说明</a></li>
            <li><a href="#download">下载与打印</a></li>
            <li><a href="#language">语言切换</a></li>
            <li><a href="#tips">使用提示与限制</a></li>
            <li><a href="#faq">常见问题</a></li>
          <?php else : ?>
            <li><a href="#overview">Feature overview</a></li>
            <li><a href="#quickstart">Quick start</a></li>
            <li><a href="#formats">Barcode formats</a></li>
            <li><a href="#preview">Preview panel</a></li>
            <li><a href="#download">Download &amp; print</a></li>
            <li><a href="#language">Language switching</a></li>
            <li><a href="#tips">Tips &amp; limits</a></li>
            <li><a href="#faq">FAQ</a></li>
          <?php endif; ?>
        </ol>
      </aside>

      <article class="manual-content panel">
        <?php if ($is_zh) : ?>
          <section id="overview">
            <h2>1. 功能概览</h2>
            <p>Barcode Generator 帮助你把一串号码快速变成可扫描、可下载的条码图片。适合标签打印、库存编码、内部批次号等场景。</p>
            <div class="feature-grid">
              <div class="feature-card">
                <h3>批量输入</h3>
                <p>每行一个号码，一次可处理最多 200 个编码。</p>
              </div>
              <div class="feature-card">
                <h3>即时预览</h3>
                <p>生成后立刻在右侧看到条码图案与对应文字。</p>
              </div>
              <div class="feature-card">
                <h3>单张 / ZIP 下载</h3>
                <p>每个条码可下载 PNG，也可一键打包成 ZIP。</p>
              </div>
              <div class="feature-card">
                <h3>打印友好</h3>
                <p>使用打印功能可直接输出预览页中的条码。</p>
              </div>
            </div>
          </section>

          <section id="quickstart">
            <h2>2. 快速上手</h2>
            <ol class="steps">
              <li>打开 <strong>生成器</strong> 页面。</li>
              <li>在「号码列表」中输入或粘贴号码，<strong>每行一个</strong>。</li>
              <li>选择条码格式（一般推荐 <strong>CODE128</strong>）。</li>
              <li>选择是否在条码下方显示号码文字。</li>
              <li>点击 <strong>生成条码</strong>。</li>
              <li>在预览区检查结果，再下载 PNG / ZIP，或打印。</li>
            </ol>
            <p>不确定怎么填？可先点 <strong>填入示例（10个）</strong>，再点生成，熟悉流程后再换成真实号码。</p>
          </section>

          <section id="formats">
            <h2>3. 条码格式说明</h2>
            <table class="manual-table">
              <thead>
                <tr>
                  <th>格式</th>
                  <th>适用内容</th>
                  <th>注意</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>CODE128</td>
                  <td>数字、字母、常见符号</td>
                  <td>最通用，推荐默认使用</td>
                </tr>
                <tr>
                  <td>CODE39</td>
                  <td>大写字母、数字、部分符号</td>
                  <td>字符集有限</td>
                </tr>
                <tr>
                  <td>EAN-13</td>
                  <td>商品条码</td>
                  <td>需 12 或 13 位数字</td>
                </tr>
                <tr>
                  <td>EAN-8</td>
                  <td>短版商品条码</td>
                  <td>需 7 或 8 位数字</td>
                </tr>
                <tr>
                  <td>UPC-A</td>
                  <td>北美零售常用</td>
                  <td>需 11 或 12 位数字</td>
                </tr>
                <tr>
                  <td>ITF-14 / MSI / Pharmacode</td>
                  <td>物流或行业专用</td>
                  <td>请确认号码符合该格式规则</td>
                </tr>
              </tbody>
            </table>
            <p>若出现红色错误卡片，多半是号码不符合所选格式。可改回 CODE128 再试。</p>
          </section>

          <section id="preview">
            <h2>4. 预览区说明</h2>
            <ul>
              <li>每个卡片对应一个输入号码。</li>
              <li>成功时显示条码图像；失败时显示错误原因。</li>
              <li>顶部摘要会显示：总数、成功数、失败数、当前格式。</li>
              <li>只有至少有一个成功条码时，才会出现「下载全部 ZIP」和「打印」。</li>
            </ul>
          </section>

          <section id="download">
            <h2>5. 下载与打印</h2>
            <ul>
              <li><strong>下载 PNG</strong>：保存单个条码图片，文件名通常与号码一致。</li>
              <li><strong>下载全部 ZIP</strong>：把所有成功条码打成压缩包，方便批量存档。</li>
              <li><strong>打印</strong>：调用浏览器打印，布局会隐藏输入区，只保留条码预览。</li>
            </ul>
          </section>

          <section id="language">
            <h2>6. 语言切换</h2>
            <p>页面右上角可在 <strong>EN</strong> / <strong>中文</strong> 之间切换。默认进入为英文。语言会保存在浏览器 Cookie 中，生成器与用户手册会同步使用同一语言。</p>
          </section>

          <section id="tips">
            <h2>7. 使用提示与限制</h2>
            <ul>
              <li>一次最多 200 个号码。</li>
              <li>空行会自动忽略。</li>
              <li>条码在浏览器本地生成，无需上传号码到第三方服务。</li>
              <li>如已配置 MySQL，系统可选择性地保存生成批次记录；未配置也不影响日常使用。</li>
            </ul>
          </section>

          <section id="faq">
            <h2>8. 常见问题</h2>
            <div class="faq-item">
              <h3>为什么 EAN-13 生成失败？</h3>
              <p>请确认是 12/13 位纯数字。长度或校验位不符合时无法渲染。</p>
            </div>
            <div class="faq-item">
              <h3>ZIP 下载没有反应？</h3>
              <p>请检查浏览器是否拦截了下载，或先单独下载一张 PNG 确认权限正常。</p>
            </div>
            <div class="faq-item">
              <h3>手册语言不对？</h3>
              <p>点击右上角语言按钮切换；手册会跟随当前语言显示。</p>
            </div>
          </section>
        <?php else : ?>
          <section id="overview">
            <h2>1. Feature overview</h2>
            <p>Barcode Generator turns a list of codes into scannable barcode images you can preview and download. Useful for labels, inventory IDs, internal batch numbers, and similar workflows.</p>
            <div class="feature-grid">
              <div class="feature-card">
                <h3>Batch input</h3>
                <p>One code per line. Process up to 200 codes in a single run.</p>
              </div>
              <div class="feature-card">
                <h3>Live preview</h3>
                <p>See barcode art and matching text immediately after generation.</p>
              </div>
              <div class="feature-card">
                <h3>PNG / ZIP download</h3>
                <p>Save each barcode as PNG, or pack all successful ones into a ZIP.</p>
              </div>
              <div class="feature-card">
                <h3>Print-ready</h3>
                <p>Use Print to output the preview barcodes from your browser.</p>
              </div>
            </div>
          </section>

          <section id="quickstart">
            <h2>2. Quick start</h2>
            <ol class="steps">
              <li>Open the <strong>Generator</strong> page.</li>
              <li>Enter or paste codes in the list — <strong>one code per line</strong>.</li>
              <li>Choose a barcode format (usually <strong>CODE128</strong>).</li>
              <li>Choose whether to show the code text under each barcode.</li>
              <li>Click <strong>Generate</strong>.</li>
              <li>Review the preview, then download PNG / ZIP or print.</li>
            </ol>
            <p>Not sure what to enter? Click <strong>Fill sample (10)</strong>, then Generate to learn the flow before using real codes.</p>
          </section>

          <section id="formats">
            <h2>3. Barcode formats</h2>
            <table class="manual-table">
              <thead>
                <tr>
                  <th>Format</th>
                  <th>Best for</th>
                  <th>Notes</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>CODE128</td>
                  <td>Digits, letters, common symbols</td>
                  <td>Most flexible — recommended default</td>
                </tr>
                <tr>
                  <td>CODE39</td>
                  <td>Uppercase letters, digits, limited symbols</td>
                  <td>Smaller character set</td>
                </tr>
                <tr>
                  <td>EAN-13</td>
                  <td>Retail product codes</td>
                  <td>Needs 12 or 13 digits</td>
                </tr>
                <tr>
                  <td>EAN-8</td>
                  <td>Short product codes</td>
                  <td>Needs 7 or 8 digits</td>
                </tr>
                <tr>
                  <td>UPC-A</td>
                  <td>North American retail</td>
                  <td>Needs 11 or 12 digits</td>
                </tr>
                <tr>
                  <td>ITF-14 / MSI / Pharmacode</td>
                  <td>Logistics / industry use</td>
                  <td>Confirm your data matches format rules</td>
                </tr>
              </tbody>
            </table>
            <p>If you see a red error card, the code likely does not match the selected format. Switch back to CODE128 and try again.</p>
          </section>

          <section id="preview">
            <h2>4. Preview panel</h2>
            <ul>
              <li>Each card maps to one input code.</li>
              <li>Successful items show the barcode image; failures show the reason.</li>
              <li>The summary line shows total, success count, fail count, and format.</li>
              <li>“Download all ZIP” and “Print” appear only when at least one barcode succeeds.</li>
            </ul>
          </section>

          <section id="download">
            <h2>5. Download &amp; print</h2>
            <ul>
              <li><strong>Download PNG</strong>: saves one barcode image; filename usually matches the code.</li>
              <li><strong>Download all ZIP</strong>: packs every successful barcode into one archive.</li>
              <li><strong>Print</strong>: opens the browser print dialog and hides the input panel so only barcodes print.</li>
            </ul>
          </section>

          <section id="language">
            <h2>6. Language switching</h2>
            <p>Use <strong>EN</strong> / <strong>中文</strong> in the top-right corner. English is the default on first visit. Your choice is stored in a browser cookie so the Generator and User Manual stay in sync.</p>
          </section>

          <section id="tips">
            <h2>7. Tips &amp; limits</h2>
            <ul>
              <li>Maximum 200 codes per generation.</li>
              <li>Blank lines are ignored automatically.</li>
              <li>Barcodes are rendered in your browser — codes are not uploaded to a third-party API.</li>
              <li>If MySQL is configured, batch history may be saved optionally. Without a database, everyday use still works.</li>
            </ul>
          </section>

          <section id="faq">
            <h2>8. FAQ</h2>
            <div class="faq-item">
              <h3>Why does EAN-13 fail?</h3>
              <p>Use 12 or 13 digits only. Wrong length or checksum values cannot be rendered.</p>
            </div>
            <div class="faq-item">
              <h3>ZIP download does nothing?</h3>
              <p>Check whether the browser blocked the download, or try a single PNG first to confirm permissions.</p>
            </div>
            <div class="faq-item">
              <h3>Manual language looks wrong?</h3>
              <p>Switch language with the header buttons; the manual follows the active language.</p>
            </div>
          </section>
        <?php endif; ?>
      </article>
    </div>
  </main>

  <?php require dirname(__FILE__) . '/includes/footer.php'; ?>
</body>
</html>
