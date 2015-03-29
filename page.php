<?=get_header()?>

<div class="wrap">

	<?php if (have_posts()): ?>

		<?php while (have_posts()): ?>

			<?=the_post()?>

			<article id="post-<?=the_ID()?>" role="article" itemscope itemtype="http://schema.org/BlogPosting">

				<section id="content" itemprop="articleBody">

							<?=get_template_part('includes/partials/content', 'page')?>

				</section> <!-- /#content -->

			</article>

		<?php endwhile; ?>

	<?php else: ?>

		<?=get_template_part('includes/partials/content', 'none')?>


	<?php endif; ?>
</div>

<?=get_footer()?>
