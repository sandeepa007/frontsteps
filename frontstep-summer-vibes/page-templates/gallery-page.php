<?php
/**
 * Template Name: Gallery Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 */

get_header(); ?>

<!-- Page title --->
<div class="section section-gallery no-padding">

    <!--Homes Slider-->
    <div id="gallery" class="royalSlider rsDefault rsDefaultscreen basic-home-slider ">
        <?php 
        $args = array( 'post_type' => 'frontsteps-gallery');
        
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post();
        $attachments = new Attachments( 'attachments', get_the_ID() ); ?>

        <?php if( $attachments->exist() ) {?>
            <?php while( $attachment = $attachments->get() ) : ?>
                <a class="rsImg" data-rsw="848" data-rsh="500" data-rsBigImg="<?php echo $attachments->url(); ?>" href="<?php echo $attachments->url(); ?>">
                    <img class="rsTmb lazy" data-original="<?php echo $attachments->url(); ?>" src="<?php echo $attachments->url(); ?>" alt="<?php echo $attachments->field( 'title' ); ?>" >
                </a>
            <?php endwhile; ?>
        <?php 
            }else
            { 
                for( $i=1; $i<=5 ; $i++)
                { ?>

                    <a class="rsImg" data-rsw="848" data-rsh="500" data-rsBigImg="<?php echo get_stylesheet_directory_uri().'/img/gallery/gallery-'.$i.'.jpg'; ?>" href="<?php echo get_stylesheet_directory_uri().'/img/gallery/gallery-'.$i.'.jpg'; ?>">
                    <img class="rsTmb lazy" data-original="<?php echo get_stylesheet_directory_uri().'/img/gallery/gallery-'.$i.'.jpg'; ?>" src="<?php echo get_stylesheet_directory_uri().'/img/gallery/gallery-'.$i.'.jpg'; ?>" alt="<?php echo "gallery-".$i; ?>" >
                </a>

                <?php 
                }
                ?>
            <?php
            }

         ?>
        <?php endwhile; wp_reset_postdata();?>
    </div>
    <!--Homes Slider-->
</div>
<!-- GALLERY SECTION -->


<!-- INTRO SECTION -->
<div class="section section-intro">
    <div class="bg-image fill" style=""></div>

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="title-block text-center">
                    <h2 class="h2 color-dark text-bold"><?php echo get_theme_mod( 'gallery-title' ); ?></h2>
                </div>
            </div>
            <?php
            $full_class = "col-sm-12 text-center";
        
            if(get_theme_mod( 'gallery-leftcontent')!="" && get_theme_mod( 'gallery-rightcontent')!="")
            {
              $full_class = "col-sm-6";
            }
            ?>
            <?php  if(get_theme_mod( 'gallery-leftcontent')!="")
            { ?>
            <div class="col-xs-12 <?php echo $full_class;?>">
                <div class="content-block">
                    <p><?php echo get_theme_mod( 'gallery-leftcontent' ); ?></p>
                </div>
            </div>
            <?php } ?>
              <?php  if(get_theme_mod( 'gallery-rightcontent')!="")
              { ?>
            <div class="col-xs-12 <?php echo $full_class;?>">
                <div class="content-block">
                    <p><?php echo get_theme_mod( 'gallery-rightcontent' ); ?></p>
                </div>
            </div>
            <?php } ?>

        </div>
    </div>
</div>
<?php get_footer(); ?>