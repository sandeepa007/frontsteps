<?php get_header(); ?>
<!-- Page Content -->

<?php $featured_image = get_the_post_thumbnail_url($post->ID,'full');?>
<!-- HERO SECTION -->
<div class="section section-hero section-inner-hero">
   <div class="bg-image fill" style="background-image: url(<?php echo $featured_image;?>);"></div>
   <div class="container-fluid">
      <div class="row">
         <div class="col-xs-12">
            <div class="hero-block color-white text-center">
               <h1 class="h1 text-bold"><?php the_title(); ?></h1>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- HERO SECTION -->

<!-- BLOG DETAILS SECTION -->
<div class="section section-blog-details">
   <div class="container-fluid">
      <div class="box">
         <div class="row">
            <div class="col-lg-12">
               <?php while (have_posts()) : the_post(); ?>
               <div class="content">
                  <?php the_content(); ?>
               </div>
               <?php endwhile; ?>
               <?php wp_reset_query(); ?>
            </div>
            <!-- <div class="col-lg-3 sidebar">
               <?php get_sidebar(); ?>
            </div> -->
         </div>
      </div>
   </div>
</div>
<!-- BLOG DETAILS SECTION -->
<?php get_footer(); ?>