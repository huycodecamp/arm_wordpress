<footer>
        <div class="footer">
            <div class="footer-small">
                <div class="row footer-dt">
                    <div class="col-6">
                        <div>
                            <strong> TRƯỜNG THPT CHUYÊN HÀ NỘI - ARMSTERDAM</strong>
                        </div>
                        <div class="address">
                            <i class="fa-solid fa-location-dot"></i> Hoàng Minh Giám, Cầu
                            Giấy, Hà Nội
                        </div>
                        <div class="address">
                            <i class="fa-solid fa-envelope"></i> c23hanoi-ams@hanoiedu.vn
                        </div>
                    </div>
                    <div class="col-6 footer-img">
                        <div class="support">Hỗ trợ &amp; phát triển bởi</div>
                        <div class="image-logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/pages/imageshome/demo/imgs/aptech1.png" alt="" />
                            <img src="<?php echo get_template_directory_uri(); ?>/pages/imageshome/demo/imgs/tinhvan_1.png" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- hs ưu tú -->
    <script data-cfasync="false" src="https://preview.colorlib.com/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/pages/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/pages/styles/bootstrap4/popper.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/pages/styles/bootstrap4/bootstrap.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/pages/plugins/greensock/TweenMax.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/pages/plugins/greensock/TimelineMax.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/pages/plugins/scrollmagic/ScrollMagic.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/pages/plugins/greensock/animation.gsap.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/pages/plugins/greensock/ScrollToPlugin.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/pages/plugins/scrollTo/jquery.scrollTo.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/pages/plugins/easing/easing.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/pages/js/news_custom.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/homepage.js"></script>

    <!-- Đây là phần chuyển trang của cái mình bảo bạn nhé -->

    <script type="text/javascript">
        $(document).ready(function() {
            $(".slide-slick").slick({
                dots: true,
                speed: 300,
                slidesToShow: 1,
                prevArrow: $(".custom-prev"), //cái này là class của thằng lùi nhé
                nextArrow: $(".custom-next"), //cái này là class của thằng tiền nhé
                // nói chung hai thằng prevArrow và nextArrow ở trên nó sẽ lấy cái nội dung bên trong của cái class đó. Bạn cho nó thành hình gì nó sẽ thành hình đó nhé. <3333
            });
        });
    </script>
</body>

</html>