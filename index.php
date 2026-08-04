<?php
require_once dirname(__FILE__) . '/includes/lang.php';
$bg_page = 'home';
$bg_show_note = true;
?>
<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars(bg_t('html_lang'), ENT_QUOTES, 'UTF-8'); ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars(bg_t('site_title'), ENT_QUOTES, 'UTF-8'); ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <div class="bg-grid" aria-hidden="true"></div>

  <?php require dirname(__FILE__) . '/includes/header.php'; ?>

  <main class="layout">
    <section class="panel panel-input" aria-labelledby="input-title">
      <h1 id="input-title"><?php echo htmlspecialchars(bg_t('input_title'), ENT_QUOTES, 'UTF-8'); ?></h1>
      <p class="lede"><?php echo htmlspecialchars(bg_t('input_lede'), ENT_QUOTES, 'UTF-8'); ?></p>

      <label class="field-label" for="codes"><?php echo htmlspecialchars(bg_t('codes_label'), ENT_QUOTES, 'UTF-8'); ?></label>
      <textarea
        id="codes"
        rows="12"
        spellcheck="false"
        placeholder="8901234567890&#10;8901234567891&#10;8901234567892&#10;..."
      ></textarea>

      <div class="controls">
        <div class="control-group">
          <label class="field-label" for="format"><?php echo htmlspecialchars(bg_t('format_label'), ENT_QUOTES, 'UTF-8'); ?></label>
          <select id="format">
            <option value="CODE128" selected><?php echo htmlspecialchars(bg_t('opt_code128'), ENT_QUOTES, 'UTF-8'); ?></option>
            <option value="CODE39"><?php echo htmlspecialchars(bg_t('opt_code39'), ENT_QUOTES, 'UTF-8'); ?></option>
            <option value="EAN13"><?php echo htmlspecialchars(bg_t('opt_ean13'), ENT_QUOTES, 'UTF-8'); ?></option>
            <option value="EAN8"><?php echo htmlspecialchars(bg_t('opt_ean8'), ENT_QUOTES, 'UTF-8'); ?></option>
            <option value="UPC"><?php echo htmlspecialchars(bg_t('opt_upc'), ENT_QUOTES, 'UTF-8'); ?></option>
            <option value="ITF14"><?php echo htmlspecialchars(bg_t('opt_itf14'), ENT_QUOTES, 'UTF-8'); ?></option>
            <option value="MSI"><?php echo htmlspecialchars(bg_t('opt_msi'), ENT_QUOTES, 'UTF-8'); ?></option>
            <option value="pharmacode"><?php echo htmlspecialchars(bg_t('opt_pharmacode'), ENT_QUOTES, 'UTF-8'); ?></option>
          </select>
        </div>
        <div class="control-group">
          <label class="field-label" for="displayValue"><?php echo htmlspecialchars(bg_t('display_label'), ENT_QUOTES, 'UTF-8'); ?></label>
          <select id="displayValue">
            <option value="1" selected><?php echo htmlspecialchars(bg_t('display_show'), ENT_QUOTES, 'UTF-8'); ?></option>
            <option value="0"><?php echo htmlspecialchars(bg_t('display_hide'), ENT_QUOTES, 'UTF-8'); ?></option>
          </select>
        </div>
      </div>

      <div class="actions">
        <button type="button" id="btn-sample" class="btn btn-ghost"><?php echo htmlspecialchars(bg_t('btn_sample'), ENT_QUOTES, 'UTF-8'); ?></button>
        <button type="button" id="btn-clear" class="btn btn-ghost"><?php echo htmlspecialchars(bg_t('btn_clear'), ENT_QUOTES, 'UTF-8'); ?></button>
        <button type="button" id="btn-generate" class="btn btn-primary"><?php echo htmlspecialchars(bg_t('btn_generate'), ENT_QUOTES, 'UTF-8'); ?></button>
      </div>

      <p id="status" class="status" role="status" aria-live="polite"></p>
    </section>

    <section class="panel panel-output" aria-labelledby="output-title">
      <div class="output-head">
        <div>
          <h2 id="output-title"><?php echo htmlspecialchars(bg_t('output_title'), ENT_QUOTES, 'UTF-8'); ?></h2>
          <p class="lede" id="result-summary"><?php echo htmlspecialchars(bg_t('empty_state'), ENT_QUOTES, 'UTF-8'); ?></p>
        </div>
        <div class="output-actions" id="bulk-actions" hidden>
          <button type="button" id="btn-download-all" class="btn btn-primary"><?php echo htmlspecialchars(bg_t('btn_download_zip'), ENT_QUOTES, 'UTF-8'); ?></button>
          <button type="button" id="btn-print" class="btn btn-ghost"><?php echo htmlspecialchars(bg_t('btn_print'), ENT_QUOTES, 'UTF-8'); ?></button>
        </div>
      </div>

      <div id="barcode-grid" class="barcode-grid"></div>
    </section>
  </main>

  <?php require dirname(__FILE__) . '/includes/footer.php'; ?>

  <script>
    window.BG_I18N = <?php echo json_encode(bg_js_messages(), JSON_UNESCAPED_UNICODE); ?>;
    window.BG_LANG = <?php echo json_encode(bg_lang()); ?>;
  </script>
  <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.6/dist/JsBarcode.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jszip@3.10.1/dist/jszip.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/file-saver@2.0.5/dist/FileSaver.min.js"></script>
  <script src="assets/js/app.js"></script>
</body>
</html>
