<?php

/**
 * The dashboard-specific functionality of the plugin.
 *
 * @link       https://github.com/JoshuaMcKendall/Comicker-Plugin/admin/
 * @since      1.0.0
 *
 * @package    Comicker
 * @subpackage Comicker/admin
 */

/**
 * The dashboard-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @package    Comicker
 * @subpackage Comicker/admin
 * @author     Joshua McKendall <comicker@joshuamckendall.com>
 */
class Comicker_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the Dashboard.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * Enqueue any custom styles for admin area.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/comicker-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the dashboard.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * Enqueue cusotm javascript for admin area
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/comicker-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	/**
	 * Register custom post types for the admin.
	 *
	 * @since    1.0.0
	 */
	 public function register_post_types() {
	 
		/**
		 * Register Post Type Comic.
		 *
		 * @since 1.0.0
		 */

		$comic_labels = array(
			'name' => _x('Comics', 'comicker'),
			'singular_name' => _x('Comic', 'comicker'),
			'all_items' => __('All Comics', 'comicker'),
			'add_new' => _x('Add Comic', 'comicker'),
			'add_new_item' => __('Add Comic', 'comicker'),
			'edit_item' => __('Edit Comic', 'comicker'),
			'new_item' => __('New Comic', 'comicker'),
			'view_item' => __('View Comic', 'comicker'),
			'view_items' => __('View Comcis', 'comicker'),
			'featured_image' => __('Comic Page', 'comicker'),
			'set_featured_image' => __('Set comic page', 'comicker'),
			'remove_featured_image' => __('Remove comic page', 'comicker'),
			'use_featured_image' => __('Use as comic page', 'comicker'),
			'search_items' => __('Search In Comics', 'comicker'),
			'not_found' => __('No Comic Found', 'comicker'),
			'not_found_in_trash' => __('No Comic Found In Trash.', 'comicker')
		);

		$comic_args = array(
			'labels' => $comic_labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_true' => 'attachment',
			'hierarchical' => false,
			'menu_position' => 6,
			'supports' => array('title','editor','publicize','comments'),
			'taxonomies' => array('post_tag', 'chapter'),
			'menu_icon' => '',
		);

		register_post_type('comic', $comic_args);
		
	 }

}
