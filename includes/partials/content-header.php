<h1>
<?php if (is_single() || is_page()): ?>

	<?php # Single posts or pages: ?>

	<?=the_title()?>

<?php elseif (is_front_page() && is_home()): ?>

	<?php ?>

<?php elseif (is_front_page()): ?>

	<?php ?>

<?php elseif (is_home()): ?>

	<?php # Blog page: ?>

	Blog page
	<?php # Archive stuff: ?>

	<? #If it's a post category page or a product category page, print the category title ?>
<?php elseif (is_category()): ?>
	<span><?=_e('Posts Categorized:', 'solarity')?></span>
	<?=single_cat_title()?>
<?php elseif (is_tag()): ?>
	<span><?php _e('Posts Tagged:', 'solarity'); ?></span>
	<?php single_tag_title(); ?>
<?php elseif (is_author()): ?>
	<?php

	global $post;

	$author_id = $post->post_author;

	?>
	<span><?=_e('Posts By:', 'solarity')?></span>
	<?=the_author_meta('display_name', $author_id)?>
<?php elseif (is_day()): ?>
	<span><?=_e('Daily Archives:', 'solarity')?></span>
	<?=the_time('l, F j, Y')?>
<?php elseif (is_month()): ?>
	<span><?=_e('Monthly Archives:', 'solarity')?></span>
	<?php the_time('F Y'); ?>
<?php elseif (is_year()): ?>
	<span><?=_e('Yearly Archives:', 'solarity')?></span>
	<?=the_time('Y')?>
<?php endif; ?>
</h1>
<?php if (has_deck()): ?>
	<div id="subhead" class="deck"><div><h2><?php echo get_deck(); ?></h2></div></div>
<?php endif; ?>
