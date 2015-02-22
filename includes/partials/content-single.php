<?php # Single post template. ?>
<?php if( have_rows('locations') ): ?>
	<div class="m-all t-2of5 d-2of7 alignleft">
	<div class="acf-map">
		<?php while ( have_rows('locations') ) : the_row();

			$location = get_sub_field('location');
			echo $location['address'];
			?>
			<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
				<h4><?php the_sub_field('title'); ?></h4>
				<p class="address"><?php echo $location['address']; ?></p>
				<p><?php the_sub_field('description'); ?></p>
			</div>
	<?php endwhile; ?>
	</div>
</div>
<?php endif; ?>
<p class="h2">
	<?php if (is_singular('post')):
			if( get_field( "start-date" ) ):
				$date = get_field('start-date');
				// $date = 19881123 (23/11/1988)

				// extract Y,M,D
				$y = substr($date, 0, 4);
				$m = substr($date, 4, 2);
				$d = substr($date, 6, 2);
				echo $m . '.' . $y;
    				// format date (23/11/1988)
    				if( get_field( 'end-date' ) ): ?>–<?
    				$date = get_field('end-date');
				// $date = 19881123 (23/11/1988)

				// extract Y,M,D
				$y = substr($date, 0, 4);
				$m = substr($date, 4, 2);
				$d = substr($date, 6, 2);
    				// format date (06.2001)
    				echo $m . '.' . $y;
    			endif; #end-date
    		endif; #start-date
    		?></p><?
    	endif; #singular post
    	?>
</p>

<?=the_content()?>

<footer class="article-footer">

	<?=the_tags('<p class="tags"><span class="tags-title">' . __('Tags:', 'solarity') . '</span> ', ', ', '</p>')?>

</footer>

<?=comments_template()?>
