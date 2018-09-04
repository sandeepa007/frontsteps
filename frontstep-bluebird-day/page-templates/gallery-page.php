<?php
/**
 * Template Name: Gallery Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The Gallery page template
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
                for( $i=1; $i<=4 ; $i++)
                { ?>

                    <a class="rsImg" data-rsw="848" data-rsh="500" data-rsBigImg="<?php echo get_template_directory_uri().'/img/gallery-'.$i.'.jpg'; ?>" href="<?php echo get_template_directory_uri().'/img/gallery-'.$i.'.jpg'; ?>">
                    <img class="rsTmb lazy" data-original="<?php echo get_template_directory_uri().'/img/gallery-'.$i.'.jpg'; ?>" src="<?php echo get_template_directory_uri().'/img/gallery-'.$i.'.jpg'; ?>" alt="<?php echo "gallery-".$i; ?>" >
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
            <div class="col-xs-12 col-sm-6">
                <div class="title-block">
                    <h3 class="h4 color-dark"><?php echo get_theme_mod( 'gallery-title' ); ?></h3>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6">
                <div class="content-block">
                    <div>
						<p><?php echo get_theme_mod( 'gallery-subtitle' ); ?></p>
					</div>
                </div>
            </div>

             <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                <?php while ( have_posts() ) : the_post();
                        the_content();
                    endwhile; // end of the loop. ?>
            </div>

        </div>
    </div>
</div>
<?php get_footer(); ?>