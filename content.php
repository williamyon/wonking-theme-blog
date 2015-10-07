<?php
/**
 * @package wonking
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php 
	if( $wp_query->current_post == 0 && !is_paged() && is_front_page() ) { // Custom template for the first post on the front page
		if (has_post_thumbnail()) {
			echo '<div class="front-index-thumbnail clear">';
			echo '<div class="image-shifter">';
			echo '<a href="' . get_permalink() . '" title="' . __('Read ', 'wonking') . get_the_title() . '" rel="bookmark">';
			echo the_post_thumbnail('large-thumb');
			echo '</a>';
			echo '</div>';
			echo '</div>';
		} 
		echo '<div class="index-box';
		if (has_post_thumbnail()) { echo ' has-thumbnail'; };
		echo '">';
	} else {
		echo '<div class="index-box">';
		if (has_post_thumbnail()) {
			echo '<div class="small-index-thumbnail clear">';
			echo '<a href="' . get_permalink() . '" title="' . __('Read ', 'wonking') . get_the_title() . '" rel="bookmark">';
			echo the_post_thumbnail('index-thumb');
			echo '</a>';
			echo '</div>';
		}
	}
	?>
		<header class="entry-header">
			<?php
			// Display a thumb tack in the top right hand corner if this post is sticky
			if (is_sticky()) {
				echo '<i class="fa fa-thumb-tack sticky-post"></i>';
			}
			?>
			<?php wonking_entry_header(); ?>
			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php wonking_posted_on(); ?>
				<?php edit_post_link( __( ' | Edit', 'wonking' ), '<span class="edit-link">', '</span>' ); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->
		
		<?php 
		if( $wp_query->current_post == 0 && !is_paged() && is_front_page() ) { 
			echo '<div class="entry-content">';
			the_content( __( '', 'wonking' ) );
			echo '</div>';
			echo '<footer class="entry-footer continue-reading">';
			echo '<a href="' . get_permalink() . '" title="' . __('Read ', 'wonking') . get_the_title() . '" rel="bookmark">Read the article<i class="fa fa-arrow-circle-o-right"></i></a>'; 
			echo '</footer><!-- .entry-footer -->';
		} else { ?>
			<div class="entry-content">
			<?php the_excerpt(); ?>
			</div><!-- .entry-content -->
			<footer class="entry-footer continue-reading">
			<?php wonking_main_footer(); ?>
			</footer><!-- .entry-footer -->
		<?php } ?>
	</div><!-- .index-box -->
</article><!-- #post-## -->