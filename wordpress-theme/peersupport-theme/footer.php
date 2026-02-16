<?php
/**
 * The footer for our theme
 *
 * @package PeerSupport
 * @since 1.0.0
 */
?>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="footer__content">
        <div class="footer__section">
          <h4><?php bloginfo('name'); ?></h4>
          <p><?php bloginfo('description'); ?></p>
        </div>

        <div class="footer__section">
          <h4><?php _e('Enlaces', 'peersupport'); ?></h4>
          <?php
          wp_nav_menu(array(
              'theme_location' => 'footer',
              'container'      => false,
              'items_wrap'     => '%3$s',
              'fallback_cb'    => 'peersupport_footer_menu_fallback',
          ));
          ?>
        </div>

        <div class="footer__section">
          <h4><?php _e('Contacto', 'peersupport'); ?></h4>
          <p><?php _e('Email:', 'peersupport'); ?> <?php echo esc_html(get_theme_mod('contact_email', 'info@peersupport.org.ar')); ?></p>
          <p><?php echo esc_html(get_theme_mod('contact_location', 'Buenos Aires, Argentina')); ?></p>
        </div>
      </div>

      <div class="footer__bottom">
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('Todos los derechos reservados.', 'peersupport'); ?></p>
      </div>
    </div>
  </footer>

  <?php wp_footer(); ?>
</body>
</html>
<?php

/**
 * Fallback for footer menu
 */
function peersupport_footer_menu_fallback() {
    ?>
    <p><a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Inicio', 'peersupport'); ?></a></p>
    <p><a href="<?php echo esc_url(home_url('/sobre-nosotros')); ?>"><?php _e('Sobre Nosotros', 'peersupport'); ?></a></p>
    <p><a href="<?php echo esc_url(home_url('/cursos')); ?>"><?php _e('Cursos', 'peersupport'); ?></a></p>
    <p><a href="<?php echo esc_url(home_url('/blog')); ?>"><?php _e('Blog', 'peersupport'); ?></a></p>
    <p><a href="<?php echo esc_url(home_url('/contacto')); ?>"><?php _e('Contacto', 'peersupport'); ?></a></p>
    <?php
}
