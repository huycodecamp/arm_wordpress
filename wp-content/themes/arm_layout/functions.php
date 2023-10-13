<?php
function custom_field_meta_box() {
    add_meta_box(
        'custom_field_meta_box_id',         // ID của meta box
        'Trường tùy chỉnh',                // Tiêu đề của meta box
        'custom_field_meta_box_callback',  // Callback để hiển thị nội dung meta box
        'post'                             // Loại bài viết bạn muốn hiển thị meta box. Ở đây là 'post'.
    );
}

function custom_field_meta_box_callback($post) {
    $gia_san_pham = get_post_meta($post->ID, '_gia_san_pham', true);
    echo '<label for="gia_san_pham">Giá sản phẩm:</label>';
    echo '<input type="text" id="gia_san_pham" name="gia_san_pham" value="' . esc_attr($gia_san_pham) . '"/>';
}

add_action('add_meta_boxes', 'custom_field_meta_box');


function save_custom_field_meta_box_data($post_id) {
    if (array_key_exists('gia_san_pham', $_POST)) {
        update_post_meta(
            $post_id,
            '_gia_san_pham',
            sanitize_text_field($_POST['gia_san_pham'])
        );
    }
}

add_action('save_post', 'save_custom_field_meta_box_data');
