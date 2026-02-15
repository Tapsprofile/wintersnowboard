<?php
/**
 * Header Template
 * 
 * @package WinterSnowboard
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <!-- Top Bar - Flashing Offers -->
    <div class="top-bar-offers">
        <div class="container">
            <div class="offer-text">
                🔥 FLASH SALE! Up to 50% OFF on Winter Snowboards | Free Shipping on Orders Over $100 | Limited Time Only! 🔥
            </div>
        </div>
    </div>

    <!-- Second Layer - Order Tracking & Messages -->
    <div class="info-bar">
        <div class="container">
            <div class="info-bar-content">
                <div class="order-tracking">
                    <i class="fas fa-truck icon"></i>
                    <a href="<?php echo esc_url( home_url( '/track-order' ) ); ?>">Track Your Order</a>
                </div>
                <div class="customer-messages">
                    <i class="fas fa-envelope icon"></i>
                    <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Customer Support</a>
                    <span> | </span>
                    <i class="fas fa-phone icon"></i>
                    <span>Call us: 1-800-SNOWBOARD</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Third Layer - Main Header with Menu Toggle, Brand, Search, Icons -->
    <header class="header-main">
        <div class="container">
            <div class="header-content">
                <!-- Menu Toggle Button -->
                <button class="menu-toggle" id="menuToggle">
                    <i class="fas fa-bars"></i> Menu
                </button>

                <!-- Brand Name -->
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brand-name">
                    <?php
                    if ( has_custom_logo() ) {
                        the_custom_logo();
                    } else {
                        echo 'WinterSnowboard';
                    }
                    ?>
                </a>

                <!-- Search Field -->
                <div class="search-container">
                    <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <input type="search" 
                               class="search-field" 
                               placeholder="Search for snowboards, gear, accessories..." 
                               value="<?php echo get_search_query(); ?>" 
                               name="s"
                               title="Search">
                        <?php if ( class_exists( 'WooCommerce' ) ) : ?>
                            <input type="hidden" name="post_type" value="product">
                        <?php endif; ?>
                    </form>
                </div>

                <!-- Header Icons - Favourites and Cart -->
                <div class="header-icons">
                    <!-- Favourites/Wishlist -->
                    <a href="<?php echo esc_url( home_url( '/wishlist' ) ); ?>" class="icon-link" title="Wishlist">
                        <i class="far fa-heart"></i>
                        <?php
                        $wishlist_count = wintersnowboard_get_wishlist_count();
                        if ( $wishlist_count > 0 ) :
                        ?>
                            <span class="fav-count"><?php echo esc_html( $wishlist_count ); ?></span>
                        <?php endif; ?>
                    </a>

                    <!-- Shopping Cart -->
                    <a href="<?php echo function_exists( 'wc_get_cart_url' ) ? esc_url( wc_get_cart_url() ) : '#'; ?>" 
                       class="icon-link cart-link" 
                       title="Shopping Cart">
                        <i class="fas fa-shopping-cart"></i>
                        <?php
                        $cart_count = wintersnowboard_get_cart_count();
                        if ( $cart_count > 0 ) :
                        ?>
                            <span class="cart-count"><?php echo esc_html( $cart_count ); ?></span>
                        <?php endif; ?>
                    </a>
                </div>
            </div>
        </div>

        <!-- Navigation Menu (Collapsible) -->
        <nav class="main-navigation" id="mainNavigation">
            <div class="container">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'nav-menu',
                    'container'      => false,
                    'fallback_cb'    => 'wintersnowboard_fallback_menu',
                ) );
                ?>
            </div>
        </nav>
    </header>

<?php
/**
 * Fallback menu if no menu is set
 */
function wintersnowboard_fallback_menu() {
    echo '<ul class="nav-menu">';
    echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">Home</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/shop' ) ) . '">Shop</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/about' ) ) . '">About</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/contact' ) ) . '">Contact</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/cart' ) ) . '">Cart</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/my-account' ) ) . '">My Account</a></li>';
    echo '</ul>';
}
