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
class Shotgear_Intro_Video extends Widget_Base {

	public function get_name() {
		return 'shotgear-intro-video';
	}

	public function get_title() {
		return __( 'Intro Video', 'shotgear' );
	}

	public function get_icon() {
		return 'eicon-thumbnails-half';
	}

	public function get_categories() {
		return [ 'shotgear-elements' ];
	}

	protected function _register_controls() {

        
		// ----------------------------------------  Intro Video content ------------------------------
		$this->start_controls_section(
			'intro_video_content',
			[
				'label' => __( 'Intro Video Section', 'shotgear' ),
			]
		);

        $this->add_control(
            'intro_video_title',
            [
                'label'         => esc_html__( 'Intro Video Title', 'shotgear' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Our project video', 'shotgear' )
            ]
        );
        $this->add_control(
            'intro_video_url',
            [
                'label'         => esc_html__( 'Intro Video Url', 'shotgear' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false
            ]
        );
        
        $this->end_controls_section(); // End intro-video content
        

        /**
         * Style Tab
         * ------------------------------ Intro Video Settings ------------------------------
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
			'sub_title_color', [
				'label'     => __( 'Title Color', 'shotgear' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .intro_video_bg h2' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'play_btn_color', [
				'label'     => __( 'Play Button Color', 'shotgear' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .intro_video_bg .ti-control-play:before' => 'color: {{VALUE}};',
				],
			]
        );
        
		$this->add_control(
			'bg_overlay_col', [
				'label'     => __( 'BG Overlay Color', 'shotgear' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .intro_video_bg:after' => 'background-color: {{VALUE}};',
				],
			]
		);
        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Background Style ------------------------------
         *
         */
        $this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'shotgear' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'section_bgheading',
            [
                'label'     => __( 'Background Settings', 'shotgear' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'shotgear' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .intro_video_bg',
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {
        $settings     = $this->get_settings();	
        $intro_video_title = !empty( $settings['intro_video_title'] ) ? $settings['intro_video_title'] : '';
        $intro_video_url   = !empty( $settings['intro_video_url']['url'] ) ? $settings['intro_video_url']['url'] : '';
        ?>


        <!-- intro_video_bg start-->
        <section class="intro_video_bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="intro_video_iner text-center">
                            <h2><?php echo esc_html( $intro_video_title )?></h2>
                            <div class="intro_video_icon">
                                <a id="play-video_1" class="video-play-button popup-youtube"
                                    href="<?php echo esc_html( $intro_video_url )?>">
                                    <span class="ti-control-play"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- intro_video_bg part start-->
    <?php

    }

}
