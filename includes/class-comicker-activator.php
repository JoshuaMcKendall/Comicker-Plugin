<?php

/**
 * Fired during plugin activation
 *
 * @link       https://github.com/JoshuaMcKendall/Comicker-Plugin/includes/
 * @since      1.0.0
 *
 * @package    Comicker
 * @subpackage Comicker/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Comicker
 * @subpackage Comciker/includes
 * @author     Joshua McKendall <comicker@joshuamckendall.com>
 */
class Comicker_Activator {

	private function __construct() {
		
	}

	/**
	 *
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		
		static $instance = null;

		if($instance == null) {
			$instance = new Comicker_Activator();
		}

		return $instance;
	}
	
	private function create_options() {
	
	}
	

}