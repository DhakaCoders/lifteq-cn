<?php 
  $logoObj = get_field('ftlogo', 'options');
  if( is_array($logoObj) ){
    $logo_tag = '<img src="'.$logoObj['url'].'" alt="'.$logoObj['alt'].'" title="'.$logoObj['title'].'">';
  }else{
    $logo_tag = '';
  }
  $address = get_field('address', 'options');
  $map_url = get_field('map_url', 'options');
  $gmaplink = !empty($map_url)?$map_url: 'javascript:void()';
  $telephone = get_field('telephone', 'options');
  $email = get_field('email', 'options');
  $copyright_text = get_field('copyright_text', 'options');
?>


<footer class="footer-wrp">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="ftr-top clearfix">
          <div class="ftr-top-col ftr-top-col-01">
            <h6 class="ftr-top-col-title fl-h6"><?php _e( 'Producten', THEME_NAME ); ?></h6>
            <ul class="reset-list clearfix">
              <li><a href="#">Montageliften</a></li>
              <li><a href="#">Kanaalliften</a></li>
              <li><a href="#">Glasliften</a></li>
              <li><a href="#">Handgereedschap</a></li>
              <li><a href="#">Onderdelen</a></li>
              <li><a href="#">Accessoires</a></li>
            </ul>
          </div>
          <div class="ftr-top-col ftr-top-col-02">
            <h6 class="ftr-top-col-title fl-h6"><?php _e( 'Lifteq', THEME_NAME ); ?></h6>
            <ul class="reset-list clearfix">
              <li><a href="#">Over Lifteq</a></li>
              <li><a href="#">Downloads & Media</a></li>
              <li><a href="#">Contactgegevens</a></li>
              <li><a href="#">Sitemap</a></li>
            </ul>
          </div>
          <div class="ftr-top-col ftr-top-col-03">
            <?php if( !empty( $logo_tag ) ) :?>
            <div class="ftr-top-col-logo">
              <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php echo $logo_tag; ?>
              </a>
            </div>
            <?php endif; ?> 
            <div class="ftr-top-col-details">
              <?php if( !empty($telephone) ): ?>
              <div class="ftc-dtls-tel ftc-dtls-col">
                <strong class="ftc-dtls-col-title">telefoon algemeen</strong>
                <a href="tel:<?php echo phone_preg($telephone); ?>"><?php echo $telephone; ?></a>
              </div>
              <?php endif; ?>
              <?php if( !empty($address) ): ?>
              <div class="ftc-dtls-addr ftc-dtls-col">
                <strong class="ftc-dtls-col-title">hoofdkantoor</strong>
                <a target="_blank" href="#">Noorderdiep 364 <br>9521BM Nieuw-Buinen</a>
              </div>
              <?php endif; ?>
              <?php if( !empty($email) ): ?>
              <div class="ftc-dtls-mail ftc-dtls-col">
                <strong class="ftc-dtls-col-title">e-mail</strong>
                <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
              </div>
              <?php endif; ?>
            </div>
          </div>
        </div>

        <div class="ftr-btm">
          <div class="ftr-btm-copyright">
             <?php if( !empty($copyright_text) ) printf('<p>%s</p>', $copyright_text); ?>
          </div>
          <div class="ftr-btm-bank-icons">
            <img src="<?php echo THEME_URI; ?>/assets/images/ftr-btm-bank-logo.png" alt="">
          </div>
          <div class="ftr-btm-menu">
            <ul class="reset-list clearfix">
              <li><a href="#">Home</a></li>
              <li><a href="#">Sitemap</a></li>
              <li><a href="#">Veel gestelde vragen</a></li>
              <li><a href="#">Over ons</a></li>
              <li><a href="#">Contact</a></li>      
            </ul>
          </div>
        </div>

      </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>