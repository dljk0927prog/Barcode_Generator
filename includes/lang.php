<?php
/**
 * Language helper — iFastNet / shared hosting compatible (plain PHP, no Composer).
 * Default: English. Switch with ?lang=en|zh (stored in cookie).
 */
if (!defined('BG_LANG_LOADED')) {
    define('BG_LANG_LOADED', true);

    $allowed_langs = array('en', 'zh');
    $lang = 'en';

    // Cookie path relative to app folder (works on iFastNet subdirectory installs).
    $cookie_path = '/';
    if (!empty($_SERVER['SCRIPT_NAME'])) {
        $dir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
        if ($dir !== '/' && $dir !== '.' && $dir !== '') {
            $cookie_path = rtrim($dir, '/') . '/';
        }
    }

    if (isset($_GET['lang']) && in_array($_GET['lang'], $allowed_langs, true)) {
        $lang = $_GET['lang'];
        setcookie('bg_lang', $lang, time() + 60 * 60 * 24 * 365, $cookie_path);
        $_COOKIE['bg_lang'] = $lang;
    } elseif (isset($_COOKIE['bg_lang']) && in_array($_COOKIE['bg_lang'], $allowed_langs, true)) {
        $lang = $_COOKIE['bg_lang'];
    }

    $GLOBALS['bg_lang'] = $lang;

    $BG_I18N = array(
        'en' => array(
            'html_lang' => 'en',
            'site_title' => 'Barcode Generator — Batch Barcodes',
            'brand_name' => 'Barcode Generator',
            'brand_tag' => 'Numbers to barcodes · One-click download',
            'nav_home' => 'Generator',
            'nav_manual' => 'User Manual',
            'lang_en' => 'EN',
            'lang_zh' => '中文',
            'lang_label' => 'Language',
            'input_title' => 'Enter codes',
            'input_lede' => 'One code per line. Paste ten numbers at once to generate barcodes in batch.',
            'codes_label' => 'Code list',
            'format_label' => 'Barcode format',
            'display_label' => 'Label text',
            'display_show' => 'Show code under barcode',
            'display_hide' => 'Barcode only',
            'opt_code128' => 'CODE128 (recommended, any characters)',
            'opt_code39' => 'CODE39',
            'opt_ean13' => 'EAN-13 (12/13 digits)',
            'opt_ean8' => 'EAN-8 (7/8 digits)',
            'opt_upc' => 'UPC-A (11/12 digits)',
            'opt_itf14' => 'ITF-14',
            'opt_msi' => 'MSI',
            'opt_pharmacode' => 'Pharmacode',
            'btn_sample' => 'Fill sample (10)',
            'btn_clear' => 'Clear',
            'btn_generate' => 'Generate',
            'btn_download_zip' => 'Download all ZIP',
            'btn_print' => 'Print',
            'btn_download_png' => 'Download PNG',
            'output_title' => 'Barcode preview',
            'empty_state' => 'Nothing yet. Enter codes on the left to begin.',
            'footer_note' => 'Barcodes are generated in your browser. Optional MySQL batch history.',
            'copyright' => 'Copyright © 2026 Desmond Liew. All Rights Reserved.',
            'manual_title' => 'User Manual — Barcode Generator',
            'manual_heading' => 'User Manual',
            'manual_sub' => 'How to generate, preview, and download barcodes',
            'manual_toc' => 'Contents',
            'manual_back' => 'Back to Generator',
            'js_need_one' => 'Please enter at least one code (one per line).',
            'js_max_200' => 'You can generate up to 200 barcodes at once. Please reduce the list.',
            'js_all_fail' => 'All barcodes failed. Check that codes match the selected format (e.g. EAN-13 needs digits).',
            'js_partial' => 'Generated {ok} barcodes; {fail} failed. You can download the successful ones.',
            'js_success' => 'Successfully generated {ok} barcodes. Download individually or as ZIP.',
            'js_summary' => '{total} codes · {ok} OK · {fail} failed · Format {format}',
            'js_sample_ok' => 'Sample codes filled. Click Generate to continue.',
            'js_no_download' => 'No barcodes available to download.',
            'js_zipping' => 'Packing ZIP…',
            'js_zip_ok' => 'ZIP downloaded ({n} barcodes).',
            'js_zip_fail' => 'ZIP packing failed. Please try again.',
            'js_dl_fail' => 'Download failed: could not export the image.',
            'js_render_fail' => 'Could not render this barcode',
        ),
        'zh' => array(
            'html_lang' => 'zh-CN',
            'site_title' => 'Barcode Generator — 批量条码生成',
            'brand_name' => 'Barcode Generator',
            'brand_tag' => '批量号码 → 条码 · 一键下载',
            'nav_home' => '生成器',
            'nav_manual' => '用户手册',
            'lang_en' => 'EN',
            'lang_zh' => '中文',
            'lang_label' => '语言',
            'input_title' => '输入号码',
            'input_lede' => '每行一个号码。例如一次粘贴 10 个编码，即可批量生成对应条码。',
            'codes_label' => '号码列表',
            'format_label' => '条码格式',
            'display_label' => '显示文字',
            'display_show' => '显示号码',
            'display_hide' => '仅条码',
            'opt_code128' => 'CODE128（推荐，任意字符）',
            'opt_code39' => 'CODE39',
            'opt_ean13' => 'EAN-13（需 12/13 位数字）',
            'opt_ean8' => 'EAN-8（需 7/8 位数字）',
            'opt_upc' => 'UPC-A（需 11/12 位数字）',
            'opt_itf14' => 'ITF-14',
            'opt_msi' => 'MSI',
            'opt_pharmacode' => 'Pharmacode',
            'btn_sample' => '填入示例（10个）',
            'btn_clear' => '清空',
            'btn_generate' => '生成条码',
            'btn_download_zip' => '下载全部 ZIP',
            'btn_print' => '打印',
            'btn_download_png' => '下载 PNG',
            'output_title' => '条码预览',
            'empty_state' => '尚未生成。先在左侧输入号码。',
            'footer_note' => '条码在浏览器生成 · 可选 MySQL 保存批次记录',
            'copyright' => 'Copyright © 2026 Desmond Liew. All Rights Reserved.',
            'manual_title' => '用户手册 — Barcode Generator',
            'manual_heading' => '用户手册',
            'manual_sub' => '如何生成、预览与下载条码',
            'manual_toc' => '目录',
            'manual_back' => '返回生成器',
            'js_need_one' => '请至少输入一个号码（每行一个）。',
            'js_max_200' => '一次最多生成 200 个条码，请删减后再试。',
            'js_all_fail' => '全部生成失败。请检查号码是否符合所选格式（例如 EAN-13 需要数字）。',
            'js_partial' => '已生成 {ok} 个条码，{fail} 个失败。可下载成功的条码。',
            'js_success' => '已成功生成 {ok} 个条码，可单个或批量下载。',
            'js_summary' => '共 {total} 个号码 · 成功 {ok} · 失败 {fail} · 格式 {format}',
            'js_sample_ok' => '已填入 10 个示例号码，点击「生成条码」即可。',
            'js_no_download' => '没有可下载的条码。',
            'js_zipping' => '正在打包 ZIP…',
            'js_zip_ok' => '已下载 ZIP（{n} 个条码）。',
            'js_zip_fail' => 'ZIP 打包失败，请重试。',
            'js_dl_fail' => '下载失败：无法导出图片。',
            'js_render_fail' => '无法生成该条码',
        ),
    );

    function bg_lang()
    {
        return isset($GLOBALS['bg_lang']) ? $GLOBALS['bg_lang'] : 'en';
    }

    function bg_t($key)
    {
        global $BG_I18N;
        $lang = bg_lang();
        if (isset($BG_I18N[$lang][$key])) {
            return $BG_I18N[$lang][$key];
        }
        if (isset($BG_I18N['en'][$key])) {
            return $BG_I18N['en'][$key];
        }
        return $key;
    }

    function bg_js_messages()
    {
        $keys = array(
            'js_need_one', 'js_max_200', 'js_all_fail', 'js_partial', 'js_success',
            'js_summary', 'js_sample_ok', 'js_no_download', 'js_zipping', 'js_zip_ok',
            'js_zip_fail', 'js_dl_fail', 'js_render_fail', 'empty_state', 'btn_download_png',
        );
        $out = array();
        foreach ($keys as $k) {
            $out[$k] = bg_t($k);
        }
        return $out;
    }

    /**
     * Build same-page URL with language query (keeps other query params).
     */
    function bg_lang_url($target_lang)
    {
        $path = isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : 'index.php';
        $query = $_GET;
        $query['lang'] = $target_lang;
        return htmlspecialchars($path . '?' . http_build_query($query), ENT_QUOTES, 'UTF-8');
    }
}
