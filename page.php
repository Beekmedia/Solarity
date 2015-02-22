<?=get_header()?>

<?php if (have_posts()): ?>

	<?php while (have_posts()): ?>

		<?=the_post()?>

		<article id="post-<?=the_ID()?>" role="article" itemscope itemtype="http://schema.org/BlogPosting">

			<section id="content" itemprop="articleBody">

					<div id="mainbar" class="m-all t-all d-all">

						<?=get_template_part('includes/partials/content', 'page')?>

					</div> <!-- /#mainbar -->

			</section> <!-- /#content -->

		</article>

	<?php endwhile; ?>

<?php else: ?>

	<?=get_template_part('includes/partials/content', 'none')?>


<?php endif; ?>

<?=get_footer()?>
