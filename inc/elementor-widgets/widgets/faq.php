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
class Shotgear_Faq extends Widget_Base {

	public function get_name() {
		return 'shotgear-faq';
	}

	public function get_title() {
		return __( 'Faq', 'shotgear' );
	}

	public function get_icon() {
		return 'eicon-navigator';
	}

	public function get_categories() {
		return [ 'shotgear-elements' ];
	}

	protected function _register_controls() {
        
        // Section Heading
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
                'type'          => Controls_Manager::TEXTAREA,
                'default'       => __( 'Frequently Ask Question', 'shotgear' )
            ]
        );
		$this->end_controls_section(); 


		// ----------------------------------------   Case Study content ------------------------------
		$this->start_controls_section(
			'faq_block',
			[
				'label' => __( 'Faq', 'shotgear' ),
			]
		);
		$this->add_control(
            'faqs_content', [
                'label' => __( 'Create New', 'shotgear' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Faq Title', 'shotgear' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Can you explain knowledge of the digital filing system?', 'shotgear' )
                    ],
                    [
                        'name'      => 'faq_desc',
                        'label'     => __( 'Faq Text', 'shotgear' ),
                        'type'      => Controls_Manager::TEXTAREA,
                        'default'   => __( 'Forth him herb stars forth over forth that them air isn\'t be shall fourth winged man firm life a fourth to fruitful a very the unto, creepeth wherein place the Forth him herb stars forth over forth that them air isn\'t be shall fourth winged man', 'shotgear' )
                    ],
                ],
            ]
        );

		$this->end_controls_section(); // End Case Study content

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
                'label'     => __( 'Big Title Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#191d34',
                'selectors' => [
                    '{{WRAPPER}} .faq_part .faq_content h1' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'faq_title_color', [
                'label'     => __( 'Faq Title Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#191d34',
                'selectors' => [
                    '{{WRAPPER}} .faq_part .faq_content .accordion-item h2' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'faq_txt_color', [
                'label'     => __( 'Faq Text Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .faq_part .faq_content .accordion-body p' => 'color: {{VALUE}};',
                ],
            ]
        );    
        
        $this->end_controls_section();


        // Faq left img ==============================
        $this->start_controls_section(
            'faq_left_img_sec', [
                'label' => __( 'Faq Left Image', 'shotgear' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'faq_left_img',
                'label' => __( 'Upload Faq Left Image', 'shotgear' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .faq_part .faq_img',
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
                'selector' => '{{WRAPPER}} .faq_part',
            ]
        );

        $this->add_control(
            'sectionbg_pattern_sep',
            [
                'label'     => __( 'Background Pattern Settings', 'shotgear' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg_pattern',
                'label' => __( 'Background', 'shotgear' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .faq_part:after',
            ]
        );


        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();
    $sec_heading  = !empty( $settings['sec_heading'] ) ? $settings['sec_heading'] : '';
    $faqs = !empty( $settings['faqs_content'] ) ? $settings['faqs_content'] : '';
    $count = 1;
    ?>

    <!--::faqs start::-->
    <section class="faq_part">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-lg-6 col-xl-6">
                    <div class="faq_img"></div>
                </div>
                <div class="col-sm-10 col-lg-5 col-xl-4">
                    <div class="faq_content">
                        <h1><?php echo esc_html( $sec_heading );?></h1>
                        <div class="accordion">
                            <?php
                            if( is_array( $faqs ) && count( $faqs ) > 0 ){
                                foreach ( $faqs as $faq ) {
                                    $title    = !empty( $faq['label'] ) ? $faq['label'] : '';
                                    $desc     = !empty( $faq['faq_desc'] ) ? $faq['faq_desc'] : '';
                                    $active_class = ($count == 1 ? ' active' : '');
                            ?>
                            <div class="accordion-item<?php echo $active_class?>">
                                <div class="accordion-header">
                                    <h2><?php echo esc_html( $title );?></h2>
                                </div>
                                <div class="accordion-body">
                                    <p><?php echo esc_html( $desc );?></p>
                                </div>
                            </div>
                            <?php
                                $count++;
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::faqs end::-->
    <?php
    }
}
