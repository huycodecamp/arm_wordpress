<?php get_header() ?>

<div class="block2 first">
    <div class="header-block2">
        <div class="title">
            <div>TIN NỔI BẬT</div>
        </div>
        <button class="btn">Xem tất cả</button>
    </div>
    <div class="wrapper-card">
        <div class="row mx-0">

            <?php
            $args = array(
                'post_type' => 'post',  // Loại bài viết
                'posts_per_page' => 3  // Số lượng bài viết hiển thị
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
            ?>

                    <div class="item-card col-lg-4 col-md-12 px-3">
                        <div class="bg-white">

                            <?php
                            // Lấy đường dẫn ảnh đầu tiên đính kèm của bài viết
                            $first_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                            ?>
                            <img class="avt" src="<?php echo esc_url($first_image_url); ?>" alt="<?php the_title(); ?>" />

                            <div class="content px-3">
                                <div class="new"><?php echo get_the_category()[0]->name; ?></div>
                                <div class="description subtitle">
                                    <?php the_title(); ?>
                                </div>
                                <div class="date"><?php the_date('d/m/Y'); ?></div>
                                <div class="description-two">
                                    <?php the_excerpt(); ?>
                                </div>
                                <div class="continue">
                                    <a href="#"> Xem thêm </a>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>

            <?php
                endwhile;
                wp_reset_postdata();  // Reset lại truy vấn
            else :
                echo 'Không có bài viết nào.';
            endif;
            ?>

            <div class="space_white"></div>
        </div>
    </div>
</div>

<div class="block3">
    <div class="block2 khac-mau">
        <div class="header-block2">
            <div class="title">
                <div>TIN NHÀ TRƯỜNG</div>
            </div>
            <button class="btn">Xem tất cả</button>
        </div>
        <div class="wrapper-card">
            <div class="row mx-0">
                <div class="item-card col-lg-4 col-md-12 px-3">
                    <div class="bg-white">
                        <img class="avt" src="<?php echo get_template_directory_uri(); ?>/assets/images/demo/imgs/avt-1.png" />
                        <div class="content px-3">
                            <div class="new">Tin tức</div>
                            <div class="description">
                                Tiếp sức mùa thi Tuyển sinh lớp 6: Chiến dịch Hoa Phượng Đỏ
                                2023
                            </div>
                            <div class="date">26/06/2023</div>
                            <div class="description-two">
                                Dưới những cơn mưa hè của tháng 6, không khí kỳ thi Tuyển
                                sinh vào lớp 6 trường THPT chuyên Hà Nội - Amsterdam lại trở
                                nên nóng hơn bao giờ hết. Ngày 23/6, hai điểm thi đã ...
                            </div>
                            <div class="continue">
                                <a href="#"> Xem thêm </a>
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-card col-lg-4 col-md-12 px-3">
                    <div class="bg-white">
                        <img class="avt" src="<?php echo get_template_directory_uri(); ?>/assets/images/demo/imgs/avt-1.png" />
                        <div class="content px-3">
                            <div class="new">Tin tức</div>
                            <div class="description">
                                Tiếp sức mùa thi Tuyển sinh lớp 6: Chiến dịch Hoa Phượng Đỏ
                                2023
                            </div>
                            <div class="date">26/06/2023</div>
                            <div class="description-two">
                                Dưới những cơn mưa hè của tháng 6, không khí kỳ thi Tuyển
                                sinh vào lớp 6 trường THPT chuyên Hà Nội - Amsterdam lại trở
                                nên nóng hơn bao giờ hết. Ngày 23/6, hai điểm thi đã ...
                            </div>
                            <div class="continue">
                                <a href="#"> Xem thêm </a>
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-card col-lg-4 col-md-12 px-3">
                    <div class="bg-white">
                        <img class="avt" src="<?php echo get_template_directory_uri(); ?>/assets/images/demo/imgs/avt-1.png" />
                        <div class="content px-3">
                            <div class="new">Tin tức</div>
                            <div class="description">
                                Tiếp sức mùa thi Tuyển sinh lớp 6: Chiến dịch Hoa Phượng Đỏ
                                2023
                            </div>
                            <div class="date">26/06/2023</div>
                            <div class="description-two">
                                Dưới những cơn mưa hè của tháng 6, không khí kỳ thi Tuyển
                                sinh vào lớp 6 trường THPT chuyên Hà Nội - Amsterdam lại trở
                                nên nóng hơn bao giờ hết. Ngày 23/6, hai điểm thi đã ...
                            </div>
                            <div class="continue">
                                <a href="#"> Xem thêm </a>
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space_white"></div>
        </div>
    </div>
</div>
<!-- block3 -->

<div class="block2 first">
    <div class="header-block2">
        <div class="title">
            <div>GƯƠNG SÁNG</div>
        </div>
        <button class="btn">Xem tất cả</button>
    </div>
    <div class="wrapper-card">
        <div class="row mx-0">
            <div class="item-card col-lg-4 col-md-12 px-3">
                <div class="bg-white">
                    <img class="avt" src="<?php echo get_template_directory_uri(); ?>/assets/images/demo/imgs/avt-1.png" />
                    <div class="content px-3">
                        <div class="new">Tin tức</div>
                        <div class="description">
                            Tiếp sức mùa thi Tuyển sinh lớp 6: Chiến dịch Hoa Phượng Đỏ
                            2023
                        </div>
                        <div class="date">26/06/2023</div>
                        <div class="description-two">
                            Dưới những cơn mưa hè của tháng 6, không khí kỳ thi Tuyển
                            sinh vào lớp 6 trường THPT chuyên Hà Nội - Amsterdam lại trở
                            nên nóng hơn bao giờ hết. Ngày 23/6, hai điểm thi đã ...
                        </div>
                        <div class="continue">
                            <a href="#"> Xem thêm </a>
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item-card col-lg-4 col-md-12 px-3">
                <div class="bg-white">
                    <img class="avt" src="<?php echo get_template_directory_uri(); ?>/assets/images/demo/imgs/avt-1.png" />
                    <div class="content px-3">
                        <div class="new">Tin tức</div>
                        <div class="description">
                            Tiếp sức mùa thi Tuyển sinh lớp 6: Chiến dịch Hoa Phượng Đỏ
                            2023
                        </div>
                        <div class="date">26/06/2023</div>
                        <div class="description-two">
                            Dưới những cơn mưa hè của tháng 6, không khí kỳ thi Tuyển
                            sinh vào lớp 6 trường THPT chuyên Hà Nội - Amsterdam lại trở
                            nên nóng hơn bao giờ hết. Ngày 23/6, hai điểm thi đã ...
                        </div>
                        <div class="continue">
                            <a href="#"> Xem thêm </a>
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item-card col-lg-4 col-md-12 px-3">
                <div class="bg-white">
                    <img class="avt" src="<?php echo get_template_directory_uri(); ?>/assets/images/demo/imgs/avt-1.png" />
                    <div class="content px-3">
                        <div class="new">Tin tức</div>
                        <div class="description">
                            Tiếp sức mùa thi Tuyển sinh lớp 6: Chiến dịch Hoa Phượng Đỏ
                            2023
                        </div>
                        <div class="date">26/06/2023</div>
                        <div class="description-two">
                            Dưới những cơn mưa hè của tháng 6, không khí kỳ thi Tuyển
                            sinh vào lớp 6 trường THPT chuyên Hà Nội - Amsterdam lại trở
                            nên nóng hơn bao giờ hết. Ngày 23/6, hai điểm thi đã ...
                        </div>
                        <div class="continue">
                            <a href="#"> Xem thêm </a>
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="space_white"></div>
    </div>
</div>
<div class="block3">
    <div class="block2 khac-mau">
        <div class="header-block2">
            <div class="title">
                <div>HOẠT ĐỘNG NGOẠI KHÓA</div>
            </div>
            <button class="btn">Xem tất cả</button>
        </div>
        <div class="wrapper-card">
            <div class="row mx-0">
                <div class="item-card col-lg-4 col-md-12 px-3">
                    <div class="bg-white">
                        <img class="avt" src="<?php echo get_template_directory_uri(); ?>/assets/images/demo/imgs/avt-1.png" />
                        <div class="content px-3">
                            <div class="new">Tin tức</div>
                            <div class="description">
                                Tiếp sức mùa thi Tuyển sinh lớp 6: Chiến dịch Hoa Phượng Đỏ
                                2023
                            </div>
                            <div class="date">26/06/2023</div>
                            <div class="description-two">
                                Dưới những cơn mưa hè của tháng 6, không khí kỳ thi Tuyển
                                sinh vào lớp 6 trường THPT chuyên Hà Nội - Amsterdam lại trở
                                nên nóng hơn bao giờ hết. Ngày 23/6, hai điểm thi đã ...
                            </div>
                            <div class="continue">
                                <a href="#"> Xem thêm </a>
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-card col-lg-4 col-md-12 px-3">
                    <div class="bg-white">
                        <img class="avt" src="<?php echo get_template_directory_uri(); ?>/assets/images/demo/imgs/avt-1.png" />
                        <div class="content px-3">
                            <div class="new">Tin tức</div>
                            <div class="description">
                                Tiếp sức mùa thi Tuyển sinh lớp 6: Chiến dịch Hoa Phượng Đỏ
                                2023
                            </div>
                            <div class="date">26/06/2023</div>
                            <div class="description-two">
                                Dưới những cơn mưa hè của tháng 6, không khí kỳ thi Tuyển
                                sinh vào lớp 6 trường THPT chuyên Hà Nội - Amsterdam lại trở
                                nên nóng hơn bao giờ hết. Ngày 23/6, hai điểm thi đã ...
                            </div>
                            <div class="continue">
                                <a href="#"> Xem thêm </a>
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-card col-lg-4 col-md-12 px-3">
                    <div class="bg-white">
                        <img class="avt" src="<?php echo get_template_directory_uri(); ?>/assets/images/demo/imgs/avt-1.png" />
                        <div class="content px-3">
                            <div class="new">Tin tức</div>
                            <div class="description">
                                Tiếp sức mùa thi Tuyển sinh lớp 6: Chiến dịch Hoa Phượng Đỏ
                                2023
                            </div>
                            <div class="date">26/06/2023</div>
                            <div class="description-two">
                                Dưới những cơn mưa hè của tháng 6, không khí kỳ thi Tuyển
                                sinh vào lớp 6 trường THPT chuyên Hà Nội - Amsterdam lại trở
                                nên nóng hơn bao giờ hết. Ngày 23/6, hai điểm thi đã ...
                            </div>
                            <div class="continue">
                                <a href="#"> Xem thêm </a>
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space_white"></div>
        </div>
    </div>
</div>
<!-- block hđ ngoai khóa -->

<!-- css cho cái Chấm ở bên dưới nhé -->



<div class="container-student">
    <div class="student">
        <div class="header-container">
            <div class="title-student">CỰU HỌC SINH</div>
            <button class="btn hs">Xem tất cả</button>
        </div>
        <div class="slide-slick">
            <!-- slide 1 -->
            <div class="thong-tin" style="display: flex">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/demo/imgs/hs.png" />
                <div>
                    <div class="quang-ba">
                        10X là đại sứ học thuật trường Ams trúng tuyển đại học top 1
                        Canada
                    </div>
                    <div class="date-time">26/06/2023</div>
                    <div class="description-student">
                        Trúng tuyển 12 trường ở Mỹ, Nguyễn Thảo Anh chọn trường duy nhất
                        không cấp học bổng nhưng giúp em thỏa đam mê nghệ thuật. Thảo
                        Anh, cựu học sinh lớp 12 Anh 1, trường THPT chuyên Hà Nội -
                        Amsterdam, hoàn thành nộp hồ sơ ứng t uyển đại học vào đầu tháng
                        5. Nữ sinh trúng tuyển 17 trường, cả ở Anh, Mỹ và Nhật Bản.
                    </div>
                    <div class="continue-student">
                        <a href="javascript:void(0)" class="xem-them">XEM THÊM <i class="fa-solid fa-arrow-right next"></i></a>
                    </div>
                </div>
            </div>
            <!-- slide 2 -->
            <div class="thong-tin" style="display: flex">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/demo/imgs/hs.png" />
                <div>
                    <div class="quang-ba">
                        10X là đại sứ học thuật trường Ams trúng tuyển đại học top 1
                        Canada
                    </div>
                    <div class="date-time">26/06/2023</div>
                    <div class="description-student">
                        Trúng tuyển 12 trường ở Mỹ, Nguyễn Thảo Anh chọn trường duy nhất
                        không cấp học bổng nhưng giúp em thỏa đam mê nghệ thuật. Thảo
                        Anh, cựu học sinh lớp 12 Anh 1, trường THPT chuyên Hà Nội -
                        Amsterdam, hoàn thành nộp hồ sơ ứng t uyển đại học vào đầu tháng
                        5. Nữ sinh trúng tuyển 17 trường, cả ở Anh, Mỹ và Nhật Bản.
                    </div>
                    <div class="continue-student">
                        <a href="javascript:void(0)" class="xem-them">XEM THÊM <i class="fa-solid fa-arrow-right next"></i></a>
                    </div>
                </div>
            </div>
            <!-- slide 3 -->
            <div class="thong-tin" style="display: flex">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/demo/imgs/hs.png" />
                <div>
                    <div class="quang-ba">
                        10X là đại sứ học thuật trường Ams trúng tuyển đại học top 1
                        Canada
                    </div>
                    <div class="date-time">26/06/2023</div>
                    <div class="description-student">
                        Trúng tuyển 12 trường ở Mỹ, Nguyễn Thảo Anh chọn trường duy nhất
                        không cấp học bổng nhưng giúp em thỏa đam mê nghệ thuật. Thảo
                        Anh, cựu học sinh lớp 12 Anh 1, trường THPT chuyên Hà Nội -
                        Amsterdam, hoàn thành nộp hồ sơ ứng t uyển đại học vào đầu tháng
                        5. Nữ sinh trúng tuyển 17 trường, cả ở Anh, Mỹ và Nhật Bản.
                    </div>
                    <div class="continue-student">
                        <a href="javascript:void(0)" class="xem-them">XEM THÊM <i class="fa-solid fa-arrow-right next"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- đây là cái nút chuyển trang này -->

<div class="custom-arrows">
    <div class="custom-prev"><i class="fa-solid fa-chevron-left"></i></div>
    <div class="custom-next">
        <i class="fa-solid fa-chevron-left fa-rotate-180"></i>
    </div>
</div>

<div class="block3">
    <div class="block2 khac-mau">
        <div class="header-block2">
            <div class="title">
                <div>HỌC BỔNG</div>
            </div>
            <button class="btn">Xem tất cả</button>
        </div>
        <div class="wrapper-card">
            <div class="row mx-0">
                <div class="item-card col-lg-4 col-md-12 px-3">
                    <div class="bg-white">
                        <img class="avt" src="<?php echo get_template_directory_uri(); ?>/assets/images/demo/imgs/avt-1.png" />
                        <div class="content px-3">
                            <div class="new">Tin tức</div>
                            <div class="description">
                                Tiếp sức mùa thi Tuyển sinh lớp 6: Chiến dịch Hoa Phượng Đỏ
                                2023
                            </div>
                            <div class="date">26/06/2023</div>
                            <div class="description-two">
                                Dưới những cơn mưa hè của tháng 6, không khí kỳ thi Tuyển
                                sinh vào lớp 6 trường THPT chuyên Hà Nội - Amsterdam lại trở
                                nên nóng hơn bao giờ hết. Ngày 23/6, hai điểm thi đã ...
                            </div>
                            <div class="continue">
                                <a href="#"> Xem thêm </a>
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-card col-lg-4 col-md-12 px-3">
                    <div class="bg-white">
                        <img class="avt" src="<?php echo get_template_directory_uri(); ?>/assets/images/demo/imgs/avt-1.png" />
                        <div class="content px-3">
                            <div class="new">Tin tức</div>
                            <div class="description">
                                Tiếp sức mùa thi Tuyển sinh lớp 6: Chiến dịch Hoa Phượng Đỏ
                                2023
                            </div>
                            <div class="date">26/06/2023</div>
                            <div class="description-two">
                                Dưới những cơn mưa hè của tháng 6, không khí kỳ thi Tuyển
                                sinh vào lớp 6 trường THPT chuyên Hà Nội - Amsterdam lại trở
                                nên nóng hơn bao giờ hết. Ngày 23/6, hai điểm thi đã ...
                            </div>
                            <div class="continue">
                                <a href="#"> Xem thêm </a>
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-card col-lg-4 col-md-12 px-3">
                    <div class="bg-white">
                        <img class="avt" src="<?php echo get_template_directory_uri(); ?>/assets/images/demo/imgs/avt-1.png" />
                        <div class="content px-3">
                            <div class="new">Tin tức</div>
                            <div class="description">
                                Tiếp sức mùa thi Tuyển sinh lớp 6: Chiến dịch Hoa Phượng Đỏ
                                2023
                            </div>
                            <div class="date">26/06/2023</div>
                            <div class="description-two">
                                Dưới những cơn mưa hè của tháng 6, không khí kỳ thi Tuyển
                                sinh vào lớp 6 trường THPT chuyên Hà Nội - Amsterdam lại trở
                                nên nóng hơn bao giờ hết. Ngày 23/6, hai điểm thi đã ...
                            </div>
                            <div class="continue">
                                <a href="#"> Xem thêm </a>
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space_white"></div>
        </div>
    </div>
</div>
<!-- block3 -->

<div class="block2 first">
    <div class="header-block2">
        <div class="title">
            <div>DU HỌC</div>
        </div>
        <button class="btn">Xem tất cả</button>
    </div>
    <div class="wrapper-card">
        <div class="row mx-0">
            <div class="item-card col-lg-4 col-md-12 px-3">
                <div class="bg-white">
                    <img class="avt" src="<?php echo get_template_directory_uri(); ?>/assets/images/demo/imgs/avt-1.png" />
                    <div class="content px-3">
                        <div class="new">Tin tức</div>
                        <div class="description">
                            Tiếp sức mùa thi Tuyển sinh lớp 6: Chiến dịch Hoa Phượng Đỏ
                            2023
                        </div>
                        <div class="date">26/06/2023</div>
                        <div class="description-two">
                            Dưới những cơn mưa hè của tháng 6, không khí kỳ thi Tuyển
                            sinh vào lớp 6 trường THPT chuyên Hà Nội - Amsterdam lại trở
                            nên nóng hơn bao giờ hết. Ngày 23/6, hai điểm thi đã ...
                        </div>
                        <div class="continue">
                            <a href="#"> Xem thêm </a>
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item-card col-lg-4 col-md-12 px-3">
                <div class="bg-white">
                    <img class="avt" src="<?php echo get_template_directory_uri(); ?>/assets/images/demo/imgs/avt-1.png" />
                    <div class="content px-3">
                        <div class="new">Tin tức</div>
                        <div class="description">
                            Tiếp sức mùa thi Tuyển sinh lớp 6: Chiến dịch Hoa Phượng Đỏ
                            2023
                        </div>
                        <div class="date">26/06/2023</div>
                        <div class="description-two">
                            Dưới những cơn mưa hè của tháng 6, không khí kỳ thi Tuyển
                            sinh vào lớp 6 trường THPT chuyên Hà Nội - Amsterdam lại trở
                            nên nóng hơn bao giờ hết. Ngày 23/6, hai điểm thi đã ...
                        </div>
                        <div class="continue">
                            <a href="#"> Xem thêm </a>
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item-card col-lg-4 col-md-12 px-3">
                <div class="bg-white">
                    <img class="avt" src="<?php echo get_template_directory_uri(); ?>/assets/images/demo/imgs/avt-1.png" />
                    <div class="content px-3">
                        <div class="new">Tin tức</div>
                        <div class="description">
                            Tiếp sức mùa thi Tuyển sinh lớp 6: Chiến dịch Hoa Phượng Đỏ
                            2023
                        </div>
                        <div class="date">26/06/2023</div>
                        <div class="description-two">
                            Dưới những cơn mưa hè của tháng 6, không khí kỳ thi Tuyển
                            sinh vào lớp 6 trường THPT chuyên Hà Nội - Amsterdam lại trở
                            nên nóng hơn bao giờ hết. Ngày 23/6, hai điểm thi đã ...
                        </div>
                        <div class="continue">
                            <a href="#"> Xem thêm </a>
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="space_white"></div>
    </div>
</div>
<div class="block3">
    <div class="block2 khac-mau">
        <div class="header-block2">
            <div class="title">
                <div>BÁO CHÍ VỀ TRƯỜNG</div>
            </div>
            <button class="btn">Xem tất cả</button>
        </div>
        <div class="wrapper-card">
            <div class="row mx-0">
                <div class="item-card col-lg-4 col-md-12 px-3">
                    <div class="bg-white">
                        <img class="avt" src="<?php echo get_template_directory_uri(); ?>/assets/images/demo/imgs/avt-1.png" />
                        <div class="content px-3">
                            <div class="new">Tin tức</div>
                            <div class="description">
                                Tiếp sức mùa thi Tuyển sinh lớp 6: Chiến dịch Hoa Phượng Đỏ
                                2023
                            </div>
                            <div class="date">26/06/2023</div>
                            <div class="description-two">
                                Dưới những cơn mưa hè của tháng 6, không khí kỳ thi Tuyển
                                sinh vào lớp 6 trường THPT chuyên Hà Nội - Amsterdam lại trở
                                nên nóng hơn bao giờ hết. Ngày 23/6, hai điểm thi đã ...
                            </div>
                            <div class="continue">
                                <a href="#"> Xem thêm </a>
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-card col-lg-4 col-md-12 px-3">
                    <div class="bg-white">
                        <img class="avt" src="<?php echo get_template_directory_uri(); ?>/assets/images/demo/imgs/avt-1.png" />
                        <div class="content px-3">
                            <div class="new">Tin tức</div>
                            <div class="description">
                                Tiếp sức mùa thi Tuyển sinh lớp 6: Chiến dịch Hoa Phượng Đỏ
                                2023
                            </div>
                            <div class="date">26/06/2023</div>
                            <div class="description-two">
                                Dưới những cơn mưa hè của tháng 6, không khí kỳ thi Tuyển
                                sinh vào lớp 6 trường THPT chuyên Hà Nội - Amsterdam lại trở
                                nên nóng hơn bao giờ hết. Ngày 23/6, hai điểm thi đã ...
                            </div>
                            <div class="continue">
                                <a href="#"> Xem thêm </a>
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-card col-lg-4 col-md-12 px-3">
                    <div class="bg-white">
                        <img class="avt" src="<?php echo get_template_directory_uri(); ?>/assets/images/demo/imgs/avt-1.png" />
                        <div class="content px-3">
                            <div class="new">Tin tức</div>
                            <div class="description">
                                Tiếp sức mùa thi Tuyển sinh lớp 6: Chiến dịch Hoa Phượng Đỏ
                                2023
                            </div>
                            <div class="date">26/06/2023</div>
                            <div class="description-two">
                                Dưới những cơn mưa hè của tháng 6, không khí kỳ thi Tuyển
                                sinh vào lớp 6 trường THPT chuyên Hà Nội - Amsterdam lại trở
                                nên nóng hơn bao giờ hết. Ngày 23/6, hai điểm thi đã ...
                            </div>
                            <div class="continue">
                                <a href="#"> Xem thêm </a>
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space_white"></div>
        </div>
    </div>
</div>
<!-- block3 -->

<div class="block2 first">
    <div class="header-block2">
        <div class="title">
            <div>TUYỂN SINH</div>
        </div>
        <button class="btn">Xem tất cả</button>
    </div>
    <div class="wrapper-card">
        <div class="row mx-0">
            <div class="item-card col-lg-4 col-md-12 px-3">
                <div class="bg-white">
                    <img class="avt" src="<?php echo get_template_directory_uri(); ?>/assets/images/demo/imgs/avt-1.png" />
                    <div class="content px-3">
                        <div class="new">Tin tức</div>
                        <div class="description">
                            Tiếp sức mùa thi Tuyển sinh lớp 6: Chiến dịch Hoa Phượng Đỏ
                            2023
                        </div>
                        <div class="date">26/06/2023</div>
                        <div class="description-two">
                            Dưới những cơn mưa hè của tháng 6, không khí kỳ thi Tuyển
                            sinh vào lớp 6 trường THPT chuyên Hà Nội - Amsterdam lại trở
                            nên nóng hơn bao giờ hết. Ngày 23/6, hai điểm thi đã ...
                        </div>
                        <div class="continue">
                            <a href="#"> Xem thêm </a>
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item-card col-lg-4 col-md-12 px-3">
                <div class="bg-white">
                    <img class="avt" src="<?php echo get_template_directory_uri(); ?>/assets/images/demo/imgs/avt-1.png" />
                    <div class="content px-3">
                        <div class="new">Tin tức</div>
                        <div class="description">
                            Tiếp sức mùa thi Tuyển sinh lớp 6: Chiến dịch Hoa Phượng Đỏ
                            2023
                        </div>
                        <div class="date">26/06/2023</div>
                        <div class="description-two">
                            Dưới những cơn mưa hè của tháng 6, không khí kỳ thi Tuyển
                            sinh vào lớp 6 trường THPT chuyên Hà Nội - Amsterdam lại trở
                            nên nóng hơn bao giờ hết. Ngày 23/6, hai điểm thi đã ...
                        </div>
                        <div class="continue">
                            <a href="#"> Xem thêm </a>
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item-card col-lg-4 col-md-12 px-3">
                <div class="bg-white">
                    <img class="avt" src="<?php echo get_template_directory_uri(); ?>/assets/images/demo/imgs/avt-1.png" />
                    <div class="content px-3">
                        <div class="new">Tin tức</div>
                        <div class="description">
                            Tiếp sức mùa thi Tuyển sinh lớp 6: Chiến dịch Hoa Phượng Đỏ
                            2023
                        </div>
                        <div class="date">26/06/2023</div>
                        <div class="description-two">
                            Dưới những cơn mưa hè của tháng 6, không khí kỳ thi Tuyển
                            sinh vào lớp 6 trường THPT chuyên Hà Nội - Amsterdam lại trở
                            nên nóng hơn bao giờ hết. Ngày 23/6, hai điểm thi đã ...
                        </div>
                        <div class="continue">
                            <a href="#"> Xem thêm </a>
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="space_white"></div>
    </div>
</div>

<!-- block4 -->
<?php get_footer() ?>