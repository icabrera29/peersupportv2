<?php
/**
 * The template for displaying all pages
 *
 * @package PeerSupport
 * @since 1.0.0
 */

get_header();
?>

<?php
while (have_posts()) : the_post();
?>

<!-- Page Header -->
<?php if (has_post_thumbnail()) : ?>
<section class="hero" style="height: 60vh; min-height: 400px;">
  <?php the_post_thumbnail('full', array('class' => 'hero__image')); ?>
  <div class="hero__overlay"></div>
  <div class="hero__content">
    <h1 class="hero__title"><?php the_title(); ?></h1>
  </div>
</section>
<?php else : ?>
<section class="section-sm" style="padding-top: calc(var(--spacing-3xl) + 70px);">
  <div class="container container-text text-center">
    <h1><?php the_title(); ?></h1>
  </div>
</section>
<?php endif; ?>

<!-- Page Content -->
<section class="section">
  <div class="container container-text">
    <?php the_content(); ?>

    <?php
    wp_link_pages(array(
        'before' => '<div class="page-links">' . __('Pages:', 'peersupport'),
        'after'  => '</div>',
    ));
    ?>
  </div>
</section>

<?php
endwhile;
?>

<?php
get_footer();
