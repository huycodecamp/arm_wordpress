<?php
/* Template Name: single */
?>

<?php get_header() ?>

<section id="main">
    <div class="content-box">
        <div class="container" style="margin: 0 auto">
            <div class="row justify-content-between">
                <div class="col-xl-7">


                    <div class="entry-content">
                        <!-- Nội dung bài viết -->
                        <?php
                        if (have_posts()) :
                            while (have_posts()) : the_post();
                                the_content();
                            endwhile;
                        endif;
                        ?>

                    </div>



                </div>
                <div class="col-xl-3">

                    <div class="content-slidebar__level-wrapper">
                        <h5 class="text-uppercase">Tin Nổi Bật</h5>
                        <ul class="list-unstyled content-slidebar__level-lst">
                            <?php
                            $args = array(
                                'post_type' => 'post',  // Loại bài viết (có thể là post, page, hoặc loại tùy chỉnh khác)
                                'posts_per_page' => 6,  // Số bài viết bạn muốn hiển thị
                                'orderby' => 'rand',    // Sắp xếp ngẫu nhiên
                            );

                            $query = new WP_Query($args);

                            if ($query->have_posts()) {
                                while ($query->have_posts()) {
                                    $query->the_post();
                            ?>
                                    <li class="d-flex content-slidebar__item">
                                        <a href="<?php the_permalink(); ?>" class="content-slidebar-new-link"><?php the_title(); ?></a>
                                        <p class="content-slidebar__new-date"><?php the_date('d.m'); ?></p>
                                    </li>
                            <?php
                                }
                                wp_reset_postdata(); // Đặt lại trạng thái của truy vấn
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer() ?>