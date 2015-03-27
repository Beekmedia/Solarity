<?php
/*This code tests conditions for 3 separate widget areas:
•
'id'            => 'main_sidebar',, 'name'          => __( 'Main Sidebar', 'solarity' ),
	              							The home page and any other non-blog, non-product pages
'id'            => 'blog_sidebar', 'name'          => __( 'Blog Sidebar', 'solarity' )
									The standard blog sidebar.
___________________________________________________________________________________________________*/
?>
<?php if (is_front_page()) : ?>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("sidebar1") ) : ?>
		<?php dynamic_sidebar('sidebar1'); ?>
	<?php endif; ?>
<?php elseif ( is_home() || is_archive() || is_tag() || is_tax() || is_page()) : ?>

	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Blog Sidebar") ) : ?>

		<?php dynamic_sidebar('Blog Sidebar'); ?>
	<?php else: ?>
	<?php endif; ?>
<?php elseif (is_singular( 'post' )) :?>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("single") ) : ?>

		<?php dynamic_sidebar('single'); ?>

	<?php else: ?>
	<?php endif; ?>
<?php endif; ?>
