<?php
/**
 * The template for displaying single blog posts
 *
 * @package PeerSupport
 * @since 1.0.0
 */

get_header();
?>

<?php
while (have_posts()) : the_post();
?>

<!-- Post Header -->
<article <?php post_class(); ?>>
  <header class="post-header">
    <div class="container container-text">
      <?php
      $categories = get_the_category();
      if (!empty($categories)) {
          echo '<span class="post-header__category">' . esc_html($categories[0]->name) . '</span>';
      }
      ?>
      <h1 class="post-header__title"><?php the_title(); ?></h1>
      <div class="post-header__meta">
        <span class="post-header__author"><?php _e('Por', 'peersupport'); ?> <?php the_author(); ?></span>
        <span>•</span>
        <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('j \d\e F, Y'); ?></time>
        <span>•</span>
        <span><?php echo ceil(str_word_count(get_the_content()) / 200); ?> <?php _e('min de lectura', 'peersupport'); ?></span>
      </div>
    </div>
  </header>

  <!-- Featured Image -->
  <?php if (has_post_thumbnail()) : ?>
  <div class="post-featured-image">
    <?php the_post_thumbnail('full'); ?>
  </div>
  <?php endif; ?>

  <!-- Post Content -->
  <div class="post-content container">
    <?php the_content(); ?>

    <?php
    wp_link_pages(array(
        'before' => '<div class="page-links">' . __('Páginas:', 'peersupport'),
        'after'  => '</div>',
    ));
    ?>
  </div>

  <!-- Post Navigation -->
  <div class="container container-text mt-xl">
    <div class="post-navigation" style="display: flex; justify-content: space-between; padding-top: var(--spacing-lg); border-top: 1px solid var(--color-border);">
      <div>
        <?php
        $prev_post = get_previous_post();
        if ($prev_post) {
            echo '<a href="' . get_permalink($prev_post) . '" class="btn btn-outline">&laquo; ' . __('Anterior', 'peersupport') . '</a>';
        }
        ?>
      </div>
      <div>
        <?php
        $next_post = get_next_post();
        if ($next_post) {
            echo '<a href="' . get_permalink($next_post) . '" class="btn btn-outline">' . __('Siguiente', 'peersupport') . ' &raquo;</a>';
        }
        ?>
      </div>
    </div>
  </div>
</article>

<!-- Related Posts -->
<section class="related-posts">
  <div class="container">
    <h2><?php _e('Artículos relacionados', 'peersupport'); ?></h2>
    <div class="grid grid-3">
      <?php
      $categories = get_the_category();
      if ($categories) {
          $category_ids = array();
          foreach ($categories as $category) {
              $category_ids[] = $category->term_id;
          }

          $related_posts = new WP_Query(array(
              'category__in'   => $category_ids,
              'post__not_in'   => array(get_the_ID()),
              'posts_per_page' => 3,
              'orderby'        => 'rand',
          ));

          if ($related_posts->have_posts()) :
              while ($related_posts->have_posts()) : $related_posts->the_post();
      ?>
              <article class="card">
                <?php if (has_post_thumbnail()) : ?>
                  <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('medium', array('class' => 'card__image')); ?>
                  </a>
                <?php endif; ?>
                <div class="card__content">
                  <div class="card__meta"><?php echo get_the_date('j \d\e F, Y'); ?></div>
                  <h3 class="card__title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  </h3>
                  <a href="<?php the_permalink(); ?>" class="btn btn-outline mt-md"><?php _e('Leer más', 'peersupport'); ?></a>
                </div>
              </article>
      <?php
              endwhile;
              wp_reset_postdata();
          endif;
      }
      ?>
    </div>
  </div>
</section>

<?php
endwhile;
?>

<?php
get_footer();
