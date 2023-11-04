<?php
/* Template Name: category */
?>
<?php get_header() ?>



<!-- List News & Events -->
<div class="container">


    <?php
    $current_category = get_queried_object(); // Lấy thông tin của danh mục hiện tại
    ?>
    <?php
    if ($current_category) {
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        if (is_page() && !$paged) {
            $paged = get_query_var('page');
        }
        $paged = max(1, $paged);

        // Lấy danh sách bài viết của danh mục hiện tại
        $args = array(
            'category__in' => array($current_category->term_id),
            'posts_per_page' => 1,
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
                                            <h3 class="card-title "><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <?php else : ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/default-image.jpg" alt="Default Image">
                                        <?php endif; ?>
                                        <div class="card-date"><?php echo get_the_date('d/m/Y'); ?></div>
                                        <div class="card-text"><?php the_excerpt(); ?></div>
                                        <a class="read-more" href="<?php the_permalink(); ?>"></span></a>

                                        <div class="interaction py-2 d-none">
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </article>

                        </div>

                    <?php
                    endwhile;
                    wp_reset_postdata(); // Đặt lại trạng thái của bài viết
                    ?>
                </div>

                <div class="pagination">
                    <?php
                    
                    $big = 999999999; // need an unlikely integer
                    echo paginate_links(array(
                        'base'    => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format'  => '?paged=%#%',
                        'current' => $paged,
                        'total'   => $query->max_num_pages
                        // You can add the rest of your paginate_links arguments here
                    ));
            
                    ?>
                </div>


        <?php
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