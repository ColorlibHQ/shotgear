<?php 
/**
 * @Packge 	   : Shotgear
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
	// Block direct access
	if( !defined( 'ABSPATH' ) ){
		exit( 'Direct script access denied.' );
	}

	// Final Class
	final class Shotgear{

		
		// Theme Version
		private $shotgear_version = '1.0';

		// Minimum WordPress Version required
		private $min_wp = '4.0';

		// Minimum PHP version required 
		private $min_php = '5.6.25';

		function __construct(){
			// Theme Support
			add_action( 'after_setup_theme', array( $this, 'support' ) );
			// 
			$this->init();
		}

		// Theme init
		public function init(){
			//
			$this->setup();

			// customizer init Instantiate
			$this->customizer_init();
			
		}

		// Theme setup
		private function setup(){
			
			// Create enqueue class instance
			$enqueu = new shotgear_Enqueue();
			$enqueu->scripts = $this->enqueue() ;
			$enqueu->shotgear_scripts_enqueue_init() ;

		}
		// Theme Support
		public function support(){
			// content width
	        $GLOBALS['content_width'] = apply_filters( 'shotgear_content_width', 751 );

	        
	        // text domain for translation.
	        load_theme_textdomain( 'shotgear', SHOTGEAR_DIR_PATH . '/languages' );
	        
	        // support title tage
	        add_theme_support( 'title-tag' );
	        
	        // support logo
			add_theme_support( 'custom-logo', array(
				'height'      => 31,
				'width'       => 159,
				'flex-height' => true,
				'flex-width'  => true,
				'header-text' => array( 'site-title', 'site-description' ),
			) );

			//Custom Hreader
			add_theme_support( 'custom-header', array(
				'flex-width'    => true,
				'width'         => 1920,
				'flex-height'   => true,
				'height'        => 424
			) );

			//Custom background
			add_theme_support( 'custom-background', array(
				'default-color' => 'ffffff'
			) );

	        //  support post format
	        add_theme_support( 'post-formats', array( 'video','audio' ) );
	        
	        // support post-thumbnails
	        add_theme_support( 'post-thumbnails', array( 'post', 'portfolio' ) );
			
			// Site logo size
			add_image_size( 'shotgear_logo_159x31', 159, 31, true );
						
			// Portfolio image sizes
			add_image_size( 'shotgear_portfolio_1_image_458x650', 458, 650, true );
			add_image_size( 'shotgear_portfolio_2_image_677x650', 677, 650, true );
			add_image_size( 'shotgear_portfolio_3_image_776x650', 776, 650, true );
			add_image_size( 'shotgear_portfolio_single_image_943x520', 943, 520, true );

			// Service image size
			add_image_size( 'shotgear_service_img_360x580', 360, 580, true );
			add_image_size( 'shotgear_service_img_750x603', 750, 603, true );

			// Review image size
			add_image_size( 'shotgear_review_img_457x500', 457, 500, true );

			// Pricing image size
			add_image_size( 'shotgear_pricing_img_83x75', 83, 75, true );

			// Home blog post image size
			add_image_size( 'shotgear_latest_blog_360x363', 360, 363, true );

			// Latest post thumbnail Widget thumbnail size
			add_image_size( 'shotgear_widget_post_thumb', 80, 80, true );

			// Single blog post image size
			add_image_size( 'shotgear_single_blog_750x375', 750, 375, true );
			add_image_size( 'shotgear_np_thumb', 60, 60, true );
	        	        
	        // support automatic feed links
	        add_theme_support( 'automatic-feed-links' );
	        
	        // support html5
	        add_theme_support( 'html5' );
			
			// Add theme support for selective refresh for widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );
						    
	        // register nav menu
	        register_nav_menus( array(
	            'primary-menu'   => esc_html__( 'Primary Menu', 'shotgear' ),
				'our-services'   => esc_html__( 'Our Services', 'shotgear' )
	        ) );

	        // editor style
	        add_editor_style('assets/css/editor-style.css');

		} // end support method

		// enqueue theme style and script
		private function enqueue(){

			$cssPath = SHOTGEAR_DIR_CSS_URI;
			$jsPath  = SHOTGEAR_DIR_JS_URI;

			$scripts = array(
				'style' => array(
					array(
						'handler'		=> 'shotgear-google-font',
						'file' 			=> $this->google_font(),
					),
					array(
						'handler'		=> 'shotgear-bootstrap',
						'file' 			=> $cssPath.'bootstrap.min.css',
						'dependency' 	=> array(),
						'version' 		=> '5.3.8-5',
					),
					array(
						'handler'		=> 'shotgear-animate',
						'file' 			=> $cssPath.'animate.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'shotgear-owl-carousel',
						'file' 			=> $cssPath.'owl.carousel.min.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'shotgear-font-awesome',
						'file' 			=> $cssPath.'font-awesome.min.css',
						'dependency' 	=> array(),
						'version' 		=> '7.3.1-1',
					),
					array(
						'handler'		=> 'shotgear-themify',
						'file' 			=> $cssPath.'themify-icons.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'shotgear-flaticon',
						'file' 			=> $cssPath.'flaticon.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'shotgear-swiper-css',
						'file' 			=> $cssPath.'swiper.min.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'shotgear-magnific-popup-css',
						'file' 			=> $cssPath.'magnific-popup.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'shotgear-slick-css',
						'file' 			=> $cssPath.'slick.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'shotgear-default-css',
						'file' 			=> $cssPath.'default.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'shotgear-style-css',
						'file' 			=> $cssPath.'style.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					
					array(
						'handler'		=> 'shotgear-style',
						'file' 			=> get_stylesheet_uri(),
					),
				),
				
				'scripts' => array(
					array(
						'handler'		=> 'shotgear-bootstrap',
						'file' 			=> $jsPath.'bootstrap.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '5.3.8-4',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'shotgear-magnific-popup-js',
						'file' 			=> $jsPath.'jquery.magnific-popup.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'shotgear-swiper-min-js',
						'file' 			=> $jsPath.'swiper.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'shotgear-jquery-filterizr-js',
						'file' 			=> $jsPath.'jquery.filterizr.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'shotgear-owl-carousel-js',
						'file' 			=> $jsPath.'owl.carousel.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'shotgear-slick-min-js',
						'file' 			=> $jsPath.'slick.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'shotgear-jquery-ajaxchimp-js',
						'file' 			=> $jsPath.'jquery.ajaxchimp.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),

					array(
						'handler'		=> 'shotgear-ui-js',
						'file' 			=> $jsPath.'colorlib-ui.js',
						'dependency' 	=> array(),
						'version' 		=> '2.1.1',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'shotgear-custom',
						'file' 			=> $jsPath.'custom.js',
						'dependency' 	=> array( 'jquery', 'shotgear-ui-js' ),
						'version' 		=> $this->shotgear_version . '-s1',
						'in_footer' 	=> true
					),

				)
			);

			return $scripts;

		} // end enqueu method 

		// Google Font  
		private function google_font(){
			$font_url = '';

			/*
			 * The families this theme uses are bundled under
			 * assets/fonts/google, so nothing is fetched from Google and
			 * no request leaves the visitor's browser for a third party.
			 *
			 * Translators can still turn the fonts off for scripts these
			 * families do not cover.
			 */
			if ( 'off' !== _x( 'on', 'Google font: on or off', 'shotgear' ) ) {
				$font_url = get_template_directory_uri() . '/assets/css/google-fonts.css';
			}

			return esc_url_raw( $font_url );
		} //End google_font method

		private function customizer_init(){

		
			

			
			// Instantiate shotgear theme customizer
			$shotgear_theme_customizer = new shotgear_theme_customizer();
		}
	} // End Shotgear Class

?>