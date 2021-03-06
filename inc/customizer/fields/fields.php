<?php 
/**
 * @Packge     : Shotgear
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 * Customizer section fields
 *
 */

/***********************************
 * General Section Fields
 ***********************************/

 // Theme color field
Epsilon_Customizer::add_field(
    'shotgear_theme_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Theme Color', 'shotgear' ),
        'description' => esc_html__( 'Select the theme color.', 'shotgear' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'shotgear_general_section',
        'default'     => '#ff4800',
    )
);
 
// Header background color field
Epsilon_Customizer::add_field(
    'shotgear_header_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Sticky Header BG Color', 'shotgear' ),
        'description' => esc_html__( 'Select the header background color.', 'shotgear' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'shotgear_header_section',
        'default'     => '#ff4800',
    )
);

// Header nav menu color field
Epsilon_Customizer::add_field(
    'shotgear_header_menu_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu color', 'shotgear' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'shotgear_header_section',
        'default'     => '#1e2528',
    )
);

// Header nav menu hover color field
Epsilon_Customizer::add_field(
    'shotgear_header_menu_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu hover color', 'shotgear' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'shotgear_header_section',
        'default'     => '#000000',
    )
);

// Header dropdown menu bg color field
Epsilon_Customizer::add_field(
    'shotgear_header_drop_menu_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu BG color', 'shotgear' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'shotgear_header_section',
        'default'     => '#ff4800',
    )
);

// Header dropdown menu color field
Epsilon_Customizer::add_field(
    'shotgear_header_drop_menu_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu color', 'shotgear' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'shotgear_header_section',
        'default'     => '#ffffff',
    )
);

// Header dropdown menu hover color field
Epsilon_Customizer::add_field(
    'shotgear_header_drop_menu_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu hover color', 'shotgear' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'shotgear_header_section',
        'default'     => '#ffffff',
    )
);

/***********************************
 * Blog Section Fields
 ***********************************/
 
// Post excerpt length field
Epsilon_Customizer::add_field(
    'shotgear_excerpt_length',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Set post excerpt length', 'shotgear' ),
        'description' => esc_html__( 'Set post excerpt length.', 'shotgear' ),
        'section'     => 'shotgear_blog_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => '30',
    )
);

// Blog single page social share icon
Epsilon_Customizer::add_field(
    'shotgear_blog_meta',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog page post meta show/hide', 'shotgear' ),
        'section'     => 'shotgear_blog_section',
        'default'     => true
    )
);
Epsilon_Customizer::add_field(
    'shotgear_like_btn',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog Single Page Like Button show/hide', 'shotgear' ),
        'section'     => 'shotgear_blog_section',
        'default'     => true
    )
);
Epsilon_Customizer::add_field(
    'shotgear_blog_share',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog Single Page Share show/hide', 'shotgear' ),
        'section'     => 'shotgear_blog_section',
        'default'     => true
    )
);

/***********************************
 * 404 Page Section Fields
 ***********************************/

// 404 text #1 field
Epsilon_Customizer::add_field(
    'shotgear_fof_titleone',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #1', 'shotgear' ),
        'section'           => 'shotgear_fof_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Say Hello.'
    )
);
// 404 text #2 field
Epsilon_Customizer::add_field(
    'shotgear_fof_titletwo',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #2', 'shotgear' ),
        'section'           => 'shotgear_fof_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Say Hello.'
    )
);
// 404 text #1 color field
Epsilon_Customizer::add_field(
    'shotgear_fof_textone_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #1 Color', 'shotgear' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'shotgear_fof_section',
        'default'     => '#000000',
    )
);
// 404 text #2 color field
Epsilon_Customizer::add_field(
    'shotgear_fof_texttwo_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #2 Color', 'shotgear' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'shotgear_fof_section',
        'default'     => '#656565',
    )
);
// 404 background color field
Epsilon_Customizer::add_field(
    'shotgear_fof_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Page Background Color', 'shotgear' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'shotgear_fof_section',
        'default'     => '#fff',
    )
);

/***********************************
 * Footer Section Fields
 ***********************************/

// Footer Widget section
Epsilon_Customizer::add_field(
    'footer_widget_separator',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Footer Widget Section', 'shotgear' ),
        'section'     => 'shotgear_footer_section',

    )
);

// Footer widget toggle field
Epsilon_Customizer::add_field(
    'shotgear_footer_widget_toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Footer widget show/hide', 'shotgear' ),
        'description' => esc_html__( 'Toggle to display footer widgets.', 'shotgear' ),
        'section'     => 'shotgear_footer_section',
        'default'     => true,
    )
);

// Footer Copyright section
Epsilon_Customizer::add_field(
    'shotgear_footer_copyright_separator',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Footer Copyright Section', 'shotgear' ),
        'section'     => 'shotgear_footer_section',
        'default'     => true,

    )
);

// Footer copyright text field
// Copy right text
$url = 'https://colorlib.com/';
$copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'shotgear' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );
Epsilon_Customizer::add_field(
    'shotgear_footer_copyright_text',
    array(
        'type'        => 'epsilon-text-editor',
        'label'       => esc_html__( 'Footer copyright text', 'shotgear' ),
        'section'     => 'shotgear_footer_section',
        'default'     => wp_kses_post( $copyText ),
    )
);

// Footer widget background color field
Epsilon_Customizer::add_field(
    'shotgear_footer_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Background Color', 'shotgear' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'shotgear_footer_section',
        'default'     => '#1e2528',
    )
);

// Footer widget text color field
Epsilon_Customizer::add_field(
    'shotgear_footer_widget_text_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Text Color', 'shotgear' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'shotgear_footer_section',
        'default'     => '#999999',
    )
);

// Footer widget title color field
Epsilon_Customizer::add_field(
    'shotgear_footer_widget_title_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Title Color', 'shotgear' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'shotgear_footer_section',
        'default'     => '#ffffff',
    )
);

// Footer widget anchor color field
Epsilon_Customizer::add_field(
    'shotgear_footer_widget_anchor_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Anchor Color', 'shotgear' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'shotgear_footer_section',
        'default'     => '#999999',
    )
);

// Footer widget anchor hover color field
Epsilon_Customizer::add_field(
    'shotgear_footer_widget_anchor_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Anchor Hover Color', 'shotgear' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'shotgear_footer_section',
        'default'     => '#ff4800',
    )
);

