<?php
/**
 * WooCommerce Single Product Template
 * 
 * @package WinterSnowboard
 */

get_header(); ?>

<main id="main" class="site-main single-product-page">
    <div class="container">
        <?php
        while ( have_posts() ) :
            the_post();
            wc_get_template_part( 'content', 'single-product' );
        endwhile;
        ?>
        
        <!-- Display Reviews for This Product -->
        <div class="product-reviews-section">
            <?php
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            } else {
                // Display sample reviews if no actual reviews exist
                wintersnowboard_display_sample_reviews();
            }
            ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
