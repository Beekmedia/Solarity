<?php
/*This code tests conditions for 3 separate widget areas:
•
'id'            => 'main_sidebar',, 'name'          => __( 'Main Sidebar', 'solarity' ),
                                            The home page and any other non-blog, non-product pages
'id'            => 'blog_sidebar', 'name'          => __( 'Blog Sidebar', 'solarity' )
                                    The standard blog sidebar.
___________________________________________________________________________________________________*/
?>
<?php
if(is_front_page()):
    if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar1')) :
        dynamic_sidebar('sidebar1');
    endif;

elseif (is_home() || is_archive() || is_tag() || is_tax() || is_page()):

    if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Blog Sidebar')) :

        dynamic_sidebar('Blog Sidebar');

    else:

    endif;

elseif (is_singular('post')):

    if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('single')):
        dynamic_sidebar('single');
    else:
    endif;
endif;
?>
