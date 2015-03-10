<?php
/*
Author: Ben Beekman
URL: http://benbeekman.com

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

// LOAD BONES CORE (if you remove this, the theme will break)
require_once( 'library/solarity.php' );

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
// require_once( 'library/admin.php' );

/*********************
LAUNCH BONES
Let's get everything up and running.
*********************/

function solarity_ahoy() {

	//Allow editor style.
	add_editor_style( get_stylesheet_directory_uri() . '/library/css/editor-style.css' );

	// let's get language support going, if you need it
	//load_theme_textdomain( 'solarity', get_template_directory() . '/library/translation' );

	// USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
	//require_once( 'library/custom-post-type.php' );

	// launching operation cleanup
	add_action( 'init', 'solarity_head_cleanup' );
	// A better title
	add_filter( 'wp_title', 'rw_title', 10, 3 );
	// remove WP version from RSS
	add_filter( 'the_generator', 'solarity_rss_version' );
	// remove pesky injected css for recent comments widget
	add_filter( 'wp_head', 'solarity_remove_wp_widget_recent_comments_style', 1 );
	// clean up comment styles in the head
	add_action( 'wp_head', 'solarity_remove_recent_comments_style', 1 );
	// clean up gallery output in wp
	add_filter( 'gallery_style', 'solarity_gallery_style' );

	// enqueue base scripts and styles
	add_action( 'wp_enqueue_scripts', 'solarity_scripts_and_styles', 999 );
	// ie conditional wrapper

	// launching this stuff after theme setup
	solarity_theme_support();

	// adding sidebars to Wordpress (these are created in functions.php)
	add_action( 'widgets_init', 'solarity_register_sidebars' );

	// cleaning up random code around images
	add_filter( 'the_content', 'solarity_filter_ptags_on_images' );
	// cleaning up excerpt
	add_filter( 'excerpt_more', 'solarity_excerpt_more' );

} /* end bones ahoy */

// let's get this party started
add_action( 'after_setup_theme', 'solarity_ahoy' );


/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
	$content_width = 640;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
	add_image_size( 'landscape-large', 1200, 300, true );
	add_image_size( 'landscape-med', 600, 200, true );
	add_image_size( 'landscape-small', 300, 100, true );

	add_image_size( 'portrait-large', 600, 1000, true );
	add_image_size( 'portrait-med', 300, 500, true );
	add_image_size( 'portrait-small', 150, 250, true );

	add_image_size( 'icon', 72, 72, true );

add_filter( 'image_size_names_choose', 'solarity_custom_image_sizes' );

function solarity_custom_image_sizes( $sizes ) {
		return array_merge( $sizes, array(
				'landscape-large' => __('1200px by 300px'),
				'landscape-med' => __('600px by 150px'),
				'landscape-small' => __('300px by 100px'),
				'portrait-large' => __('600px by 1000px'),
				'portrait-med' => __('300px by 500px'),
				'portrait-small' => __('150px by 250px'),
				'icon' => __('72px by 72px')
		) );
}

/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/

/************* THEME CUSTOMIZE *********************/

/*
	A good tutorial for creating your own Sections, Controls and Settings:
	http://code.tutsplus.com/series/a-guide-to-the-wordpress-theme-customizer--wp-33722

	Good articles on modifying the default options:
	http://natko.com/changing-default-wordpress-theme-customization-api-sections/
	http://code.tutsplus.com/tutorials/digging-into-the-theme-customizer-components--wp-27162

	To do:
	- Create a js for the postmessage transport method
	- Create some sanitize functions to sanitize inputs
	- Create some boilerplate Sections, Controls and Settings
*/

function solarity_theme_customizer($wp_customize) {
	// $wp_customize calls go here.
	//
	// Uncomment the below lines to remove the default customize sections

	// $wp_customize->remove_section('title_tagline');
	// $wp_customize->remove_section('colors');
	// $wp_customize->remove_section('background_image');
	// $wp_customize->remove_section('static_front_page');
	// $wp_customize->remove_section('nav');

	// Uncomment the below lines to remove the default controls
	// $wp_customize->remove_control('blogdescription');

	// Uncomment the following to change the default section titles
	$wp_customize->get_section('colors')->title = __( 'Theme Colors' );
	$wp_customize->get_section('background_image')->title = __( 'Images' );
}

add_action( 'customize_register', 'solarity_theme_customizer' );

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function solarity_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'solarity' ),
		'description' => __( 'The first (primary) sidebar.', 'solarity' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'blog',
		'name' => __( 'Blog Sidebar', 'solarity' ),
		'description' => __( 'The blog sidebar.', 'solarity' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));

	register_sidebar(array(
		'id' => 'single',
		'name' => __( 'Single Sidebar', 'solarity' ),
		'description' => __( 'The single post sidebar.', 'solarity' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));

	/*
	Reference the banner sidebar with sidebar-banner.php

	*/
} // don't remove this bracket!


/************* COMMENT LAYOUT *********************/

// Comment Layout
function solarity_comments( $comment, $args, $depth ) {
	 $GLOBALS['comment'] = $comment; ?>
	<div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
		<article  class="cf">
			<header class="comment-author vcard">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<?php // custom gravatar call ?>
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=40" class="load-gravatar avatar avatar-48 photo" height="40" width="40" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
				<?php // end custom gravatar call ?>
				<?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'solarity' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'solarity' ),'  ','') ) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'solarity' )); ?> </a></time>

			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
					<p><?php _e( 'Your comment is awaiting moderation.', 'solarity' ) ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content cf">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
	<?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!


/*
This is a modification of a function found in the
twentythirteen theme where we can declare some
external fonts. If you're using Google Fonts, you
can replace these fonts, change it in your scss files
and be up and running in seconds.
*/
function solarity_fonts() {
	wp_enqueue_style('googleFonts', 'http://fonts.googleapis.com/css?family=Droid+Sans:400,700');
}

add_action('wp_enqueue_scripts', 'solarity_fonts');

// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form'
	) );



function pluralize($count, $singular, $plural = false) //pluralize for values other than 1
{
   if (!$plural) $plural = $singular . 's';

  return ($count == 1 ? $singular : $plural) ;
}

/* DON'T DELETE THIS CLOSING TAG */ ?>
