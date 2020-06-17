<?php
namespace Shotgearelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *
 * Shotgear elementor section widget.
 *
 * @since 1.0
 */
class Shotgear_About extends Widget_Base {

	public function get_name() {
		return 'shotgear-about';
	}

	public function get_title() {
		return __( 'About', 'shotgear' );
	}

	public function get_icon() {
		return 'eicon-thumbnails-half';
	}

	public function get_categories() {
		return [ 'shotgear-elements' ];
	}

	protected function _register_controls() {

        
		// ----------------------------------------  About content ------------------------------
		$this->start_controls_section(
			'about_content',
			[
				'label' => __( 'About Section', 'shotgear' ),
			]
		);

        $this->add_control(
            'content',
            [
                'label'         => esc_html__( 'About Text', 'shotgear' ),
                'description'   => esc_html__('Use <br> tag for line break', 'shotgear'),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<h5>About our studio</h5><h2>The Camera Is An Instrument That Teaches People how to See without a Camera</h2><p>It’s the end of summer the sweltering heat makes human sweat in the night and makes the plants and trees wilt even in the moonlit nights. The eastern wind breeze brings an eerie feeling, that the monsoon clouds are soon coming, there is a strange silence in the ears, the sky gets darker and darker, the flash of lightning illuminates the dark skies, the sound of thunder fills the heart with fear.</p>', 'shotgear' )
            ]
        );
        $this->add_control(
            'about_btnlabel',
            [
                'label'         => esc_html__( 'Button Label', 'shotgear' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'read more', 'shotgear' )
            ]
        );
        $this->add_control(
            'about_btnurl',
            [
                'label'         => esc_html__( 'Button Url', 'shotgear' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false
            ]
        );
        
        $this->end_controls_section(); // End about content
        

        /**
         * Style Tab
         * ------------------------------ About Settings ------------------------------
         *
         */


        // Color Settings ==============================
        $this->start_controls_section(
            'color_sect', [
                'label' => __( 'Color Settings', 'shotgear' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_control(
			'sec_title_color', [
				'label'     => __( 'Section Title Color', 'shotgear' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_us .about_us_text h5' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'big_title_color', [
				'label'     => __( 'Big Title Color', 'shotgear' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_us .about_us_text h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'text_color', [
				'label'     => __( 'Text Color', 'shotgear' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_us .about_us_text p' => 'color: {{VALUE}};',
				],
			]
		);
        $this->end_controls_section();


        // Button Style ==============================
        $this->start_controls_section(
            'btn_styles', [
                'label' => __( 'Button Styles', 'shotgear' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'btn_bg_color', [
                'label'     => __( 'Button BG Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_us .about_us_text .btn_2' => 'background-color: {{VALUE}};border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_txt_color', [
                'label'     => __( 'Button Text Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_us .about_us_text .btn_2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_bg_color', [
                'label'     => __( 'Button Hover BG Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_us .about_us_text .btn_2:hover' => 'background-color: {{VALUE}};border-color: {{VALUE}} !important;',
                ],
            ]
        );
        
            
        $this->add_control(
            'btn_hover_txt_color', [
                'label'     => __( 'Button Hover Text Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_us .about_us_text .btn_2:hover' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {
        $settings     = $this->get_settings();
        $content      = !empty( $settings['content'] ) ? $settings['content'] : '';		
        $button_label = !empty( $settings['about_btnlabel'] ) ? $settings['about_btnlabel'] : '';
        $button_url   = !empty( $settings['about_btnurl']['url'] ) ? $settings['about_btnurl']['url'] : '';
        $dynamic_class = is_front_page() ? 'about_us padding_top' : 'about_us section_padding';
        ?>

    <!--::about_us part start::-->
    <section class="<?php echo esc_attr( $dynamic_class )?>">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-8">
                    <div class="about_us_text text-center">
                        <?php
                            //Right Content ==============
                            if( $content ){
                                echo wp_kses_post( wpautop( $content ) );
                            }

                            // Button =============
                            if( $button_label ){
                                echo '<a class="btn_2" href="'. esc_url( $button_url ) .'">'. esc_html( $button_label ) .'</a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::about_us part end::-->
    <?php

    }

}
