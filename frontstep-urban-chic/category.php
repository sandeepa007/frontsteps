<?php get_header(); ?>
<!-- Page Content -->
<?php $cat = get_queried_object(); ?>
<!-- HERO SECTION -->
<div class="section section-blog-hero">
   <div class="container-fluid">
      <div class="row">
         <div class="col-xs-12">
            <div class="hero-block text-center">
               <h1 class="h1 text-bold">Blog</h1>
               
          </div>
          <div class="category-block text-center">
            <ul>
               <li><a href="<?php echo home_url('blog');?>">All</a></li>
               <?php
               wp_list_categories( array(
                'orderby' => 'id',
                'style' =>'list',
                'hide_empty' => true,
                'title_li'  => __( '' )
               ));
             ?>
          </ul>
       </div>
    </div>
 </div>
</div>
</div>
<!-- HERO SECTION -->

<!-- CATEGORY POST LIST SECTION -->
<?php

global $wp_query;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$blog_args = array(
   'post_type' => 'post',             
   'orderby' => 'post_date',               
   'order' => 'DESC',
   'post_status' => 'publish',   
   'paged' => $paged,
   'tax_query' => array(
      array(
         'taxonomy' => 'category',
         'field' => 'slug',
         'terms'    =>$cat->slug
      ),
   ),
);

$query = new WP_Query($blog_args);

?>
<?php if ($query->have_posts()):?>
<div class="section section-box section-blog">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
               <?php $featured_image = get_the_post_thumbnail_url($post->ID,'full');?>
               <div class="box-block blog-block">
                  <div class="img-block">
                     <a href="<?php echo get_permalink();?>" title="<?php the_title(); ?>"><img src="<?php echo $featured_image;?>" class="img-responsive"></a>
                  </div>
                  <div class="info-block">
                     <a href="<?php echo get_permalink();?>"><h2 class="h2"><?php the_title();?></h2></a>
                     <p><?php echo wp_trim_words( get_the_content(), 40, '...' ); ?> <a href="<?php echo get_permalink();?>" class="read-more">more</a></p>
                  </div>
               </div>
            <?php endwhile; ?>
            <div class="pagination text-center">
               <?php
               $big = 999999999; // need an unlikely integer
               echo paginate_links(array(
                  'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                  'format' => '?paged=%#%',
                  'current' => max(1, get_query_var('paged')),
                  'total' => $query->max_num_pages,
                  'type'   => 'list',
                  'prev_text'    => '<i class="fa fa-angle-left"></i>',
                  'next_text'    => '<i class="fa fa-angle-right"></i>',
               )); ?>
            </div>
         </div>
         <!-- <div class="col-lg-3 sidebar">
            <?php get_sidebar(); ?>
         </div> -->
      </div>
   </div>
</div>
<?php endif;?>
<!-- CATEGORY POST LIST SECTION -->
<?php get_footer(); ?>