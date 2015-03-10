<?php # Single post template. ?>

<?php if( have_rows('locations') ):

	$rows = get_field('locations');
	$row_count = count($rows);
	echo '<h4>' . pluralize($row_count, 'Installation Location', 'Installation Locations');
	echo ' <a href="#" class="map-link">' . '(View on Map)' . '</a></h4>';

	while ( have_rows('locations') ) : the_row();
		$location = get_sub_field('location'); ?>
		<strong>
		<?php echo the_sub_field('title'); ?>
		</strong>
		<?php echo the_sub_field('description') . '</p>';
	endwhile;
wp_reset_query();
endif; ?>



<?php the_content(); ?>
<footer class="article-footer">
	<?php if(get_the_category_list(', ') != ''):
		printf( __( '<p class="category-list">Filed under %1$s </p>', 'solarity' ), get_the_category_list(', ') );
	endif; ?>
	<?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tagged with ', 'solarity' ) . '</span> ', ', ', '</p>' ); ?>
</footer> <!-- end article footer -->

<?=comments_template()?>
