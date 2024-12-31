<?php
namespace ACLWcCostprice\Admin;
use ACLWcCostprice\Helpers\ACLHelper;

class ACLWcCostprice {

    /**
     * Initializes the admin menu pages and callback URL handler.
     */
    public static function init() {
        add_action('woocommerce_product_options_pricing', [ACLHelper::class, 'add_cost_price_field'] );
        add_action('woocommerce_process_product_meta', [ACLHelper::class, 'save_cost_price_field'] );

    }       

    /**
     * Enqueues scripts for admin area.
     */
    public static function enqueue_scripts() {

    }     

    /**
     * Adds ACL WC Cost Price admin page
     */
    public static function add_admin_pages() {
        add_menu_page(
            'ACL WooCommerce Costprice',
            'ACL WooCommerce Costprice',
            'manage_woocommerce',
            'acl-wc-costprice',
            [ __CLASS__, 'render_placeholder_page' ],
            'dashicons-update',
            56
        );
    }
    
    /**
     * Renders a placeholder page for the parent menu.
     */
    public static function render_placeholder_page() {
        echo '<div class="wrap">';
        echo '<h1>ACL Add WooCommerce Costprice Field</h1>';
        echo '<p>There are no settings for this plugin. It adds a Cost Price field in the Products Data section for each product.</p>';
        echo '</div>';
    }    

}