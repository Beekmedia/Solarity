<header>
	<h1>
		<?php if (is_front_page() && is_home()): ?>

			<?php ?>

		<?php elseif (is_front_page()): ?>

			<?php ?>

		<?php elseif (is_home()): ?>
			<?php # Blog page: ?>

			<?php # Archive stuff: ?>
			<?php #If it's a post category page or a product category page, print the category title ?>
		<?php elseif (is_category()): ?>
			<?php _e('Category: ', 'solarity'); ?>
			<?php single_cat_title();?>
		<?php elseif (is_tag()): ?>
			<span><?php _e('Tag: ', 'solarity'); ?></span>
			<?php single_tag_title(); ?>
		<?php elseif (is_author()) : ?>
			<?php global $post;
			$author_id = $post->post_author; ?>
			<span><?php _e('Posts By', 'solarity'); ?></span>
			<?php the_author_meta('display_name', $author_id); ?>
		<?php elseif (is_day()): ?>
			<span><?php _e('Daily Archives:', 'solarity'); ?></span>
			<?php the_time('l, F j, Y'); ?>
		<?php elseif (is_month()): ?>
			<span><?php _e('Monthly Archives:', 'solarity'); ?></span>
			<?php the_time('F Y'); ?>
		<?php elseif (is_year()): ?>
			<span><?php _e('Yearly Archives:', 'solarity'); ?></span>
			<?php the_time('Y'); ?>

		<?php elseif (is_single() || is_page()): ?>
			<?php # Single posts or pages: ?>
			<?php the_title(); ?>
			<?php if (has_deck()): //if there's a pipe separator in the title, end the h1 there, then open an h2 for the rest ?>
				<?php echo '</h1>'; ?>
			<div id="subhead" class="deck"><h2><?php echo get_deck();
				if (is_singular('post')):
					if (has_post_format( 'gallery' )):

						if( get_field( 'start-date' ) ):
						?>, <span class="h4 date"><?php
					$date = get_field('start-date');

	// extract Y,M,D
					$y = substr($date, 0, 4);
					$m = substr($date, 4, 2);
					$d = substr($date, 6, 2);
					echo $m . '.' . $y;

					if( get_field( 'end-date' ) ):
					?>&ndash;<?php
				$date = get_field('end-date');

	// extract Y,M,D
				$y = substr($date, 0, 4);
				$m = substr($date, 4, 2);
				$d = substr($date, 6, 2);
	// format date (mm.yy)
				echo $m . '.' . $y; ?> //print month.year
			<?php endif; #end-date ?>
		<?php endif; #start-date ?>
	<?php endif; #gallery post format?>
<?php endif; #singular post ?>
		</span>
	</h2>
</div>
<?php else: //if there's no deck, the h1 still needs to be closed
	echo '</h1>'; ?>
<?php endif; ?>
<?php endif; ?>
</header>
