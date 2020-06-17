<?php 
/**
 * @Packge     : Shotgear
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
    // Block direct access
    if( !defined( 'ABSPATH' ) ){
        exit( 'Direct script access denied.' );
    }

/*=========================================================
	Theme option callback
=========================================================*/
function shotgear_opt( $id = null, $default = '' ) {
	
	$opt = get_theme_mod( $id, $default );
	
	$data = '';
	
	if( $opt ) {
		$data = $opt;
	}
	
	return $data;
}


/*=========================================================
	Site icon callback
=========================================================*/

function shotgear_site_icon(){
	if ( ! has_site_icon() ) {
		$html = '';
		$icon_path = SHOTGEAR_DIR_ASSETS_URI . 'img/favicon.png';
		$html .= '<link rel="icon" href="' . esc_url ( $icon_path ) . '" sizes="32x32">';
		$html .= '<link rel="icon" href="' . esc_url ( $icon_path ) . '" sizes="192x192">';
		$html .= '<link rel="apple-touch-icon-precomposed" href="' . esc_url ( $icon_path ) . '">';
		$html .= '<meta name="msapplication-TileImage" content="' . esc_url ( $icon_path ) . '">';

		return $html;
	} else {
		return;
	}
}


/*=========================================================
	Custom meta id callback
=========================================================*/
function shotgear_meta( $id = '' ){
    
    $value = get_post_meta( get_the_ID(), '_shotgear_'.$id, true );
    
    return $value;
}


/*=========================================================
	Blog Date Permalink
=========================================================*/
function shotgear_blog_date_permalink(){
	
	$year  = get_the_time('Y'); 
    $month_link = get_the_time('m');
    $day   = get_the_time('d');

    $link = get_day_link( $year, $month_link, $day);
    
    return $link; 
}



/*========================================================
	Blog Excerpt Length
========================================================*/
if ( ! function_exists( 'shotgear_excerpt_length' ) ) {
	function shotgear_excerpt_length( $limit = 30 ) {

		$excerpt = explode( ' ', get_the_excerpt() );
		
		// $limit null check
		if( !null == $limit ){
			$limit = $limit;
		}else{
			$limit = 30;
		}
        
        
		if ( count( $excerpt ) >= $limit ) {
			array_pop( $excerpt );
			$exc_slice = array_slice( $excerpt, 0, $limit );
			$excerpt = implode( " ", $exc_slice );
		} else {
			$exc_slice = array_slice( $excerpt, 0, $limit );
			$excerpt = implode( " ", $exc_slice );
		}
		
		$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
		return $excerpt;

	}
}


/*==========================================================
	Comment number and Link
==========================================================*/
if ( ! function_exists( 'shotgear_posted_comments' ) ) {
    function shotgear_posted_comments(){
        
        $comments_num = get_comments_number();
        if( comments_open() ){
            if( $comments_num == 0 ){
                $comments = esc_html__('No Comments','shotgear');
            } elseif ( $comments_num > 1 ){
                $comments= $comments_num . esc_html__(' Comments','shotgear');
            } else {
                $comments = esc_html__( '1 Comment','shotgear' );
            }
            $comments = '<i class="ti-comments"></i>'. $comments;
        } else {
            $comments = esc_html__( 'Comments are closed', 'shotgear' );
        }
        
        return $comments;
    }
}


/*===================================================
	Post embedded media
===================================================*/
function shotgear_embedded_media( $type = array() ){
    
    $content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
    $embed   = get_media_embedded_in_content( $content, $type );
        
    if( in_array( 'audio' , $type) ){
    
        if( count( $embed ) > 0 ){
            $output = str_replace( '?visual=true', '?visual=false', $embed[0] );
        }else{
           $output = '';
        }
        
    }else{
        
        if( count( $embed ) > 0 ){

            $output = $embed[0];
        }else{
           $output = ''; 
        }
        
    }
    
    return $output;
}


/*===================================================
	WP post link pages
====================================================*/
function shotgear_link_pages(){
    wp_link_pages( array(
    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'shotgear' ) . '</span>',
    'after'       => '</div>',
    'link_before' => '<span>',
    'link_after'  => '</span>',
    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'shotgear' ) . ' </span>%',
    'separator'   => '<span class="screen-reader-text">, </span>',
    ) );
}


/*====================================================
	Specific Social icons overwritten by flaticon
====================================================*/

function shotgear_social_icon_overwrite_by_flaticon( $social_icon ){
	switch ( $social_icon ) {
		case ($social_icon == 'fa fa-facebook' || $social_icon == 'fa fa-facebook-f'):
			$social_icon = 'flaticon-facebook';
			break;
		case ($social_icon == 'fa fa-twitter'):
			$social_icon = 'flaticon-twitter';
			break;
		case ($social_icon == 'fa fa-skype'):
			$social_icon = 'flaticon-skype';
			break;
		case ($social_icon == 'fa fa-instagram'):
			$social_icon = 'flaticon-instagram';
			break;
		
		default:
			$social_icon = $social_icon;
			break;
	}

	return $social_icon;
}

/*====================================================
	Theme logo
====================================================*/
function shotgear_theme_logo( $class = '' ) {

    $siteUrl = home_url('/');
    // site logo
		
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$imageUrl = wp_get_attachment_image_src( $custom_logo_id , 'shotgear_logo_159x31' );
	
	if( !empty( $imageUrl[0] ) ){
		$siteLogo = '<a class="'.esc_attr( $class ).'" href="'.esc_url( $siteUrl ).'"><img src="'.esc_url( $imageUrl[0] ).'" alt="shotgear logo"></a>';
	}else{
		$siteLogo = '<h2><a class="'.esc_attr( $class ).'" href="'.esc_url( $siteUrl ).'">'.esc_html( get_bloginfo('name') ).'</a><span>'. esc_html( get_bloginfo('description') ) .'</span></h2>';
	}
	
	return wp_kses_post( $siteLogo );
	
}


/*================================================
    Page Title Bar
================================================*/
function shotgear_page_titlebar() {
	if ( ! is_page_template( 'template-builder.php' ) ) {
		?>
        <section class="hero-banner">
            <div class="container">
				<h2>
				<?php
				if ( is_category() ) {
					single_cat_title( __('Category: ', 'shotgear') );

				} elseif ( is_tag() ) {
					single_tag_title( __('Tag Archive for - ', 'shotgear') );

				} elseif ( is_archive() ) {
					echo get_the_archive_title();

				} elseif ( is_page() ) {
					echo get_the_title();

				} elseif ( is_search() ) {
					echo esc_html__( 'Search for: ', 'shotgear' ) . get_search_query();

				} elseif ( ! ( is_404() ) && ( is_single() ) || ( is_page() ) ) {
					echo  get_the_title();

				} elseif ( is_home() ) {
					echo esc_html__( 'Blog', 'shotgear' );

				} elseif ( is_404() ) {
					echo esc_html__( '404 error', 'shotgear' );

				}
				?>
				</h2>
            </div>
        </section>
		<?php
	}
}



/*================================================
	Blog pull right class callback
=================================================*/
function shotgear_pull_right( $id = '', $condation ){
    
    if( $id == $condation ){
        return ' '.'order-last';
    }else{
        return;
    }
    
}



/*======================================================
	Inline Background
======================================================*/
function shotgear_inline_bg_img( $bgUrl ){
    $bg = '';

    if( $bgUrl ){
        $bg = 'style="background-image:url('.esc_url( $bgUrl ).')"'; 
    }

    return $bg;
}


/*======================================================
	Blog Category
======================================================*/
function shotgear_featured_post_cat(){

	$categories = get_the_category(); 
	
	if( is_array( $categories ) && count( $categories ) > 0 ){
		$getCat = [];
		foreach ( $categories as $value ) {

			if( $value->slug != 'featured' && ! is_front_page() ){
				$getCat[] = '<a href="'.esc_url( get_category_link( $value->term_id ) ).'"> <i class="ti-bookmark"></i> '.esc_html( $value->name ).'</a>';
			}else{
				$getCat[] = '<i class="ti-bookmark"></i>'.esc_html( $value->name );
			}
		}

		return implode( ', ', $getCat );
	}
         
}


/*=======================================================
	Customize Sidebar Option Value Return
========================================================*/
function shotgear_sidebar_opt(){

    $sidebarOpt = shotgear_opt( 'shotgear_blog_layout' );
    $sidebar = '1';
    // Blog Sidebar layout  opt
    if( is_array( $sidebarOpt ) ){
        $sidebarOpt =  $sidebarOpt;
    }else{
        $sidebarOpt =  json_decode( $sidebarOpt, true );
    }
    
    
    if( !empty( $sidebarOpt['columnsCount'] ) ){
        $sidebar = $sidebarOpt['columnsCount'];
    }


    return $sidebar;
}


/**================================================
	Themify Icon
 =================================================*/
function shotgear_themify_icon(){
    return[
        'flaticon-love-and-romance'     => __('Flaticon Love and Romance', 'shotgear'),
        'flaticon-leaf'      			=> __('Flaticon Leaf', 'shotgear'),
    ];
}


/*===========================================================
	Set contact form 7 default form template
============================================================*/
function shotgear_contact7_form_content( $template, $prop ) {
    
    if ( 'form' == $prop ) {

        $template =
            '<div class="row"><div class="col-12"><div class="form-group">[textarea* your-message id:message class:form-control class:w-100 rows:9 cols:30 placeholder "Message"]</div></div><div class="col-sm-6"><div class="form-group">[text* your-name id:name class:form-control placeholder "Enter your  name"]</div></div><div class="col-sm-6"><div class="form-group">[email* your-email id:email class:form-control placeholder "Enter your email"]</div></div><div class="col-12"><div class="form-group">[text your-subject id:subject class:form-control placeholder "Subject"]</div></div></div><div class="form-group mt-3">[submit class:button-contactForm class:btn_2 "Send Message"]</div>';

        return $template;

    } else {
    return $template;
    } 
}
add_filter( 'wpcf7_default_template', 'shotgear_contact7_form_content', 10, 2 );



/*============================================================
	Pagination
=============================================================*/
function shotgear_blog_pagination(){
	echo '<nav class="blog-pagination justify-content-center d-flex">';
        the_posts_pagination(
            array(
                'mid_size'  => 2,
                'prev_text' => __( '<span class="ti-angle-left"></span>', 'shotgear' ),
                'next_text' => __( '<span class="ti-angle-right"></span>', 'shotgear' ),
                'screen_reader_text' => ' '
            )
        );
	echo '</nav>';
}


/*=============================================================
	Blog Single Post Navigation
=============================================================*/
if( ! function_exists('shotgear_blog_single_post_navigation') ) {
	function shotgear_blog_single_post_navigation() {

		// Start nav Area
		if( get_next_post_link() || get_previous_post_link()   ):
			?>
			<div class="navigation-area">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
						<?php
						if( get_next_post_link() ){
							$nextPost = get_next_post();

							if( has_post_thumbnail() ){
								?>
								<div class="thumb">
									<a href="<?php the_permalink(  absint( $nextPost->ID )  ) ?>">
										<?php echo get_the_post_thumbnail( absint( $nextPost->ID ), 'shotgear_np_thumb', array( 'class' => 'img-fluid' ) ) ?>
									</a>
								</div>
								<?php
							} ?>
							<div class="arrow">
								<a href="<?php the_permalink(  absint( $nextPost->ID )  ) ?>">
									<span class="ti-arrow-left text-white"></span>
								</a>
							</div>
							<div class="detials">
								<p><?php echo esc_html__( 'Prev Post', 'shotgear' ); ?></p>
								<a href="<?php the_permalink(  absint( $nextPost->ID )  ) ?>">
									<h4><?php echo wp_trim_words( get_the_title( $nextPost->ID ), 4, ' ...' ); ?></h4>
								</a>
							</div>
							<?php
						} ?>
					</div>
					<div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
						<?php
						if( get_previous_post_link() ){
							$prevPost = get_previous_post();
							?>
							<div class="detials">
								<p><?php echo esc_html__( 'Next Post', 'shotgear' ); ?></p>
								<a href="<?php the_permalink(  absint( $prevPost->ID )  ) ?>">
									<h4><?php echo wp_trim_words( get_the_title( $prevPost->ID ), 4, ' ...' ); ?></h4>
								</a>
							</div>
							<div class="arrow">
								<a href="<?php the_permalink(  absint( $prevPost->ID )  ) ?>">
									<span class="ti-arrow-right text-white"></span>
								</a>
							</div>
							<div class="thumb">
								<a href="<?php the_permalink(  absint( $prevPost->ID )  ) ?>">
									<?php echo get_the_post_thumbnail( absint( $prevPost->ID ), 'shotgear_np_thumb', array( 'class' => 'img-fluid' ) ) ?>
								</a>
							</div>
							<?php
						} ?>
					</div>
				</div>
			</div>
		<?php
		endif;

	}
}


/*=======================================================
	Author Bio
=======================================================*/
function shotgear_author_bio(){
	$avatar = get_avatar( absint( get_the_author_meta( 'ID' ) ), 90 );
	?>
	<div class="blog-author">
		<div class="media align-items-center">
			<?php
			if( $avatar  ) {
				echo wp_kses_post( $avatar );
			}
			?>
			<div class="media-body">
				<a href="<?php echo esc_url( get_author_posts_url( absint( get_the_author_meta( 'ID' ) ) ) ); ?>"><h4><?php echo esc_html( get_the_author() ); ?></h4></a>
				<p><?php echo esc_html( get_the_author_meta('description') ); ?></p>
			</div>
		</div>
	</div>
	<?php
}


/*===================================================
 Shotgear Comment Template Callback
 ====================================================*/
function shotgear_comment_callback( $comment, $args, $depth ) {

	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}
	?>
	<<?php echo esc_attr( $tag ); ?> <?php comment_class( ( empty( $args['has_children'] ) ? '' : 'parent').' comment-list' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-list">
	<?php endif; ?>
		<div class="single-comment">
			<div class="user d-flex">
				<div class="thumb">
					<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
				</div>
				<div class="desc">
					<div class="comment">
						<?php comment_text(); ?>
					</div>

					<div class="d-flex justify-content-between">
						<div class="d-flex align-items-center">
							<h5 class="comment_author"><?php printf( __( '<span class="comment-author-name">%s</span> ', 'shotgear' ), get_comment_author_link() ); ?></h5>
							<p class="date"><?php printf( __('%1$s at %2$s', 'shotgear'), get_comment_date(),  get_comment_time() ); ?><?php edit_comment_link( esc_html__( '(Edit)', 'shotgear' ), '  ', '' ); ?> </p>
							<?php if ( $comment->comment_approved == '0' ) : ?>
								<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'shotgear' ); ?></em>
								<br>
							<?php endif; ?>
						</div>

						<div class="reply-btn">
							<?php comment_reply_link(array_merge( $args, array( 'add_below' => $add_below, 'depth' => 1, 'max_depth' => 5, 'reply_text' => 'Reply' ) ) ); ?>
						</div>
					</div>

				</div>
			</div>
		</div>
	<?php if ( 'div' != $args['style'] ) : ?>
		</div>
	<?php endif; ?>
	<?php
}
// add class comment reply link
add_filter('comment_reply_link', 'shotgear_replace_reply_link_class');
function shotgear_replace_reply_link_class( $class ) {
	$class = str_replace("class='comment-reply-link", "class='btn-reply comment-reply-link text-uppercase", $class);
	return $class;
}



/*=========================================================
    Latest Blog Post For Elementor Section
===========================================================*/
function shotgear_latest_blog( $pNumber = 3, $post_cat = 'engineering', $post_order = 'DESC' ){
	
	function shotgear_get_catname_link() {
		$shotgear_cat = '';
		$categories = get_the_category();
		if ( ! empty( $categories ) ) {
			$shotgear_cat .= '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '"  class="category_btn">' . esc_html( $categories[0]->name ) . '</a>';
		}
		return $shotgear_cat;
	}

	$count = 0;
	
	$lBlog = new WP_Query( array(
		'post_type'      => 'post',
		'category_name'	 => $post_cat,
		'posts_per_page' => $pNumber,
		'order'			 => $post_order
    ) );

    if( $lBlog->have_posts() ){
        while( $lBlog->have_posts() ){
			$lBlog->the_post();
			$count++;
		?>

		<div class="col-sm-6 col-lg-4">
			<div class="single_catagory_post post_2">
				<div class="category_post_img">
					<?php
						if( has_post_thumbnail() ){
							the_post_thumbnail( 'shotgear_latest_blog_360x363', ['alt' => get_the_title() ] );
						}
					?>
				</div>
				<div class="post_text_1 pr_30">
					<h5><span> <?php echo esc_html__('By ', 'shotgear') . get_the_author_meta('display_name') ?></span> / <?php the_time('F j, Y') ?></h5>
					<a href="<?php the_permalink(); ?>">
						<h3><?php the_title(); ?></h3>
					</a>
					<?php echo shotgear_excerpt_length( 15 )?>
				</div>
			</div>
		</div>
        <?php
        }

    }

}



/*=========================================================
    Share Button Code
===========================================================*/
function shotgear_social_sharing_buttons( $ulClass = '', $tagLine = '' ) {

	// Get page URL
	$URL = get_permalink();
	$Sitetitle = get_bloginfo('name');

	// Get page title
	$Title = str_replace( ' ', '%20', get_the_title());

	// Construct sharing URL without using any script
	$twitterURL = 'https://twitter.com/intent/tweet?text='.esc_html( $Title ).'&amp;url='.esc_url( $URL ).'&amp;via='.esc_html( $Sitetitle );
	$facebookURL= 'https://www.facebook.com/sharer/sharer.php?u='.esc_url( $URL );
	$linkedin   = 'https://www.linkedin.com/shareArticle?mini=true&url='.esc_url( $URL ).'&title='.esc_html( $Title );
	$pinterest  = 'http://pinterest.com/pin/create/button/?url='.esc_url( $URL ).'&description='.esc_html( $Title );;

	// Add sharing button at the end of page/page content
	$content = '';
	$content  .= '<ul class="'.esc_attr( $ulClass ).'">';
	$content .= $tagLine;
	$content .= '<li><a href="' . esc_url( $facebookURL ) . '" target="_blank"><i class="ti-facebook"></i></a></li>';
	$content .= '<li><a href="' . esc_url( $twitterURL ) . '" target="_blank"><i class="ti-twitter-alt"></i></a></li>';
	$content .= '<li><a href="' . esc_url( $pinterest ) . '" target="_blank"><i class="ti-pinterest"></i></a></li>';
	$content .= '<li><a href="' . esc_url( $linkedin ) . '" target="_blank"><i class="ti-linkedin"></i></a></li>';
	$content .= '</ul>';

	return $content;

}




/*================================================
    Shotgear Custom Posts
================================================*/
function shotgear_custom_posts() {
	
	// Portfolio Custom Post
	
	$labels = array(
		'name'               => _x( 'Portfolios', 'post type general name', 'shotgear' ),
		'singular_name'      => _x( 'Portfolio', 'post type singular name', 'shotgear' ),
		'menu_name'          => _x( 'Portfolios', 'admin menu', 'shotgear' ),
		'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'shotgear' ),
		'add_new'            => _x( 'Add New', 'portfolio', 'shotgear' ),
		'add_new_item'       => __( 'Add New Portfolio', 'shotgear' ),
		'new_item'           => __( 'New Portfolio', 'shotgear' ),
		'edit_item'          => __( 'Edit Portfolio', 'shotgear' ),
		'view_item'          => __( 'View Portfolio', 'shotgear' ),
		'all_items'          => __( 'All Portfolios', 'shotgear' ),
		'search_items'       => __( 'Search Portfolios', 'shotgear' ),
		'parent_item_colon'  => __( 'Parent Portfolios:', 'shotgear' ),
		'not_found'          => __( 'No portfolios found.', 'shotgear' ),
		'not_found_in_trash' => __( 'No portfolios found in Trash.', 'shotgear' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'shotgear' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'portfolio' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);

	register_post_type( 'portfolio', $args );


	// Portfolio category
	$labels = array(
		'name'              => _x( 'Portfolio Category', 'taxonomy general name', 'shotgear' ),
		'singular_name'     => _x( 'Portfolio Categories', 'taxonomy singular name', 'shotgear' ),
		'search_items'      => __( 'Search Portfolio Categories', 'shotgear' ),
		'all_items'         => __( 'All Portfolio Categories', 'shotgear' ),
		'parent_item'       => __( 'Parent Portfolio Category', 'shotgear' ),
		'parent_item_colon' => __( 'Parent Portfolio Category:', 'shotgear' ),
		'edit_item'         => __( 'Edit Portfolio Category', 'shotgear' ),
		'update_item'       => __( 'Update Portfolio Category', 'shotgear' ),
		'add_new_item'      => __( 'Add New Portfolio Category', 'shotgear' ),
		'new_item_name'     => __( 'New Portfolio Category Name', 'shotgear' ),
		'menu_name'         => __( 'Portfolio Category', 'shotgear' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'portfolio-cat' ),
	);

	register_taxonomy( 'portfolio-cat', array( 'portfolio' ), $args );

}
add_action( 'init', 'shotgear_custom_posts' );



/*=========================================================
    Portfolio Section
========================================================*/
function shotgear_portfolio_section( $pNumber ){
	$categories = get_terms(
		array(
			'taxonomy' => 'portfolio-cat',
			'hide_empty' => false
		)
	);
	?>
	
	<div class="row">
		<div class="col-lg-8 offset-lg-2">
			<div class="portfolio-filter filters">
				<ul>
					<li class="active" data-filter="all"><?php _e( 'All photos', 'shotgear' )?></li>
					<?php
						foreach ( $categories as $category ) {
							echo '<li data-filter="'. esc_attr( $category->term_id ) .'">'. esc_html( $category->name ) .'</li>';
						}

					?>
				</ul>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xl-12">
			<div class="gallery_part_item filtr-container">
			<?php
            $portfolios = new WP_Query( array(
                'post_type' => 'portfolio',
                'posts_per_page'=> $pNumber,

            ) );

            if( $portfolios->have_posts() ) {
	            while ( $portfolios->have_posts() ) {
	                $portfolios->the_post();
					$terms = get_the_terms( get_the_ID(), 'portfolio-cat' );
	                $img_size_meta = get_post_meta( get_the_ID(), 'portfolio_img_size', true );
	                if( $img_size_meta == 1 ){
	                    $image_size = 'shotgear_portfolio_1_image_458x650';
		                $wrapClass  = '';
                    }
	                elseif ( $img_size_meta == 2 ) {
		                $image_size = 'shotgear_portfolio_2_image_677x650';
		                $wrapClass  = ' width-1';
	                }
	                elseif ( $img_size_meta == 3 ){
	                    $image_size = 'shotgear_portfolio_3_image_776x650';
		                $wrapClass  = ' width-2';
                    } else {
						$image_size = 'shotgear_portfolio_1_image_458x650';
						$wrapClass  = '';
					}
					$img_url = get_the_post_thumbnail_url( get_the_ID(), $image_size );
		            ?>
					<a href="<?php the_permalink(); ?>" class="img-gal filtr-item<?php echo esc_attr( $wrapClass ); ?>" data-category="<?php echo esc_attr( $terms[0]->term_id ); ?>" style="background-image: url(<?php echo esc_url( $img_url )?>)">
						<div class="single_gallery_item">
							<div class="single_gallery_item_iner">
								<div class="gallery_item_text">
									<p><?php echo $terms[0]->description ? $terms[0]->description : $terms[0]->name ?></p>
									<h4><?php the_title() ?></h4>
								</div>
							</div>
						</div>
					</a>
					<?php
	            }
            } ?>
			</div>
		</div>
	</div>
    <?php
}