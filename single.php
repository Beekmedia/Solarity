<?=get_header()?>
<div class="wrap main-content">
<? #Breadcrumbs via Breadcrumb NavXT plugin ?>
	<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
	    <?php if(function_exists('bcn_display'))
	    {
	        bcn_display();
	    }?>
	</div>

	<?php if (have_posts()): ?>
		<?php while (have_posts()): ?>

			<?=get_template_part('includes/partials/content', 'header')?>
			<main>

				<div id="mainbar" class="m-all t-2of3 d-2of3 first-col">

					<?=the_post()?>

					<article id="post-<?=the_ID()?>" role="article" itemscope itemtype="http://schema.org/BlogPosting">
						<section id="installation-map">
							<?#map appears in main column before content when visible ?>
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
							<?# #end map ?>
						</section>


						<section>

							<?=get_template_part('includes/partials/content', 'single')?>

						</section>
					</article>
				</div>

				<div id="sidebar" class="sidebar m-all t-1of3 d-1of3 last-col" role="complementary">


				<? # On single gallery pages, the sidebar is preceded by project details ?>
				<?php if( have_rows('locations') ): ?>
					<div class="locations">
						<? //print a list of locations of the installations
						$rows = get_field('locations');
						$row_count = count($rows);
						echo '<h3>' . pluralize($row_count, 'Installation Location', 'Installation Locations');
						echo ' <a href="#installation-map" class="map-link">' . '>>View on Map' . '</a></h3>';

						while ( have_rows('locations') ) : the_row(); ?>
							<ul><strong><?php echo the_sub_field('title'); ?></strong><?php
							?>, <?php echo the_sub_field('description'); ?></ul> <?

						endwhile;

					wp_reset_query();?>

					</div> <? #.locations ?>
				<?php endif; ?>
					<div class="gallery-description"><?=the_field('installation_details_trans');?></div>

					<?=get_sidebar('single') ?>
				</div> <!-- /#sidebar -->
			<?php endwhile; ?>

		<?php else: ?>

			<?=get_template_part('includes/partials/content', 'none')?>

		<?php endif; ?>
	</div>
</main>
<?=get_footer()?>
