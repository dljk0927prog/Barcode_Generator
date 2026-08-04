<?php
if (!defined('BG_LANG_LOADED')) {
    require_once dirname(__FILE__) . '/lang.php';
}
?>
<footer class="site-footer">
  <div class="footer-inner">
    <?php if (!empty($bg_show_note)) : ?>
      <p class="footer-note"><?php echo htmlspecialchars(bg_t('footer_note'), ENT_QUOTES, 'UTF-8'); ?></p>
    <?php endif; ?>
    <p class="footer-copy"><?php echo htmlspecialchars(bg_t('copyright'), ENT_QUOTES, 'UTF-8'); ?></p>
  </div>
</footer>
