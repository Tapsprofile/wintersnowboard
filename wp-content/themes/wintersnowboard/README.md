# WinterSnowboard WordPress Theme

A modern, feature-rich WooCommerce theme designed for winter sports equipment e-commerce websites.

## Features

### 1. **Top Bar with Flashing Offers**
- Eye-catching animated banner displaying promotional offers
- Gradient background with slide animation
- Configurable text content

### 2. **Information Bar (Second Layer)**
- Order tracking link
- Customer support contact information
- Phone number display
- Easy navigation to essential services

### 3. **Main Header (Third Layer)**
- **Collapsible Menu Toggle**: Show/hide navigation menu with animated button
- **Brand Name/Logo**: Customizable site branding
- **Search Field**: Full-width search functionality for products
- **Icon Navigation**: 
  - Wishlist/Favourites icon with counter
  - Shopping cart icon with item counter

### 4. **All Categories Section (Fourth Layer)**
- Grid layout displaying product categories
- Hover effects for better UX
- Icon-based category representation
- Responsive grid adapts to screen size

### 5. **Product Showcase**
- Minimum 10 product designs displayed in a responsive grid
- Each product card includes:
  - Product image
  - Product title
  - Price
  - Star rating
  - Review count
  - Add to cart button with AJAX functionality

### 6. **Review System**
- Minimum 10 sample reviews per product
- Review cards showing:
  - Reviewer name
  - Star rating
  - Review date
  - Review text
- Show more/less functionality for reviews

### 7. **Footer**
- 4-column layout (configurable via widgets)
- Quick links section
- Customer service information
- Contact details
- Social media links
- Newsletter subscription form

## Installation

1. **Upload Theme Files**
   ```
   wp-content/themes/wintersnowboard/
   ```

2. **Activate Theme**
   - Go to WordPress Admin > Appearance > Themes
   - Activate "Winter Snowboard" theme

3. **Install Required Plugins**
   - WooCommerce (required for e-commerce functionality)
   - YITH WooCommerce Wishlist (optional, for wishlist feature)

4. **Configure Theme**
   - Go to Appearance > Customize
   - Set up logo, colors, and other settings
   - Create navigation menus
   - Configure footer widgets

## Theme Structure

```
wintersnowboard/
├── assets/
│   ├── css/
│   │   └── custom.css          # Additional custom styles
│   ├── js/
│   │   └── main.js             # JavaScript functionality
│   └── images/                 # Theme images
├── inc/                        # Theme includes
├── templates/                  # Custom templates
├── style.css                   # Main stylesheet with theme info
├── functions.php               # Theme functions
├── header.php                  # Header template
├── footer.php                  # Footer template
├── index.php                   # Main template
└── README.md                   # This file
```

## Theme Configuration

### Navigation Menus
1. Go to Appearance > Menus
2. Create a menu and assign it to "Primary Menu"
3. Add menu items for:
   - Home
   - Shop
   - About
   - Contact
   - My Account
   - Other pages as needed

### Footer Widgets
1. Go to Appearance > Widgets
2. Add widgets to Footer Column 1-4
3. Default content is provided if no widgets are added

### Customizing Offers Banner
Edit the text in `header.php` around line 20:
```php
<div class="offer-text">
    🔥 FLASH SALE! Up to 50% OFF on Winter Snowboards | Free Shipping on Orders Over $100 | Limited Time Only! 🔥
</div>
```

### Adding Product Categories
1. Go to Products > Categories
2. Add new categories
3. They will automatically appear in the "All Categories" section

## WooCommerce Integration

This theme is fully integrated with WooCommerce:
- Product display
- Shopping cart functionality
- Wishlist support
- Product reviews
- AJAX add to cart
- Cart counter updates

## JavaScript Features

- **Menu Toggle**: Collapsible navigation menu
- **AJAX Add to Cart**: Add products without page reload
- **Smooth Scrolling**: Enhanced navigation experience
- **Newsletter Subscription**: Form validation
- **Review Show/Hide**: Expandable reviews section
- **Cart Animation**: Visual feedback when items added

## Responsive Design

The theme is fully responsive with breakpoints:
- **Desktop**: 1200px and above
- **Tablet**: 768px - 1199px
- **Mobile**: Below 768px

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Opera (latest)

## Accessibility Features

- Semantic HTML5 markup
- ARIA labels where appropriate
- Keyboard navigation support
- Focus indicators
- High contrast mode support
- Reduced motion support for users with motion sensitivity

## UX Best Practices

This theme follows senior UX e-commerce expert recommendations:

1. **Clear Visual Hierarchy**: Multiple layers organizing information from most to least important
2. **Consistent Navigation**: Easy access to key features (cart, search, menu)
3. **Trust Signals**: Customer reviews, social proof, contact information
4. **Call-to-Action**: Prominent "Add to Cart" buttons
5. **Mobile-First Design**: Optimized for all devices
6. **Fast Loading**: Optimized assets and lazy loading
7. **User Feedback**: Visual feedback for all interactions
8. **Search Accessibility**: Prominent search field
9. **Social Proof**: Review system with ratings
10. **Easy Checkout**: Quick access to cart from any page

## Customization

### Colors
Main colors can be customized in `style.css`:
- Primary: `#3498db`
- Secondary: `#2c3e50`
- Accent: `#e74c3c`
- Success: `#27ae60`

### Fonts
Default font stack:
```css
font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
```

### Icons
Using Font Awesome 6.4.0 for all icons.

## Support

For issues or questions:
- Create an issue on GitHub: https://github.com/Tapsprofile/wintersnowboard
- Check WordPress documentation: https://wordpress.org/support/

## Credits

- Theme developed for WinterSnowboard
- Icons by Font Awesome
- WooCommerce by Automattic

## License

GNU General Public License v2 or later
http://www.gnu.org/licenses/gpl-2.0.html

## Changelog

### Version 1.0.0
- Initial release
- All required features implemented
- Full WooCommerce integration
- Responsive design
- AJAX functionality
- Complete UX optimization
