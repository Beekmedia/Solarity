<?php /** Single post template. */ ?>

<div class="group featured-block"> <!-- Show the featured image before content -->
    <a href="<?php echo wp_get_attachment_thumb_url(get_post_thumbnail_id($post->ID)); ?>" rel='lightbox' title= "<?php the_post_thumbnail_caption(); ?>">
    		<?php the_post_thumbnail('large');?> </a>
        <p class="gallery-caption"><?php the_post_thumbnail_caption();?> </p>
</div>
