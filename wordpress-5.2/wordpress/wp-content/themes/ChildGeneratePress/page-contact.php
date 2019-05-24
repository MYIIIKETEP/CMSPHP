<?php
/**
 * Template Name: ContactPage
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

	<div id="primary">
		<main id="main" <?php generate_do_element_classes( 'main' ); ?>>
			<?php
			/**
			 * generate_before_main_content hook.
			 *
			 * @since 0.1
			 */
			do_action( 'generate_before_main_content' );
            //Standart WP loop inne i loopen , här bearbetar man objekts och drar vad som krävs
			while ( have_posts() ) : the_post();
            ?> 


            <div class="row">
            <div class="col-md-6">
            <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="https://pp.userapi.com/c846018/v846018192/1b0563/yuSKHE1gWcM.jpg" alt="Card image cap">
            <div class="card-body">
            <h5 class="card-title">
            <?php the_title() ?>
            </h5>
            <p class="card-text">
            <?php
               the_content();
              ?>
            </p>
            </div>
</div>
            
              
            </div> 
            <div class="col-md-6">
            <h2 class="text-danger">Olearys Adress</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11526.036534829067!2d18.079461268504076!3d59.29062752117975!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2f239ae9ed553a3a!2sO&#39;Learys+Tolv!5e0!3m2!1ssv!2sse!4v1558123889043!5m2!1ssv!2sse" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>

            </div>   

<?php
			endwhile;

			/**
			 * generate_after_main_content hook.
			 *
			 * @since 0.1
			 */
			do_action( 'generate_after_main_content' );
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php
	/**
	 * generate_after_primary_content_area hook.
	 *
	 * @since 2.0
	 */
	//do_action( 'generate_after_primary_content_area' );

	// generate_construct_sidebars();

get_footer();
