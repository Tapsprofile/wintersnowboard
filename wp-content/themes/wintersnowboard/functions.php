<?php
/**
 * Winter Snowboard Theme Functions
 * 
 * @package WinterSnowboard
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Theme Setup
 */
function wintersnowboard_setup() {
    // Add theme support
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    // Register navigation menus
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'wintersnowboard' ),
        'footer'  => __( 'Footer Menu', 'wintersnowboard' ),
    ) );
}
add_action( 'after_setup_theme', 'wintersnowboard_setup' );

/**
 * Enqueue scripts and styles
 */
function wintersnowboard_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style( 'wintersnowboard-style', get_stylesheet_uri(), array(), '1.0.0' );
    
    // Enqueue custom styles
    wp_enqueue_style( 'wintersnowboard-custom', get_template_directory_uri() . '/assets/css/custom.css', array(), '1.0.0' );
    
    // Enqueue Font Awesome for icons
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0' );
    
    // Enqueue custom JavaScript
    wp_enqueue_script( 'wintersnowboard-main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '1.0.0', true );
    
    // Localize script for AJAX
    wp_localize_script( 'wintersnowboard-main', 'wintersnowboard_ajax', array(
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'nonce'    => wp_create_nonce( 'wintersnowboard_nonce' ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'wintersnowboard_scripts' );

/**
 * Register widget areas
 */
function wintersnowboard_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Footer Column 1', 'wintersnowboard' ),
        'id'            => 'footer-1',
        'description'   => __( 'Add widgets for footer column 1', 'wintersnowboard' ),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Column 2', 'wintersnowboard' ),
        'id'            => 'footer-2',
        'description'   => __( 'Add widgets for footer column 2', 'wintersnowboard' ),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Column 3', 'wintersnowboard' ),
        'id'            => 'footer-3',
        'description'   => __( 'Add widgets for footer column 3', 'wintersnowboard' ),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Column 4', 'wintersnowboard' ),
        'id'            => 'footer-4',
        'description'   => __( 'Add widgets for footer column 4', 'wintersnowboard' ),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'wintersnowboard_widgets_init' );

/**
 * Get cart count
 */
function wintersnowboard_get_cart_count() {
    if ( function_exists( 'WC' ) ) {
        return WC()->cart->get_cart_contents_count();
    }
    return 0;
}

/**
 * Get wishlist count (placeholder - requires wishlist plugin)
 */
function wintersnowboard_get_wishlist_count() {
    // This would integrate with a wishlist plugin
    // For now, returning a placeholder value
    return 0;
}

/**
 * Display product categories
 */
function wintersnowboard_display_categories() {
    if ( ! function_exists( 'get_terms' ) ) {
        return;
    }

    $categories = get_terms( array(
        'taxonomy'   => 'product_cat',
        'hide_empty' => false,
        'number'     => 8,
    ) );

    if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
        echo '<div class="categories-grid">';
        foreach ( $categories as $category ) {
            echo '<div class="category-item" onclick="window.location.href=\'' . esc_url( get_term_link( $category ) ) . '\'">';
            echo '<div class="category-icon"><i class="fas fa-snowboarding"></i></div>';
            echo '<div class="category-name">' . esc_html( $category->name ) . '</div>';
            echo '</div>';
        }
        echo '</div>';
    }
}

/**
 * Display sample products
 */
function wintersnowboard_display_sample_products() {
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 10,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );

    $products = new WP_Query( $args );

    if ( $products->have_posts() ) {
        echo '<div class="products-grid">';
        while ( $products->have_posts() ) {
            $products->the_post();
            global $product;
            
            echo '<div class="product-card">';
            
            // Product image
            if ( has_post_thumbnail() ) {
                echo '<img src="' . esc_url( get_the_post_thumbnail_url( get_the_ID(), 'medium' ) ) . '" alt="' . esc_attr( get_the_title() ) . '" class="product-image">';
            } else {
                echo '<div class="product-image" style="background-color: #e1e1e1; display: flex; align-items: center; justify-content: center;"><i class="fas fa-snowflake" style="font-size: 48px; color: #95a5a6;"></i></div>';
            }
            
            echo '<div class="product-info">';
            echo '<h3 class="product-title">' . esc_html( get_the_title() ) . '</h3>';
            echo '<div class="product-price">' . $product->get_price_html() . '</div>';
            
            // Rating
            $rating_count = $product->get_rating_count();
            $average = $product->get_average_rating();
            
            echo '<div class="product-rating">';
            echo '<span class="stars">';
            for ( $i = 1; $i <= 5; $i++ ) {
                if ( $i <= floor( $average ) ) {
                    echo '<i class="fas fa-star"></i>';
                } elseif ( $i - 0.5 <= $average ) {
                    echo '<i class="fas fa-star-half-alt"></i>';
                } else {
                    echo '<i class="far fa-star"></i>';
                }
            }
            echo '</span>';
            echo '<span class="review-count">(' . $rating_count . ' reviews)</span>';
            echo '</div>';
            
            echo '<button class="add-to-cart-btn" data-product-id="' . get_the_ID() . '">Add to Cart</button>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
        wp_reset_postdata();
    }
}

/**
 * Display sample reviews
 */
function wintersnowboard_display_sample_reviews() {
    $sample_reviews = array(
        array(
            'name'   => 'John Smith',
            'rating' => 5,
            'date'   => '2 days ago',
            'text'   => 'Excellent quality snowboard! The design is fantastic and it performs great on the slopes. Highly recommended for intermediate to advanced riders.',
        ),
        array(
            'name'   => 'Sarah Johnson',
            'rating' => 5,
            'date'   => '1 week ago',
            'text'   => 'Best purchase I\'ve made this season. The board is lightweight yet sturdy, and the graphics are stunning. Customer service was also top-notch!',
        ),
        array(
            'name'   => 'Mike Davis',
            'rating' => 4,
            'date'   => '2 weeks ago',
            'text'   => 'Great snowboard for the price. Good control and stability. Only minor issue is the bindings needed some adjustment, but overall very satisfied.',
        ),
        array(
            'name'   => 'Emily Chen',
            'rating' => 5,
            'date'   => '3 weeks ago',
            'text'   => 'Amazing product! Fast shipping and well-packaged. The board exceeded my expectations. Perfect for carving and freestyle tricks.',
        ),
        array(
            'name'   => 'David Wilson',
            'rating' => 5,
            'date'   => '1 month ago',
            'text'   => 'Bought this for my son and he absolutely loves it. Great quality construction and the design is eye-catching. Would definitely buy again.',
        ),
        array(
            'name'   => 'Lisa Anderson',
            'rating' => 4,
            'date'   => '1 month ago',
            'text'   => 'Very good snowboard. Responsive and easy to control. The only reason for 4 stars is that I wish it came with a carrying case.',
        ),
        array(
            'name'   => 'Tom Brown',
            'rating' => 5,
            'date'   => '1 month ago',
            'text'   => 'Outstanding performance in deep powder. The flex is perfect for my riding style. This is my third board from this brand and they never disappoint.',
        ),
        array(
            'name'   => 'Jennifer Lee',
            'rating' => 5,
            'date'   => '2 months ago',
            'text'   => 'Incredible value for money! The board handles beautifully and looks amazing. My friends keep asking where I got it from.',
        ),
        array(
            'name'   => 'Robert Taylor',
            'rating' => 4,
            'date'   => '2 months ago',
            'text'   => 'Solid snowboard with good edge control. Took it on several runs and it performed consistently well. Minor cosmetic scratches appeared after a few uses.',
        ),
        array(
            'name'   => 'Amanda White',
            'rating' => 5,
            'date'   => '2 months ago',
            'text'   => 'Perfect for beginners and intermediate riders! Very forgiving and stable. I\'ve improved so much since getting this board. Highly recommend!',
        ),
    );

    echo '<div class="reviews-section">';
    echo '<h2 class="reviews-header">Customer Reviews</h2>';
    
    foreach ( $sample_reviews as $review ) {
        echo '<div class="review-item">';
        echo '<div class="review-header">';
        echo '<span class="reviewer-name">' . esc_html( $review['name'] ) . '</span>';
        echo '<span class="review-date">' . esc_html( $review['date'] ) . '</span>';
        echo '</div>';
        
        echo '<div class="review-stars">';
        for ( $i = 1; $i <= 5; $i++ ) {
            if ( $i <= $review['rating'] ) {
                echo '<i class="fas fa-star"></i>';
            } else {
                echo '<i class="far fa-star"></i>';
            }
        }
        echo '</div>';
        
        echo '<p class="review-text">' . esc_html( $review['text'] ) . '</p>';
        echo '</div>';
    }
    
    echo '</div>';
}

/**
 * AJAX handler for adding to cart
 */
function wintersnowboard_ajax_add_to_cart() {
    check_ajax_referer( 'wintersnowboard_nonce', 'nonce' );
    
    if ( ! function_exists( 'WC' ) ) {
        wp_send_json_error( array( 'message' => 'WooCommerce not active' ) );
    }
    
    $product_id = isset( $_POST['product_id'] ) ? absint( $_POST['product_id'] ) : 0;
    
    if ( $product_id > 0 ) {
        WC()->cart->add_to_cart( $product_id, 1 );
        wp_send_json_success( array(
            'message'    => 'Product added to cart',
            'cart_count' => WC()->cart->get_cart_contents_count(),
        ) );
    }
    
    wp_send_json_error( array( 'message' => 'Invalid product ID' ) );
}
add_action( 'wp_ajax_wintersnowboard_add_to_cart', 'wintersnowboard_ajax_add_to_cart' );
add_action( 'wp_ajax_nopriv_wintersnowboard_add_to_cart', 'wintersnowboard_ajax_add_to_cart' );

/**
 * Customize WooCommerce templates
 */
function wintersnowboard_woocommerce_support() {
    add_theme_support( 'woocommerce', array(
        'thumbnail_image_width' => 300,
        'single_image_width'    => 600,
        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
    ) );
}
add_action( 'after_setup_theme', 'wintersnowboard_woocommerce_support' );
