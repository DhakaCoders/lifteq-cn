<?php 
get_header();
?>



<?php
  $showhide_cats = get_field('showhide_cats', HOMEID);
  $cats = get_field('categories', HOMEID);
  if( $showhide_cats ):
    if($cats):
?>

<section class="product-category">
  <div class="container">
    <div class="row">
      <?php 
          $termIDS = $cats['categories'];
          if( isset($termIDS) && ! empty( $termIDS ) && ! is_wp_error( $termIDS ) ){
            $terms = get_terms( array(
            'taxonomy' => 'product_cat',
            'hide_empty' => false,
            'include' => $termIDS
            ) );
          }else{
            $terms = get_terms( array(
            'taxonomy' => 'product_cat',
            'hide_empty' => false,
            'parent' => 0,
            'orderby' => 'term_id',
            'order' => 'ASC', // or ASC
            ) );
          }
        ?>
      <?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){ ?>
      <div class="col-md-12">
        <div class="fl-products-cntlr">
          <ul class="reset-list clearfix products">
            <?php 
                $catimg_src = '';
                foreach ( $terms as $term ) { 
                $img_id = get_field('image', $term, false); 
                if( !empty($img_id) ) $catimg_src = cbv_get_image_src( $img_id, 'full' );
              ?>
            <li>
              <div class="fl-product-grd mHc">
                <div class="fl-product-grd-inr">
                  <div class="fl-pro-grd-img-cntlr mHc1">
                    <a href="#" class="overlay-link"></a>
                    <?php echo cbv_get_image_tag(  $catimg_src ); ?>
                    <!-- <img src="<?php echo THEME_URI; ?>/assets/images/pro-img-1.jpg"> -->
                  </div>
                  <div class="fl-pro-grd-des mHc2">                    
                    <div class="fl-pro-grd-heading">
                      <!-- <?php printf('<strong>%s</strong>', $term->name); ?> -->
                      <h2 class="fl-h2 fl-pro-grd-title">
                        <a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo $term->name; ?></a>
                      </h2>
                      <p>Til tot maar liefst 180kg.</p>
                    </div>                    
                  </div>                    
                </div>
              </div>
            </li>
            <?php } ?>
          
          </ul>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>
  <?php endif; ?>
<?php endif; ?>

<section class="page-content-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-content-cntrl">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </div>
</section>


<?php 
get_footer();
?>