<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.wrdsb.ca
 * @since      1.0.0
 *
 * @package    WRDSB\Governance
 * @subpackage WRDSB\Governance\public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    WRDSB\Governance
 * @subpackage WRDSB\Governance\public
 * @author     WRDSB <website@wrdsb.on.ca>
 */
class WRDSB_Governance_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in WRDSB_Governance_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WRDSB_Governance_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wrdsb-governance-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in WRDSB_Governance_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WRDSB_Governance_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wrdsb-governance-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register the theme templates for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function get_custom_post_type_single_template( $single_template ) {
		global $post;

		if ( $post->post_type == 'system_memo' ) {
			$single_template = dirname( __FILE__ ) . '/page-templates/single-system_memo.php';
		}
		return $single_template;
	}

	/**
	 * Register the theme templates for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function get_custom_post_type_archive_template( $archive_template ) {
		global $post;

		if ( is_post_type_archive( 'system_memo' ) ) {
			$archive_template = dirname( __FILE__ ) . '/page-templates/archive-system_memo.php';
		}
		return $archive_template;
	}

	/**
	 * Register the rewrite rules for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function register_rewrite_rules() {
		// /system-memos/by-audience/{audience}
		add_rewrite_rule('system-memos/by-audience/(.+?)/?$', 'index.php?post_type=system_memo&audiences=$matches[1]', 'top');

		// /system-memos/by-category/{category}
		add_rewrite_rule('system-memos/by-category/(.+?)/?$', 'index.php?post_type=system_memo&governance_categories=$matches[1]', 'top');

		// /system-memos/by-tag/{tag}
		add_rewrite_rule('system-memos/by-tag/(.+?)/?$', 'index.php?post_type=system_memo&governance_tags=$matches[1]', 'top');
	}
}
