<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package
 */

    $url = 'https://colorlib.com/';
    $copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'shotgear' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );
    $copyRight = !empty( shotgear_opt( 'shotgear_footer_copyright_text' ) ) ? shotgear_opt( 'shotgear_footer_copyright_text' ) : $copyText;
    $footer_class = shotgear_opt( 'shotgear_footer_widget_toggle' ) == 1 ? 'footer-area' : 'footer-area no-widget';

    ?>
    

    <!-- footer part start-->
    
    <footer class="<?php echo esc_attr( $footer_class )?>">
        <?php
            if( shotgear_opt( 'shotgear_footer_widget_toggle' ) == 1 ) {
        ?>
        <div class="container">
            <div class="row justify-content-between">
                <?php
                    // Footer Widget 1
                    if ( is_active_sidebar( 'footer-1' ) ) {
                        dynamic_sidebar( 'footer-1' );
                    }

                    // Footer Widget 2
                    if ( is_active_sidebar( 'footer-2' ) ) {
                        dynamic_sidebar( 'footer-2' );
                    }

                    // Footer Widget 3
                    if ( is_active_sidebar( 'footer-3' ) ) {
                        dynamic_sidebar( 'footer-3' );
                    }

                    // Footer Widget 4
                    if ( is_active_sidebar( 'footer-4' ) ) {
                        echo '<div class="col-sm-6 col-md-6 col-lg-3">';
                            dynamic_sidebar( 'footer-4' );
                        echo '</div>';
                    }
                ?>
            </div>
        </div>
        <?php
            } 
        ?>

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="copyright_part_text text-center">
                        <p class="footer-text m-0"><?php echo wp_kses_post( $copyRight ); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
    </body>
</html>