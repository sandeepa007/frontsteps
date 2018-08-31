<?php get_header(); ?>
<!-- Page Content -->
<div class="container-fluid">
<div class="box">
   <h1 class="page-header"><?php the_title(); ?></h1>
   <div class="row">
      <div class="col-lg-9">
         <?php while (have_posts()) : the_post(); ?>
         <div class="content">
            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
            <?php the_excerpt(); ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read more...</a>
         </div>
         <?php endwhile; ?>
         <?php wp_reset_query(); ?>
         <?php numeric_bootstrap_posts_nav(); ?>
      </div>
      <div class="col-lg-3 sidebar">
         <?php get_sidebar(); ?>
      </div>
   </div>
</div>
<?php get_footer(); ?>