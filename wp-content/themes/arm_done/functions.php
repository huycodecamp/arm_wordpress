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
    $category = get_term_by('slug', $atts['category'], 'category');
    $category_string =  get_site_url() . '?cat=' . $category->term_id;
    
    
    $term = get_term( $category->term_id, 'category' );
    
    $output = '
    <div class="block2 first"> 
    <div class="header-block2">
        <div class="title">
            <div>' . $term->name . '</div>
        </div>
        <a href="' . $category_string . '">
            <button class="btn">Xem tất cả</button>
        </a>
    
    </div>
    <div class="wrapper-card">
        <div class="row mx-0">
    ';

    if (!empty($category_posts)) {
        foreach ($category_posts as $post) {
            setup_postdata($post);

            $feature_image = get_featured_image_guid($post->ID);

            $post_date = get_the_time('d/m/Y', $post); // Lấy thời gian của bài viết
            $full_content = get_the_content();

            $output .= '
                
                            <div class="item-card col-lg-4 col-md-12 px-3">
                                <div class="bg-white">
                                <a href="' . get_permalink($post->ID) . '">
                                <img class="avt" src="' . $feature_image . '" />
                                </a>
                                    <div class="content px-3">
                                        <div class="new">' . $term->name . '</div>
                                        <a href="' . get_permalink($post->ID) . '"> 
                                        <div class="description">
                                        ' . $post->post_title . '
                                        </div> </a>
                                        <div class="date">' . $post_date . '</div>
                                        <div class="description-two">' . custom_excerpt($full_content, 300) . '</div>
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
    $category = get_term_by('slug', $atts['category'], 'category');
    $category_string =  get_site_url() . '?cat=' . $category->term_id;
    $term = get_term( $category->term_id, 'category' );
    // Tạo biến để lưu nội dung của shortcode
    $output = '
    <div class="block3">
    <div class="block2 khac-mau">
        <div class="header-block2">
            <div class="title">
                <div>' . $term->name . '</div>
            </div>
            <a href="' . $category_string . '">
                <button class="btn">Xem tất cả</button>
            </a>
            
        </div>
        <div class="wrapper-card">
            <div class="row mx-0">
    ';
    if (!empty($category_posts)) {
        foreach ($category_posts as $post) {
            setup_postdata($post);
            $feature_image = get_featured_image_guid($post->ID);

            $post_date = get_the_time('d/m/Y', $post); // Lấy thời gian của bài viết
            $full_content = get_the_content();

            $output .= '
            <div class="item-card col-lg-4 col-md-12 px-3">
                    <div class="bg-white">
                        <a href="' . get_permalink($post->ID) . '">
                        <img class="avt" src="' . $feature_image . '" />
                        </a>

                        <div class="content px-3">
                            <div class="new">' . $term->name . '</div>
                            <a href="' . get_permalink($post->ID) . '"> 
                            <div class="description">
                            ' . $post->post_title . '
                            </div> </a>

                            <div class="date">' . $post_date . '</div>
                            <a href="' . get_permalink($post->ID) . '"> 
                            <div class="description-two">
                                '. custom_excerpt($full_content, 300) .'
                            </div>
                            
                            </a>

                            
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
    $category = get_term_by('slug', $atts['category'], 'category');
    $category_string =  get_site_url() . '?cat=' . $category->term_id;
    // Tạo biến để lưu nội dung của shortcode
    $output = `
    
    `;
    if (!empty($category_posts)) {
        foreach ($category_posts as $post) {
            setup_postdata($post);
            // $feature_image = get_featured_image_guid($post->ID);
            // $post_date = get_the_time('d/m/Y', $post); // Lấy thời gian của bài viết

            // $output .= '
            
            // <div class="thong-tin" style="display: flex">
            //     <img src="' . $feature_image . '" style="width:100%"/>
            //     <div>
            //         <div class="quang-ba">
            //             ' . $post->post_title . '
            //         </div>
            //         <div class="date-time">' . $post_date . '</div>
            //         <div class="description-student">
            //             Trúng tuyển 12 trường ở Mỹ, Nguyễn Thảo Anh chọn trường duy nhất
            //             không cấp học bổng nhưng giúp em thỏa đam mê nghệ thuật. Thảo
            //             Anh, cựu học sinh lớp 12 Anh 1, trường THPT chuyên Hà Nội -
            //             Amsterdam, hoàn thành nộp hồ sơ ứng t uyển đại học vào đầu tháng
            //             5. Nữ sinh trúng tuyển 17 trường, cả ở Anh, Mỹ và Nhật Bản.
            //         </div>
            //         <div class="continue-student">
            //             <a href="' . get_permalink($post->ID) . '" class="xem-them">XEM THÊM <i class="fa-solid fa-arrow-right next"></i></a>
            //         </div>
            //     </div>
            // </div>
            
            // ';
        }
        wp_reset_postdata(); // Đặt lại dữ liệu bài viết
    } else {
        $output = 'Không có bài viết trong danh mục ' . $atts['category'];
    }
    

    // Hiển thị danh sách bài viết


    return $output;
}
add_shortcode('category_posts_v3', 'custom_category_posts_shortcode_3');

add_theme_support('post-thumbnails');
function get_featured_image_guid($post_id)
{
    global $wpdb;

    // Tên bảng trong cơ sở dữ liệu WordPress
    $postmeta_table = $wpdb->prefix . 'postmeta';
    $posts_table = $wpdb->prefix . 'posts';

    // Truy vấn SQL để lấy GUID của hình ảnh đặc trưng
    $query = $wpdb->prepare("
        SELECT p2.guid
        FROM $postmeta_table AS pm
        INNER JOIN $posts_table AS p1 ON pm.post_id = p1.ID
        LEFT JOIN $posts_table AS p2 ON pm.meta_value = p2.ID
        WHERE p1.ID = %d
        AND pm.meta_key = '_thumbnail_id'
    ", $post_id);

    $featured_image_guid = $wpdb->get_var($query);

    return $featured_image_guid;
}
// function custom_category_template($template) {
//     if (is_category()) {
//         $template = get_template_directory() . '/custom-category-template.php';
//     }
//     return $template;
// }
// add_filter('template_include', 'custom_category_template');


function custom_excerpt($content, $length = 50, $more = '...') {
    // Loại bỏ các thẻ HTML
    $no_tags = strip_tags($content);

    // Cắt nội dung
    if (mb_strlen($no_tags) > $length) {
        $excerpt = mb_substr($no_tags, 0, $length) . $more;
    } else {
        $excerpt = $no_tags;
    }
    
    return $excerpt;
}

function register_my_menu() {
    register_nav_menus(
      array(
        'gioi-thieu' => __( 'Giới thiệu' ), // 'header-menu' là vị trí menu trong theme
        // bạn có thể đăng ký thêm vị trí menu ở đây
      )
    );
  }
  add_action( 'init', 'register_my_menu' );