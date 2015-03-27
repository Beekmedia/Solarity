<?php # Single post template. ?>

<?php the_content(); ?>
<footer class="article-footer">
	<?php if(get_the_category_list(', ') != ''):
		printf( __( '<p class="category-list">Filed under %1$s </p>', 'solarity' ), get_the_category_list(', ') );
	endif; ?>
</footer> <!-- end article footer -->

<?=comments_template()?>
