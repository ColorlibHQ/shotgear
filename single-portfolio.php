<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package shotgear
 */

get_header();
$project_start_time   = shotgear_meta( 'project_start_time' );
$project_start_date   = shotgear_meta( 'project_start_date' );
$project_end_time     = shotgear_meta( 'project_end_time' );
$project_end_date     = shotgear_meta( 'project_end_date' );
$project_location     = shotgear_meta( 'project_location' );
$project_iner_img     = shotgear_meta( 'project_iner_img' );
$client_brief         = shotgear_meta( 'client_brief' );
$working_process      = shotgear_meta( 'working_process' );
$project_iner_img_src = wp_get_attachment_image( $project_iner_img, 'shotgear_portfolio_single_image_943x520', false, array( 'alt' => 'project iner image' ) );

?>


    <!-- gallery_part part start-->
    <section class="project_details section_padding">
        <div class="container-fluid">
            <?php
                if( have_posts() ) {
                    while( have_posts() ) : the_post();
            ?>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="single_project_item">
                        <?php
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail( 'shotgear_portfolio_single_image_943x520', array( 'alt' => get_the_title() ) );
                            }
                        ?>
                        <h2><?php the_title()?></h2>
                        <?php the_content()?>

                        <div class="project_time">
                            <div class="row">
                                <div class="col-lg-4 col-sm-4">
                                    <div class="single_project_details">
                                        <div class="media">
                                            <img src="<?php echo SHOTGEAR_DIR_ICON_IMG_URI . 'project_details_icon_1.svg'?>" class="mr-4" alt="project details icon 1">
                                            <div class="media-body">
                                                <?php 
                                                    echo '<h5 class="mt-0">'. esc_html__( 'Start Time', 'shotgear' ) . '</h5>';
                                                    
                                                    if( !empty( $project_start_time ) ){
                                                        echo '<span>'. esc_html( $project_start_time ) . '</span>';
                                                    }
                                                    
                                                    if( !empty( $project_start_date ) ){
                                                        echo '<p>'. esc_html( $project_start_date ) . '</p>';
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4">
                                    <div class="single_project_details">
                                        <div class="media">
                                            <img src="<?php echo SHOTGEAR_DIR_ICON_IMG_URI . 'project_details_icon_2.svg'?>" class="mr-4" alt="project details icon 2">
                                            <div class="media-body">
                                                <?php 
                                                    echo '<h5 class="mt-0">'. esc_html__( 'Finish Time', 'shotgear' ) . '</h5>';
                                                    
                                                    if( !empty( $project_end_time ) ){
                                                        echo '<span>'. esc_html( $project_end_time ) . '</span>';
                                                    }
                                                    
                                                    if( !empty( $project_end_date ) ){
                                                        echo '<p>'. esc_html( $project_end_date ) . '</p>';
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4">
                                    <div class="single_project_details">
                                        <div class="media">
                                            <img src="<?php echo SHOTGEAR_DIR_ICON_IMG_URI . 'project_details_icon_3.svg'?>" class="mr-4" alt="project details icon 3">
                                            <div class="media-body">
                                                <?php 
                                                    echo '<h5 class="mt-0">'. esc_html__( 'Address', 'shotgear' ) . '</h5>';
                                                    
                                                    if( !empty( $project_location ) ){
                                                        echo '<span>'. esc_html( $project_location ) . '</span>';
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                            echo '<h4>'. esc_html__( 'Project Description', 'shotgear' ) . '</h4>';
                            
                            if( !empty( $client_brief ) ){
                                echo '<p>'. esc_html( $client_brief ) . '</p>';
                            }

                            if ( $project_iner_img_src ) {
                                echo $project_iner_img_src;
                            }

                            echo '<h4>'. esc_html__( 'Working Process', 'shotgear' ) . '</h4>';
                            
                            if( !empty( $working_process ) ){
                                echo '<p>'. esc_html( $working_process ) . '</p>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <?php
                endwhile;
                }
            ?>
        </div>
    </section>
    <!-- gallery_part part end-->

    <?php

// Footer============
get_footer();