<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php $favicon = get_theme_mod('favicon'); if(!empty($favicon)) { ?> 
  <link rel="shortcut icon" href="<?php echo $favicon; ?>" />
  <?php } ?>

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->	
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php 
  $logoObj = get_field('hdlogo', 'options');
  if( is_array($logoObj) ){
    $logo_tag = '<img src="'.$logoObj['url'].'" alt="'.$logoObj['alt'].'" title="'.$logoObj['title'].'">';
  }else{
    $logo_tag = '';
  }
  $hdlogotext = get_field('hdlogotext', 'options');
  
  $address = get_field('address', 'options');
  $map_url = get_field('map_url', 'options');
  $gmaplink = !empty($map_url)?$map_url: 'javascript:void()';
  $telephone = get_field('telephone', 'options');
  $email = get_field('email', 'options');
?>  

<div class="bdoverlay"></div>
<!-- fixed -->

<div class="fixed-contact hide-md">
  <div class="fixed-contact-inr">
    <ul class="reset-list">
      <?php if( !empty($email) ): ?>
      <li>
        <a href="mailto:<?php echo $email; ?>"><img src="<?php echo THEME_URI; ?>/assets/images/xs-mail.png"></a>
      </li>
      <?php endif; ?>
      <?php if( !empty($telephone) ): ?>
      <li>
        <a href="tel:<?php echo phone_preg($telephone); ?>"><img src="<?php echo THEME_URI; ?>/assets/images/xs-tel.png"></a>
      </li>
      <?php endif; ?>
    </ul>
  </div>
</div>

<header class="header">
  <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="header-inr clearfix">
            <div class="hdr-lft">
              <?php if( !empty($logo_tag) ): ?>
              <div class="logo">
               <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php echo $logo_tag; ?>
               </a>
               <?php if( !empty( $hdlogotext ) ) printf('<span>%s</span>', $hdlogotext); ?>
              </div>
              <?php endif; ?>
              <div class="xs-contact show-md">
                <ul class="reset-list">
                  <li class="tel">
                    <a href="#"><img src="<?php echo THEME_URI; ?>/assets/images/xs-tel.png"></a>
                  </li>
                  <li class="mail">
                    <a href="#"><img src="<?php echo THEME_URI; ?>/assets/images/xs-mail.png"></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="hdr-rgt">
              <div class="hdr-rgt-inr">
                <div class="cart-nember">
                  <?php 
                    if( WC()->cart->get_cart_contents_count() > 0 ){
                      echo sprintf ( '<span>%d</span>', WC()->cart->get_cart_contents_count() );
                    }else{
                      echo sprintf ( '<span>%d</span>', 0 );
                    }  
                  ?>
                </div>
                <nav class="main-nav">
                  <?php 
                      $mmenuOptions = array( 
                          'theme_location' => 'cbv_main_menu', 
                          'menu_class' => 'clearfix reset-list',
                          'container' => '',
                          'container_class' => ''
                        );
                      wp_nav_menu( $mmenuOptions ); 
                    ?>
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
                <a href="<?php echo esc_url(home_url('/')); ?>">HOME</a>
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
          <h6 class="mobile-menu-title fl-h6"><?php _e( 'Producten', THEME_NAME ); ?></h6>
          <div class="mobile-menu-col-dul">
            <?php 
              wp_nav_menu( array(
              'menu_class'     => 'clearfix reset-list',
              'theme_location' => 'cbv_fta_menu',
              'container' => false,
              ) );
            ?>
          </div>
        </div>
        <div class="mobile-menu-col mobile-menu-col-02">
          <h6 class="mobile-menu-title fl-h6"><?php _e( 'Lifteq', THEME_NAME ); ?></h6>
          <?php 
              wp_nav_menu( array(
              'menu_class'     => 'clearfix reset-list',
              'theme_location' => 'cbv_ftb_menu',
              'container' => false,
              ) );
            ?>
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
          <?php 
            wp_nav_menu( array(
            'menu_class'     => 'clearfix reset-list',
            'theme_location' => 'cbv_cat_menu',
            'container' => false,
            ) );
          ?>
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
            <?php cbv_breadcrumbs(); ?>
        </div>
      </div>
    </div>
  </div>
</section>