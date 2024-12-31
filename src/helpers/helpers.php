<?php
namespace ACLWcCostprice\Helpers;
use ACLWcCostprice\Admin\ACLWcCostprice;

class ACLHelper {

    
    public static function add_cost_price_field() {
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

    public static function save_cost_price_field($post_id) {
        $cost_price = $_POST['_acl_wc_cost_price'];
        if (!empty($cost_price)) {
            update_post_meta( $post_id, '_acl_wc_cost_price', wc_clean( $cost_price ) );
        }
    } 
    
    /**
     * Add automatic mapping support for '_acl_wc_cost_price'. 
     *
     * @param array $columns
     * @return array $columns
     */
    function add_column_to_mapping_screen( $columns ) {
        
        // potential column name => column slug
        $columns['_acl_wc_cost_price'] = '_acl_wc_cost_price';

        return $columns;
    }

    /**
     * Process the data read from the CSV file.
     * This just saves the value in meta data, but you can do anything you want here with the data.
     *
     * @param WC_Product $object - Product being imported or updated.
     * @param array $data - CSV data read for the product.
     * @return WC_Product $object
     */
    function process_import( $object, $data ) {
        
        if ( ! empty( $data['_acl_wc_cost_price'] ) ) {
            $object->update_meta_data( '_acl_wc_cost_price', $data['_acl_wc_cost_price'] );
        }

        return $object;
    }    
    

}