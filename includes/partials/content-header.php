<header>
	<h1>
		<?php if (is_front_page() && is_home()): ?>

			<?php ?>

		<?php elseif (is_front_page()): ?>

		<?php ?>

		<?php elseif (is_home()): ?>
			<?php # Blog page: ?>
			Blog page

		<?php # Archive stuff: ?>
			<? #If it's a post category page or a product category page, print the category title ?>
		<?php elseif (is_category()): ?>
			<?=_e('', 'solarity')?>
			<?=single_cat_title()?>
		<?php elseif (is_tag()): ?>
			<span><?php _e('', 'solarity'); ?></span>
			<?php single_tag_title(); ?>
		<?php elseif (is_author()): ?>
			<?php global $post;
			$author_id = $post->post_author; ?>
			<span><?=_e('Posts By', 'solarity')?></span>
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

		<?php elseif (is_single() || is_page()): ?>
			<?php # Single posts or pages: ?>
			<?=the_title()?>
			<?php if (has_deck()): ?>
				</h1>
		<div id="subhead" class="deck"><h2><?php echo get_deck();
		if (is_singular('post')):
			if( get_field( "start-date" ) ):
				?>, <span class="h4 date"><?
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
	    	</span>
	    	</h2></div>
	    <?php endif; ?>

		<?php endif; ?>
	</h1>
</header>
