<?php

// add dynamic title tag support
function custom_theme_support() {
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'custom_theme_support');

// add menus
function custom_menus() {
    $locations = array(
        'primary' => "Locate in header",
        'secondary' => 'Locate in footer'
    );
    register_nav_menus($locations);
}

add_action('init', 'custom_menus');

function custom_register_styles() {
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('ahasbi-bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css", array(), '4.6.0', 'all');
    wp_enqueue_style('ahasbi-icon', "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css", array(), '1.3.0', 'all');
    wp_enqueue_style('ahasbi-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css", array(), '5.15.2', 'all');
    wp_enqueue_style('ahasbi-gfont', "https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap", array(), 'css2', 'all');
    wp_enqueue_style('ahasbi-custom', get_template_directory_uri() . "/style.css", array(), $version, 'all');
}

add_action('wp_enqueue_scripts', 'custom_register_styles');

function custom_registe_scripts() {
    wp_enqueue_script('ahasbi-jquery', 'https://code.jquery.com/jquery-3.5.1.slim.min.js', array(), '3.5.1', 'all', true);
    wp_enqueue_script('ahasbi-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', array(), '1.16.1', 'all', true);
    wp_enqueue_script('ahasbi-bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js', array(), '4.6.0', 'all', true);
    wp_enqueue_script('ahasbi-javascript',  get_template_directory_uri() . "/assets/js/main.js", array(), '1.0', 'all', true);
}

add_action('wp_enqueue_scripts', 'custom_registe_scripts');

?>

<?php
	class comment_walker extends Walker_Comment {
		var $tree_type = 'comment';
		var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );

		// constructor – wrapper for the comments list
		function __construct() { ?>

			<section class="comments-list">

		<?php }

		// start_lvl – wrapper for child comments list
		function start_lvl( &$output, $depth = 0, $args = array() ) {
			$GLOBALS['comment_depth'] = $depth + 2; ?>

			<section class="child-comments comments-list">

		<?php }

		// end_lvl – closing wrapper for child comments list
		function end_lvl( &$output, $depth = 0, $args = array() ) {
			$GLOBALS['comment_depth'] = $depth + 2; ?>

			</section>

		<?php }

		// start_el – HTML for comment template
		function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
			$depth++;
			$GLOBALS['comment_depth'] = $depth;
			$GLOBALS['comment'] = $comment;
			$parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' );

			if ( 'article' == $args['style'] ) {
				$tag = 'article';
				$add_below = 'comment';
			} else {
				$tag = 'article';
				$add_below = 'comment';
			} ?>

			<article <?php comment_class(empty( $args['has_children'] ) ? '' :'parent') ?> id="comment-<?php comment_ID() ?>" itemprop="comment" itemscope itemtype="http://schema.org/Comment">
                <div class="card">
                    <div class="container card-header d-flex">
                        <div class="align-self-start avatar">
                            <img src="<?php echo get_avatar_url($comment, array($default => "monsterid"))?>" class="img-thumbnail" width="40" height="40" alt="Author's gravatar">
                        </div>
                        <div class="comment-meta post-meta" role="complementary">
                            <h2 class="comment-author">
                                <a class="comment-author-link" href="<?php comment_author_url(); ?>" itemprop="author"><?php comment_author(); ?></a>
                            </h2>
                            <time class="comment-meta-item" datetime="<?php comment_date('Y-m-d') ?>T<?php comment_time('H:iP') ?>" itemprop="datePublished"><?php comment_date('jS F Y') ?>, <a href="#comment-<?php comment_ID() ?>" itemprop="url"><?php comment_time() ?></a></time>
                            <?php edit_comment_link('<p class="comment-meta-item">Edit this comment</p>','',''); ?>
                            <?php if ($comment->comment_approved == '0') : ?>
                            <p class="comment-meta-item">Your comment is awaiting moderation.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="comment-content post-content" itemprop="text">
                            <?php comment_text() ?>
                            <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                        </div>
                    </div>
                </div>
		<?php }

		// end_el – closing HTML for comment template
		function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>

			</article>

		<?php }

		// destructor – closing wrapper for the comments list
		function __destruct() { ?>

			</section>

		<?php }

	}
?>
