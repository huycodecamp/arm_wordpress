<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php if (have_posts()) : ?>
            <div class="block3">
                <div class="block2 khac-mau">
                    <div class="header-block2">
                        <div class="title">
                            <div><?php printf(__('Kết quả tìm kiếm cho: %s', 'textdomain'), '<span>' . get_search_query() . '</span>'); ?></div>
                        </div>


                    </div>
                    <div class="wrapper-card">
                        <div class="row mx-0">




                            <?php
                            $post_count = 0;
                            // Bắt đầu vòng lặp.
                            while (have_posts() && $post_count < 6) : the_post();
                                $post_count++;
                                // Lấy ảnh đại diện của bài viết
                                $feature_image = get_featured_image_guid(get_the_ID());
                                // Lấy ngày đăng bài viết
                                $post_date = get_the_date();
                                // Lấy tiêu đề và giới hạn số ký tự là 60
                                $post_title = get_the_title();
                                $trimmed_title = mb_substr($post_title, 0, 50, 'UTF-8');
                                if ($trimmed_title !== $post_title) {
                                    $trimmed_title .= '...'; // Thêm dấu ba chấm nếu tiêu đề bị cắt
                                }
                                // Lấy nội dung và giới hạn số ký tự là 200
                                $excerpt = get_the_excerpt();
                                $trimmed_excerpt = wp_trim_words($excerpt, 30, '...'); // 40 từ xấp xỉ 200 ký tự, bạn có thể điều chỉnh số từ cho phù hợp
                            ?>

                                <div id="post-<?php the_ID(); ?>" class="item-card col-lg-4 col-md-12 px-3">
                                    <div class="bg-white">
                                        <a href="<?php the_permalink(); ?>">
                                            <img class="avt" src="<?php echo esc_url($feature_image); ?>" alt="<?php the_title_attribute(); ?>" />
                                        </a>
                                        <div class="content px-3">
                                            <div class="new"><?php // Các mã khác của bạn ở đây 
                                                                ?></div>
                                            <a href="<?php the_permalink(); ?>">
                                                <div class="description">
                                                    <?php echo esc_html($trimmed_title); ?>
                                                </div>
                                            </a>
                                            <div class="date"><?php echo esc_html($post_date); ?></div>
                                            <div class="description-two"><?php echo esc_html($trimmed_excerpt); ?></div>
                                            <div class="continue">
                                                <a href="<?php the_permalink(); ?>">Xem thêm </a>
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile; // Kết thúc vòng lặp.
                            ?>



                        </div>
                        <div class="space_white"></div>
                    </div>
                <?php
                // Phân trang (nếu cần)
                the_posts_pagination(array(
                    'prev_text'          => __('Trang trước', 'textdomain'),
                    'next_text'          => __('Trang sau', 'textdomain'),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Trang', 'textdomain') . ' </span>',
                ));

            // Nếu không có bài viết nào phù hợp với tiêu chí tìm kiếm.
            else : ?>

                    <section class="no-results not-found">
                        <header class="page-header">
                            <h1 class="page-title"><?php _e('Không tìm thấy', 'textdomain'); ?></h1>
                        </header><!-- .page-header -->

                        <div class="page-content">
                            <p><?php _e('Xin lỗi, nhưng không có kết quả nào phù hợp với từ khóa tìm kiếm của bạn. Vui lòng thử lại với một số từ khóa khác.', 'textdomain'); ?></p>
                            <?php get_search_form(); ?>
                        </div><!-- .page-content -->
                    </section><!-- .no-results -->

                <?php endif; ?>
                </div>
            </div>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>