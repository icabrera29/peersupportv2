<?php
/**
 * Template Name: Front Page
 * The template for displaying the home page
 *
 * @package PeerSupport
 * @since 1.0.0
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero">
  <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1920&q=80" alt="<?php _e('Paisaje natural tranquilo', 'peersupport'); ?>" class="hero__image">
  <div class="hero__overlay"></div>
  <div class="hero__content">
    <h1 class="hero__title"><?php bloginfo('name'); ?></h1>
    <p class="hero__subtitle"><?php bloginfo('description'); ?></p>
  </div>
  <div class="hero__scroll">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
      <polyline points="6 9 12 15 18 9"></polyline>
    </svg>
  </div>
</section>

<!-- About Preview Section -->
<section class="section">
  <div class="container container-text text-center">
    <h2><?php _e('Sobre Peer Support', 'peersupport'); ?></h2>
    <p><?php _e('Somos una organización dedicada a la investigación y formación sobre el tratamiento del Trastorno Obsesivo Compulsivo (TOC). Nuestro objetivo es brindar apoyo, información y recursos basados en evidencia científica para quienes conviven con esta condición.', 'peersupport'); ?></p>
    <a href="<?php echo esc_url(home_url('/sobre-nosotros')); ?>" class="btn btn-primary mt-lg"><?php _e('Conocer más', 'peersupport'); ?></a>
  </div>
</section>

<!-- Mission Section -->
<section class="section" style="background-color: var(--color-bg-secondary);">
  <div class="container">
    <div class="grid grid-3">
      <div class="text-center">
        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: var(--color-primary); margin-bottom: var(--spacing-md);">
          <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
          <path d="M2 17l10 5 10-5M2 12l10 5 10-5"></path>
        </svg>
        <h3><?php _e('Investigación', 'peersupport'); ?></h3>
        <p><?php _e('Promovemos la investigación científica sobre el TOC y sus tratamientos más efectivos.', 'peersupport'); ?></p>
      </div>

      <div class="text-center">
        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: var(--color-primary); margin-bottom: var(--spacing-md);">
          <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
          <circle cx="9" cy="7" r="4"></circle>
          <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
          <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
        </svg>
        <h3><?php _e('Formación', 'peersupport'); ?></h3>
        <p><?php _e('Ofrecemos programas de capacitación para profesionales y personas afectadas por el TOC.', 'peersupport'); ?></p>
      </div>

      <div class="text-center">
        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: var(--color-primary); margin-bottom: var(--spacing-md);">
          <path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"></path>
          <path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"></path>
          <path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"></path>
          <path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"></path>
        </svg>
        <h3><?php _e('Apoyo', 'peersupport'); ?></h3>
        <p><?php _e('Creamos espacios de contención y apoyo mutuo entre pares que comparten experiencias similares.', 'peersupport'); ?></p>
      </div>
    </div>
  </div>
</section>

<!-- Latest Blog Posts -->
<section class="section">
  <div class="container">
    <h2 class="text-center mb-xl"><?php _e('Últimas Publicaciones', 'peersupport'); ?></h2>

    <div class="grid grid-2">
      <?php
      $latest_posts = new WP_Query(array(
          'post_type'      => 'post',
          'posts_per_page' => 2,
          'orderby'        => 'date',
          'order'          => 'DESC',
      ));

      if ($latest_posts->have_posts()) :
          while ($latest_posts->have_posts()) : $latest_posts->the_post();
      ?>
          <article class="card">
            <?php if (has_post_thumbnail()) : ?>
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('large', array('class' => 'card__image')); ?>
              </a>
            <?php endif; ?>

            <div class="card__content">
              <div class="card__meta"><?php echo get_the_date(); ?></div>
              <h3 class="card__title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h3>
              <p class="card__excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
              <a href="<?php the_permalink(); ?>" class="btn btn-outline mt-md"><?php _e('Leer más', 'peersupport'); ?></a>
            </div>
          </article>
      <?php
          endwhile;
          wp_reset_postdata();
      endif;
      ?>
    </div>

    <div class="text-center mt-xl">
      <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="btn btn-primary"><?php _e('Ver todos los artículos', 'peersupport'); ?></a>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="section" style="background-color: var(--color-primary); color: white;">
  <div class="container container-text text-center">
    <h2 style="color: white;"><?php _e('¿Necesitás apoyo o información?', 'peersupport'); ?></h2>
    <p style="color: rgba(255,255,255,0.9); font-size: var(--font-size-lg);">
      <?php _e('Estamos aquí para ayudarte. Contactanos para conocer más sobre nuestros programas y recursos.', 'peersupport'); ?>
    </p>
    <a href="<?php echo esc_url(home_url('/contacto')); ?>" class="btn btn-outline mt-lg" style="border-color: white; color: white;"><?php _e('Contactar', 'peersupport'); ?></a>
  </div>
</section>

<?php
get_footer();
