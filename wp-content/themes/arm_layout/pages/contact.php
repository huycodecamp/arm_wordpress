<?php
/* Template Name: contact */
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Course - Contact</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Course Project">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/pages/styles/bootstrap4/bootstrap.min.css">
  <link href="<?php echo get_template_directory_uri(); ?>/pages/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/pages/styles/contact_styles.css">
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/pages/styles/contact_responsive.css">
  <script nonce="3ab2520f-a3cb-4cc3-b8cc-ecbb962531a3">
    (function(w, d) {
      ! function(U, V, W, X) {
        U[W] = U[W] || {};
        U[W].executed = [];
        U.zaraz = {
          deferred: [],
          listeners: []
        };
        U.zaraz.q = [];
        U.zaraz._f = function(Y) {
          return async function() {
            var Z = Array.prototype.slice.call(arguments);
            U.zaraz.q.push({
              m: Y,
              a: Z
            })
          }
        };
        for (const $ of ["track", "set", "debug"]) U.zaraz[$] = U.zaraz._f($);
        U.zaraz.init = () => {
          var ba = V.getElementsByTagName(X)[0],
            bb = V.createElement(X),
            bc = V.getElementsByTagName("title")[0];
          bc && (U[W].t = V.getElementsByTagName("title")[0].text);
          U[W].x = Math.random();
          U[W].w = U.screen.width;
          U[W].h = U.screen.height;
          U[W].j = U.innerHeight;
          U[W].e = U.innerWidth;
          U[W].l = U.location.href;
          U[W].r = V.referrer;
          U[W].k = U.screen.colorDepth;
          U[W].n = V.characterSet;
          U[W].o = (new Date).getTimezoneOffset();
          if (U.dataLayer)
            for (const bg of Object.entries(Object.entries(dataLayer).reduce(((bh, bi) => ({
                ...bh[1],
                ...bi[1]
              })), {}))) zaraz.set(bg[0], bg[1], {
              scope: "page"
            });
          U[W].q = [];
          for (; U.zaraz.q.length;) {
            const bj = U.zaraz.q.shift();
            U[W].q.push(bj)
          }
          bb.defer = !0;
          for (const bk of [localStorage, sessionStorage]) Object.keys(bk || {}).filter((bm => bm.startsWith("_zaraz_"))).forEach((bl => {
            try {
              U[W]["z_" + bl.slice(7)] = JSON.parse(bk.getItem(bl))
            } catch {
              U[W]["z_" + bl.slice(7)] = bk.getItem(bl)
            }
          }));
          bb.referrerPolicy = "origin";
          bb.src = "https://preview.colorlib.com/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(U[W])));
          ba.parentNode.insertBefore(bb, ba)
        };
        ["complete", "interactive"].includes(V.readyState) ? zaraz.init() : U.addEventListener("DOMContentLoaded", zaraz.init)
      }(w, d, "zarazData", "script");
    })(window, document);
  </script>
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/custom-font.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <?php get_template_part('/pages/csshome'); ?>
</head>

<body>
  <div class="super_container">
  <?php get_template_part('/pages/header'); ?>

    <div class="menu_container menu_mm">

      <div class="menu_close_container">
        <div class="menu_close"></div>
      </div>

      <div class="menu_inner menu_mm">
        <div class="menu menu_mm">
          <ul class="menu_list menu_mm">
            <li class="menu_item menu_mm"><a href="index-2.html">Home</a></li>
            <li class="menu_item menu_mm"><a href="#">About us</a></li>
            <li class="menu_item menu_mm"><a href="courses.html">Courses</a></li>
            <li class="menu_item menu_mm"><a href="elements.html">Elements</a></li>
            <li class="menu_item menu_mm"><a href="news.html">News</a></li>
            <li class="menu_item menu_mm"><a href="#">Contact</a></li>
          </ul>

          <div class="menu_social_container menu_mm">
            <ul class="menu_social menu_mm">
              <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-pinterest"></i></a></li>
              <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
              <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-instagram"></i></a></li>
              <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
              <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-twitter"></i></a></li>
            </ul>
          </div>
          <div class="menu_copyright menu_mm">Colorlib All rights reserved</div>
        </div>
      </div>
    </div>

    <div class="home">
      <div class="home_background_container prlx_parent">
        <div class="home_background prlx" style="background-image:url(images/contact_background.jpg)"></div>
      </div>
      <div class="home_content">
        <h1>Contact</h1>
      </div>
    </div>

    <div class="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">

            <div class="contact_form">
              <div class="contact_title">Get in touch</div>
              <div class="contact_form_container">
                <form action="https://preview.colorlib.com/theme/course/post">
                  <input id="contact_form_name" class="input_field contact_form_name" type="text" placeholder="Name" required="required" data-error="Name is required.">
                  <input id="contact_form_email" class="input_field contact_form_email" type="email" placeholder="E-mail" required="required" data-error="Valid email is required.">
                  <textarea id="contact_form_message" class="text_field contact_form_message" name="message" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
                  <button id="contact_send_btn" type="button" class="contact_send_btn trans_200" value="Submit">send message</button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="about">
              <div class="about_title">Join Courses</div>
              <p class="about_text">In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum. Etiam eu purus nec eros varius luctus. Praesent finibus risus facilisis ultricies. Etiam eu purus nec eros varius luctus.</p>
              <div class="contact_info">
                <ul>
                  <li class="contact_info_item">
                    <div class="contact_info_icon">
                      <img src="images/placeholder.svg" alt="https://www.flaticon.com/authors/lucy-g">
                    </div>
                    Blvd Libertad, 34 m05200 Arévalo
                  </li>
                  <li class="contact_info_item">
                    <div class="contact_info_icon">
                      <img src="images/smartphone.svg" alt="https://www.flaticon.com/authors/lucy-g">
                    </div>
                    0034 37483 2445 322
                  </li>
                  <li class="contact_info_item">
                    <div class="contact_info_icon">
                      <img src="images/envelope.svg" alt="https://www.flaticon.com/authors/lucy-g">
                    </div><a href="https://preview.colorlib.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="3c54595050537c5f53514c5d5245125f5351">[email&#160;protected]</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <div id="google_map">
              <div class="map_container">
                <div id="map"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php get_template_part('/pages/footer'); ?>
  </div>
  <script src="<?php echo get_template_directory_uri(); ?>/pages/js/jquery-3.2.1.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/pages/styles/bootstrap4/popper.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/pages/styles/bootstrap4/bootstrap.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/pages/plugins/greensock/TweenMax.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/pages/plugins/greensock/TimelineMax.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/pages/plugins/scrollmagic/ScrollMagic.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/pages/plugins/greensock/animation.gsap.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/pages/plugins/greensock/ScrollToPlugin.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/pages/plugins/scrollTo/jquery.scrollTo.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/pages/plugins/easing/easing.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/pages/js/contact_custom.js"></script>

  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
  </script>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v8b253dfea2ab4077af8c6f58422dfbfd1689876627854" integrity="sha512-bjgnUKX4azu3dLTVtie9u6TKqgx29RBwfj3QXYt5EKfWM/9hPSAI/4qcV5NACjwAo8UtTeWefx6Zq5PHcMm7Tg==" data-cf-beacon='{"rayId":"7fc08df8c9270978","version":"2023.8.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}' crossorigin="anonymous"></script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/course/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Aug 2023 02:56:42 GMT -->

</html>