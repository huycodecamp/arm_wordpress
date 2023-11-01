<?php
get_header();

if (have_posts()) :
    while (have_posts()) : the_post();
        // Hiển thị kết quả tìm được ở đây
        the_title();
        the_content();
    endwhile;
else :
    // Hiển thị thông báo khi không tìm thấy kết quả
    echo 'Không tìm thấy bài viết nào.';
endif;

get_footer();
?>
