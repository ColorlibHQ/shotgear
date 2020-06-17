<?php
namespace Shotgearelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
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
 * elementor projects section widget.
 *
 * @since 1.0
 */
class Shotgear_Projects extends Widget_Base {

	public function get_name() {
		return 'shotgear-projects';
	}

	public function get_title() {
		return __( 'Recent Projects', 'shotgear' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'shotgear-elements' ];
	}

	protected function _register_controls() {

        $this->start_controls_section(
			'section_heading',
			[
				'label' => __( 'Section Heading', 'shotgear' ),
			]
        );
        
        $this->add_control(
            'sec_heading',
            [
                'label'         => esc_html__( 'Heading Text', 'shotgear' ),
                'type'          => Controls_Manager::WYSIWYG,
                'default'       => __( '<p>recent project</p><h2>Check latest work</h2>', 'shotgear' )
            ]
        );
		$this->end_controls_section(); 


        // ----------------------------------------  Projects Content ------------------------------
        $this->start_controls_section(
            'menu_tab_sec',
            [
                'label' => __( 'Projects', 'shotgear' ),
            ]
        );
		$this->add_control(
			'portfolio_number', [
				'label'         => esc_html__( 'Project Number', 'shotgear' ),
				'type'          => Controls_Manager::NUMBER,
				'max'           => 9,
				'min'           => 1,
				'step'          => 1,
				'default'       => 6

			]
		);

        $this->end_controls_section(); // End projects content

        //------------------------------ Color Settings ------------------------------
        $this->start_controls_section(
            'color_settings', [
                'label' => __( 'Color Settings', 'shotgear' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'sec_title_color', [
                'label'     => __( 'Section Title Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery_part .section_tittle p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sec_big_title_color', [
                'label'     => __( 'Section Big Title Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery_part .section_tittle h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'proj_styles_sep',
            [
                'label'     => __( 'Project Styles', 'shotgear' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'project_cat_color', [
                'label'     => __( 'Project Category text Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery_part .portfolio-filter ul li' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'project_cat_act_color', [
                'label'     => __( 'Project Category active text Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery_part .portfolio-filter ul li.active' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_control(
            'project_hov_bg_color', [
                'label'     => __( 'Project hover BG Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery_part .single_gallery_item .single_gallery_item_iner:after' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'project_hov_sub_color', [
                'label'     => __( 'Project hober Sub Title Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery_part .single_gallery_item .single_gallery_item_iner p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'project_hov_title_color', [
                'label'     => __( 'Project hober title Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery_part .single_gallery_item .single_gallery_item_iner h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {

    $settings       = $this->get_settings();
    $sec_heading    = !empty( $settings['sec_heading'] ) ? $settings['sec_heading'] : '';
    $pNumber        = $settings['portfolio_number'];
    ?>

    <section class="gallery_part section_padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5 offset-lg-2">
                    <div class="section_tittle">
                        <?php
                            //Section heading ==============
                            if( $sec_heading ){
                                echo wp_kses_post( wpautop( $sec_heading ) );
                            }
                        ?>
                    </div>
                </div>
            </div>
            <?php
                //Load Portfolios ==============
                shotgear_portfolio_section( $pNumber );
            ?>
        </div>
    </section>
    <?php

    }
}
