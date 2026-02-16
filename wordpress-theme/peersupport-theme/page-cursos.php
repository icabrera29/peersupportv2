<?php
/**
 * Template Name: Cursos Page
 * The template for displaying the courses page
 *
 * @package PeerSupport
 * @since 1.0.0
 */

get_header();
?>

<!-- Page Header -->
<section class="hero" style="height: 60vh; min-height: 400px;">
  <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=1920&q=80" alt="<?php _e('Formación y educación', 'peersupport'); ?>" class="hero__image">
  <div class="hero__overlay"></div>
  <div class="hero__content">
    <h1 class="hero__title"><?php _e('Cursos y Formación', 'peersupport'); ?></h1>
    <p class="hero__subtitle"><?php _e('Capacitación profesional basada en evidencia científica', 'peersupport'); ?></p>
  </div>
</section>

<!-- Intro Section -->
<section class="section">
  <div class="container container-text text-center">
    <h2><?php _e('Formación Especializada en TOC', 'peersupport'); ?></h2>
    <p style="font-size: var(--font-size-lg); color: var(--color-text-secondary);">
      <?php _e('Ofrecemos cursos diseñados por profesionales especializados en el tratamiento del Trastorno Obsesivo Compulsivo. Nuestros programas combinan teoría actualizada con herramientas prácticas aplicables inmediatamente.', 'peersupport'); ?>
    </p>
  </div>
</section>

<!-- Courses Grid -->
<section class="section" style="background-color: var(--color-bg-secondary);">
  <div class="container">
    <div class="courses-grid">

      <?php
      $cursos = new WP_Query(array(
          'post_type'      => 'curso',
          'posts_per_page' => -1,
          'orderby'        => 'date',
          'order'          => 'DESC',
      ));

      if ($cursos->have_posts()) :
          while ($cursos->have_posts()) : $cursos->the_post();
              $duration = get_post_meta(get_the_ID(), '_curso_duration', true);
              $audience = get_post_meta(get_the_ID(), '_curso_audience', true);
              $price = get_post_meta(get_the_ID(), '_curso_price', true);
              $hotmart_url = get_post_meta(get_the_ID(), '_curso_hotmart_url', true);
              $badge = get_post_meta(get_the_ID(), '_curso_badge', true);
      ?>

      <article class="course-card">
        <?php if ($badge) : ?>
          <div class="course-card__badge"><?php echo esc_html($badge); ?></div>
        <?php endif; ?>

        <div class="course-card__image">
          <?php
          if (has_post_thumbnail()) {
              the_post_thumbnail('large');
          } else {
              echo '<img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=800&q=80" alt="' . esc_attr(get_the_title()) . '">';
          }
          ?>
        </div>

        <div class="course-card__content">
          <h3 class="course-card__title"><?php the_title(); ?></h3>
          <p class="course-card__description"><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>

          <div class="course-card__meta">
            <?php if ($duration) : ?>
            <div class="course-card__meta-item">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"></circle>
                <polyline points="12 6 12 12 16 14"></polyline>
              </svg>
              <span><?php echo esc_html($duration); ?></span>
            </div>
            <?php endif; ?>

            <?php if ($audience) : ?>
            <div class="course-card__meta-item">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                <circle cx="9" cy="7" r="4"></circle>
                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
              </svg>
              <span><?php echo esc_html($audience); ?></span>
            </div>
            <?php endif; ?>
          </div>

          <div class="course-card__footer">
            <div class="course-card__price">
              <span class="course-card__price-label"><?php _e('Precio:', 'peersupport'); ?></span>
              <span class="course-card__price-value"><?php echo $price ? esc_html($price) : __('A confirmar', 'peersupport'); ?></span>
            </div>
            <?php if ($hotmart_url) : ?>
              <a href="<?php echo esc_url($hotmart_url); ?>" target="_blank" class="btn btn-primary"><?php _e('Más información', 'peersupport'); ?></a>
            <?php else : ?>
              <a href="#" class="btn btn-primary" onclick="alert('<?php _e('Curso próximamente disponible', 'peersupport'); ?>'); return false;"><?php _e('Más información', 'peersupport'); ?></a>
            <?php endif; ?>
          </div>
        </div>
      </article>

      <?php
          endwhile;
          wp_reset_postdata();
      else :
      ?>

      <div class="container-text text-center">
        <p><?php _e('Próximamente estarán disponibles nuestros cursos de formación.', 'peersupport'); ?></p>
      </div>

      <?php endif; ?>

    </div>
  </div>
</section>

<!-- Benefits Section -->
<section class="section">
  <div class="container">
    <h2 class="text-center mb-xl"><?php _e('¿Por qué elegir nuestros cursos?', 'peersupport'); ?></h2>

    <div class="grid grid-3">
      <div class="text-center">
        <div style="width: 80px; height: 80px; background-color: var(--color-primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto var(--spacing-md);">
          <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
            <polyline points="22 4 12 14.01 9 11.01"></polyline>
          </svg>
        </div>
        <h3><?php _e('Basados en Evidencia', 'peersupport'); ?></h3>
        <p><?php _e('Contenido actualizado según las últimas investigaciones y guías clínicas internacionales.', 'peersupport'); ?></p>
      </div>

      <div class="text-center">
        <div style="width: 80px; height: 80px; background-color: var(--color-primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto var(--spacing-md);">
          <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
            <circle cx="9" cy="7" r="4"></circle>
            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
          </svg>
        </div>
        <h3><?php _e('Docentes Especializados', 'peersupport'); ?></h3>
        <p><?php _e('Profesionales con amplia experiencia clínica y académica en el tratamiento del TOC.', 'peersupport'); ?></p>
      </div>

      <div class="text-center">
        <div style="width: 80px; height: 80px; background-color: var(--color-primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto var(--spacing-md);">
          <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
            <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
          </svg>
        </div>
        <h3><?php _e('Certificación', 'peersupport'); ?></h3>
        <p><?php _e('Certificado de finalización al completar exitosamente cada curso.', 'peersupport'); ?></p>
      </div>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="section" style="background-color: var(--color-primary); color: white;">
  <div class="container container-text text-center">
    <h2 style="color: white;"><?php _e('¿Querés recibir novedades sobre nuestros cursos?', 'peersupport'); ?></h2>
    <p style="color: rgba(255,255,255,0.9); font-size: var(--font-size-lg);">
      <?php _e('Suscribite a nuestro newsletter para enterarte cuando lancemos nuevos cursos y formaciones.', 'peersupport'); ?>
    </p>
    <a href="<?php echo esc_url(home_url('/contacto')); ?>" class="btn btn-outline mt-lg" style="border-color: white; color: white;"><?php _e('Contactar', 'peersupport'); ?></a>
  </div>
</section>

<?php
get_footer();
