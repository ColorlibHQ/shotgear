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
 * Shotgear elementor reviews section widget.
 *
 * @since 1.0
 */
class Shotgear_Reviews extends Widget_Base {

	public function get_name() {
		return 'shotgear-reviews';
	}

	public function get_title() {
		return __( 'Testimonials', 'shotgear' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'shotgear-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Review Section ------------------------------
        $this->start_controls_section(
            'review_heading',
            [
                'label' => __( 'Testimonial Heading', 'shotgear' ),
            ]
        );
        $this->add_control(
            'rev_img',
            [
                'label'         => esc_html__( 'Upload Image', 'shotgear' ),
                'type'          => Controls_Manager::MEDIA,
                'show_external' => false,
                'default'       => [
                    'url'       => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'rev_items_sep',
            [
                'label'         => esc_html__( 'Reviews', 'shotgear' ),
                'type'          => Controls_Manager::HEADING,
                'separator'     => 'after'
            ]
        );
        $this->add_control(
            'reviews_content', [
                'label' => __( 'Create New', 'shotgear' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'rev_txt',
                        'label' => __( 'Testimonial Content', 'shotgear' ),
                        'type'  => Controls_Manager::WYSIWYG,
                        'default' => __( '<h5>Testimnonials</h5><h2>With efficiency to unlock more opportunities</h2><p>Saw shall light. Us their to place had creepeth day night great wher appear to. Hath, called, sea called, gathering wherein open make living Female itself gathering man. Waters and, two. Bearing. Saw she\'d all let she\'d lights abundantly blessed.</p>', 'shotgear' )
                    ],
                    [
                        'name'  => 'label',
                        'label' => __( 'Name', 'shotgear' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Mitchel Jeferson', 'shotgear' )
                    ],
                    [
                        'name'      => 'desg',
                        'label'     => __( 'Designation', 'shotgear' ),
                        'type'      => Controls_Manager::TEXT,
                        'default'   => __( 'CEO of softking', 'shotgear' )
                    ],
                ],
                'default' => [
                    [
                        'rev_txt'   => __( '<h5>Testimnonials</h5><h2>With efficiency to unlock more opportunities</h2><p>Saw shall light. Us their to place had creepeth day night great wher appear to. Hath, called, sea called, gathering wherein open make living Female itself gathering man. Waters and, two. Bearing. Saw she\'d all let she\'d lights abundantly blessed.</p>', 'shotgear' ),
                        'label'     => __( 'Mitchel Jeferson', 'shotgear' ),
                        'desg'      => __( 'CEO of softking', 'shotgear' ),
                    ],
                    [
                        'rev_txt'   => __( '<h5>Testimnonials</h5><h2>With efficiency to unlock more opportunities</h2><p>Saw shall light. Us their to place had creepeth day night great wher appear to. Hath, called, sea called, gathering wherein open make living Female itself gathering man. Waters and, two. Bearing. Saw she\'d all let she\'d lights abundantly blessed.</p>', 'shotgear' ),
                        'label'     => __( 'Mitchel Jeferson', 'shotgear' ),
                        'desg'      => __( 'CEO of softking', 'shotgear' ),
                    ],
                    [
                        'rev_txt'   => __( '<h5>Testimnonials</h5><h2>With efficiency to unlock more opportunities</h2><p>Saw shall light. Us their to place had creepeth day night great wher appear to. Hath, called, sea called, gathering wherein open make living Female itself gathering man. Waters and, two. Bearing. Saw she\'d all let she\'d lights abundantly blessed.</p>', 'shotgear' ),
                        'label'     => __( 'Mitchel Jeferson', 'shotgear' ),
                        'desg'      => __( 'CEO of softking', 'shotgear' ),
                    ],
                ]
            ]
        );

        $this->end_controls_section(); // End section top content
        

        /**
         * Style Tab
         * ------------------------------ Style Tab Content ------------------------------
         *
         */

        // Heading Style ==============================
        $this->start_controls_section(
            'color_sect', [
                'label' => __( 'Style Review Heading', 'shotgear' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_sub_ttitle', [
                'label'     => __( 'Section Sub Title Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .review_part .review_part_text h5' => 'color: {{VALUE}};',
                ],
            ]
        );  
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Section Title Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .review_part .review_part_text h2' => 'color: {{VALUE}};',
                ],
            ]
        );  
        $this->add_control(
            'color_sec_txt', [
                'label'     => __( 'Section Text Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .review_part .review_part_text p' => 'color: {{VALUE}};',
                ],
            ]
        );  
        $this->add_control(
            'color_rev_name_txt', [
                'label'     => __( 'Reviewer Name Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .review_part .review_part_text h3' => 'color: {{VALUE}};',
                ],
            ]
        );  
        $this->add_control(
            'color_rev_des_txt', [
                'label'     => __( 'Reviewer Designation Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .review_part .review_part_text h3 span' => 'color: {{VALUE}};',
                ],
            ]
        );  
        $this->add_control(
            'rev_dot_col', [
                'label'     => __( 'Review Dot Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .review_part .owl-dots button.owl-dot' => 'background-color: {{VALUE}};',
                ],
            ]
        );  
        $this->add_control(
            'rev_dot_active_col', [
                'label'     => __( 'Review Dot Active Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .review_part .owl-dots button.owl-dot.active' => 'background-color: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .review_part',
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {

    // call load widget script
    $this->load_widget_script();
                
    $settings = $this->get_settings();
    $rev_img      = !empty( $settings['rev_img']['id'] ) ? wp_get_attachment_image( $settings['rev_img']['id'], 'shotgear_review_img_457x500', false, array( 'alt' => 'review image' ) ) : '';
    $reviews = !empty( $settings['reviews_content'] ) ? $settings['reviews_content'] : '';
    $dynamic_class = ! is_front_page() ? ' single_attorneys' : '';
    $dynamic_class = is_front_page() ? 'review_part' : 'review_part section_padding';
    ?>

    <!--::review_part part start::-->
    <section class="<?php echo esc_attr( $dynamic_class )?>">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-5">
                    <div class="review_img">
                        <?php
                            if( $rev_img ){
                                echo wp_kses_post( $rev_img );
                            }
                        ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="review_slider owl-carousel">
                        <?php
                        if( is_array( $reviews ) && count( $reviews ) > 0 ){
                            foreach ( $reviews as $review ) {
                                $rev_txt    = !empty( $review['rev_txt'] ) ? $review['rev_txt'] : '';
                                $name       = !empty( $review['label'] ) ? $review['label'] : '';
                                $desig      = !empty( $review['desg'] ) ? $review['desg'] : '';
                                ?>
                                <div class="review_part_text">
                                    <?php
                                        if( $rev_txt ){
                                            echo wp_kses_post( wpautop($rev_txt) );
                                        }

                                        echo '<h3>'.esc_html($name).', <span>'.esc_html($desig).'</span> </h3>';
                                    ?>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--::review_part part end::-->
    <?php
    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            var review = $('.review_slider');
            if (review.length) {
                review.owlCarousel({
                items: 1,
                loop: true,
                dots: true,
                autoplay: false,
                autoplayHoverPause: true,
                autoplayTimeout: 5000,
                nav: false,
                });
            }
        })(jQuery);
        </script>
        <?php 
        }
    }
}
