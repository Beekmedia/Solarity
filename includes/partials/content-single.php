<?php # Single post template. ?>

<?php if( have_rows('locations') ): ?>
	<?php while ( have_rows('locations') ) : the_row();
		$location = get_sub_field('location');
		echo '<p>' . $location['address'] . '</p>';
	endwhile;
wp_reset_query();
endif; ?>

<?php if(get_the_category_list(', ') != ''):
	printf( __( '<p class="category-list">Categories: %1$s </p>', 'solarity' ), get_the_category_list(', ') );
endif; ?>

<?php the_content(); ?>
<footer class="article-footer">
	<?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'solarity' ) . '</span> ', ', ', '</p>' ); ?>
</footer> <!-- end article footer -->

<?=comments_template()?>
