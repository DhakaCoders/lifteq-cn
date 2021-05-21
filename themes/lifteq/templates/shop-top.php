<section class="page-content-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-content-cntrl">
        <?php 
          if(is_shop()):
            $thisID = woocommerce_get_page_id('shop');
            $titel = get_field('titel', $thisID);
            $topdesc = get_field('top_description', $thisID); 
            if( !empty($titel) ){
              printf('<h2 class="fl-h1">%s</h2>', $titel);
            }else{
              printf('<h2 class="fl-h1">%s</h2>', get_the_title($thisID));
            }
            if( !empty($topdesc) ) echo wpautop( $topdesc );
          ?>
          <?php 
          elseif(is_product_category()): 
            $term = get_queried_object();
            $topdesc = get_field('top_description', $term);
            if( !empty($term->name) ) printf('<h2 class="fl-h1">%s</h2>', $term->name);
            if( !empty($topdesc) ) echo wpautop( $topdesc );
          endif;
        ?>
        </div>
      </div>
    </div>
  </div>
</section>