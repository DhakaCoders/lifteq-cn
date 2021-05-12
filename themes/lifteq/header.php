<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <!--   <?php $favicon = get_theme_mod('favicon'); if(!empty($favicon)) { ?> 
  <link rel="shortcut icon" href="<?php echo $favicon; ?>" />
  <?php } ?> -->

  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
  <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome/font-awesome.css">
  
  <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
  <link rel="stylesheet" type="text/css" href="assets/fancybox3/dist/jquery.fancybox.min.css">
  <link rel="stylesheet" type="text/css" href="assets/slick.slider/slick-theme.css">
  <link rel="stylesheet" type="text/css" href="assets/slick.slider/slick.css">
  <link rel="stylesheet" type="text/css" href="assets/swiper/swiper-bundle.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:ital,wght@0,300;0,700;1,300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/fonts/custom-fonts.css">

  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->	

</head>
<body>
<div class="bdoverlay"></div>
<!-- fixed -->

<div class="fixed-contact hide-md">
  <div class="fixed-contact-inr">
    <ul class="reset-list">
      <li>
        <a href="#"><img src="<?php echo THEME_URI; ?>/assets/images/xs-mail.png"></a>
      </li>
      <li>
        <a href="#"><img src="<?php echo THEME_URI; ?>/assets/images/xs-tel.png"></a>
      </li>
    </ul>
  </div>
</div>

<header class="header">
  <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="header-inr clearfix">
            <div class="hdr-lft">
              <div class="logo">
                <a href="#"><img src="<?php echo THEME_URI; ?>/assets/images/logo.png"></a>
                <span>Your partner in heavy lifting!</span>
              </div>
              <div class="xs-contact show-md">
                <ul class="reset-list">
                  <li>
                    <a href="#"><img src="<?php echo THEME_URI; ?>/assets/images/xs-tel.png"></a>
                  </li>
                  <li>
                    <a href="#"><img src="<?php echo THEME_URI; ?>/assets/images/xs-mail.png"></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="hdr-rgt">
              <div class="hdr-rgt-inr">
                <nav class="main-nav">
                  <ul class="clearfix reset-list">
                    <li class="current-menu-item"><a href="#">home</a></li>
                    <li><a href="#">producten</a></li>
                    <li class="menu-item-has-children">
                      <a href="#">aanbiedingen</a>
                      <ul class="sub-menu">
                        <li><a href="#">menu item 1</a></li>
                        <li><a href="#">menu item 2</a></li>
                        <li><a href="#">menu item 3</a></li>
                      </ul>
                    </li>
                    <li><a href="#">over ons</a></li>
                    <li><a href="#">verzending</a></li>
                    <li class="cart">
                      <a href="#">winkelwagen</a>
                      <span>2</span>
                    </li>
                    <li><a href="#">contact</a></li>
                  </ul>
                </nav>
              </div>
            </div>
            
          </div>
        </div>
      </div>
  </div>
</header>

<div class="xs-menu-wrap">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="xs-menu show-md">
          <div class="xs-menu-inr clearfix">
            <div class="xs-btn">
              <div class="xs-btn-inr">
                <a href="#">HOME</a>
              </div>
            </div>
            <div class="xs-hambergar-ctlr show-md">
              <div class="xs-hambergar">
                <div class="hambergar-icon">
                  <span></span>
                  <span></span>
                  <span></span>
                </div>
                <strong>menu</strong>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="mobile-hdr">
  <div class="xs-menu-ctlr" style="display: none;">
    <div class="mobile-main-menu">
      <div class="close-btn">
        <div class="xs-hambergar">
          <strong>Menu sluiten</strong>          
          <div class="hambergar-icon">
            <img src="<?php echo THEME_URI; ?>/assets/images/humbarger-btn.png" alt="">
          </div>
        </div>
      </div>
      <div class="mobile-menu-ctlr">
        <div class="mobile-menu-col mobile-menu-col-01">
          <h6 class="mobile-menu-title fl-h6">Producten</h6>
          <div class="mobile-menu-col-dul">
            <ul class="reset-list clearfix">
              <li><a href="#">Montageliften</a></li>
              <li><a href="#">Kanaalliften</a></li>
              <li><a href="#">Glasliften</a></li>
              <li><a href="#">Handgereedschap</a></li>
              <li><a href="#">Onderdelen</a></li>
              <li><a href="#">Accessoires</a></li>
            </ul>
          </div>
        </div>
        <div class="mobile-menu-col mobile-menu-col-02">
          <h6 class="mobile-menu-title fl-h6">Lifteq</h6>
          <ul class="reset-list clearfix">
            <li><a href="#">Over Liftteq</a></li>
            <li><a href="#">Ondersteuning</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Sitemap</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="categories-sec hide-md">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="categories-sec-int">
          <ul class="reset-list">
            <li><a href="#">Montageliften</a></li>
            <li><a href="#">Kanaalliften </a></li>
            <li><a href="#">Glasliften</a></li>
            <li><a href="#">handtools</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="breadcrumb-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumb-cntlr">
          <ul class="reset-list clearfix">
            <li>
              <a href="#" class="fl-home-icon">
                <span class="item">Home</span>
              </a>
            </li>
            <li class="active">
              <span>contact</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>