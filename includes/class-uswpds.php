<?php
/**
 * Registers the USWPDS class.
 *
 * @package USWPDS
 * @since 0.0.1
 */

/**
 * Register all hooks to be run by the plugin.
 *
 * @package USWPDS
 */
class USWPDS {

  /**
   * The loader that's responsible for maintaining and registering all hooks that power the plugin.
   *
   * @since    0.0.1
   * @access   protected
   * @var      USWPDS_Loader    $loader    Maintains and registers all hooks for the plugin.
   */

  protected $loader;

  /**
   * The unique identifier of this plugin.
   *
   * @since 0.0.1
   * @access protected
   * @var string $plugin_name
   */
  protected $plugin_name;

  /**
   * The version number of this plugin.
   *
   * @since 0.0.1
   * @access protected
   * @var string $version
   */
  protected $version;

  /**
   * Define the core functionality of the plugin.
   *
   * Set the plugin name and the plugin version that can be used throughout the plugin.
   * Load the dependencies and set the hooks for the admin area and
   * the public-facing side of the site.
   *
   * @since 0.0.1
   */
  public function __construct() {
    $this->plugin_name = 'uswpds';
    $this->version     = '0.0.1';

    $this->load_dependencies();
    $this->define_admin_hooks();
    $this->define_public_hooks();
  }

  /**
   * Load the required dependencies for this plugin.
   *
   * Include the following files that make up the plugin:
   *
   * - USWPDS\Loader. Orchestrates the hooks of the plugin.
   * - USWPDS\Admin. Defines all hooks for the admin area.
   * - USWPDS\Frontend. Defines all hooks for the public side of the site.
   *
   * Create an instance of the loader which will be used to register the hooks with WordPress.
   *
   * @access private
   * @since 0.0.1
   */
  private function load_dependencies() {
    // The class responsible for orchestrating the actions and filters of the core plugin.
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-loader.php';

    // The class responsible for defining all actions that occur in the admin area.
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-admin.php';

    // The class responsible for defining all actions that occur in the public-facing side of the site.
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-frontend.php';
    $this->loader = new USWPDS\Loader();
  }

  /**
   * Register all of the hooks related to the admin area functionality of the plugin.
   *
   * @since 0.0.1
   */
  private function define_admin_hooks() {
    $plugin_admin = new USWPDS\Admin( $this->get_plugin_name(), $this->get_version() );

    // Admin hooks.
    // $this->loader->add_action( 'INSERT_WP_HOOK', $plugin_admin, 'INSERT_CALLBACK' );
  }

  /**
   * Register all of the hooks related to the public-facing functionality.
   *
   * @since 0.0.1
   */
  private function define_public_hooks() {
    $plugin_frontend = new USWPDS\Frontend( $this->get_plugin_name(), $this->get_version() );

    // Frontend hooks.
    $this->loader->add_action( 'wp_body_open', $plugin_frontend, 'insert_banner' );
    $this->loader->add_action( 'wp_enqueue_scripts', $plugin_frontend, 'enqueue_scripts_styles' );
  }

  /**
   * Run the loader to execute all of the hooks with WordPress.
   *
   * @since 0.0.1
   */
  public function run() {
    $this->loader->run();
  }

  /**
   * The reference to the class that orchestrates the hooks with the plugin.
   *
   * @return   USWPDS_Loader    Orchestrates the hooks of the plugin.
   *
   * @since 0.0.1
   */
  public function get_loader() {
    return $this->loader;
  }

  /**
   * Retrieve the name of the plugin.
   *
   * @since 0.0.1
   */
  public function get_plugin_name() {
    return $this->plugin_name;
  }

  /**
   * Retrieve the version number of the plugin.
   *
   * @since 0.0.1
   */
  public function get_version() {
    return $this->version;
  }
}
