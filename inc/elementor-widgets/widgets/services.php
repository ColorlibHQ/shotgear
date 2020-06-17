<?php
namespace Shotgearelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *
 * Shotgear elementor Team Member section widget.
 *
 * @since 1.0
 */
class Shotgear_Services extends Widget_Base {

	public function get_name() {
		return 'shotgear-services';
	}

	public function get_title() {
		return __( 'Services', 'shotgear' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'shotgear-elements' ];
	}

	protected function _register_controls() {
        
		// ----------------------------------------   Services content ------------------------------
        $this->start_controls_section(
			'services_sec_head',
			[
				'label' => __( 'Service Section Heading', 'shotgear' ),
			]
        );

        $this->add_control(
            'section_heading',
            [
                'label'         => esc_html__( 'Section Heading', 'shotgear' ),
                'type'          => Controls_Manager::WYSIWYG,
                'default'       => __( '<p>our service</p><h2>what we offer</h2>', 'shotgear' )
            ]
        );

        $this->end_controls_section(); // End Services content

        // First service contents
        $this->start_controls_section(
			'services_1st',
			[
				'label' => __( 'Services First Row Contents', 'shotgear' ),
			]
        );

        $this->add_control(
            'first_icon',
            [
                'label'     => __( 'Select Icon', 'shotgear' ),
                'type'      => Controls_Manager::ICON,
                'default'   => 'flaticon-love-and-romance',
                'options'   => shotgear_themify_icon()
            ]
        );

        $this->add_control(
            'first_content',
            [
                'label'         => esc_html__( 'Contents', 'shotgear' ),
                'type'          => Controls_Manager::WYSIWYG,
                'default'       => __( '<h4>wedding photography</h4><p>World the end of summer the sweltering heat makes human sweat in the night and man plants and trees wilt even</p>', 'shotgear' )
            ]
        );

        $this->add_control(
            'first_btnlabel',
            [
                'label'         => esc_html__( 'Button Label', 'shotgear' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'read more', 'shotgear' )
            ]
        );
        $this->add_control(
            'first_btnurl',
            [
                'label'         => esc_html__( 'Button Url', 'shotgear' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false
            ]
        );
        $this->add_control(
            'first_img',
            [
                'label'         => esc_html__( 'Upload Image', 'shotgear' ),
                'type'          => Controls_Manager::MEDIA,
                'show_external' => false,
                'default'       => [
                    'url'       => Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $this->end_controls_section(); // End Services content
        

        // Second row content
		$this->start_controls_section(
			'services_sec',
			[
				'label' => __( 'Services Second Row Contents', 'shotgear' ),
			]
        );

        $this->add_control(
            'sec_icon',
            [
                'label'     => __( 'Select Icon', 'shotgear' ),
                'type'      => Controls_Manager::ICON,
                'default'   => 'flaticon-leaf',
                'options'   => shotgear_themify_icon()
            ]
        );

        $this->add_control(
            'sec_content',
            [
                'label'         => esc_html__( 'Contents', 'shotgear' ),
                'type'          => Controls_Manager::WYSIWYG,
                'default'       => __( '<h4>Nature photography</h4>
                <p>that the monsoon clouds are soon coming, there is a strange silence in the ears, the sky gets darker and darker, the flash of lightning illuminates the dark skies all time needs band the sound of thunder fills the heart with fear.</p>', 'shotgear' )
            ]
        );

        $this->add_control(
            'sec_btnlabel',
            [
                'label'         => esc_html__( 'Button Label', 'shotgear' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'read more', 'shotgear' )
            ]
        );
        $this->add_control(
            'sec_btnurl',
            [
                'label'         => esc_html__( 'Button Url', 'shotgear' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false
            ]
        );
        $this->add_control(
            'sec_img',
            [
                'label'         => esc_html__( 'Upload Image', 'shotgear' ),
                'type'          => Controls_Manager::MEDIA,
                'show_external' => false,
                'default'       => [
                    'url'       => Utils::get_placeholder_image_src(),
                ]
            ]
        );

		$this->end_controls_section(); // End Services content

        /**
         * Style Tab
         * ------------------------------ Style Tab Content ------------------------------
         *
         */

        // Single Service Color Settings ==============================
        $this->start_controls_section(
            'single_serv_color_sett', [
                'label' => __( 'Single Service Color Settings', 'shotgear' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
 
        $this->add_control(
            'sub_title_color', [
                'label'     => __( 'Sub Title Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our_service .section_tittle p' => 'color: {{VALUE}};',
                ],
            ]
        ); 
        $this->add_control(
            'title_color', [
                'label'     => __( 'Title Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our_service .section_tittle h2' => 'color: {{VALUE}};',
                ],
            ]
        ); 

        $this->add_control(
            'serv_styles_separator',
            [
                'label'     => __( 'Service Styles', 'shotgear' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        ); 
 
        $this->add_control(
            'serv_txt_bg_color', [
                'label'     => __( 'Service Text Holder BG Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our_service .single_offer_text' => 'background-color: {{VALUE}};',
                ],
            ]
        ); 
        $this->add_control(
            'serv_icon_color', [
                'label'     => __( 'Service Icon Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our_service .single_offer_text span' => 'color: {{VALUE}};',
                ],
            ]
        ); 
        $this->add_control(
            'serv_title_color', [
                'label'     => __( 'Service Title Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our_service .single_offer_text h4' => 'color: {{VALUE}};',
                ],
            ]
        ); 
        $this->add_control(
            'serv_txt_color', [
                'label'     => __( 'Service Text Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our_service .single_offer_text p' => 'color: {{VALUE}};',
                ],
            ]
        ); 
        $this->add_control(
            'serv_anc_color', [
                'label'     => __( 'Service Anchor Text Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our_service .single_offer_text .btn_1' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .our_service .single_offer_text .btn_1:before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .our_service .single_offer_text .btn_1:after' => 'background-color: {{VALUE}};',
                ],
            ]
        ); 
        $this->add_control(
            'serv_txt_hov_color', [
                'label'     => __( 'Service Text Hover Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our_service .single_offer_text .btn_1:hover' => 'color: {{VALUE}} !important;',
                    '{{WRAPPER}} .our_service .single_offer_text .btn_1:hover:before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .our_service .single_offer_text .btn_1:hover:after' => 'background-color: {{VALUE}};',
                ],
            ]
        ); 

        $this->end_controls_section();

	}

	protected function render() {
    $settings       = $this->get_settings();
    $section_heading= !empty( $settings['section_heading'] ) ? $settings['section_heading'] : '';
    $first_icon     = !empty( $settings['first_icon'] ) ? $settings['first_icon'] : '';
    $first_content  = !empty( $settings['first_content'] ) ? $settings['first_content'] : '';
    $first_btnlabel = !empty( $settings['first_btnlabel'] ) ? $settings['first_btnlabel'] : '';
    $first_btnurl   = !empty( $settings['first_btnurl']['url'] ) ? $settings['first_btnurl']['url'] : '';
    $first_img      = !empty( $settings['first_img']['id'] ) ? wp_get_attachment_image( $settings['first_img']['id'], 'shotgear_service_img_750x603', false, array( 'alt' => 'service right image' ) ) : '';
    
    $sec_icon       = !empty( $settings['sec_icon'] ) ? $settings['sec_icon'] : '';
    $sec_content    = !empty( $settings['sec_content'] ) ? $settings['sec_content'] : '';
    $sec_btnlabel   = !empty( $settings['sec_btnlabel'] ) ? $settings['sec_btnlabel'] : '';
    $sec_btnurl     = !empty( $settings['sec_btnurl']['url'] ) ? $settings['sec_btnurl']['url'] : '';
    $sec_img      = !empty( $settings['sec_img']['id'] ) ? wp_get_attachment_image( $settings['sec_img']['id'], 'shotgear_service_img_360x580', false, array( 'alt' => 'service right image 2' ) ) : '';
    $dynamic_class      = is_front_page() ? 'our_service padding_bottom' : 'our_service padding_top';
    $dynamic_class2      = is_front_page() ? 'row align-items-center filtr-container' : 'row align-items-center';
    ?>

    <!--::our_service part start::-->
    <section class="<?php echo esc_attr( $dynamic_class )?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section_tittle">
                        <?php
                            if( $section_heading ){
                                echo wp_kses_post( wpautop( $section_heading ) );
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="<?php echo esc_attr( $dynamic_class2 )?>">
                <div class="col-lg-4 col-md-6">
                    <div class="single_offer_text text-center wedding">
                        <?php
                            if( $first_icon ){
                                echo '<span class="'. esc_attr( $first_icon ) .'"></span>';
                            }

                            if( $first_content ){
                                echo wp_kses_post( wpautop( $first_content ) );
                            }

                            if( $first_btnlabel ){
                                echo '<a class="btn_1" href="'. esc_url( $first_btnurl ) .'">'. esc_html( $first_btnlabel ) .'</a>';
                            }
                        ?>
                    </div>
                    <div class="single_offer_img d-none d-md-block">
                        <?php
                            if( $sec_img ){
                                echo wp_kses_post( $sec_img );
                            }
                        ?>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="single_offer_img d-none d-md-block">
                        <?php
                            if( $first_img ){
                                echo wp_kses_post( $first_img );
                            }
                        ?>
                    </div>
                    <div class="single_offer_text text-center nature">
                        <?php
                            if( $sec_icon ){
                                echo '<span class="'. esc_attr( $sec_icon ) .'"></span>';
                            }

                            if( $sec_content ){
                                echo wp_kses_post( wpautop( $sec_content ) );
                            }

                            if( $sec_btnlabel ){
                                echo '<a class="btn_1" href="'. esc_url( $sec_btnurl ) .'">'. esc_html( $sec_btnlabel ) .'</a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::our_service part end::-->
    <?php
    }
}
