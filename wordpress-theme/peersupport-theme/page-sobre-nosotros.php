<?php
/**
 * Template Name: Sobre Nosotros
 * Template for the About Us page
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
    <img src="<?php echo esc_url(get_template_directory_uri() . '/images/photo-1511632765486-a01980e01a18.jfif'); ?>" alt="<?php the_title(); ?>" class="hero__image">
  <?php endif; ?>
  <div class="hero__overlay"></div>
  <div class="hero__content">
    <h1 class="hero__title"><?php the_title(); ?></h1>
    <?php if (has_excerpt()) : ?>
      <p class="hero__subtitle"><?php echo get_the_excerpt(); ?></p>
    <?php else : ?>
      <p class="hero__subtitle"><?php _e('Dedicados a la investigación y formación sobre el TOC', 'peersupport'); ?></p>
    <?php endif; ?>
  </div>
</section>

<!-- Mission Section -->
<section class="section">
  <div class="container container-text text-center">
    <h2><?php _e('Nuestra Misión', 'peersupport'); ?></h2>
    <?php the_content(); ?>
  </div>
</section>

<!-- Values Section -->
<section class="section" style="background-color: var(--color-bg-secondary);">
  <div class="container">
    <h2 class="text-center mb-xl"><?php _e('Nuestros Valores', 'peersupport'); ?></h2>

    <div class="grid grid-3">
      <div class="text-center">
        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: var(--color-primary); margin-bottom: var(--spacing-md);">
          <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
          <path d="M2 17l10 5 10-5M2 12l10 5 10-5"></path>
        </svg>
        <h3><?php _e('Evidencia Científica', 'peersupport'); ?></h3>
        <p><?php _e('Basamos nuestro trabajo en investigación rigurosa y tratamientos validados científicamente.', 'peersupport'); ?></p>
      </div>

      <div class="text-center">
        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: var(--color-primary); margin-bottom: var(--spacing-md);">
          <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
          <circle cx="9" cy="7" r="4"></circle>
          <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
          <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
        </svg>
        <h3><?php _e('Empatía', 'peersupport'); ?></h3>
        <p><?php _e('Comprendemos las dificultades que enfrentan quienes viven con TOC y sus familias.', 'peersupport'); ?></p>
      </div>

      <div class="text-center">
        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: var(--color-primary); margin-bottom: var(--spacing-md);">
          <circle cx="12" cy="12" r="10"></circle>
          <polyline points="12 6 12 12 16 14"></polyline>
        </svg>
        <h3><?php _e('Compromiso', 'peersupport'); ?></h3>
        <p><?php _e('Dedicados a mejorar la calidad de vida de las personas afectadas por el TOC.', 'peersupport'); ?></p>
      </div>
    </div>
  </div>
</section>

<!-- Services Section -->
<section class="section">
  <div class="container">
    <h2 class="text-center mb-xl"><?php _e('Qué Hacemos', 'peersupport'); ?></h2>

    <div class="grid grid-2">
      <div class="card">
        <div class="card__content">
          <h3 class="card__title"><?php _e('Investigación', 'peersupport'); ?></h3>
          <p><?php _e('Desarrollamos y participamos en proyectos de investigación sobre el TOC y sus tratamientos más efectivos, contribuyendo al avance del conocimiento científico en el área.', 'peersupport'); ?></p>
        </div>
      </div>

      <div class="card">
        <div class="card__content">
          <h3 class="card__title"><?php _e('Formación', 'peersupport'); ?></h3>
          <p><?php _e('Ofrecemos programas de capacitación para profesionales de la salud mental y personas interesadas en especializarse en el tratamiento del TOC.', 'peersupport'); ?></p>
        </div>
      </div>

      <div class="card">
        <div class="card__content">
          <h3 class="card__title"><?php _e('Grupos de Apoyo', 'peersupport'); ?></h3>
          <p><?php _e('Facilitamos espacios de encuentro y apoyo mutuo entre personas que comparten experiencias similares con el TOC.', 'peersupport'); ?></p>
        </div>
      </div>

      <div class="card">
        <div class="card__content">
          <h3 class="card__title"><?php _e('Difusión', 'peersupport'); ?></h3>
          <p><?php _e('Trabajamos para aumentar la conciencia pública sobre el TOC y reducir el estigma asociado a los trastornos de salud mental.', 'peersupport'); ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Team Section -->
<section class="section" style="background-color: var(--color-bg-secondary);">
  <div class="container">
    <h2 class="text-center mb-xl"><?php _e('Nuestro Equipo', 'peersupport'); ?></h2>
    <div class="grid grid-3">
      <!-- Team Member 1 -->
      <div class="text-center">
        <div style="width: 120px; height: 120px; background-color: var(--color-primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto var(--spacing-md); color: white;">
          <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
            <circle cx="12" cy="7" r="4"></circle>
          </svg>
        </div>
        <h3 style="margin-bottom: var(--spacing-xs);"><?php _e('Dra. María González', 'peersupport'); ?></h3>
        <p style="color: var(--color-text-light); font-size: var(--font-size-sm); margin-bottom: var(--spacing-sm);"><?php _e('Directora Ejecutiva', 'peersupport'); ?></p>
        <p><?php _e('Psicóloga clínica especializada en trastornos de ansiedad con 15 años de experiencia en el tratamiento del TOC.', 'peersupport'); ?></p>
      </div>

      <!-- Team Member 2 -->
      <div class="text-center">
        <div style="width: 120px; height: 120px; background-color: var(--color-primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto var(--spacing-md); color: white;">
          <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
            <circle cx="12" cy="7" r="4"></circle>
          </svg>
        </div>
        <h3 style="margin-bottom: var(--spacing-xs);"><?php _e('Dr. Carlos Rodríguez', 'peersupport'); ?></h3>
        <p style="color: var(--color-text-light); font-size: var(--font-size-sm); margin-bottom: var(--spacing-sm);"><?php _e('Director de Investigación', 'peersupport'); ?></p>
        <p><?php _e('Psiquiatra e investigador con numerosas publicaciones sobre neurobiología del TOC y tratamientos innovadores.', 'peersupport'); ?></p>
      </div>

      <!-- Team Member 3 -->
      <div class="text-center">
        <div style="width: 120px; height: 120px; background-color: var(--color-primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto var(--spacing-md); color: white;">
          <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
            <circle cx="12" cy="7" r="4"></circle>
          </svg>
        </div>
        <h3 style="margin-bottom: var(--spacing-xs);"><?php _e('Lic. Ana Martínez', 'peersupport'); ?></h3>
        <p style="color: var(--color-text-light); font-size: var(--font-size-sm); margin-bottom: var(--spacing-sm);"><?php _e('Coordinadora de Programas', 'peersupport'); ?></p>
        <p><?php _e('Trabajadora social dedicada a facilitar grupos de apoyo y desarrollar recursos educativos para la comunidad.', 'peersupport'); ?></p>
      </div>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="section">
  <div class="container container-text text-center">
    <h2><?php _e('Unite a Nuestra Comunidad', 'peersupport'); ?></h2>
    <p style="font-size: var(--font-size-lg); color: var(--color-text-secondary);">
      <?php _e('Si querés saber más sobre nuestros programas, participar en grupos de apoyo o colaborar con nosotros, no dudes en contactarnos.', 'peersupport'); ?>
    </p>
    <a href="<?php echo esc_url(home_url('/contacto')); ?>" class="btn btn-primary mt-lg"><?php _e('Contactar', 'peersupport'); ?></a>
  </div>
</section>

<?php endwhile; ?>

<?php get_footer(); ?>
