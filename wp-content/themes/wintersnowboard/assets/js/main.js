/**
 * WinterSnowboard Main JavaScript
 * 
 * @package WinterSnowboard
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        
        /**
         * Menu Toggle Functionality
         */
        $('#menuToggle').on('click', function() {
            $(this).toggleClass('active');
            $('#mainNavigation').toggleClass('active');
            
            // Change icon
            const icon = $(this).find('i');
            if ($(this).hasClass('active')) {
                icon.removeClass('fa-bars').addClass('fa-times');
            } else {
                icon.removeClass('fa-times').addClass('fa-bars');
            }
        });

        /**
         * Search Field Enhancement
         */
        $('.search-field').on('focus', function() {
            $(this).parent().addClass('search-focused');
        }).on('blur', function() {
            $(this).parent().removeClass('search-focused');
        });

        /**
         * Add to Cart AJAX
         */
        $('.add-to-cart-btn').on('click', function(e) {
            e.preventDefault();
            
            const $button = $(this);
            const productId = $button.data('product-id');
            const originalText = $button.text();
            
            // Disable button and show loading state
            $button.prop('disabled', true).text('Adding...');
            
            $.ajax({
                url: wintersnowboard_ajax.ajax_url,
                type: 'POST',
                data: {
                    action: 'wintersnowboard_add_to_cart',
                    product_id: productId,
                    nonce: wintersnowboard_ajax.nonce
                },
                success: function(response) {
                    if (response.success) {
                        // Update cart count
                        $('.cart-count').text(response.data.cart_count);
                        
                        // Show success state
                        $button.text('Added!').css('background-color', '#27ae60');
                        
                        // Animate cart icon
                        $('.cart-link').addClass('cart-updated');
                        setTimeout(function() {
                            $('.cart-link').removeClass('cart-updated');
                        }, 500);
                        
                        // Reset button after 2 seconds
                        setTimeout(function() {
                            $button.prop('disabled', false)
                                   .text(originalText)
                                   .css('background-color', '');
                        }, 2000);
                    } else {
                        $button.prop('disabled', false)
                               .text('Error - Try Again')
                               .css('background-color', '#e74c3c');
                        
                        setTimeout(function() {
                            $button.text(originalText).css('background-color', '');
                        }, 2000);
                    }
                },
                error: function() {
                    $button.prop('disabled', false)
                           .text('Error - Try Again')
                           .css('background-color', '#e74c3c');
                    
                    setTimeout(function() {
                        $button.text(originalText).css('background-color', '');
                    }, 2000);
                }
            });
        });

        /**
         * Smooth Scroll for Anchor Links
         */
        $('a[href^="#"]').on('click', function(e) {
            const target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - 100
                }, 1000);
            }
        });

        /**
         * Product Card Hover Effect Enhancement
         */
        $('.product-card').hover(
            function() {
                $(this).find('.add-to-cart-btn').css('transform', 'scale(1.05)');
            },
            function() {
                $(this).find('.add-to-cart-btn').css('transform', 'scale(1)');
            }
        );

        /**
         * Sticky Header on Scroll
         */
        let lastScroll = 0;
        $(window).on('scroll', function() {
            const currentScroll = $(this).scrollTop();
            
            if (currentScroll > 100) {
                $('.header-main').addClass('scrolled');
            } else {
                $('.header-main').removeClass('scrolled');
            }
            
            lastScroll = currentScroll;
        });

        /**
         * Category Item Click Enhancement
         */
        $('.category-item').on('click', function() {
            $(this).addClass('category-clicked');
            setTimeout(() => {
                $(this).removeClass('category-clicked');
            }, 300);
        });

        /**
         * Newsletter Form Submission
         */
        $('.newsletter-form').on('submit', function(e) {
            e.preventDefault();
            const $form = $(this);
            const $input = $form.find('input[type="email"]');
            const $button = $form.find('button');
            const email = $input.val();
            
            if (email && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                $button.text('Subscribed!').css('background-color', '#27ae60');
                $input.val('');
                
                setTimeout(function() {
                    $button.text('Subscribe').css('background-color', '');
                }, 3000);
            } else {
                $button.text('Invalid Email').css('background-color', '#e74c3c');
                
                setTimeout(function() {
                    $button.text('Subscribe').css('background-color', '');
                }, 2000);
            }
        });

        /**
         * Reviews Section - Show More/Less
         */
        const reviewItems = $('.review-item');
        if (reviewItems.length > 5) {
            reviewItems.slice(5).hide();
            
            const $showMoreBtn = $('<button class="show-more-reviews" style="margin-top: 20px; padding: 12px 30px; background-color: #3498db; color: #fff; border: none; border-radius: 5px; cursor: pointer; width: 100%;">Show More Reviews</button>');
            $('.reviews-section').append($showMoreBtn);
            
            $showMoreBtn.on('click', function() {
                if ($(this).text() === 'Show More Reviews') {
                    reviewItems.slice(5).slideDown();
                    $(this).text('Show Less Reviews');
                } else {
                    reviewItems.slice(5).slideUp();
                    $(this).text('Show More Reviews');
                    $('html, body').animate({
                        scrollTop: $('.reviews-section').offset().top - 100
                    }, 500);
                }
            });
        }

        /**
         * Initialize tooltips (if needed)
         */
        $('[title]').each(function() {
            $(this).attr('data-tooltip', $(this).attr('title'));
            $(this).removeAttr('title');
        });

        /**
         * Add loading animation to images
         */
        $('img').on('load', function() {
            $(this).addClass('img-loaded');
        });

        /**
         * Close mobile menu when clicking outside
         */
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.header-main').length) {
                if ($('#mainNavigation').hasClass('active')) {
                    $('#menuToggle').click();
                }
            }
        });

        /**
         * Product Rating Stars Click (for interaction)
         */
        $('.product-rating .stars').on('click', function() {
            const $card = $(this).closest('.product-card');
            const productTitle = $card.find('.product-title').text();
            alert('View all reviews for: ' + productTitle);
        });

    });

    /**
     * Window Load Event
     */
    $(window).on('load', function() {
        // Hide loading spinner if exists
        $('.loading-spinner').fadeOut();
        
        // Animate elements on page load
        $('.product-card').each(function(index) {
            $(this).delay(100 * index).animate({
                opacity: 1
            }, 500);
        });
    });

})(jQuery);
