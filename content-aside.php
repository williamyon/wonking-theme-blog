<?php
/**
 * @package wonking
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="index-box">
		<header class="entry-header">
			<?php
			// Display a thumb tack in the top right hand corner if this post is sticky
			if (is_sticky()) {
				echo '<i class="fa fa-thumb-tack sticky-post"></i>';
			}
			?>
			<?php if ( 'post' == get_post_type() ) : ?>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->
		
		<footer class="entry-footer continue-reading">
    		<div class="entry-meta">
				<?php wonking_posted_on(); ?>
				<?php edit_post_link( __( ' | Edit', 'wonking' ), '<span class="edit-link">', '</span>' ); ?>
			</div><!-- .entry-meta -->
		</footer><!-- .entry-footer -->
	</div><!-- .index-box -->
</article><!-- #post-## -->
