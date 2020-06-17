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
 * Shotgear elementor Team Member section widget.
 *
 * @since 1.0
 */
class Shotgear_Industries extends Widget_Base {

	public function get_name() {
		return 'shotgear-industries';
	}

	public function get_title() {
		return __( 'Industries', 'shotgear' );
	}

	public function get_icon() {
		return 'eicon-sitemap';
	}

	public function get_categories() {
		return [ 'shotgear-elements' ];
	}

	protected function _register_controls() {
        
		// ----------------------------------------   Industries content ------------------------------
		$this->start_controls_section(
			'industries_block',
			[
				'label' => __( 'Industries', 'shotgear' ),
			]
        );
        
        $this->add_control(
            'sec_heading',
            [
                'label'         => esc_html__( 'Section Title', 'shotgear' ),
                'type'          => Controls_Manager::TEXTAREA,
                'description'   => esc_html__('Use <br> tag for line break', 'shotgear'),
                'default'       => __( 'Our Industries Served', 'shotgear' )
            ]
        );

		$this->add_control(
            'industries_content', [
                'label' => __( 'Create New', 'shotgear' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ ind_title }}}',
                'fields' => [
                    [
                        'name'  => 'ind_img',
                        'label' => __( 'Industry Image', 'shotgear' ),
                        'type'  => Controls_Manager::MEDIA,
                    ],
                    [
                        'name'  => 'ind_title',
                        'label' => __( 'Title', 'shotgear' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Mechanical Engineering', 'shotgear' )
                    ],
                    [
                        'name'      => 'title_url',
                        'label'     => __( 'Title URL', 'shotgear' ),
                        'type'      => Controls_Manager::URL,
                        'show_external' => false,
                        'default'   => [
                            'url'   => '#',
                        ]
                    ],
                    [
                        'name'      => 'ind_text',
                        'label'     => __( 'Industry Text', 'shotgear' ),
                        'type'      => Controls_Manager::TEXTAREA,
                        'default'   => __( 'Set sea kind own creeping a subdue creature signs lights reserved down said joker maid', 'shotgear' )
                    ],
                ],
            ]
        );

		$this->end_controls_section(); // End Practice Areas content

        /**
         * Style Tab
         * ------------------------------ Style Tab Content ------------------------------
         *
         */

        // Heading Style ==============================
        $this->start_controls_section(
            'color_sect', [
                'label' => __( 'Style Heading', 'shotgear' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Section Title Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#191d34',
                'selectors' => [
                    '{{WRAPPER}} .our_industries .section_tittle h2' => 'color: {{VALUE}};',
                ],
            ]
        ); 
        
        $this->end_controls_section();

        // Single Item Color Settings ==============================
        $this->start_controls_section(
            'single_ind_color_sett', [
                'label' => __( 'Single Industry Color Settings', 'shotgear' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'ind_color', [
                'label'     => __( 'Industry Title Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#191d34',
                'selectors' => [
                    '{{WRAPPER}} .our_industries .single_industries h3 a' => 'color: {{VALUE}};',
                ],
            ]
        );   

        $this->add_control(
            'ind_hov_color', [
                'label'     => __( 'Industry Title Hover Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fe5c24',
                'selectors' => [
                    '{{WRAPPER}} .our_industries .single_industries h3 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );   

        $this->add_control(
            'ind_text_color', [
                'label'     => __( 'Industry Text Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .our_industries .single_industries p' => 'color: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .our_industries',
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {

    $settings     = $this->get_settings();
    $sec_heading  = !empty( $settings['sec_heading'] ) ? $settings['sec_heading'] : '';
    $industries    = !empty( $settings['industries_content'] ) ? $settings['industries_content'] : '';
    ?>

    <!--::industries start::-->
    <section class="our_industries padding_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-3">
                    <div class="section_tittle">
                        <h2><?php echo esc_html( $sec_heading );?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                if( is_array( $industries ) && count( $industries ) > 0 ){
                    foreach ( $industries as $industry ) {
                        $ind_img     = !empty( $industry['ind_img']['id'] ) ? wp_get_attachment_image( $industry['ind_img']['id'], 'shotgear_our_industries_360x440', false, array( 'alt' => $industry['ind_title'] ) ) : '';
                        $industry_title = !empty( $industry['ind_title'] ) ? $industry['ind_title'] : '';
                        $industry_url = !empty( $industry['title_url']['url'] ) ? $industry['title_url']['url'] : '';
                        $industry_desc  = !empty( $industry['ind_text'] ) ? $industry['ind_text'] : '';
                ?>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_industries">
                        <?php
                            if( $ind_img ){
                                echo wp_kses_post( $ind_img );
                            }
                        ?>
                        <h3> <a href="<?php echo esc_url( $industry_url )?>"> <?php echo esc_html( $industry_title );?></a></h3>
                        <p><?php echo esc_html( $industry_desc );?></p>
                    </div>
                </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <!--::industries end::-->
    <?php
    }
}
