<?php
/**
 * The loop that displays a single post.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-single.php.
 *
 * @since 0.0.1
 */
if ( WP_DEBUG && !empty( $_REQUEST['debug'] ) ) {
	if ( 'show' != $_REQUEST['debug'] ) {
		echo '<!-- ';
	}
	esc_html_e( 'Theme File: ' . __FILE__ );
	if ( 'show' != $_REQUEST['debug'] ) {
		echo ' -->';
	}
}

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
?>

				<div id="nav-above" class="navigation">
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'essence' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'essence' ) . '</span>' ); ?></div>
				</div><!-- #nav-above -->

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="entry-title"><?php the_title(); ?></h1>

					<div class="entry-meta">
						<?php essence_posted_on(); ?>
					</div><!-- .entry-meta -->

					<div class="entry-content">
						<?php the_content(); ?>

<p style="text-align: center;"><span style="font-size: medium;"><strong>Follow us：<a href="http://www.linuxdeepin.com/" target="_blank">Our Website</a>&nbsp;&nbsp;|&nbsp;<a href="http://www.linuxdeepin.com/forum" target="_blank">Forum</a></strong></span></p>
<h6 style="text-align: center;"><span style="font-size: medium;"><strong>&nbsp;<a href="http://e.weibo.com/linuxdeepinnew" target="_blank">Weibo</a>&nbsp;|&nbsp;<a href="https://twitter.com/linux_deepin" target="_blank">Twi<wbr>tter</a>&nbsp;|<a href="https://www.facebook.com/deepinlinux" target="_blank">Facebook&nbsp;</a>|&nbsp;<a href="https://plus.google.com/b/117164957311533107373/117164957311533107373/posts" target="_blank">Google+</a>&nbsp;|&nbsp;<a href="http://webchat.freenode.net/?channels=deepin" target="_blank">IRC</a>&nbsp;|&nbsp;<a href="http://distrowatch.com/table.php?distribution=deepin" target="_blank">Distrowatch</a></strong></span></h6>

<div id="wumiiDisplayDiv"></div>

						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'essence' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->

					<?php
					if ( get_the_author_meta( 'description' ) ) { // If a user has filled out their description, show a bio on their entries
					?>
					<div id="entry-author-info">
						<div id="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'essence_author_bio_avatar_size', 60 ) ); ?>
						</div><!-- #author-avatar -->
						<div id="author-description">
							<h2><?php printf( esc_attr__( 'About %s', 'essence' ), get_the_author() ); ?></h2>
							<?php the_author_meta( 'description' ); ?>
							<div id="author-link">
								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" rel="author">
									<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'essence' ), get_the_author() ); ?>
								</a>
							</div><!-- #author-link	-->
						</div><!-- #author-description -->
					</div><!-- #entry-author-info -->
					<?php
					}
					?>
					<div class="entry-utility">
						<?php essence_posted_in(); ?>
						<?php edit_post_link( __( 'Edit', 'essence' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-utility -->
				</div><!-- #post-## -->

				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'essence' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'essence' ) . '</span>' ); ?></div>
					<div class="clear"></div>
				</div><!-- #nav-below -->

<?php
		comments_template( '', true );
	} // end of the loop.
}