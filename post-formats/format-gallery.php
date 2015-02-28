<article id="post-<?php the_ID(); ?>" <?php post_class('gallery'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<header class="article-header">

		<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
	</header> <?php // end article header ?>

	<section class="entry-content cf" itemprop="articleBody">
		<?php
			// the content (pretty self explanatory huh)
			the_content();
		?>
	</section> <?php // end article section ?>

	<footer class="article-footer">
		<?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'solarity' ) . '</span> ', ', ', '</p>' ); ?>

	</footer> <?php // end article footer ?>

	<?php comments_template(); ?>

</article> <?php // end article ?>
