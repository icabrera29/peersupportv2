<?php
/**
 * Template Name: Contacto
 * Template for the Contact page
 *
 * @package PeerSupport
 * @since 1.0.0
 */

get_header();
?>

<?php while (have_posts()) : the_post(); ?>

<!-- Page Header -->
<section class="hero" style="height: 60vh; min-height: 400px;">
  <?php if (has_post_thumbnail()) : ?>
    <?php the_post_thumbnail('full', array('class' => 'hero__image')); ?>
  <?php else : ?>
    <img src="https://images.unsplash.com/photo-1423666639041-f56000c27a9a?w=1920&q=80" alt="<?php the_title(); ?>" class="hero__image">
  <?php endif; ?>
  <div class="hero__overlay"></div>
  <div class="hero__content">
    <h1 class="hero__title"><?php the_title(); ?></h1>
    <p class="hero__subtitle"><?php _e('Estamos aquí para ayudarte', 'peersupport'); ?></p>
  </div>
</section>

<!-- Contact Section -->
<section class="section">
  <div class="container">
    <div class="contact-wrapper">

      <!-- Contact Form -->
      <div class="contact-form-container">
        <h2><?php _e('Envianos un mensaje', 'peersupport'); ?></h2>
        <p style="color: var(--color-text-secondary); margin-bottom: var(--spacing-xl);">
          <?php _e('Completá el formulario y nos pondremos en contacto con vos a la brevedad.', 'peersupport'); ?>
        </p>

        <?php
        // Si tenés Contact Form 7 instalado, mostrá el shortcode
        // Reemplazá '123' con el ID de tu formulario
        if (shortcode_exists('contact-form-7')) {
            echo do_shortcode('[contact-form-7 id="123" title="Formulario de contacto"]');
        } else {
            // Formulario HTML básico si no hay CF7
        ?>
        <form id="contactForm" class="contact-form">
          <div class="form-group">
            <label for="contactName" class="form-label"><?php _e('Nombre completo', 'peersupport'); ?> *</label>
            <input type="text" id="contactName" name="name" class="form-input" required placeholder="<?php _e('Tu nombre', 'peersupport'); ?>">
          </div>

          <div class="form-group">
            <label for="contactEmail" class="form-label"><?php _e('Email', 'peersupport'); ?> *</label>
            <input type="email" id="contactEmail" name="email" class="form-input" required placeholder="tu@email.com">
          </div>

          <div class="form-group">
            <label for="contactPhone" class="form-label"><?php _e('Teléfono', 'peersupport'); ?></label>
            <input type="tel" id="contactPhone" name="phone" class="form-input" placeholder="+54 9 11 1234-5678">
          </div>

          <div class="form-group">
            <label for="contactSubject" class="form-label"><?php _e('Asunto', 'peersupport'); ?> *</label>
            <select id="contactSubject" name="subject" class="form-input" required>
              <option value=""><?php _e('Seleccioná un asunto', 'peersupport'); ?></option>
              <option value="Información general"><?php _e('Información general', 'peersupport'); ?></option>
              <option value="Grupos de apoyo"><?php _e('Grupos de apoyo', 'peersupport'); ?></option>
              <option value="Programas de capacitación"><?php _e('Programas de capacitación', 'peersupport'); ?></option>
              <option value="Investigación"><?php _e('Investigación', 'peersupport'); ?></option>
              <option value="Otro"><?php _e('Otro', 'peersupport'); ?></option>
            </select>
          </div>

          <div class="form-group">
            <label for="contactMessage" class="form-label"><?php _e('Mensaje', 'peersupport'); ?> *</label>
            <textarea id="contactMessage" name="message" class="form-input form-textarea" rows="6" required placeholder="<?php _e('Escribí tu mensaje aquí...', 'peersupport'); ?>"></textarea>
          </div>

          <button type="submit" class="btn btn-primary" style="width: 100%;">
            <?php _e('Enviar Mensaje', 'peersupport'); ?>
          </button>

          <!-- Message container for AJAX responses -->
          <div id="formMessage"></div>
        </form>
        <?php } ?>
      </div>

      <!-- Contact Info -->
      <div class="contact-info">
        <h3><?php _e('Información de contacto', 'peersupport'); ?></h3>

        <div class="contact-info-item">
          <div class="contact-info-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
              <polyline points="22,6 12,13 2,6"></polyline>
            </svg>
          </div>
          <div>
            <h4><?php _e('Email', 'peersupport'); ?></h4>
            <p><a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email', 'info@peersupport.org.ar')); ?>"><?php echo esc_html(get_theme_mod('contact_email', 'info@peersupport.org.ar')); ?></a></p>
          </div>
        </div>

        <div class="contact-info-item">
          <div class="contact-info-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
              <circle cx="12" cy="10" r="3"></circle>
            </svg>
          </div>
          <div>
            <h4><?php _e('Ubicación', 'peersupport'); ?></h4>
            <p><?php echo esc_html(get_theme_mod('contact_location', 'Buenos Aires, Argentina')); ?></p>
          </div>
        </div>

        <div class="contact-info-item">
          <div class="contact-info-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <circle cx="12" cy="12" r="10"></circle>
              <polyline points="12 6 12 12 16 14"></polyline>
            </svg>
          </div>
          <div>
            <h4><?php _e('Horario de atención', 'peersupport'); ?></h4>
            <p><?php _e('Lunes a Viernes', 'peersupport'); ?><br>9:00 - 18:00 hs</p>
          </div>
        </div>

        <div style="margin-top: var(--spacing-xl); padding-top: var(--spacing-xl); border-top: 1px solid var(--color-border);">
          <h4 style="margin-bottom: var(--spacing-md);"><?php _e('Seguinos en redes', 'peersupport'); ?></h4>
          <div style="display: flex; gap: var(--spacing-md);">
            <a href="<?php echo esc_url(get_theme_mod('facebook_url', '#')); ?>" class="social-link" aria-label="Facebook" target="_blank">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
              </svg>
            </a>
            <a href="<?php echo esc_url(get_theme_mod('instagram_url', '#')); ?>" class="social-link" aria-label="Instagram" target="_blank">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
              </svg>
            </a>
            <a href="<?php echo esc_url(get_theme_mod('twitter_url', '#')); ?>" class="social-link" aria-label="Twitter" target="_blank">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
              </svg>
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<?php endwhile; ?>

<?php get_footer(); ?>
