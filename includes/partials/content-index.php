<?php # The content loop for the index page. ?>
<section class="entry-content cf">
<div class="d-3of7 t-1of3 m-all">
	<?=the_post_thumbnail( 'large' )?>
</div>
<div class="d-4of7 t-2of3 m-all last-col">

<h3 class="entry-title">
	<a
		href="<?=the_permalink()?>"
		rel="bookmark"
		title="<?=the_title_attribute()?>"
	>
			<?=the_title()?>
	</a>
</h3>
<?=the_excerpt()?>
</div>
</section>
