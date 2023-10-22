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



function custom_category_posts_shortcode_1($atts)
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
    <div class="block2 first"> 
    <div class="header-block2">
        <div class="title">
            <div>' . $atts['category'] . '</div>
        </div>
    <button class="btn">Xem tất cả</button>
    </div>
    <div class="wrapper-card">
        <div class="row mx-0">
    ';

    if (!empty($category_posts)) {
        foreach ($category_posts as $post) {
            setup_postdata($post);

            $post_date = get_the_time('d/m/Y', $post); // Lấy thời gian của bài viết

            $output .= '
                
                            <div class="item-card col-lg-4 col-md-12 px-3">
                                <div class="bg-white">
                                    <img class="avt" src="" alt="" />
                                    <div class="content px-3">
                                        <div class="new">' . $atts['category'] . '</div>
                                        <div class="description subtitle">' . $post->post_title . '</div>
                                        <div class="date">' . $post_date . '</div>
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
add_shortcode('category_posts_v1', 'custom_category_posts_shortcode_1');



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
    <div class="block3">
    <div class="block2 khac-mau">
        <div class="header-block2">
            <div class="title">
                <div>' . $atts['category'] . '</div>
            </div>
            <button class="btn">Xem tất cả</button>
        </div>
        <div class="wrapper-card">
            <div class="row mx-0">
    ';
    if (!empty($category_posts)) {
        foreach ($category_posts as $post) {
            setup_postdata($post);

            $post_date = get_the_time('d/m/Y', $post); // Lấy thời gian của bài viết

            $output .= '
            <div class="item-card col-lg-4 col-md-12 px-3">
                    <div class="bg-white">
                        <img class="avt" src="<?php echo get_template_directory_uri(); ?>/assets/images/demo/imgs/avt-1.png" />
                        <div class="content px-3">
                            <div class="new">' . $atts['category'] . '</div>
                            <div class="description">
                            ' . $post->post_title . '
                            </div>
                            <div class="date">' . $post_date . '</div>
                            <div class="description-two">
                                Dưới những cơn mưa hè của tháng 6, không khí kỳ thi Tuyển
                                sinh vào lớp 6 trường THPT chuyên Hà Nội - Amsterdam lại trở
                                nên nóng hơn bao giờ hết. Ngày 23/6, hai điểm thi đã ...
                            </div>
                            <div class="continue">
                                <a href="' . get_permalink($post->ID) . '"> Xem thêm </a>
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            
            ';
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





function custom_category_posts_shortcode_3($atts)
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
    <div class="container-student">
    <div class="student">
        <div class="header-container">
            <div class="title-student">' . $atts['category'] . '</div>
            <button class="btn hs">Xem tất cả</button>
        </div>
        <div class="slide-slick">
    ';
    if (!empty($category_posts)) {
        foreach ($category_posts as $post) {
            setup_postdata($post);

            $post_date = get_the_time('d/m/Y', $post); // Lấy thời gian của bài viết

            $output .= '
            <div class="thong-tin" style="display: flex">
                <img src="" />
                <div>
                    <div class="quang-ba">
                    ' . $post->post_title . '
                    </div>
                    <div class="date-time">' . $post_date . '</div>
                    <div class="description-student">
                        Trúng tuyển 12 trường ở Mỹ, Nguyễn Thảo Anh chọn trường duy nhất
                        không cấp học bổng nhưng giúp em thỏa đam mê nghệ thuật. Thảo
                        Anh, cựu học sinh lớp 12 Anh 1, trường THPT chuyên Hà Nội -
                        Amsterdam, hoàn thành nộp hồ sơ ứng t uyển đại học vào đầu tháng
                        5. Nữ sinh trúng tuyển 17 trường, cả ở Anh, Mỹ và Nhật Bản.
                    </div>
                    <div class="continue-student">
                        <a href="' . get_permalink($post->ID) . '" class="xem-them">XEM THÊM <i class="fa-solid fa-arrow-right next"></i></a>
                    </div>
                </div>
            </div>
            
            ';
        }
        wp_reset_postdata(); // Đặt lại dữ liệu bài viết
    } else {
        $output = 'Không có bài viết trong danh mục ' . $atts['category'];
    }
    $output .= '    
    </div>
    </div>
</div>
    ';

    // Hiển thị danh sách bài viết


    return $output;
}
add_shortcode('category_posts_v3', 'custom_category_posts_shortcode_3');

