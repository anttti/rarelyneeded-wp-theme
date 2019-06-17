<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rarelyneeded
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			if ( get_field( 'external_url' ) ) :
				the_title( '<h1 class="entry-title"><a href="' . get_field( 'external_url' ) . '">🔗 ', '</a></h1>' );
			else :
				the_title( '<h1 class="entry-title">', '</h1>' );
			endif;
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			if ( has_post_thumbnail() ) :
				the_post_thumbnail();
			endif;
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php rarelyneeded_posted_on(); ?>
			<?php rarelyneeded_entry_categories(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'rarelyneeded' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rarelyneeded' ),
				'after'  => '</div>',
			) );
		
		if ( is_singular() ) :
			echo( '<p><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">Link to this post on Rarely Needed</a><p>' );
		endif;
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
