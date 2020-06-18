<?php

/**
 * Fired during plugin activation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 * @author     Your Name <email@example.com>
 */
class Plugin_Name_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		// if custom post type is enabled
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-plugin-name-custom-post-type.php';
		$plugin_post_types_post_type_name = new Plugin_Name_Custom_Post_Type();
		$plugin_post_types_post_type_name->create_custom_post_type_post_type_name();

		// if database custom is enabled
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-plugin-name-database.php';
		$Plugin_Name_Database = new Plugin_Name_Database();
		$Plugin_Name_Database->plugin_name_db_install();
		
		flush_rewrite_rules();
	}

}
