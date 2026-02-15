# WinterSnowboard Theme - Installation & Setup Guide

## Prerequisites

Before installing the WinterSnowboard theme, ensure you have:

1. **WordPress Installation** (Version 5.8 or higher)
2. **PHP 7.4 or higher**
3. **MySQL 5.6 or higher** OR **MariaDB 10.1 or higher**
4. **WooCommerce Plugin** (latest version)

## Step-by-Step Installation

### 1. Install WordPress

If you don't have WordPress installed:

1. Download WordPress from https://wordpress.org/download/
2. Upload files to your web server
3. Create a MySQL database
4. Run the WordPress installation wizard
5. Complete the initial setup

### 2. Install WooCommerce Plugin

1. Log in to WordPress Admin Dashboard
2. Navigate to **Plugins > Add New**
3. Search for "WooCommerce"
4. Click **Install Now** on the WooCommerce plugin
5. Click **Activate**
6. Follow the WooCommerce setup wizard:
   - Configure store details (country, currency)
   - Set up payment methods
   - Configure shipping options
   - Select optional features

### 3. Install the WinterSnowboard Theme

#### Option A: Manual Upload via Admin Panel

1. Download the theme folder (`wintersnowboard`)
2. Create a ZIP file of the theme folder
3. Go to **Appearance > Themes** in WordPress Admin
4. Click **Add New** > **Upload Theme**
5. Choose the ZIP file
6. Click **Install Now**
7. Click **Activate**

#### Option B: FTP Upload

1. Connect to your server via FTP
2. Navigate to `/wp-content/themes/`
3. Upload the entire `wintersnowboard` folder
4. Go to **Appearance > Themes** in WordPress Admin
5. Find "Winter Snowboard" and click **Activate**

### 4. Configure Theme Settings

#### Set Up Logo

1. Go to **Appearance > Customize**
2. Navigate to **Site Identity**
3. Upload your logo under **Logo**
4. Save changes

#### Create Navigation Menu

1. Go to **Appearance > Menus**
2. Create a new menu (e.g., "Main Menu")
3. Add pages to the menu:
   - Home
   - Shop
   - About
   - Contact
   - My Account
   - Blog
4. Assign the menu to **Primary Menu** location
5. Save the menu

#### Configure Footer Widgets

1. Go to **Appearance > Widgets**
2. Add widgets to **Footer Column 1-4**:

   **Footer Column 1 - About:**
   - Add a "Text" widget
   - Enter company information
   - Add social media links

   **Footer Column 2 - Quick Links:**
   - Add a "Navigation Menu" widget
   - Select footer menu

   **Footer Column 3 - Customer Service:**
   - Add a "Custom HTML" widget
   - Add customer service links

   **Footer Column 4 - Contact:**
   - Add a "Text" widget
   - Include contact information
   - Add newsletter form

### 5. Set Up WooCommerce Products

#### Add Product Categories

1. Go to **Products > Categories**
2. Add at least 8 categories for optimal display:
   - Snowboards
   - Bindings
   - Boots
   - Helmets
   - Goggles
   - Apparel
   - Accessories
   - Sale Items

#### Add Sample Products (Minimum 10)

1. Go to **Products > Add New**
2. For each product, add:
   - Product title
   - Description
   - Price (Regular and Sale price if applicable)
   - Product image
   - Gallery images
   - Categories
   - Product tags
3. Publish the product
4. Repeat for at least 10 products

#### Enable Product Reviews

1. Go to **WooCommerce > Settings > Products**
2. Check **Enable product reviews**
3. Check **Show verified owner label**
4. Check **Reviews can only be left by verified owners**
5. Save changes

### 6. Optional Plugin Recommendations

#### Wishlist Functionality

1. Install **YITH WooCommerce Wishlist**:
   - Go to **Plugins > Add New**
   - Search for "YITH WooCommerce Wishlist"
   - Install and activate
   - Configure settings

#### Additional Recommended Plugins

- **Contact Form 7**: For contact forms
- **Wordfence Security**: For security
- **Yoast SEO**: For search engine optimization
- **WP Super Cache**: For performance
- **UpdraftPlus**: For backups

### 7. Theme Customization

#### Customize Offer Banner

Edit `/wp-content/themes/wintersnowboard/header.php` (line 20):

```php
<div class="offer-text">
    🔥 YOUR CUSTOM OFFER TEXT HERE 🔥
</div>
```

#### Customize Colors

Edit `/wp-content/themes/wintersnowboard/style.css`:

```css
/* Change primary color */
background-color: #3498db; /* Replace with your color */

/* Change accent color */
background-color: #e74c3c; /* Replace with your color */
```

#### Customize Footer Copyright

Edit `/wp-content/themes/wintersnowboard/footer.php` (bottom section):

```php
<p>&copy; <?php echo date( 'Y' ); ?> Your Company Name. All rights reserved.</p>
```

### 8. Performance Optimization

#### Enable Caching

1. Install **WP Super Cache** or **W3 Total Cache**
2. Enable page caching
3. Enable browser caching
4. Minify CSS/JS

#### Optimize Images

1. Install **Smush** or **ShortPixel** plugin
2. Compress existing images
3. Enable automatic compression for new uploads

#### CDN Setup (Optional)

1. Sign up for a CDN service (Cloudflare, StackPath, etc.)
2. Configure CDN settings
3. Update DNS records

### 9. Testing Checklist

After installation, test the following:

- [ ] Homepage loads correctly
- [ ] Top offer banner is visible and animated
- [ ] Order tracking link works
- [ ] Menu toggle button works (show/hide menu)
- [ ] Search functionality works
- [ ] Cart icon updates when products added
- [ ] All categories display correctly
- [ ] Product grid shows minimum 10 products
- [ ] Add to cart works (AJAX)
- [ ] Product reviews display
- [ ] Footer displays correctly with all columns
- [ ] Social media links work
- [ ] Newsletter form works
- [ ] Mobile responsive design works
- [ ] All pages are accessible

### 10. Troubleshooting

#### Theme not displaying correctly

1. Check if WooCommerce is activated
2. Clear browser cache
3. Clear WordPress cache
4. Regenerate thumbnails (use plugin)

#### Products not showing

1. Ensure products are published (not draft)
2. Check if WooCommerce is properly configured
3. Verify product visibility settings

#### Menu not appearing

1. Go to **Appearance > Menus**
2. Assign menu to "Primary Menu" location
3. Save changes

#### Reviews not displaying

1. Enable reviews in WooCommerce settings
2. Add manual reviews to products
3. Check theme functions.php for review function

### 11. Going Live

Before launching your site:

1. **Security:**
   - Install security plugin (Wordfence)
   - Use strong passwords
   - Enable SSL certificate
   - Limit login attempts

2. **SEO:**
   - Install Yoast SEO
   - Submit sitemap to Google
   - Set up Google Analytics
   - Configure meta descriptions

3. **Legal:**
   - Create Privacy Policy page
   - Create Terms & Conditions page
   - Create Shipping & Returns page
   - Add cookie consent notice

4. **Testing:**
   - Test checkout process
   - Test payment gateways
   - Test email notifications
   - Test on multiple devices
   - Test on multiple browsers

5. **Backup:**
   - Set up automated backups
   - Test backup restoration
   - Store backups off-site

## Support & Documentation

- **WordPress Codex**: https://codex.wordpress.org/
- **WooCommerce Docs**: https://docs.woocommerce.com/
- **Theme Repository**: https://github.com/Tapsprofile/wintersnowboard
- **WordPress Support Forums**: https://wordpress.org/support/

## Quick Reference

### File Locations

- **Theme Files**: `/wp-content/themes/wintersnowboard/`
- **Uploads**: `/wp-content/uploads/`
- **Plugins**: `/wp-content/plugins/`
- **Config**: `/wp-config.php`

### Important URLs

- **Admin Dashboard**: `yoursite.com/wp-admin`
- **Shop Page**: `yoursite.com/shop`
- **Cart**: `yoursite.com/cart`
- **Checkout**: `yoursite.com/checkout`
- **My Account**: `yoursite.com/my-account`

### Default Credentials

Set during WordPress installation. Store securely!

---

## Need Help?

If you encounter any issues during installation:

1. Check the troubleshooting section above
2. Review WordPress and WooCommerce documentation
3. Search WordPress support forums
4. Create an issue on GitHub repository

---

**Version**: 1.0.0  
**Last Updated**: February 2026  
**License**: GPL v2 or later
