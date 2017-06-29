<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/JoshuaMcKendall/Comicker-Plugin/admin/
 * @since      1.0.0
 *
 * @package    Comicker
 * @subpackage Comicker/admin
 */

/**
 * The admin-specific functionality of the plugin.
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
	 * Render admin views.
	 *
	 * @since     1.0.0
	 * @param      string    $view       The view to render from admin/views.
	 */
	private function render($view) {

		$admin_views_path = plugin_dir_path( __FILE__ ) . 'views/';

		ob_start();
		require($admin_views_path . $view . '.php');
		return ob_get_clean();

	}

	/**
	 * Register the stylesheets for the Dashboard.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles($hook) {

		// wp_die($hook);

		/**
		 * Enqueue any custom styles for admin area.
		 */
		wp_register_style( 'comicker_wp_admin_css', plugin_dir_url( __FILE__ ) . 'css/comicker-admin.css', false, $this->version );

		wp_enqueue_style( 'comicker_wp_admin_css' );

	}

	/**
	 * Register the JavaScript for the dashboard.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts($hook) {


		/**
		 * Enqueue cusotm javascript for admin area
		 */
		wp_register_script('comicker_wp_admin_js', plugin_dir_url( __FILE__ ) . 'js/comicker-admin.js', array('jquery'), $this->version );

		wp_enqueue_script( 'comicker_wp_admin_js' );

		if( ($hook == 'post-new.php' || $hook == 'post.php') && get_post_type() == 'comic' ) {

			/**
			 * Enqueue cusotm javascript for comic posts
			 */

			wp_enqueue_media();

			wp_register_script('comicker_comic_post_js', plugin_dir_url( __FILE__ ) . 'js/comicker-comic-post.js', array('jquery'), $this->version, true );

			wp_enqueue_script( 'comicker_comic_post_js' );



		}

	}

	/**
	 * Adds all the options and settings that Comicker needs.
	 *
	 * @since    1.0.0
	 */
	 public function add_settings() {


	 	add_settings_section('comicker_reading_section', 'Comicker Reading Settings', array($this, 'render_reading_settings_section'), 'reading');

	 	add_settings_field('comicker_reading_direction', 'Reading direction', array($this, 'render_comicker_reading_direction'), 'reading', 'comicker_reading_section');

	 	register_setting('reading', 'comicker_reading_direction', 'intval');

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
			'taxonomies' => array('chapter', 'post_tag'),
			'menu_icon' => ''
		);

		register_post_type('comic', $comic_args);
		
	 }



	/**
	 * Register custom taxonomies for comic post type.
	 *
	 * @since    1.0.0
	 */

	public function register_taxonomies() {

		/**
		 * Register Chapter Taxonomy for Comic post type.
		 *
		 * @since 1.0.0
		 */
		$chap_labels = array(
			'name' => _x('Chapters', 'comicker'),
			'singular_name' => _x('Chapter', 'comicker'),
			'menu_name' => __('Chapters', 'comicker'),
			'all_items' => __('All Chapters', 'comicker'),
			'edit_item' => __('Edit Chapter', 'comicker'),
			'view_item' => __('View Chapter', 'comicker'),
			'update_item' => __('Update Chapter', 'comicker'),
			'add_new_item' => __('Add New Chapter', 'comicker'),
			'new_item_name' => __('New Chapter Name', 'comciker'),
			'search_items' => __('Search Chapters'),
			'popular_items' => null,
			'seperate_items_with_commas' => null,
			'add_or_remove_items' => __('Add or remove Chapters', 'comicker'),
			'choose_from_most_used' => null,
			'not_found' => __('No chapters found', 'comicker')

			);

		$chap_args = array(
			'label' => _x('Chapters', 'comicker'),
			'labels' => $chap_labels,
			'hierarchical' => false,
			'show_ui' => true,
			'show_in_nav_menus' => false,
			'show_in_rest' => true,
			'rest_base' => 'chapter',
			'show_tagcloud' => false,
			'show_admin_column' => false,
			'show_in_quick_edit' => false,
			'meta_box_cb' => array($this, 'render_comicker_chapter_meta_box'),
			'update_count_callback' => '', // CHANGE IN THE FUTURE, HAVE TO MAKE CUSTOM CALLBACK
			'query_var' => 'chapter',
			'sort' => false			
			);

		register_taxonomy('chapter', 'comic', $chap_args);

	}

	/**
	 * Adds the 'Comicker' submenu under settings.
	 *
	 * @since    1.0.0
	 */
	public function add_comicker_options_submenu() {

		add_submenu_page('options-general.php', __('Comicker', 'comicker'), __('Comicker', 'comicker'), 'manage_options', 'comicker-options', array(&$this, 'render_comicker_options_page'));

	}

	/**
	 * Adds the Comic meta box for the edit/create comic page.
	 *
	 * @since    1.0.0
	 */
	public function add_comic_meta_box() {

		add_meta_box('comic-meta-box', __('Comic', 'comicker'), array(&$this, 'render_comicker_comic_meta_box'), 'comic', 'normal', 'high');

	}

	public function render_reading_settings_section() {

		

	}

	/**
	 * Renders settings for reading section for Comicker.
	 *
	 * @since    1.0.0
	 */
	 public function render_comicker_reading_direction() {

	 	echo $this->render('_partials/_comicker-reading-settings-section');

	 }

	/**
	 * Renders the page for Comicker options under settings.
	 *
	 * @since    1.0.0
	 */
	public function render_comicker_options_page() {
		
		echo $this->render('comicker-options-page');

	}

	/**
	 * Renders the chapters meta box.
	 *
	 * @since    1.0.0
	 */
	public function render_comicker_chapter_meta_box() {

		echo $this->render('_partials/_chapters-meta-box');

	}

	/**
	 * Renders the comic meta box.
	 *
	 * @since    1.0.0
	 */
	public function render_comicker_comic_meta_box() {

		echo $this->render('_partials/_comic-meta-box');

	}

}
