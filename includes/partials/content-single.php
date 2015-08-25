<?php /** Single post template. */ ?>

<div class="group featured-block"> <!-- Show the featured image before content -->
    <a href="<?php echo wp_get_attachment_thumb_url(get_post_thumbnail_id($post->ID)); ?>" title= "<?php the_post_thumbnail_caption(); ?>" rel='lightbox'>
        <?php the_post_thumbnail('large');?> </a>
        <p class="gallery-caption"><?php the_post_thumbnail_caption();?> </p>
</div>

<?php echo $content_arr['main']; //Display the part of the content before the more tag (of the_content)?>
<!-- <footer class="article-footer">-->
    <?php // if(get_the_category_list(', ') != ''):
        // printf( __( '<p class="category-list">Filed under %1$s </p>', 'solarity' ), get_the_category_list(', ') );
    //endif; ?>
<!-- </footer> end article footer -->

<?php echo comments_template(); ?>
