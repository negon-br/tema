<?php $mvp_click_id = get_the_ID(); ?>
<div id="comments" class="mvp-com-click-id-<?php echo esc_html($mvp_click_id); ?> mvp-com-click-main">
	<?php if ( post_password_required() ) : ?>
	<p class="nopassword"><?php esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'zox-news' ); ?></p>

	<?php
	/* Stop the rest of comments.php from being processed,
	 * but don't kill the script entirely -- we still have
	 * to fully load the template.
	 */
	return;
	endif;

		// You can start editing here -- including this comment!
	?>
	<?php if ( have_comments() ) : ?>
		<h4 class="mvp-widget-home-title"><span class="mvp-widget-home-title">
			<?php
			printf( _n( '1 Comment', '%1$s Comments', get_comments_number(), 'zox-news' ),
			number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' );
			?>
		</span></h4>
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
	<div class="navigation">
		<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'zox-news' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'zox-news' ) ); ?></div>
	</div> <!--navigation-->
	<?php endif; // check for comment navigation ?>
	<ol class="commentlist">
		<?php
		wp_list_comments( array( 'callback' => 'mvp_comment' ) );
		?>
	</ol>
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
	<div class="navigation">
		<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'zox-news' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'zox-news' ) ); ?></div>
	</div> <!--navigation-->
	<?php endif; // check for comment navigation ?>
	<?php else : // or, if we don't have comments:

		/* If there are no comments and comments are closed,
		 * let's leave a little note, shall we?
		 */
		if ( ! comments_open() ) :
			/* <p class="nocomments"><?php esc_html_e( 'Comments are closed.', 'zox-news' ); ?></p> */
		endif; // end ! comments_open() ?>
	<?php endif; // end have_comments() ?>
	<?php if (get_option('comment_registration') && !$user_ID) : ?>
		<p>
			<?php esc_html_e('You must be logged in to post a comment' , 'zox-news'); ?>
			<a href="<?php echo esc_url(get_option('siteurl')); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">
				<?php esc_html_e('Login', 'zox-news'); ?>
			</a>
		</p>
	<?php else : ?>

	<?php endif; ?>

<?php comment_form(
	array(
		'title_reply' => '<div><h4 class="mvp-widget-home-title"><span class="mvp-widget-home-title">' . esc_html__( 'Leave a Reply', 'zox-news' ) . '</span></h4></div>',
		'title_reply_to' => '<div><h4 class="mvp-widget-home-title"><span class="mvp-widget-home-title">' . esc_html__( 'Leave a Reply', 'zox-news' ) . '</span></h4></div>',
	)
); ?>

</div><!--comments-->