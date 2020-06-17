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
 * Shotgear elementor simple pricing section widget.
 *
 * @since 1.0
 */
class Shotgear_Simple_Pricing extends Widget_Base {

	public function get_name() {
		return 'shotgear-simple-pricing';
	}

	public function get_title() {
		return __( 'Price Table', 'shotgear' );
	}

	public function get_icon() {
		return 'eicon-price-table';
	}

	public function get_categories() {
		return [ 'shotgear-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Simple Pricing Section ------------------------------
        $this->start_controls_section(
            'pricing_heading',
            [
                'label' => __( 'Pricing Heading', 'shotgear' ),
            ]
        );
        $this->add_control(
            'pricing_header',
            [
                'label'         => esc_html__( 'Pricing Table Header', 'shotgear' ),
                'description'   => esc_html__('Use <br> tag for line break', 'shotgear'),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<p>Price table</p><h2>pricing plan</h2>', 'shotgear' )
            ]
        );
        $this->add_control(
            'pricing_contents', [
                'label' => __( 'Create New', 'shotgear' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ title }}}',
                'fields' => [
                    [
                        'name'      => 'pricing_img',
                        'label'     => __( 'Pricing Image', 'shotgear' ),
                        'type'      => Controls_Manager::MEDIA,
                    ],
                    [
                        'name'  => 'title',
                        'label' => __( 'Package Name', 'shotgear' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Standard', 'shotgear' )
                    ],
                    [
                        'name'  => 'currency_symbol',
                        'label' => __( 'Currency Symbol', 'shotgear' ),
                        'type'  => Controls_Manager::SELECT,
                        'label_block' => true,
                        'default' => 'usd',
                        'options'   => [
                            'usd'  => '$',
                            'eur'  => '€',
                            'yuan' => '¥',
                        ]
                    ],
                    [
                        'name'  => 'price',
                        'label' => __( 'Package Price', 'shotgear' ),
                        'type'  => Controls_Manager::NUMBER,
                        'label_block' => true,
                        'default' => 50
                    ],
                    [
                        'name'  => 'period',
                        'label' => __( 'Package Period', 'shotgear' ),
                        'type'  => Controls_Manager::SWITCHER,
                        'label_block'   => false,
                        'label_on'      => 'Monthly',
                        'label_off'     => 'Yearly',
                        'default'       => 'yes',
                        'options'       => [
                            'yes'       => 'Monthly',
                            'no'        => 'Yearly'
                        ]
                    ],
                    [
                        'name'  => 'bandwidth',
                        'label' => __( 'Bandwidth', 'shotgear' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( '2GB Bandwidth', 'shotgear' )
                    ],
                    [
                        'name'  => 'account',
                        'label' => __( 'Account', 'shotgear' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Two Accounts', 'shotgear' )
                    ],
                    [
                        'name'  => 'storage',
                        'label' => __( 'Storage', 'shotgear' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( '15GB Storage', 'shotgear' )
                    ],
                    [
                        'name'  => 'sale_service',
                        'label' => __( 'Sale Service', 'shotgear' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Sale After Service', 'shotgear' )
                    ],
                    [
                        'name'  => 'domain',
                        'label' => __( 'Domain', 'shotgear' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( '3 Host Domain', 'shotgear' )
                    ],
                    [
                        'name'  => 'support',
                        'label' => __( 'Support', 'shotgear' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( '24/7 Support', 'shotgear' )
                    ],
                    [
                        'name'  => 'btn_label',
                        'label' => __( 'Button Label', 'shotgear' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Book Now', 'shotgear' )
                    ],
                    [
                        'name'  => 'btn_url',
                        'label' => __( 'Button URL', 'shotgear' ),
                        'type'  => Controls_Manager::URL,
                        'label_block' => true,
                        'default' => [
                            'url' => '#'
                        ]
                    ],
                ],
                'default'   => [
                    [
                        'pricing_img' => [
                            'url' => Utils::get_placeholder_image_src()
                        ],
                        'title' => __( 'Standard', 'shotgear' ),
                        'currency_symbol' => 'usd',
                        'price' => 50,
                        'period' => 'yes',
                        'bandwidth' => __( '2GB Bandwidth', 'shotgear' ),
                        'account' => __( 'Two Accounts', 'shotgear' ),
                        'storage' => __( '15GB Storage', 'shotgear' ),
                        'sale_service' => __( 'Sale After Service', 'shotgear' ),
                        'domain' => __( '3 Host Domain', 'shotgear' ),
                        'support' => __( '24/7 Support', 'shotgear' ),
                        'btn_label' => __( 'Book Now', 'shotgear' ),
                        'btn_url' => [
                            'url' => '#'
                        ]
                    ],
                    [
                        'pricing_img' => [
                            'url' => Utils::get_placeholder_image_src()
                        ],
                        'title' => __( 'Standard', 'shotgear' ),
                        'currency_symbol' => 'usd',
                        'price' => 50,
                        'period' => 'yes',
                        'bandwidth' => __( '2GB Bandwidth', 'shotgear' ),
                        'account' => __( 'Two Accounts', 'shotgear' ),
                        'storage' => __( '15GB Storage', 'shotgear' ),
                        'sale_service' => __( 'Sale After Service', 'shotgear' ),
                        'domain' => __( '3 Host Domain', 'shotgear' ),
                        'support' => __( '24/7 Support', 'shotgear' ),
                        'btn_label' => __( 'Book Now', 'shotgear' ),
                        'btn_url' => [
                            'url' => '#'
                        ]
                    ],
                    [
                        'pricing_img' => [
                            'url' => Utils::get_placeholder_image_src()
                        ],
                        'title' => __( 'Standard', 'shotgear' ),
                        'currency_symbol' => 'usd',
                        'price' => 50,
                        'period' => 'yes',
                        'bandwidth' => __( '2GB Bandwidth', 'shotgear' ),
                        'account' => __( 'Two Accounts', 'shotgear' ),
                        'storage' => __( '15GB Storage', 'shotgear' ),
                        'sale_service' => __( 'Sale After Service', 'shotgear' ),
                        'domain' => __( '3 Host Domain', 'shotgear' ),
                        'support' => __( '24/7 Support', 'shotgear' ),
                        'btn_label' => __( 'Book Now', 'shotgear' ),
                        'btn_url' => [
                            'url' => '#'
                        ]
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
                'label' => __( 'Style Heading', 'shotgear' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_sub_ttitle', [
                'label'     => __( 'Sub Title Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_part .section_tittle p' => 'color: {{VALUE}};',
                ],
            ]
        );   
        $this->add_control(
            'color_sec_ttitle', [
                'label'     => __( 'Big Title Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_part .section_tittle h2' => 'color: {{VALUE}};',
                ],
            ]
        );    
        
        $this->end_controls_section();
        

        // Single Simple Pricing Color Settings ==============================
        $this->start_controls_section(
            'single_serv_color_sett', [
                'label' => __( 'Single Pricing Color Settings', 'shotgear' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
   
        $this->add_control(
            'plan_title_color', [
                'label'     => __( 'Plan Title Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_part .single_pricing_part p' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'plan_price_color', [
                'label'     => __( 'Plan Price Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_part .single_pricing_part h3' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'plan_period_color', [
                'label'     => __( 'Plan Period Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_part .single_pricing_part h3 span' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'plan_list_color', [
                'label'     => __( 'Pricing List Item Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_part .single_pricing_part ul li' => 'color: {{VALUE}};',
                ],
            ]
        );    
        
        $this->add_control(
            'button_styles_separator',
            [
                'label'     => __( 'Button Styles', 'shotgear' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        ); 
        $this->add_control(
            'btn_txt_color', [
                'label'     => __( 'Button Text Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_part .single_pricing_part .pricing_content .btn_2' => 'color: {{VALUE}};',
                ],
            ]
        );  
        $this->add_control(
            'btn_bg_color', [
                'label'     => __( 'Button BG Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_part .single_pricing_part .pricing_content .btn_2' => 'background: {{VALUE}}; border-color: {{VALUE}}',
                ],
            ]
        );  
        $this->add_control(
            'button_hvr_styles_separator',
            [
                'label'     => __( 'Button Hover Styles', 'shotgear' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        ); 
        $this->add_control(
            'btn_hvr_txt_color', [
                'label'     => __( 'Button Hover Text Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_part .single_pricing_part .pricing_content .btn_2:hover' => 'color: {{VALUE}} !important;',
                ],
            ]
        );  
        $this->add_control(
            'btn_hvr_bg_color', [
                'label'     => __( 'Button Hover BG Color', 'shotgear' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_part .single_pricing_part .pricing_content .btn_2:hover' => 'background: {{VALUE}}; border-color: {{VALUE}}',
                ],
            ]
        );  

        $this->end_controls_section();

    }
    
    public function single_pricing_table( $pricing_img, $title, $currency_symbol, $price, $period, $bandwidth, $account, $storage, $sale_service, $domain, $support, $btn_label, $btn_url ){ ?>
        <div class="col-lg-4 col-sm-6">
            <div class="single_pricing_part">
                <div class="pricing_tittle">
                    <?php
                        if( $pricing_img ){
                            echo wp_kses_post( $pricing_img );
                        }

                        echo '<p>'.esc_html( $title ).'</p>';
                    ?>
                </div>
                <div class="pricing_content">
                <?php
                    if ($currency_symbol == 'usd') {
                        $currency_symbol = '$';
                    }
                    elseif ($currency_symbol == 'eur') {
                        $currency_symbol = '€';
                    }
                    elseif ($currency_symbol == 'yuan') {
                        $currency_symbol = '¥';
                    }

                    if ($period == 'yes') {
                        $period = __('mo', 'shotgear');
                    } else {
                        $period = __('yr', 'shotgear');
                    }
                    
                    echo '<h3>' .esc_html( $currency_symbol ) . esc_html( $price ) . ' <span>/ '. esc_html( $period ) . '</span></h3>';
                    echo '<ul>';
                        echo '<li>' .esc_html( $bandwidth ) . '</li>';
                        echo '<li>' .esc_html( $account ) . '</li>';
                        echo '<li>' .esc_html( $storage ) . '</li>';
                        echo '<li>' .esc_html( $sale_service ) . '</li>';
                        echo '<li>' .esc_html( $domain ) . '</li>';
                        echo '<li>' .esc_html( $support ) . '</li>';
                    echo '</ul>';

                    // Button =============
                    if( $btn_label ){
                        echo "<a href='". esc_url($btn_url) . "' class='btn_2'>".esc_html( $btn_label )."</a>";
                    }
                ?>
                </div>
            </div>
        </div>
    <?php
    }

	protected function render() {

    $settings = $this->get_settings();
    $pricing_header = !empty( $settings['pricing_header'] ) ? $settings['pricing_header'] : '';
    $pricing_contents = !empty( $settings['pricing_contents'] ) ? $settings['pricing_contents'] : '';
    $dynamic_class = is_front_page() ? 'pricing_part section_padding home_page_pricing' : 'pricing_part section_padding';

    ?>

    <!--::pricing part start::-->
    <section class="<?php echo esc_attr( $dynamic_class )?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section_tittle">
                        <?php
                            // Simple Pricing Header =============
                            if( $pricing_header ){
                                echo wp_kses_post( wpautop( $pricing_header ) );
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php
                if( is_array( $pricing_contents ) && count( $pricing_contents ) > 0 ){
                    foreach ( $pricing_contents as $item ) {
                        $pricing_img = !empty( $item['pricing_img']['id'] ) ? wp_get_attachment_image($item['pricing_img']['id'], 'shotgear_pricing_img_83x75', false, ['alt' => 'pricing image']) : '';
                        $title = !empty( $item['title'] ) ? $item['title'] : '';
                        $currency_symbol = !empty( $item['currency_symbol'] ) ? $item['currency_symbol'] : '';
                        $price = !empty( $item['price'] ) ? $item['price'] : '';
                        $period = !empty( $item['period'] ) ? $item['period'] : '';
                        $bandwidth = !empty( $item['bandwidth'] ) ? $item['bandwidth'] : '';
                        $account = !empty( $item['account'] ) ? $item['account'] : '';
                        $storage = !empty( $item['storage'] ) ? $item['storage'] : '';
                        $sale_service = !empty( $item['sale_service'] ) ? $item['sale_service'] : '';
                        $domain = !empty( $item['domain'] ) ? $item['domain'] : '';
                        $support = !empty( $item['support'] ) ? $item['support'] : '';
                        $btn_label = !empty( $item['btn_label'] ) ? $item['btn_label'] : '';
                        $btn_url = !empty( $item['btn_url']['url'] ) ? $item['btn_url']['url'] : '';
                        
                        $this->single_pricing_table( $pricing_img, $title, $currency_symbol, $price, $period, $bandwidth, $account, $storage, $sale_service, $domain, $support, $btn_label, $btn_url );
                    }
                }
                ?>     
            </div>
        </div>
    </section>
    <?php
    }
}
