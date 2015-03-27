<?=get_header()?>
<?php if (have_posts()): ?>
	<?php while (have_posts()): ?>
		<?=get_template_part('includes/partials/content', 'header')?>


		<div id="sidebar" class="sidebar m-all t-1of3 d-2of7 first-col" role="complementary">
		<? # On single gallery pages, the sidebar is preceded by project details ?>
		<?php if( have_rows('locations') ):

	$rows = get_field('locations');
	$row_count = count($rows);
	echo '<h4>' . pluralize($row_count, 'Installation Location', 'Installation Locations');
	echo ' <a href="#" class="map-link">' . '>> View on Map' . '</a></h4>';

	while ( have_rows('locations') ) : the_row(); ?>
		<?php echo '<p><strong>' . the_sub_field('title') . '</strong>' ; ?>
		<?php echo the_sub_field('description') . '</p>';
	endwhile;
wp_reset_query();
endif; ?>
			<div class="gallery-description"><?=the_field('details');?></div>

			<?=get_sidebar('single') ?>
		</div> <!-- /#sidebar -->

		<div id="mainbar" class="m-all t-2of3 d-5of7 last-col">

			<?=the_post()?>

			<article id="post-<?=the_ID()?>" role="article" itemscope itemtype="http://schema.org/BlogPosting">
				<section>
					<?php if( have_rows('locations') ): ?>
							<div class="acf-map">
								<?php while ( have_rows('locations') ) : the_row();

									$location = get_sub_field('location');
									echo $location['address']; ?>

									<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
									<h4><?php the_sub_field('title'); ?></h4>
									<p class="address"><?php echo $location['address']; ?></p>
									<p><?php the_sub_field('description'); ?></p></div>

								<?php endwhile; ?>
							</div>

					<?php wp_reset_query(); ?>
					<?php endif; ?>
				</section>


				<section>

							<?=get_template_part('includes/partials/content', 'single')?>
				</section>
			</article>
		</div>

	<?php endwhile; ?>

<?php else: ?>

	<?=get_template_part('includes/partials/content', 'none')?>

<?php endif; ?>

<?=get_footer()?>
