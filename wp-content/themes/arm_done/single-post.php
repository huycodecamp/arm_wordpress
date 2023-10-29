<?php
/* Template Name: single */
?>

<?php get_header() ?>

<?php
    $categories = get_the_category();
    
    $firstCategories = null;
    $term = null;
    if ( ! empty( $categories ) ) {
        $firstCategories = $categories[0];
        $term = get_term( $firstCategories->term_id, 'category' );
    }
    $firstCategories    
?>

<div class="container">
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <article class="news-detail post-detail">
                <nav class="vsc-breadcrumb vsc-breadcrumb-border" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Trang chủ</a></li>
                        <!-- <li class="breadcrumb-item"><a href="<?php echo (get_site_url() . '?cat=' . $firstCategories->term_id); ?>"><?php $firstCategories->cat_name ?></a></li> -->
                        <li class="breadcrumb-item active"><?php  the_title(); ?></li>
                    </ol>
                </nav>

                

                <!-- Phần này để truyền nội dung của bài viết vào -->
                <?php
                        if (have_posts()) :
                            while (have_posts()) : the_post();
                                the_content();
                            endwhile;
                        endif;
                        ?>





            </article>
        </div>
    </div>
    <section class="section related-news">
        <div class="block-heading">
            <div class="h2 the-title font-weight-bold mb-0">
                Tin tức liên quan </div>
        </div>

        <!-- Relate news event -->


        <div class="carousel news-carousel same-height-wrap" data-slick='{"arrows":false,"slidesToShow":3,"slidesToScroll":1,"infinite":false,"responsive":[{"breakpoint":992,"settings":{"infinite":true,"slidesToShow":2,"slidesToScroll":1}},{"breakpoint":480,"settings":{"infinite":true,"slidesToShow":1,"slidesToScroll":1,"centerMode":true,"centerPadding":"22px"}}]}'>

                

            <?php
        // Lấy ID chuyên mục của bài đăng hiện tại
        
        $category_ids = array();

        if (!empty($categories)) {
            foreach ($categories as $category) {
                $category_ids[] = $category->term_id;
            }
        }

        $args = array(
            'category__in' => $category_ids,
            'post__not_in' => array(get_the_ID()),
            'posts_per_page' => 3, // Giới hạn số bài viết hiển thị
        );

        $related_posts = new WP_Query($args);

        if ($related_posts->have_posts()) :
            while ($related_posts->have_posts()) : $related_posts->the_post();
            
        ?>

                <div class="slider-item same-height-item">
                    <article class="card bg-brown vsc-news-card vsc-related-news">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <img width="500" height="325" class="card-img-top" src="<?php echo get_featured_image_guid($id); ?>" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                        </a>
                        <div class="card-body">
                            <div class="h5 card-title "><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                            <div class="card-bottom d-flex align-items-center justify-content-between">
                                <p class="card-date"><?php echo get_the_date('d/m/Y'); ?></p>
                                <a class="read-more" href="<?php the_permalink(); ?>">Xem tiếp<span class="icon-next-1 ml-2"></span></a>
                            </div>
                        </div>
                    </article>
                </div>

        <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>Không có bài viết liên quan.</p>';
        endif;
        ?>

            
            
        </div>




    </section>
</div>






<?php get_footer() ?>