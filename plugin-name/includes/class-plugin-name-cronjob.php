<?php

/**
 * Fired during plugin cronjob schedule
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 */

/**
 * Fired during plugin cronjob schedule.
 *
 * This class defines all code necessary to run during the plugin's cronjob schedule.
 *
 * @since      1.0.0
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 * @author     Your Name <email@example.com>
 */
class Plugin_Name_Cronjob {

	
	public function plugin_name_add_cron_interval($schedules){

        $schedules['weekly'] = array(
            'interval' => 7*24*60*60,
            'display'  => esc_html__( 'Weekly' ) );

        $schedules['monthly'] = array(
            'interval' => 30*24*60*60,
            'display'  => esc_html__( 'Monthly' ) );

        return $schedules;

    }
    public function plugin_name_schedule_cronjob(){

        if ( !wp_next_scheduled( 'plugin_name_daily' ) )
            wp_schedule_event(time(), 'daily', 'plugin_name_daily');

    
    }

    public function do_cronjob_plugin_name_daily(){
        // do something here with cronjobs
    }

}
