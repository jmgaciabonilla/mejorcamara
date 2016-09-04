<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mejorcamara
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
                echo '<h1>' .get_field('review_title'). '</h1>';
                ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mejorcamara' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php mejorcamara_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
