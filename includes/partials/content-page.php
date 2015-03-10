<?php

	global $post;

	$name = $post->post_name;

	# Add special partial template names here:
	$special = array(
		'front',
	);
?>

<?php if ((is_single() || is_page()) && in_array($name, $special)): ?>

	<?=get_template_part('includes/partials/content', $name)?>

<?php else: ?>

	<?=get_template_part('includes/partials/content-header')?>

	<?=get_template_part('includes/partials/content')?>

<?php endif; ?>
