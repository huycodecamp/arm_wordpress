<?php
/* Template Name: index copy */
?>
<?php get_header() ?>

<?php
if (have_posts()) :
    while (have_posts()) : the_post();
        the_content();
    endwhile;
endif;
?>


<!-- block4 -->
<?php get_footer() ?>