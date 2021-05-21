<?php
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);

add_action('woocommerce_before_main_content', 'get_custom_wc_output_content_wrapper', 11);
add_action('woocommerce_after_main_content', 'get_custom_wc_output_content_wrapper_end', 9);
add_filter( 'woocommerce_show_page_title', '__return_false' );
function get_custom_wc_output_content_wrapper(){

    if(is_shop() OR is_product_category()){ 
        get_template_part('templates/breadcrumbs');
        get_template_part('templates/shop', 'top');
        echo '<section class="product-category">';
        echo '<div class="container"><div class="row"><div class="col-md-12">';
        echo '<div class="fl-products-cntlr">';
    }


}

function get_custom_wc_output_content_wrapper_end(){
  if(is_shop() OR is_product_category()){
    echo '</div>';
    echo '</div></div></div>';
    echo '</section>';
    get_template_part('templates/shop', 'bottom');
  }

}

function get_array( $string ){
    if( !empty( $string ) ){ 
        $str_arr = preg_split ("/\,/", $string);   
        return $str_arr;
    }
    return false;
}
/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
  function loop_columns() {
    return 3; // 3 products per row
  }
}
/*Loop Hooks*/


/**
 * Add loop inner details are below
 */

remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

add_action('woocommerce_shop_loop_item_title', 'add_shorttext_below_title_loop', 5);
if (!function_exists('add_shorttext_below_title_loop')) {
    function add_shorttext_below_title_loop() {
        global $product, $woocommerce, $post;
        $label  = __('MEER INFO', 'woocommerce');
        $sh_desc = $product->get_short_description();
        $gridtag = cbv_get_image_tag( get_post_thumbnail_id($product->get_id()), 'pgrid' );
        echo '<div class="fl-product-grd mHc">';
        echo '<div class="fl-product-grd-inr">';
          echo '<div class="fl-pro-grd-img-cntlr mHc1">';
            echo '<a href="'.get_permalink( $product->get_id() ).'" class="overlay-link"></a>';
            echo $gridtag;
          echo '</div>';
          echo '<div class="fl-pro-grd-des mHc2">';                    
            echo '<div class="fl-pro-grd-price">';
            echo '<span class="woocommerce-Price-currencySymbol">vanaf</span>';
            echo $product->get_price_html().', -';                                                        
            echo '</div>';
            echo '<div class="fl-pro-grd-heading">';
              echo '<h2 class="fl-h2 fl-pro-grd-title"><a href="'.get_permalink( $product->get_id() ).'">'.get_the_title().'</a></h2>';
            if( !empty($sh_desc) ) echo wpautop($sh_desc);
            echo '</div>';                    
          echo '</div>';                    
        echo '</div>';
        echo '</div>';

    }
}

function wc_stock_manage(){
    global $product;
    $StockQ = $product->get_stock_quantity();
    if ( ! $product->managing_stock() && ! $product->is_in_stock() ){
        echo '<span class="out-of-stock">Out of Stock</span>';
        
    } elseif( $StockQ < 1 ) {
        if ($product->backorders_allowed()){
            echo '<span class="backorders">Available on Backorder</span>';
        } elseif ( !$product->backorders_allowed() && $StockQ == 0 && ! $product->is_in_stock()){
            echo '<span class="out-of-stock">Out of Stock</span>';
        } elseif ( $product->is_on_backorder() ){
            echo '<span class="backorders">Available on Backorder</span>';
        }
    } 
}

add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options –> Reading
  // Return the number of products you wanna show per page.
  $cols = 6;
  return $cols;
}


add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args', 20 );
function jk_related_products_args( $args ) {
$args['posts_per_page'] = 4; // 4 related products
return $args;
}



// change a number of the breadcrumb defaults.
add_filter( 'woocommerce_breadcrumb_defaults', 'cbv_woocommerce_breadcrumbs' );
if( !function_exists('cbv_woocommerce_breadcrumbs')):
function cbv_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => '',
            'wrap_before' => '<ul class="reset-list">',
            'wrap_after'  => '</ul>',
            'before'      => '<li>',
            'after'       => '</li>',
            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
        );
}
endif;

/*Remove Single page Woocommerce Hooks & Filters are below*/
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

add_action('woocommerce_single_product_summary', 'add_custom_box_product_summary', 5);
if (!function_exists('add_custom_box_product_summary')) {
    function add_custom_box_product_summary() {
        global $product, $woocommerce, $post;
        $long_desc = $product->get_description();
        $extravalue = get_post_meta( $product->get_id(), 'product_extra', true );
        echo '<div class="summary-ctrl">';
        echo '<div class="summary-hdr">';
        echo '<h1 class="product_title entry-title hide-sm">'.$product->get_title().'</h1>';
        echo '<div class="qty-price-wrap">';
        echo '<span class="single-price-total">';
        echo $product->get_price_html();
        echo '</span>';
        echo '</div>';
        if( !empty($long_desc) ){
            echo '<div class="long-desc">';
            echo wpautop( $long_desc, true );
            echo '</div>';
        }
        echo '</div>';
        echo '<div class="export-file"><p>LOREM IPSUM DOLOR SIT AMET</p></div>';
        echo '<div class="meta-crtl">';
        echo '<ul>';
            echo '<li>';
            echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in"><strong>'.esc_html__( 'Categorie:', 'woocommerce' ). '</strong>', '</span>' );
            echo '</li>';
            if ( wc_product_sku_enabled() && !empty($product->get_sku()) && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) :
                echo '<li><span class="sku">';
                echo '<strong>';
                esc_html_e( 'SKU:', 'woocommerce' );
                echo '</strong>';
                echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' );
                echo '</span></li>';
            endif;
            if( !empty($extravalue) ) printf('<li><span class="extra"><strong>Extra:</strong>%s</span></li>', $extravalue);
        echo '</ul>';
        echo '</div>';
        echo '<div class="price-quentity-ctrl">';
          woocommerce_template_single_add_to_cart();
        echo '</div>';
        echo '</div>';
    }
}

add_action('woocommerce_before_add_to_cart_quantity', 'cbv_start_div_single_price', 99);
function cbv_start_div_single_price(){
    echo '<div class="cartbtn-wrap clearfix"><strong>Aantal</strong><div class="cart-btn-qty">';
    echo '<div class="quantity qty"><span class="minus">-</span>';
}
add_action('woocommerce_after_add_to_cart_quantity', 'cbv_get_single_price');
function cbv_get_single_price(){
    global $product;
    echo '<span class="plus">+</span></div>';
    echo '</div></div>';
}


// Change 'add to cart' text on single product page (only for product ID 386)
add_filter( 'woocommerce_product_single_add_to_cart_text', 'bryce_id_add_to_cart_text' );
function bryce_id_add_to_cart_text( $default ) {
        return __( 'BESTELLEN', THEME_NAME );
}

function projectnamespace_woocommerce_text( $translated, $text, $domain ) {
    if ( $domain === 'woocommerce' ) {
        $translated = str_replace(
            array(),
            array(),
            $translated
        );
    }
    return $translated;
}

add_filter( 'gettext', 'projectnamespace_woocommerce_text', 30, 3 );


/**
    Myaccount body class
*/
add_filter( 'body_class', 'cbv_wc_custom_class' );
function cbv_wc_custom_class( $classes ) {
    global $woocommerce;

    return $classes;
}



/**
    Tabel price display
*/
add_filter( 'woocommerce_cart_item_price', 'cbv__change_cart_table_price_display', 30, 3 );
function cbv__change_cart_table_price_display( $price, $values, $cart_item_key ) {
    $slashed_price = $values['data']->get_price_html();
    $is_on_sale = $values['data']->is_on_sale();
    if ( $is_on_sale ) {
        $price = $slashed_price;
    }
    return $price;
}



/**
    Empty cart items
*/
add_action( 'init', 'woocommerce_clear_cart_url' );
function woocommerce_clear_cart_url() {
    if ( isset( $_GET['clear-cart'] ) && esc_html($_GET['clear-cart']) == 'yes' ) {
        global $woocommerce;
        $woocommerce->cart->empty_cart();
        wp_redirect( esc_url( wc_get_cart_url() ) );
        exit();
    }
}

add_action('woocommerce_before_add_to_cart_form', 'selected_variation_price_replace_variable_price_range');
function selected_variation_price_replace_variable_price_range(){
    global $product;

    if( $product->is_type('variable') ):
        echo '<span id="variable_price" style="display:none;">'.$product->get_price_html().'</span>';
    ?><style> .woocommerce-variation-price {display:none;} </style>
    <script>
    jQuery(function($) {
        var p = '.woocommerce-variation-price span.price'
            q = $(p).html();
            defprice = $("#variable_price").html();

        $('form.cart').on('show_variation', function( event, data ) {

            if ( data.price_html ) {
                $(".single-price-total").html(data.price_html);
            }
        }).on('hide_variation', function( event ) {
            $(".single-price-total").html(defprice);
            $(p).html(q);
        });
    });
    </script>
    <?php
    endif;
}
