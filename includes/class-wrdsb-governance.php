<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://www.wrdsb.ca
 * @since      1.0.0
 *
 * @package    WRDSB\Governance
 * @subpackage WRDSB\Governance\includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    WRDSB\Governance
 * @subpackage WRDSB\Governance\includes
 * @author     WRDSB <website@wrdsb.on.ca>
 */
class WRDSB_Governance {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      WRDSB_Governance_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->plugin_name = 'wrdsb-governance';
		$this->version = '1.0.0';

		$this->load_dependencies();
		$this->define_plugin_hooks();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - WRDSB_Governance_Loader. Orchestrates the hooks of the plugin.
	 * - WRDSB_Governance_Admin. Defines all hooks for the admin area.
	 * - WRDSB_Governance_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wrdsb-governance-loader.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wrdsb-governance-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-wrdsb-governance-public.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/custom-post-types/class-wrdsb-governance-board-policy.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/custom-post-types/class-wrdsb-governance-board-procedure.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/custom-post-types/class-wrdsb-governance-system-memo.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/taxonomies/class-wrdsb-governance-categories.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/taxonomies/class-wrdsb-governance-tags.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/taxonomies/class-wrdsb-governance-owners.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/taxonomies/class-wrdsb-governance-contacts.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/taxonomies/class-wrdsb-governance-organizational-units.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/taxonomies/class-wrdsb-governance-privacy-levels.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/taxonomies/class-wrdsb-governance-lifecycle-phases.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/taxonomies/class-wrdsb-governance-audiences.php';

		$this->loader = new WRDSB_Governance_Loader();

	}
	
	/**
	 * Register all of the hooks enabling base functionality for the plugin,
	 * such as custom post types, taxonomies, etc.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_plugin_hooks() {

		$board_policy_cpt = new WRDSB_Governance_Board_Policy_CPT();
		$board_procedure_cpt = new WRDSB_Governance_Board_Procedure_CPT();
		$system_memo_cpt = new WRDSB_Governance_System_Memo_CPT();

		$governance_categories_ctax = new WRDSB_Governance_Categories_CTax();
		$governance_tags_ctax = new WRDSB_Governance_Tags_CTax();

		$governance_owners_ctax = new WRDSB_Governance_Owners_CTax();
		$governance_contacts_ctax = new WRDSB_Governance_Contacts_CTax();
		$governance_org_units_ctax = new WRDSB_Governance_Organizational_Units_CTax();
		$governance_privacy_levels_ctax = new WRDSB_Governance_Privacy_Levels_CTax();
		$governance_lifecycle_phases_ctax = new WRDSB_Governance_Lifecycle_Phases_CTax();
		$governance_audiences_ctax = new WRDSB_Governance_Audiences_CTax();

		$this->loader->add_action( 'init', $board_policy_cpt, 'register_cpt', 0 );
		$this->loader->add_action( 'init', $board_procedure_cpt, 'register_cpt', 0 );
		$this->loader->add_action( 'init', $system_memo_cpt, 'register_cpt', 0 );

		$this->loader->add_action( 'init', $governance_categories_ctax, 'register_ctax', 0);
		$this->loader->add_action( 'init', $governance_tags_ctax, 'register_ctax', 0);

		$this->loader->add_action( 'init', $governance_owners_ctax, 'register_ctax', 0);
		$this->loader->add_action( 'init', $governance_contacts_ctax, 'register_ctax', 0);
		$this->loader->add_action( 'init', $governance_org_units_ctax, 'register_ctax', 0);
		$this->loader->add_action( 'init', $governance_privacy_levels_ctax, 'register_ctax', 0);
		$this->loader->add_action( 'init', $governance_lifecycle_phases_ctax, 'register_ctax', 0);
		$this->loader->add_action( 'init', $governance_audiences_ctax, 'register_ctax', 0);

		$this->loader->add_action( 'transition_post_status', $system_memo_cpt, 'set_slug_on_publish', 10, 3);

		$this->loader->add_action( 'parse_tax_query', $system_memo_cpt, 'by_audience_query');
	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new WRDSB_Governance_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new WRDSB_Governance_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		$this->loader->add_filter( 'single_template',    $plugin_public, 'get_custom_post_type_single_template', 10, 1 );
		$this->loader->add_filter( 'archive_template',   $plugin_public, 'get_custom_post_type_archive_template', 10, 1 );

		$this->loader->add_action( 'init', $plugin_public, 'register_rewrite_rules' );
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    WRDSB_Governance_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
