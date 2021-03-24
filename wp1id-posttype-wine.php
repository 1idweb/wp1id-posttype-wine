<?php
/**
 * Plugin Name: Post Type Wine Bottles
 * Plugin URI: https://1idweb.com/products/wordpress-plugin/wp1id-posttype-wine
 * Description: Generate Custom Post Type for Wine. Support 
 * Version: 1.0
 * Author: 1idweb
 * Author URI: https://1idweb.com
 * License: GPL2
 * 
 * POST TEMPLATE: 
 ** Copy/paste the `single.php` from your theme and rename it to `single-wines.php`. 
 ** Then add `Template Name: Wines` as the first comment line (#3) at the beginning of the PHP file.
 */

function custom_wine_post_type() {
    $labels = array(
        'name'                  => _x('Wines', 'Post Type General Name', 'posttype wine'),
        'singular_name'         => _x('Wine', 'Post Type Singular Name', 'posttype wine'),
        'add_new'               => __('Add New', 'posttype wine'),
        'add_new_item'          => __('Add A New Wine', 'posttype wine'),
        'all_items'             => __('All Wines', 'posttype wine'),
        'archives'              => __('Wine Archives', 'posttype wine'),
        'edit_item'             => __('Edit Item', 'posttype wine'),
        'featured_image'        => __('Product Image', 'posttype wine'),
        'filter_items_list'     => __('Filter Wines List', 'posttype wine'),
        'insert_into_item'      => __('Post Types', 'posttype wine'),
        'items_list'            => __('Wines List', 'posttype wine'),
        'items_list_navigation' => __('Wines List Navigation', 'posttype wine'),
        'menu_name'             => __('Wine Bottles', 'posttype wine'),
        'name_admin_bar'        => __('Add New', 'posttype wine'),
        'new_item'              => __('New Wine', 'posttype wine'),
        'not_found'             => __('No Wine Found', 'posttype wine'),
        'not_found_in_trash'    => __('Not Found In Trash', 'posttype wine'),
        'parent_item_colon'     => __('Parent Item', 'posttype wine'),
        'remove_featured_image' => __('Remove Product Image', 'posttype wine'),
        'search_items'          => __('Search A Wine', 'posttype wine'),
        'set_featured_image'    => __('Set Product Image', 'posttype wine'),
        'update_item'           => __('Update Item', 'posttype wine'),
        'uploaded_to_this_item' => __('Uploaded To This Product', 'posttype wine'),
        'use_featured_image'    => __('Use As Product Image', 'posttype wine'),
        'view_item'             => __('View Wine', 'posttype wine'),
    );
    $args = array(
        'capability_type'       => 'page',
        'can_export'            => true,
        'description'           => __('Wine product page', 'posttype wine'),
        'exclude_from_search'   => false,
        'label'                 => __('Post Type', 'posttype wine'),
        'labels'                => $labels,
        'has_archive'           => true,
        'hierarchical'          => false,
        'menu_position'         => 5,
        'publicly_queryable'    => true,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'supports'              => array('editor', 'title', 'trackbacks', 'content', 'revisions', 'excerpt', 'custom_fields', 'author', 'post_attributes', 'featured_image', 'post_formats', 'comments'),
        'taxonomies'            => array('Bottle'),
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
    );
    register_post_type('wines', $args);
}
add_action('init', 'custom_wine_post_type', 0);


/**
 * Add custom User Role
 */
add_role(
	'voluntary_worker',
	__( 'Voluntary Worker', 'posttype wine' ),
	array(
		'read'         => true
	)
);


function rename_existing_role() {
    global $wp_roles;

    if ( ! isset( $wp_roles ) )
        $wp_roles = new WP_Roles();

    $wp_roles->roles['contributor']['name'] = __('Sales Clerk', 'posttype wine');
    $wp_roles->role_names['contributor'] = __('Sales Clerk', 'posttype wine');
}
add_action('init', 'rename_existing_role');
