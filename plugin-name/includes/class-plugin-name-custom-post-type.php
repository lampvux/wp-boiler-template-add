<?php

/**
 * Fired during plugin custom post type creation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 */

/**
 * Fired during plugin custom post type creation.
 *
 * This class defines all code necessary to run during the plugin's custom post type creation.
 *
 * @since      1.0.0
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 * @author     Your Name <email@example.com>
 */
class Plugin_Name_Custom_Post_Type {

	protected $plugin_name;	
    protected $version;
    
	public function create_custom_post_type_post_type_name(){

        $slug = 'post_type_name';
        $has_archive = true;
        $hierarchical = false;
        $supports = array(
            'title',
            'editor',
            // 'author',
            //'excerpt', 
            //'page-attributes',
            'thumbnail'           
        );
        $labels = array(
            'name'               => esc_html__( ''.ucwords('post_type_name').'s' , 'plugin-name' ),
            'singular_name'      => esc_html__( ''.ucwords('post_type_name').'' , 'plugin-name' ),
            'menu_name'          => esc_html__( ''.ucwords('post_type_name').'s', 'plugin-name' ),
            'parent_item_colon'  => esc_html__( 'Parent '.ucwords('post_type_name').'', 'plugin-name' ),
            'all_items'          => esc_html__( 'All '.ucwords('post_type_name').'s', 'plugin-name' ),
            'add_new'            => esc_html__( 'Add New' , 'plugin-name' ),
            'add_new_item'       => esc_html__( 'Add New '.ucwords('post_type_name').'' , 'plugin-name' ),
            'edit_item'          => esc_html__( 'Edit '.ucwords('post_type_name').'' , 'plugin-name' ),
            'new_item'           => esc_html__( 'New '.ucwords('post_type_name').'' , 'plugin-name' ),
            'view_item'          => esc_html__( 'View '.ucwords('post_type_name').' ' , 'plugin-name' ),
            'search_items'       => esc_html__( 'Search '.ucwords('post_type_name').'' , 'plugin-name' ),
            'not_found'          => esc_html__( 'Not Found' , 'plugin-name' ),
            'not_found_in_trash' => esc_html__( 'Not found in Trash' , 'plugin-name' ),
        );

        $args = array(
            'labels'             => $labels,
            'description'        => esc_html__( ''.ucwords('post_type_name').'', 'plugin-name' ),
            'public'             => true,
            'publicly_queryable' => true,
            'exclude_from_search'=> false,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'show_in_admin_bar'  => true,
            'capability_type'    => 'page',

            //'taxonomies' => array( 'category'), // if you need category

            'has_archive'        => $has_archive,
            'hierarchical'       => $hierarchical,
            'menu_position'      => null,
            'menu_icon'          => 'dashicons-list-view',
            /* Add $this->plugin_name as translatable in the permalink structure,
            to avoid conflicts with other plugins which may use products as well. */
            'rewrite' => array(
                'slug' =>   esc_attr__( $this->plugin_name, $this->plugin_name ) . '/' . esc_attr__( 'post_type_name', 'plugin-name' ),
                'with_front' => false
            ),
            'supports'           => $supports,

            'capability_type'     => array('post_type_name','post_type_names'),
            'map_meta_cap' => true,

        ); 
        
        register_post_type( $slug, $args );  
    }

}
