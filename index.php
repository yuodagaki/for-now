<?php
/**
 * The main template file
 *
 * @package for-now
 */

get_header();
?>
	<main>
	<h1><?php echo do_shortcode( '[home-url]' ); ?></h1>
		<?php
		if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				the_content();
			endwhile;
		endif;
		?>
	</main><!-- #main -->
<?php
get_footer();
