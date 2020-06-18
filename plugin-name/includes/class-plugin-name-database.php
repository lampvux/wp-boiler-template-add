<?php

/**
 * Fired during plugin database creation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 */

/**
 * Fired during plugin database creation.
 *
 * This class defines all code necessary to run during the plugin's database creation.
 *
 * @since      1.0.0
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 * @author     Your Name <email@example.com>
 */
class Plugin_Name_Database {

    private $db_version = '1.0.0';
    protected $plugin_name_table;

    public function __construct(){

        global $wpdb;
        $this->plugin_name_table = $wpdb->prefix."plugin_name_table";

    }

	public function plugin_name_db_install(){
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();

        $plugin_name_sql = "CREATE TABLE IF NOT EXISTS $this->plugin_name_table (
            
            `id`          int NOT NULL AUTO_INCREMENT ,
            `name` varchar(500)  NULL ,            
            `date_created` timestamp NOT NULL ,
            PRIMARY KEY (`id`),           
            ) $charset_collate   ";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $plugin_name_sql );
        add_option( 'plugin_name_db_version', $this->db_version );
    }

    public function plugin_name_db_uninstall() {		
        global $wpdb;
        $sql_plugin_name = "DROP TABLE IF EXISTS ".$this->plugin_name_table ." ; " ;
        $wpdb->query( $sql_plugin_name );
        delete_option('plugin_name_db_version');
    }

}
