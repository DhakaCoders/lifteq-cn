<?php 
	if(is_product_category()){
	  $term = get_queried_object();
	  $ID = $term;
	}else{
	  $ID = get_option( 'woocommerce_shop_page_id' ); 
	}
  
  	$btmdesc = get_field('bottom_description', $ID);
  	if( $btmdesc ){
?>
<section class="page-content-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-content-cntrl pb">
          <?php if( !empty($btmdesc) ) echo wpautop( $btmdesc ); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php } ?>