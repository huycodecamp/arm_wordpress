<?php
/* Template Name: category */
?>

<?php get_header() ?>

<?php
$current_category = get_queried_object(); // Lấy thông tin của danh mục hiện tại
?>
<section>
    <div class="wrapper">
        <div class="even-header">
            <ol>
                <li><a href="">HOME</a></li>
                <li>.</li>
                <li><a href="">NEW&EVENTS</a></li>
                <li>.</li>
                <li><a href="">NEWS</a></li>
            </ol>
            <h2>
                <?php echo $current_category->name; ?>
            </h2>
        </div>
        <ul class="tablist">
            <li><a href="">All</a></li>
            <!-- ds danh muc con -->
            <?php
            // Lấy danh sách danh mục con của danh mục hiện tại

            if ($current_category) {
                $child_categories = get_categories(array(
                    'child_of' => $current_category->term_id,
                    'hide_empty' => false, // Hiển thị cả các danh mục con không có bài viết
                ));

                // Duyệt và hiển thị danh sách danh mục con
                if ($child_categories) {
                    echo `<li>`;
                    foreach ($child_categories as $child_category) {

                        echo '<li><li><a href="' . get_category_link($child_category->term_id) . '">' . $child_category->name . '</a></li></li>';
                    }
                    echo `</li>`;
                }
            } else {
                echo 'Không tìm thấy danh mục.';
            }
            ?>
        </ul>
        <div class="list-event-content row">
            <!-- ds bai viet -->

            <?php
            if ($current_category) {
                // Lấy danh sách bài viết của danh mục hiện tại
                $args = array(
                    'category__in' => array($current_category->term_id),
                    'posts_per_page' => -1, // Hiển thị tất cả bài viết trong danh mục
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) :
            ?>
                    <div class="row">
                        <?php
                        while ($query->have_posts()) : $query->the_post();
                        ?>
                            <div class="col-md-4 col-sm-12">
                                <div class="item">
                                    <div class="item-img">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <?php $id =  get_the_ID(); ?>
                                                <img src="<?php echo get_featured_image_guid($id); ?>" class="single_post_thumbnail" alt="<?php the_title(); ?>">
             
                                            <?php else : ?>
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/default-image.jpg" alt="Default Image">
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                    <div class="item-description">
                                        <a href="<?php the_permalink(); ?>">
                                            <h3><?php the_title(); ?></h3>
                                        </a>
                                        <p><?php the_excerpt(); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endwhile;
                        wp_reset_postdata(); // Đặt lại trạng thái của bài viết
                        ?>
                    </div>
            <?php
                else :
                    echo 'Không có bài viết trong danh mục này.';
                endif;
            }
            ?>





        </div>
    </div>
</section>



<?php get_footer() ?>