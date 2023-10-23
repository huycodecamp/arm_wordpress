<?php
/* Template Name: aboutus */
?>
<!DOCTYPE html>
<html lang="en">

<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/pages/styles/default.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/pages/styles/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="./assets/css/custom-font.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php get_template_part('/pages/csshome'); ?>
</head>

<body>
    <?php get_template_part('/pages/header'); ?>
    <div class="about-main-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <div class="about-img">
                        <img class="img" src="../assets/images/demo/imgs/hs.png" />
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="about-content">
                        <h3>Why We are?</h3>
                        <p>Mellentesque faucibus dapibus dapibus. Morbi aliquam aliquet neque. Donec placerat dapibus sollicitudin. Morbi arcu nisi, mattis ullamcorper in, dapibus ac nunc. Cras bibendum mauris et sapien nibh feugiat. scelerisque accumsan nibh gravida. Quisque aliquet justo elementum lectus ultrices bibendum.</p> <br>
                        <p>dapibus ac nunc. Cras bibendum mauris et sapien feugiat. scelerisque accumsan nibh gravida. Quisque aliquet justo elementum lectus ultrices bibendum.</p>
                        <ul class="mt-20 about-content-list">
                            <li><a href="#">Amazing wordpress theme</a></li>
                            <li><a href="#">HTML &amp; CSS3 build with bootstrap</a></li>
                            <li><a href="#">Powerfull admin panel</a></li>
                            <li><a href="#">Icon well organized &amp; SEO optimized friendy</a></li>
                            <li><a href="#">Iconncredible design</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="about-bottom pt-50 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="ht-single-about pb-sm-40">
                        <h3>OUR EXPERIENCES</h3>
                        <h5>fusce fringilla porttitor iaculi sed quam libero, adipiscing sed erat id praesent eu nis.</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu nisi ac mi malesuada vestibulum. Phasellus tempor nunc eleifend cursus molestie. Mauris lectus arcu, pellentesque at sodales sit amet, Phasellus tempor nunc eleifend cursus molestie. Mauris lectus arcu, pellentesque at sodales sit amet,</p>
                        <p>Donec ornare mattis suscipit. Praesent fermentum accumsan vulputate. Sed velit nulla, sagittis non erat id, dictum vestibulum ligula. Maecenas sed enim sem.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="ht-single-about">
                        <h3>OUR WORKS</h3>
                        <div class="ht-about-work">
                            <span>1</span>
                            <div class="ht-work-text">
                                <h5><a href="#">LOREM IPSUM DOLOR SIT AMET</a></h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu nisi ac mi</p>
                            </div>
                        </div>
                        <div class="ht-about-work">
                            <span>2</span>
                            <div class="ht-work-text">
                                <h5><a href="#">DONEC FERMENTUM EROS</a></h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu nisi ac mi</p>
                            </div>
                        </div>
                        <div class="ht-about-work">
                            <span>3</span>
                            <div class="ht-work-text">
                                <h5><a href="#">LOREM IPSUM DOLOR SIT AMET</a></h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu nisi ac mi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php get_template_part('/pages/footer'); ?>
</body>

</html>
<style>
    .about-main-area{
        display: flex;
        margin: 0 auto;
        justify-content: center;
        padding-top: 20px;
    }
    .about-bottom{
        display: flex;
        margin: 0 auto;
        justify-content: center;
    }
</style>