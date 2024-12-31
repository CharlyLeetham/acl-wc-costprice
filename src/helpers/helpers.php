<?php
namespace ACLWcCostprice\Helpers;
use ACLWcCostprice\Admin\ACLProductSyncPage;

class ACLWcCostpriceHelper {

    
    function add_cost_price_field() {
        woocommerce_wp_text_input(
            array(
                'id'          => '_acl_wc_cost_price',
                'label'       => __( 'Cost Price', 'acl-wc-costprice') . ' (' . get_woocommerce_currency_symbol() . ')',
                'placeholder' => 'Enter cost price',
                'desc_tip'    => true,
                'description' => __( 'The price you paid for this product.', 'acl-wc-costprice' )
            )
        );
    }

    function save_cost_price_field($post_id) {
        $cost_price = $_POST['_acl_wc_cost_price'];
        if (!empty($cost_price)) {
            update_post_meta( $post_id, '_acl_wc_cost_price', wc_clean( $cost_price ) );
        }
    }    

}