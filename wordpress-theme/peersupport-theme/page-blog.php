<?php
/**
 * Template Name: Blog
 * Template for the Blog page
 *
 * @package PeerSupport
 * @since 1.0.0
 */

get_header();
?>

<!-- Page Header -->
<section class="hero" style="height: 60vh; min-height: 400px;">
  <img src="https://images.unsplash.com/photo-1455390582262-044cdead277a?w=1920&q=80" alt="<?php _e('Blog', 'peersupport'); ?>" class="hero__image">
  <div class="hero__overlay"></div>
  <div class="hero__content">
    <h1 class="hero__title"><?php _e('Blog', 'peersupport'); ?></h1>
    <p class="hero__subtitle"><?php _e('Artículos sobre TOC y salud mental', 'peersupport'); ?></p>
  </div>
</section>

<!-- Blog Content -->
<section class="section">
  <div class="container">

    <?php
    // Query for blog posts
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $blog_posts = new WP_Query(array(
        'post_type'      => 'post',
        'posts_per_page' => 6,
        'paged'          => $paged,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ));

    if ($blog_posts->have_posts()) :
    ?>

      <div class="grid grid-2">
        <?php
        while ($blog_posts->have_posts()) : $blog_posts->the_post();
        ?>
          <article class="card">
            <?php if (has_post_thumbnail()) : ?>
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('large', array('class' => 'card__image')); ?>
              </a>
            <?php endif; ?>

            <div class="card__content">
              <div class="card__meta">
                <?php echo get_the_date('j \d\e F, Y'); ?>
              </div>

              <h3 class="card__title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h3>

              <p class="card__excerpt">
                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
              </p>

              <a href="<?php the_permalink(); ?>" class="btn btn-outline mt-md">
                <?php _e('Leer más', 'peersupport'); ?>
              </a>
            </div>
          </article>
        <?php
        endwhile;
        ?>
      </div>

      <!-- Pagination -->
      <div class="pagination mt-xl text-center">
        <?php
        echo paginate_links(array(
            'total'     => $blog_posts->max_num_pages,
            'current'   => $paged,
            'mid_size'  => 2,
            'prev_text' => __('&laquo; Anterior', 'peersupport'),
            'next_text' => __('Siguiente &raquo;', 'peersupport'),
        ));
        ?>
      </div>

    <?php
    wp_reset_postdata();
    else :
    ?>

      <div class="container-text text-center">
        <h2><?php _e('No se encontraron artículos', 'peersupport'); ?></h2>
        <p><?php _e('Vuelve pronto para leer nuevos contenidos.', 'peersupport'); ?></p>
      </div>

    <?php endif; ?>

  </div>
</section>

<?php
get_footer();
