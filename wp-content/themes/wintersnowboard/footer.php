<?php
/**
 * Footer Template
 * 
 * @package WinterSnowboard
 */
?>

    <footer class="site-footer">
        <div class="container">
            <div class="footer-content">
                <!-- Footer Column 1 - About -->
                <div class="footer-section">
                    <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-1' ); ?>
                    <?php else : ?>
                        <h3>About WinterSnowboard</h3>
                        <p>Your premier destination for high-quality winter sports equipment. We offer the best snowboards, gear, and accessories for all skill levels.</p>
                        <div class="social-links">
                            <a href="#" class="social-link" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social-link" title="Instagram"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="social-link" title="Twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-link" title="YouTube"><i class="fab fa-youtube"></i></a>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Footer Column 2 - Quick Links -->
                <div class="footer-section">
                    <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-2' ); ?>
                    <?php else : ?>
                        <h3>Quick Links</h3>
                        <ul>
                            <li><a href="<?php echo esc_url( home_url( '/shop' ) ); ?>">Shop</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>">About Us</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Contact</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/track-order' ) ); ?>">Track Order</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/blog' ) ); ?>">Blog</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/faq' ) ); ?>">FAQ</a></li>
                        </ul>
                    <?php endif; ?>
                </div>

                <!-- Footer Column 3 - Customer Service -->
                <div class="footer-section">
                    <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-3' ); ?>
                    <?php else : ?>
                        <h3>Customer Service</h3>
                        <ul>
                            <li><a href="<?php echo esc_url( home_url( '/my-account' ) ); ?>">My Account</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/shipping-returns' ) ); ?>">Shipping & Returns</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/privacy-policy' ) ); ?>">Privacy Policy</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/terms-conditions' ) ); ?>">Terms & Conditions</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/warranty' ) ); ?>">Warranty</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/size-guide' ) ); ?>">Size Guide</a></li>
                        </ul>
                    <?php endif; ?>
                </div>

                <!-- Footer Column 4 - Contact Info -->
                <div class="footer-section">
                    <?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-4' ); ?>
                    <?php else : ?>
                        <h3>Contact Us</h3>
                        <ul>
                            <li><i class="fas fa-map-marker-alt"></i> 123 Snow Street, Winter City, WC 12345</li>
                            <li><i class="fas fa-phone"></i> 1-800-SNOWBOARD</li>
                            <li><i class="fas fa-envelope"></i> info@wintersnowboard.com</li>
                            <li><i class="fas fa-clock"></i> Mon-Fri: 9am-6pm EST</li>
                        </ul>
                        <h3 style="margin-top: 20px;">Newsletter</h3>
                        <p>Subscribe to get special offers and updates!</p>
                        <form class="newsletter-form" style="margin-top: 10px;">
                            <input type="email" placeholder="Your email" style="padding: 10px; border: none; border-radius: 5px; width: 100%; margin-bottom: 10px;">
                            <button type="submit" style="padding: 10px 20px; background-color: #3498db; color: #fff; border: none; border-radius: 5px; cursor: pointer; width: 100%;">Subscribe</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; <?php echo date( 'Y' ); ?> WinterSnowboard. All rights reserved. | Designed with ❄️ for winter sports enthusiasts.</p>
            </div>
        </div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
