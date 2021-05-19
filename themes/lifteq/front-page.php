<?php 
get_header();
?>



<?php
  $showhide_cats = get_field('showhide_cats', HOMEID);
  $termObj = get_field('categories', HOMEID);
  if( $showhide_cats ):
    if($termObj):
?>

<section class="product-category">
  <div class="container">
    <div class="row">
      <?php 
          if( isset($termObj) && ! empty( $termObj ) && ! is_wp_error( $termObj ) ){
            $terms = $termObj;
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
                $i = 1;
                foreach ( $terms as $term ): 
                  $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true ); 
              ?>
              <?php 
                if( $i == 4):
                    $grid_text_col = get_field('grid_text', HOMEID);
                      if($grid_text_col):
              ?>
              <li class="fl-product-grd-2">
              <div class="fl-product-grd mHc">
                <div class="fl-product-grd-inr">
                  <?php if( !empty($grid_text_col['title']) ) printf('<h2 class="fl-h2 fl-pro-grd-title">%s</h2>', $grid_text_col['title']); ?>
                  <!-- <h2 class="fl-h2 fl-pro-grd-title">Waarom LifteQ</h2> -->
                  <div class="fl-pro-grd-des mHc2">  
                  <?php 
                    if( !empty($grid_text_col['description']) ) echo wpautop( $grid_text_col['description'] );
                  ?>                  
                    <!-- <ul class="reset-list clearfix">
                      <li>10 jaar ervaring in montage- en kanaalliften</li>
                      <li>Snelle levering (franco vanaf 150€)</li>
                      <li>Diverse maatwerk oplossing voor uw project</li>
                      <li>EU gecertificeerde machines</li>
                    </ul> -->
                  </div>                                        
                </div>
              </div>
            </li>
            <?php endif; endif; ?>

            <li>
              <div class="fl-product-grd mHc">
                <div class="fl-product-grd-inr">
                  <div class="fl-pro-grd-img-cntlr mHc1">
                    <a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="overlay-link"></a>
                    <?php echo cbv_get_image_tag(  $thumbnail_id ); ?>
                  </div>
                  <div class="fl-pro-grd-des mHc2">                    
                    <div class="fl-pro-grd-heading">
                      <h2 class="fl-h2 fl-pro-grd-title">
                        <a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo $term->name; ?></a>
                      </h2>
                      <p>Til tot maar liefst 180kg.</p>
                    </div>                    
                  </div>                    
                </div>
              </div>
            </li>
            <?php  $i++; endforeach;  ?>
          
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