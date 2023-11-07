<?php
/* Template Name: category */
?>
<?php get_header() ?>



<!-- List News & Events -->
<div class="container">

    <!-- <script>alert('Vao day');</script> -->
    <?php
    $current_category = null;

    if (isset($_GET['cat'])) {
        $category_id = $_GET['cat'];
        // echo ("<script>alert('" . $category_id . "')</script>");
        $current_category = get_category($category_id);
    }

    // $current_category = get_queried_object(); // Lấy thông tin của danh mục hiện tại
    // var_dump($current_category);
    ?>
    <?php
    if ($current_category) {
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        if (is_page() && !$paged) {
            $paged = get_query_var('paged');
        }
        $paged = max(1, $paged);
        // echo ("<script>alert('" . $paged . "')</script>");

        // Lấy danh sách bài viết của danh mục hiện tại
        $args = array(
            'category__in' => array($current_category->term_id),
            'posts_per_page' => 2,
            'paged' => $paged // Hiển thị tất cả bài viết trong danh mục
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) :
    ?>


            <nav class="vsc-breadcrumb vsc-breadcrumb-border" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../index.html">Trang chủ</a></li>
                    <li class="breadcrumb-item active"><?php echo $current_category->name; ?></li>
                </ol>
            </nav>
            <h1 class="d-none">Tin Tức Sự Kiện</h1>
            <div class="block-heading d-none">
                <h2 class="the-title font-weight-bold text-uppercase mb-0">Tin tức</h2>
            </div>

            <section class="posts-list">


                <div class="row">


                    <?php
                    while ($query->have_posts()) : $query->the_post();
                    ?>

                        <div class="col-12 col-sm-6 col-lg-4">
                            <article class="card vsc-horizontal-card card-shadow">
                                <div class="row no-gutters">
                                    <div class="col-12">
                                        <a class="image img_cover_obf" href="<?php the_permalink(); ?>">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <?php $id =  get_the_ID(); ?>
                                                <img width="500" height="325" src="<?php echo get_featured_image_guid($id); ?>" class="card-img wp-post-image" alt="<?php the_title(); ?>" decoding="async" title="<?php the_title(); ?>" data-lazy-src="<?php echo get_featured_image_guid($id); ?>" />

                                                <noscript><img width="500" height="325" src="<?php echo get_featured_image_guid($id); ?>" class="card-img wp-post-image" alt="<?php the_title(); ?>" decoding="async" title="<?php the_title(); ?>" loading="lazy" /></noscript></a>
                                    </div>
                                    <div class="col-12">
                                        <div class="card-body m-0 p-3" data-mh="cardbody_post">
                                            <div data-mh="list_category_post">
                                                <ul class="category_post">
                                                    <li><a href="https://vinschool.edu.vn/news_event/"><?php echo $current_category->name; ?></a></li>

                                                </ul>
                                            </div>
                                            <h3 class="card-title "><a href="<?php the_permalink(); ?>"><?php echo substr(get_the_title(), 0, 60); ?>...</a></h3>
                                        <?php else : ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/default-image.jpg" alt="Default Image">
                                        <?php endif; ?>
                                        <div class="card-date"><?php echo get_the_date('d/m/Y'); ?></div>
                                        <div class="card-text"><?php the_excerpt(); ?></div>
                                        <a class="read-more" href="<?php the_permalink(); ?>"></span>Xem thêm <i class="fa-solid fa-arrow-right"></i></a>

                                        <div class="interaction py-2 d-none">
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </article>

                        </div>

                        


                    <?php
                    endwhile;
                    ?>
                </div>

                
        <?php

        

            wp_reset_postdata(); // Đặt lại trạng thái của bài viết
        else :
            echo 'Không có bài viết trong danh mục này.';
        endif;
    }
        ?>



</div>
</section>
<!--hr.news-hr-->
<div class="block-heading d-none">
    <h2 class="the-title font-weight-bold text-uppercase mb-0">Sự kiện</h2>
</div>
</div>
<?php get_footer() ?>