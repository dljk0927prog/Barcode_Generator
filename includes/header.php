<?php
if (!defined('BG_LANG_LOADED')) {
    require_once dirname(__FILE__) . '/lang.php';
}
$bg_current = isset($bg_page) ? $bg_page : 'home';
?>
<header class="site-header">
  <div class="header-inner">
    <a class="brand" href="index.php">
      <span class="brand-mark" aria-hidden="true"></span>
      <div>
        <p class="brand-name"><?php echo htmlspecialchars(bg_t('brand_name'), ENT_QUOTES, 'UTF-8'); ?></p>
        <p class="brand-tag"><?php echo htmlspecialchars(bg_t('brand_tag'), ENT_QUOTES, 'UTF-8'); ?></p>
      </div>
    </a>

    <div class="header-tools">
      <nav class="site-nav" aria-label="Main">
        <a class="nav-link<?php echo $bg_current === 'home' ? ' is-active' : ''; ?>" href="index.php"><?php echo htmlspecialchars(bg_t('nav_home'), ENT_QUOTES, 'UTF-8'); ?></a>
        <a class="nav-link<?php echo $bg_current === 'manual' ? ' is-active' : ''; ?>" href="manual.php"><?php echo htmlspecialchars(bg_t('nav_manual'), ENT_QUOTES, 'UTF-8'); ?></a>
      </nav>

      <div class="lang-switch" role="group" aria-label="<?php echo htmlspecialchars(bg_t('lang_label'), ENT_QUOTES, 'UTF-8'); ?>">
        <a class="lang-btn<?php echo bg_lang() === 'en' ? ' is-active' : ''; ?>" href="<?php echo bg_lang_url('en'); ?>">EN</a>
        <a class="lang-btn<?php echo bg_lang() === 'zh' ? ' is-active' : ''; ?>" href="<?php echo bg_lang_url('zh'); ?>">中文</a>
      </div>
    </div>
  </div>
</header>
