<?php
/**
 * Main Template File
 * 
 * @package WinterSnowboard
 */

get_header(); ?>

<main id="main" class="site-main">
    <!-- Fourth Layer - All Categories Section -->
    <section class="categories-section">
        <div class="container">
            <h2 class="categories-header">All Categories</h2>
            <?php wintersnowboard_display_categories(); ?>
        </div>
    </section>

    <!-- Products Showcase Section -->
    <section class="products-showcase">
        <div class="container">
            <h2 class="section-title">Featured Products</h2>
            <?php wintersnowboard_display_sample_products(); ?>
            
            <!-- Sample Reviews Section -->
            <div class="container">
                <?php wintersnowboard_display_sample_reviews(); ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
