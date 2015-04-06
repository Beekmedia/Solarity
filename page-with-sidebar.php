<? //Template Name: Page with Sidebars ?>

<?=get_header()?>

<div class="wrap">

	<?php if (have_posts()): ?>

		<?php while (have_posts()): ?>

			<?=the_post()?>

			<article id="post-<?=the_ID()?>" role="article" itemscope itemtype="http://schema.org/BlogPosting">

				<section id="content" itemprop="articleBody">

						<div id="mainbar" class="m-all t-2of3 d-5of7">

							<?=get_template_part('includes/partials/content', 'page')?>

						</div> <!-- /#mainbar -->

						<div id="sidebar" class="sidebar m-all t-1of3 d-2of7 last-col" role="complementary">

							<?=get_sidebar('sidebar1')?>

						</div> <!-- /#sidebar -->


				</section> <!-- /#content -->

			</article>

		<?php endwhile; ?>

	<?php else: ?>

		<?=get_template_part('includes/partials/content', 'none')?>


	<?php endif; ?>

</div>

<?=get_footer()?>
