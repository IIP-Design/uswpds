<?php
/**
 * Registers the Frontend class.
 *
 * @package USWPDS\Frontend
 * @since 0.0.1
 */

namespace USWPDS;

/**
 * Add USWPDS frontend scripts and styles.
 *
 * @package USWPDS\Frontend
 * @since 0.0.1
 */
class Frontend {

  /**
   * Initializes the class with the plugin name and version.
   *
   * @param string $plugin     The plugin name.
   * @param string $version    The plugin version number.
   */
  public function __construct( $plugin, $version ) {
    $this->plugin  = $plugin;
    $this->version = $version;
  }

  /**
   * Adds the HTML required for the .gov banner component.
   *
   * @since 0.0.1
   */
  public function insert_banner() {

    if ( ! is_admin() ) {
      ?>
      <section class="usa-banner" aria-label="Official government website" style="padding-bottom: 0;padding-top: 0;">
        <div class="usa-accordion">
          <header class="usa-banner__header">
            <div class="usa-banner__inner">
              <div class="grid-col-auto">
                <img class="usa-banner__header-flag" src="<?php echo esc_attr( USWPDS_URL . 'public/assets/img/us_flag_small.png' ); ?>" alt="U.S. flag" style="width: 24px;">
              </div>
              <div class="grid-col-fill tablet:grid-col-auto">
                <p class="usa-banner__header-text" style="font-size: 12px;">An official website of the United States government</p>
                <p class="usa-banner__header-action" aria-hidden="true" >Here’s how you know</p>
              </div>
              <button class="usa-accordion__button usa-banner__button"
                aria-expanded="false" aria-controls="gov-banner">
                <span class="usa-banner__button-text" style="font-size: 12px; text-transform: none;">Here’s how you know</span>
              </button>
            </div>
          </header>
          <div class="usa-banner__content usa-accordion__content" id="gov-banner">
            <div class="grid-row grid-gap-lg">
              <div class="usa-banner__guidance tablet:grid-col-6">
                <img class="usa-banner__icon usa-media-block__img" src="<?php echo esc_attr( USWPDS_URL . 'public/assets/img/icon-dot-gov.svg' ); ?>" width="38px" role="img" alt="Dot gov">
                <div class="usa-media-block__body">
                  <p style="font-size: 15px;">
                    <strong>
                      Official websites use .gov 
                    </strong>
                    <br/>
                      A <strong>.gov</strong> website belongs to an official government organization in the United States.
                  </p>
                </div>
              </div>
              <div class="usa-banner__guidance tablet:grid-col-6">
                <img class="usa-banner__icon usa-media-block__img" src="<?php echo esc_attr( USWPDS_URL . 'public/assets/img/icon-https.svg' ); ?>" role="img" alt="Https">
                <div class="usa-media-block__body">
                  <p style="font-size: 15px;">
                    <strong>
                      Secure .gov websites use HTTPS 
                    </strong>
                    <br/>
                      A <strong>lock</strong> (<span class="icon-lock"><svg xmlns="http://www.w3.org/2000/svg" width="52" height="64" viewBox="0 0 52 64" class="usa-banner__lock-image" role="img" aria-labelledby="banner-lock-title banner-lock-description" style="display: inline-block;"><title id="banner-lock-title">Lock</title><desc id="banner-lock-description">A locked padlock</desc><path fill="#000000" fill-rule="evenodd" d="M26 0c10.493 0 19 8.507 19 19v9h3a4 4 0 0 1 4 4v28a4 4 0 0 1-4 4H4a4 4 0 0 1-4-4V32a4 4 0 0 1 4-4h3v-9C7 8.507 15.507 0 26 0zm0 8c-5.979 0-10.843 4.77-10.996 10.712L15 19v9h22v-9c0-6.075-4.925-11-11-11z"/></svg></span>) or <strong>https://</strong> means you’ve safely connected to the .gov website. Share sensitive information only on official, secure websites.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php
    }
  }

  /**
   * Enqueue the scripts for each block type.
   */
  public function enqueue_scripts_styles() {
    wp_register_script( 'gpalab-uswpds-frontend-js', USWPDS_URL . 'public/assets/js/uswds.min.js', array(), $this->version, true );

    wp_register_style( 'gpalab-uswpds-frontend-css', USWPDS_URL . 'public/assets/css/uswds.min.css', array(), $this->version );

    wp_enqueue_script( 'gpalab-uswpds-frontend-js' );
    wp_enqueue_style( 'gpalab-uswpds-frontend-css' );
  }

}
