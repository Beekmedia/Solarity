<?=get_header()?>

	<div id="content" class="fix">

<div id="sidebar" class="sidebar m-all t-1of3 d-2of7 first-col" role="complementary">

			<?=get_sidebar('blog')?>

</div> <!-- /#sidebar -->

<div id="mainbar" class="m-all t-2of3 d-5of7 last-col">
<?=get_template_part('includes/partials/content', 'header')?>
			<?php if (have_posts()): ?>

				<?php while (have_posts()): ?>

					<?=the_post()?>

					<article id="post-<?=the_ID()?>" role="article" itemscope itemtype="http://schema.org/BlogPosting">

						<section itemprop="articleBody">

							<?=get_template_part('includes/partials/content', 'index')?>

						</section> <!-- /#content -->

					</article>

				<?php endwhile; ?>



	<nav class="wp-prev-next">



		<ul class="clearfix">
			<li class="prev-link"><?=next_posts_link(__('&laquo; Older Installations', 'solarity'))?></li>
			<li class="next-link"><?=previous_posts_link(__('Newer Installations &raquo;', 'solarity'))?></li>
		</ul>



	</nav>

			<?php else: ?>

				<?=get_template_part('includes/partials/content', 'none')?>

			<?php endif; ?>

		</div> <!-- /#mainbar -->

	<?=get_footer()?>

</div>
