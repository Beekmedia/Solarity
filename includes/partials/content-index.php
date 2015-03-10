<?php # The content loop for the index page. ?>

<h3 class="entry-title">
	<a
		href="<?=the_permalink()?>"
		rel="bookmark"
		title="<?=the_title_attribute()?>"
	>
			<?=the_title()?>
	</a>
</h3>
<? #Comment ?>



	<?php
#		printf(
#			__('<p class="byline entry-meta vcard">Posted %1$s by %2$s', 'solarity'),
#			'<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
#			'<span class="by">by</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link(get_the_author_meta('ID')) . '</span></p>'
#		);
	?>




<section class="entry-content cf">

	<?=the_post_thumbnail( 'portrait-300' )?>


	<?=the_excerpt()?>

	<footer class="article-footer">

		<p class="tags"><?php
echo get_the_tag_list('<p>Tags: ',', ','</p>');
?>
		<?=the_tags('<span class="tags-title">' . __('Tags:', 'solarity') . '</span> ', ', ', '')?></p>

	</footer>

</section>

<?php if (function_exists('freshops_page_navi')): ?>


	<?=freshops_page_navi()?>


<?php else: ?>


	<nav class="wp-prev-next">



		<ul class="clearfix">
			<li class="prev-link"><?=next_posts_link(__('&laquo; Older Entries', 'solarity'))?></li>
			<li class="next-link"><?=previous_posts_link(__('Newer Entries &raquo;', 'solarity'))?></li>
		</ul>



	</nav>


<?php endif; ?>
