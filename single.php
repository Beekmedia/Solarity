<?=get_header()?>

<?php if (have_posts()): ?>

	<?php while (have_posts()): ?>

		<?=the_post()?>

		<article id="post-<?=the_ID()?>" role="article" itemscope itemtype="http://schema.org/BlogPosting">

			<?php if( have_rows('locations') ): ?>
				<div class="m-all t-2of5 d-3of7 last ghostbox">
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
				</div>
				<?php wp_reset_query(); ?>
			<?php endif; ?>

				<?=get_template_part('includes/partials/content', 'header')?>

			<section>

						<?=get_template_part('includes/partials/content', 'single')?>
			</section>
		</article>

	<?php endwhile; ?>

<?php else: ?>

	<?=get_template_part('includes/partials/content', 'none')?>

<?php endif; ?>

<?=get_footer()?>
