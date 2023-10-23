<?php
/* Template Name: new index */
?>

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
                            $first_image_url = get_the_post_thumbnail();
                            var_dump($first_image_url);
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
                                    <a href="<?php the_permalink(); ?>">Xem thêm </a>
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


<section class="section block-vincers block2" >
			<div class="block-heading border-light">
				<div class="row">
					<div class="col-lg-7">
						<h2 class="the-title text-white border-light wow fadeInLeft">GẶP GỠ VINSERS</h2>
					</div>
					<div class="col-lg-5 text-right"><a class="btn btn-primary text-white wow fadeInRight"
							href="https://vinschool.edu.vn/vinser/">XEM TẤT CẢ</a></div>
				</div>
			</div>
			<div class="vincers-slider carousel"
				data-slick='{"arrows":true,"dots":true,"slidesToShow":1,"slidesToScroll":1,"infinite":false,"responsive":[{"breakpoint":480,"settings":{"arrows":false}}]}'>
				
                <div class="slider-item">
					<div class="row">
						<div class="col-md-5"><a
								href="https://vinschool.edu.vn/vinser/bui-hong-hanh-vinser-doat-hang-loat-hoc-bong-danh-gia-tu-9-truong-dai-hoc-hang-dau-ve-nghe-thuat-cua-hoa-ky/"><img
									width="1363" height="2048" class="img-fluid"
									src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%201363%202048'%3E%3C/svg%3E"
									data-lazy-src="https://vinschool.edu.vn/wp-content/uploads/2023/06/23/VIN_8876-scaled.jpeg"><noscript><img
										width="1363" height="2048" class="img-fluid"
										src="https://vinschool.edu.vn/wp-content/uploads/2023/06/23/VIN_8876-scaled.jpeg"></noscript></a>
						</div>
						<div class="col-md-6 col-xl-7 vincer-summary wow fadeInDown">
							<div class="the-title hero-title text-white h2">Bùi Hồng Hạnh &#8211; Vinser đoạt hàng loạt
								học bổng danh giá từ 9 trường Đại học hàng đầu về Nghệ thuật của Hoa Kỳ</div>
							<div class="summary-block">Bùi Hồng Hạnh - Vinser lớp 12A4 Vinschool Times City đã chinh
								phục thành công 9 học bổng từ các trường Đại học về nghệ thuật và thiết kế hàng đầu tại
								Hoa Kỳ, trong đó nổi bật là học bổng dành cho sinh viên ngành Animation (Hoạt hình) trị
								giá 80.000 USD (hơn 2 tỷ VND) từ Savannah College of Art and Design (SCAD) - ngôi trường
								Đại học tốt nhất Hoa Kỳ về Nghệ thuật theo Art & Object 2023.</div>
							<ul class="border-list">
								<li>Đoạt 9 học bổng tại các trường Đại học danh giá về Nghệ thuật và Thiết kế tại Hoa Kỳ
								</li>
								<li>IELTS 8.0, SAT 1460, 5/5 AP 2-D Art & Design</li>
							</ul>
							<p><a class="read-more text-white"
									href="https://vinschool.edu.vn/vinser/bui-hong-hanh-vinser-doat-hang-loat-hoc-bong-danh-gia-tu-9-truong-dai-hoc-hang-dau-ve-nghe-thuat-cua-hoa-ky/">XEM
									TIẾP &gt;</a></p>
						</div>
					</div>
				</div>

				<div class="slider-item">
					<div class="row">
						<div class="col-md-5"><a
								href="https://vinschool.edu.vn/vinser/gap-go-vinser-ha-phuong-anh/"><img width="1170"
									height="1748" class="img-fluid"
									src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%201170%201748'%3E%3C/svg%3E"
									data-lazy-src="https://vinschool.edu.vn/wp-content/uploads/2023/05/18/IMG_7381.jpg"><noscript><img
										width="1170" height="1748" class="img-fluid"
										src="https://vinschool.edu.vn/wp-content/uploads/2023/05/18/IMG_7381.jpg"></noscript></a>
						</div>
						<div class="col-md-6 col-xl-7 vincer-summary wow fadeInDown">
							<div class="the-title hero-title text-white h2">Hà Phương Anh &#8211; Vinser đa tài làm thủ
								lĩnh Hội Sinh viên Việt Nam tại Vương quốc Anh</div>
							<div class="summary-block">Mặc dù mới 21 tuổi, Hà Phương Anh - cựu Vinser tại Vinschool
								Times City - đã trở thành nữ chủ tịch SVUK - Hội sinh viên Việt Nam tại Vương quốc Anh &
								Bắc Ai-Len: tổ chức chính thức đại diện cho hơn 14.000 học sinh, sinh viên Việt Nam đang
								học tập và sinh sống tại Vương quốc Anh. </div>
							<ul class="border-list">
								<li>Đại diện cho Hội Sinh viên Việt Nam tại Vương quốc Anh phát biểu trước Đoàn Chủ tịch
									nước Võ Văn Thưởng trong chuyến công tác tại London</li>
								<li>Là một sinh viên nổi bật tại Trường SOAS thuộc University of London - xếp thứ hai
									toàn thế giới về ngành Nghiên cứu phát triển năm 2022</li>
							</ul>
							<p><a class="read-more text-white"
									href="https://vinschool.edu.vn/vinser/gap-go-vinser-ha-phuong-anh/">XEM TIẾP
									&gt;</a></p>
						</div>
					</div>
				</div>

				

			</div>
		</section>

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

<?php get_footer() ?>