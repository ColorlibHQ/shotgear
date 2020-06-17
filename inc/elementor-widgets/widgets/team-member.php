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
class Shotgear_Team_Member extends Widget_Base {

	public function get_name() {
		return 'shotgear-team-member';
	}

	public function get_title() {
		return __( 'Team Member', 'shotgear' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'shotgear-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Team Section ------------------------------
        $this->start_controls_section(
            'team_heading',
            [
                'label' => __( 'Team Heading', 'shotgear' ),
            ]
        );
        $this->add_control(
            'team_header',
            [
                'label'         => esc_html__( 'Team Header', 'shotgear' ),
                'description'   => esc_html__('Use <br> tag for line break', 'shotgear'),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'default'       => __( 'Meet Experienced Professional', 'shotgear' )
            ]
        );

        $this->end_controls_section(); // End section top content
        
		// ----------------------------------------   Teams content ------------------------------
		$this->start_controls_section(
			'teams_block',
			[
				'label' => __( 'Teams', 'shotgear' ),
			]
		);
		$this->add_control(
            'teams_content', [
                'label' => __( 'Create Team', 'shotgear' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'image',
                        'label' => __( 'Member Image', 'shotgear' ),
                        'type'  => Controls_Manager::MEDIA,
                    ],
                    [
                        'name'  => 'label',
                        'label' => __( 'Name', 'shotgear' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Andrew Flentop', 'shotgear' )
                    ],
                    [
                        'name'      => 'desg',
                        'label'     => __( 'Designation', 'shotgear' ),
                        'type'      => Controls_Manager::TEXT,
                        'default'   => __( 'System Engineer', 'shotgear' )
                    ],
                    [
                        'name'      => 'fb',
                        'label'     => __( 'Facebook URL', 'shotgear' ),
                        'type'      => Controls_Manager::URL,
                        'show_external' => false,
                        'default'   => [
                            'url'   => '#',
                        ]
                    ],
                    [
                        'name'      => 'tw',
                        'label'     => __( 'Twitter URL', 'shotgear' ),
                        'type'      => Controls_Manager::URL,
                        'show_external' => false,
                        'default'   => [
                            'url'   => '#',
                        ]
                    ],
                    [
                        'name'      => 'skp',
                        'label'     => __( 'Skype URL', 'shotgear' ),
                        'type'      => Controls_Manager::URL,
                        'show_external' => false,
                        'default'   => [
                            'url'   => '#',
                        ]
                    ],
                    [
                        'name'      => 'ins',
                        'label'     => __( 'Instagram URL', 'shotgear' ),
                        'type'      => Controls_Manager::URL,
                        'show_external' => false,
                        'default'   => [
                            'url'   => '#',
                        ]
                    ],
                ],
            ]
        );

		$this->end_controls_section(); // End Teams content

        /**
         * Style Tab
         * ------------------------------ Style Tab Content ------------------------------
         *
         */

        // Heading Style ==============================
        $this->start_controls_section(
            'color_sect', [
                'label' => __( 'Style Team Heading', 'shotgear' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Section Title Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .our_Professional .section_tittle h2' => 'color: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .our_Professional',
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();
    $team_header = !empty( $settings['team_header'] ) ? $settings['team_header'] : '';
    $teams = !empty( $settings['teams_content'] ) ? $settings['teams_content'] : '';
    $dynamic_class = ! is_front_page() ? ' single_attorneys' : '';
    ?>

    <!--::team_part start::-->
    <section class="our_Professional padding_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <div class="section_tittle">
                        <h2><?php echo esc_html( $team_header );?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                if( is_array( $teams ) && count( $teams ) > 0 ){
                    foreach ( $teams as $team ) {
                        $team_img   = !empty( $team['image']['id'] ) ? wp_get_attachment_image( $team['image']['id'], 'shotgear_team_img_263x320', false, array( 'alt' => $team['label'] ) ) : '';
                        $name       = !empty( $team['label'] ) ? $team['label'] : '';
                        $desig      = !empty( $team['desg'] ) ? $team['desg'] : '';
                        $fb         = !empty( $team['fb']['url'] ) ? $team['fb']['url'] : '';
                        $tw         = !empty( $team['tw']['url'] ) ? $team['tw']['url'] : '';
                        $skp        = !empty( $team['skp']['url'] ) ? $team['skp']['url'] : '';
                        $ins        = !empty( $team['ins']['url'] ) ? $team['ins']['url'] : '';
                ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_industries">
                        <?php
                            if( $team_img ){
                                echo wp_kses_post( $team_img );
                            }
                        ?>
                        <div class="single_industries_text">
                            <h3><?php echo esc_html( $name );?></h3>
                            <p><?php echo esc_html( $desig );?></p>
                            <div class="social_icon">
                                <a href="<?php echo esc_url( $fb );?>"><i class="flaticon-facebook"></i></a>
                                <a href="<?php echo esc_url( $tw );?>"><i class="flaticon-twitter"></i></a>
                                <a href="<?php echo esc_url( $skp );?>"><i class="flaticon-skype"></i></span> </a>
                                <a href="<?php echo esc_url( $ins );?>"><i class="flaticon-instagram"></i></span> </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <!--::team_part end::-->
    <?php
    }
}
