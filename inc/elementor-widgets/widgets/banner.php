<?php
namespace Shotgearelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;  
}


/**
 *
 * Shotgear elementor banner section widget.
 *
 * @since 1.0
 */
class Shotgear_Banner extends Widget_Base {

	public function get_name() {
		return 'shotgear-banner';
	}

	public function get_title() {
		return __( 'Banner', 'shotgear' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return [ 'shotgear-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  content ------------------------------
        $this->start_controls_section(
            'banner_section',
            [
                'label' => __( 'Banner Section Content', 'shotgear' ),
            ]
        );
        $this->add_control(
            'banner_content',
            [
                'label'         => esc_html__( 'Banner Content', 'shotgear' ),
                'type'          => Controls_Manager::WYSIWYG,
                'default'       => __( '<h5>Model Photography</h5><h1>Creative <span>Studio</span></h1><p>Capturing moments from today</p>', 'shotgear' )
            ]
        );
        $this->add_control(
            'banner_btnlabel',
            [
                'label'         => esc_html__( 'Button Label', 'shotgear' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'view work', 'shotgear' )
            ]
        );
        $this->add_control(
            'banner_btnurl',
            [
                'label'         => esc_html__( 'Button Url', 'shotgear' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false
            ]
        );

        $this->end_controls_section(); // End content


        /**
         * Style Tab
         * ------------------------------ Banner Style ------------------------------
         *
         */

        // Heading Style ==============================
        $this->start_controls_section(
            'color_sect', [
                'label' => __( 'Banner Text Style', 'shotgear' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'sec_title_first_word_color', [
                'label'     => __( 'Section Title Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text h5' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Big Title Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text h1' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'color_secttitle_colorful', [
                'label'     => __( 'Big Title Colorful word', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text h1 span' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'sub_title_color', [
                'label'     => __( 'Banner Sub Title Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'anchor_txt_col_sep',
            [
                'label'     => __( 'Anchor Text Style', 'shotgear' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'anc_txt_color', [
                'label'     => __( 'Anchor Text Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text .btn_1' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .banner_part .banner_text .btn_1:before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .banner_part .banner_text .btn_1:after' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'anc_txt_hvr_color', [
                'label'     => __( 'Anchor Text Hover Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text .btn_1:hover' => 'color: {{VALUE}} !important;',
                    '{{WRAPPER}} .banner_part .banner_text .btn_1:hover:before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .banner_part .banner_text .btn_1:hover:after' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        
        $this->end_controls_section();

        // Background Style ==============================
        $this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'shotgear' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'shotgear' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .banner_part',
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
        $settings = $this->get_settings();
        $ban_content = !empty( $settings['banner_content'] ) ? $settings['banner_content'] : '';
        $button_label = !empty( $settings['banner_btnlabel'] ) ? $settings['banner_btnlabel'] : '';
        $button_url = !empty( $settings['banner_btnurl']['url'] ) ? $settings['banner_btnurl']['url'] : '';
    ?>

    <!--::banner part start::-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center justify-content-end">
                <div class="col-lg-5">
                    <div class="banner_text text-center">
                        <div class="banner_text_iner">
                            <?php
                                //Content ==============
                                if( $ban_content ){
                                    echo wp_kses_post( wpautop( $ban_content ) );
                                }

                                // Button =============
                                if( $button_label ){
                                    echo '<a class="btn_1" href="'. esc_url( $button_url ) .'">'. esc_html( $button_label ) .'</a>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::banner part start::--> 
    <?php
    }
	
}
