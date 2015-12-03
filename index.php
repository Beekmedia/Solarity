<?php get_header(); ?>

	<div id="content" class="fix wrap">

        <div id="sidebar" class="sidebar m-all t-1of3 d-2of7 first-col" role="complementary">

		<?php get_sidebar(); ?>

        </div> <!-- /#sidebar -->

        <div id="mainbar" class="m-all t-2of3 d-5of7 last-col">

<?php get_template_part('includes/partials/content', 'header');?>

<?php if (have_posts()):
    while (have_posts()): the_post(); ?>

        <article id="post-<?php the_ID(); ?>" role="article" itemscope itemtype="http://schema.org/BlogPosting">
        		<?php get_template_part('includes/partials/content', 'index'); ?>
        </article>

    <?php endwhile; ?>

    <?php else: ?>

    <?php get_template_part('includes/partials/content', 'none'); ?>

    <?php
endif;
?>

        </div> <!-- /#mainbar -->

<?php get_footer(); ?>

    </div>
