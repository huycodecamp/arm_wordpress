<?php
function custom_field_meta_box()
{
    add_meta_box(
        'custom_field_meta_box_id',         // ID của meta box
        'Trường tùy chỉnh',                // Tiêu đề của meta box
        'custom_field_meta_box_callback',  // Callback để hiển thị nội dung meta box
        'post'                             // Loại bài viết bạn muốn hiển thị meta box. Ở đây là 'post'.
    );
}

function custom_field_meta_box_callback($post)
{
    $gia_san_pham = get_post_meta($post->ID, '_gia_san_pham', true);
    echo '<label for="gia_san_pham">Giá sản phẩm:</label>';
    echo '<input type="text" id="gia_san_pham" name="gia_san_pham" value="' . esc_attr($gia_san_pham) . '"/>';
}

add_action('add_meta_boxes', 'custom_field_meta_box');


function save_custom_field_meta_box_data($post_id)
{
    if (array_key_exists('gia_san_pham', $_POST)) {
        update_post_meta(
            $post_id,
            '_gia_san_pham',
            sanitize_text_field($_POST['gia_san_pham'])
        );
    }
}

add_action('save_post', 'save_custom_field_meta_box_data');



function custom_category_posts_shortcode($atts)
{
    // Mặc định các tham số
    $atts = shortcode_atts(array(
        'category' => '', // Tên của danh mục
        'posts_per_page' => -1, // Số lượng bài viết muốn hiển thị (-1 để hiển thị tất cả)
    ), $atts);

    // Lấy danh sách các bài viết trong danh mục
    $category_posts = get_posts(array(
        'category_name' => $atts['category'],
        'posts_per_page' => $atts['posts_per_page'],
    ));

    // Tạo biến để lưu nội dung của shortcode
    $output = '';

    // Hiển thị danh sách bài viết
    if (!empty($category_posts)) {
        foreach ($category_posts as $post) {
            setup_postdata($post);

            $output .= '<div class="item-card col-lg-4 col-md-12 px-3">
                <div class="bg-white">
                    <img class="avt" src="" alt="" />
                    <div class="content px-3">
                        <div class="new">' . $atts['category'] . '</div>
                        <div class="description subtitle">' . $post->post_title . '</div>
                        <div class="date">01/01/2020</div>
                        <div class="description-two">' . $post->post_excerpt . '</div>
                        <div class="continue">
                            <a href="' . get_permalink($post->ID) . '">Xem thêm </a>
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>';
        }
        wp_reset_postdata(); // Đặt lại dữ liệu bài viết
    } else {
        $output = 'Không có bài viết trong danh mục ' . $atts['category'];
    }

    return $output;
}
add_shortcode('category_posts', 'custom_category_posts_shortcode');


function custom_category_posts_shortcode_2($atts)
{
    // Mặc định các tham số
    $atts = shortcode_atts(array(
        'category' => '', // Tên của danh mục
        'posts_per_page' => 3, // Số lượng bài viết muốn hiển thị (-1 để hiển thị tất cả)
        'css_class' => 'block2 first' 
    ), $atts);

    // Lấy danh sách các bài viết trong danh mục
    $category_posts = get_posts(array(
        'category_name' => $atts['category'],
        'posts_per_page' => $atts['posts_per_page'],
        'css_class' => $atts['css_class'],
    ));

    // Tạo biến để lưu nội dung của shortcode
    $output = '
    <div class="'.$atts['css_class'].'">
        <div class="block2 khac-mau">
            <div class="header-block2">
                <div class="title">
                    <div>' . $atts['category'] . '</div>
                </div>
                <button class="btn">Xem tất cả</button>
            </div>
            <div class="wrapper-card">
                <div class="row mx-0">';
    if (!empty($category_posts)) {
        foreach ($category_posts as $post) {
            setup_postdata($post);

            $output .= '<div class="item-card col-lg-4 col-md-12 px-3">
                            <div class="bg-white">
                                <img class="avt" src="" alt="" />
                                <div class="content px-3">
                                    <div class="new">' . $atts['category'] . '</div>
                                    <div class="description subtitle">' . $post->post_title . '</div>
                                    <div class="date">01/01/2020</div>
                                    <div class="description-two">' . $post->post_excerpt . '</div>
                                    <div class="continue">
                                        <a href="' . get_permalink($post->ID) . '">Xem thêm </a>
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>';
        }
        wp_reset_postdata(); // Đặt lại dữ liệu bài viết
    } else {
        $output = 'Không có bài viết trong danh mục ' . $atts['category'];
    }
    $output .= '    
                </div>
                <div class="space_white"></div>
            </div>
        </div>
    </div>
    ';

    // Hiển thị danh sách bài viết


    return $output;
}
add_shortcode('category_posts_v2', 'custom_category_posts_shortcode_2');
