<?php
/**
 * Xiaomi Sari Theme Functions
 *
 * @package Xiaomi_Sari
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

// Theme Constants
define('XIAOMI_SARI_VERSION', '1.0.0');
define('XIAOMI_SARI_THEME_DIR', get_template_directory());
define('XIAOMI_SARI_THEME_URI', get_template_directory_uri());

/**
 * Theme Setup
 */
function xiaomi_sari_setup() {
    // Add support for title tag
    add_theme_support('title-tag');

    // Add support for post thumbnails
    add_theme_support('post-thumbnails');

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-width'  => true,
        'flex-height' => true,
    ));

    // Add support for HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style',
    ));

    // Add support for WooCommerce
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('منوی اصلی', 'xiaomi-sari'),
        'footer'  => __('منوی فوتر', 'xiaomi-sari'),
        'mobile'  => __('منوی موبایل', 'xiaomi-sari'),
    ));

    // Add support for editor styles
    add_theme_support('editor-styles');
    add_editor_style('style.css');

    // Add support for responsive embeds
    add_theme_support('responsive-embeds');

    // Add support for align wide blocks
    add_theme_support('align-wide');

    // Set content width
    global $content_width;
    if (!isset($content_width)) {
        $content_width = 1400;
    }
}
add_action('after_setup_theme', 'xiaomi_sari_setup');

/**
 * Enqueue Styles and Scripts
 */
function xiaomi_sari_scripts() {
    // Main stylesheet
    wp_enqueue_style(
        'xiaomi-sari-style',
        get_stylesheet_uri(),
        array(),
        XIAOMI_SARI_VERSION
    );

    // Vazirmatn Font
    wp_enqueue_style(
        'vazirmatn-font',
        'https://fonts.googleapis.com/css2?family=Vazirmatn:wght@100;200;300;400;500;600;700;800;900&display=swap',
        array(),
        null
    );

    // Main JavaScript
    wp_enqueue_script(
        'xiaomi-sari-scripts',
        XIAOMI_SARI_THEME_URI . '/assets/js/main.js',
        array(),
        XIAOMI_SARI_VERSION,
        true
    );

    // Localize script for AJAX
    wp_localize_script('xiaomi-sari-scripts', 'xiaomiSari', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('xiaomi_sari_nonce'),
        'themeUrl' => XIAOMI_SARI_THEME_URI,
    ));
}
add_action('wp_enqueue_scripts', 'xiaomi_sari_scripts');

/**
 * Register Widget Areas
 */
function xiaomi_sari_widgets_init() {
    register_sidebar(array(
        'name'          => __('سایدبار فروشگاه', 'xiaomi-sari'),
        'id'            => 'shop-sidebar',
        'description'   => __('ویجت‌های سایدبار صفحه فروشگاه', 'xiaomi-sari'),
        'before_widget' => '<div id="%1$s" class="widget glass-card rounded-2xl p-6 mb-6 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title text-lg font-bold text-foreground mb-4">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('فوتر ۱', 'xiaomi-sari'),
        'id'            => 'footer-1',
        'description'   => __('ویجت‌های ستون اول فوتر', 'xiaomi-sari'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('فوتر ۲', 'xiaomi-sari'),
        'id'            => 'footer-2',
        'description'   => __('ویجت‌های ستون دوم فوتر', 'xiaomi-sari'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('فوتر ۳', 'xiaomi-sari'),
        'id'            => 'footer-3',
        'description'   => __('ویجت‌های ستون سوم فوتر', 'xiaomi-sari'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('فوتر ۴', 'xiaomi-sari'),
        'id'            => 'footer-4',
        'description'   => __('ویجت‌های ستون چهارم فوتر', 'xiaomi-sari'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'xiaomi_sari_widgets_init');

/**
 * Custom Theme Colors for Customizer
 */
function xiaomi_sari_customize_register($wp_customize) {
    // Theme Colors Section
    $wp_customize->add_section('xiaomi_sari_colors', array(
        'title'    => __('رنگ‌های قالب', 'xiaomi-sari'),
        'priority' => 30,
    ));

    // Primary Color
    $wp_customize->add_setting('primary_color', array(
        'default'           => '#f97316',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label'    => __('رنگ اصلی (نارنجی)', 'xiaomi-sari'),
        'section'  => 'xiaomi_sari_colors',
        'settings' => 'primary_color',
    )));

    // Contact Info Section
    $wp_customize->add_section('xiaomi_sari_contact', array(
        'title'    => __('اطلاعات تماس', 'xiaomi-sari'),
        'priority' => 35,
    ));

    // Phone Number
    $wp_customize->add_setting('contact_phone', array(
        'default'           => '01133333333',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_phone', array(
        'label'    => __('شماره تلفن', 'xiaomi-sari'),
        'section'  => 'xiaomi_sari_contact',
        'type'     => 'text',
    ));

    // Address
    $wp_customize->add_setting('contact_address', array(
        'default'           => 'ساری، خیابان فرهنگ',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_address', array(
        'label'    => __('آدرس', 'xiaomi-sari'),
        'section'  => 'xiaomi_sari_contact',
        'type'     => 'text',
    ));

    // Working Hours
    $wp_customize->add_setting('contact_hours', array(
        'default'           => '۹ صبح تا ۹ شب',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_hours', array(
        'label'    => __('ساعات کاری', 'xiaomi-sari'),
        'section'  => 'xiaomi_sari_contact',
        'type'     => 'text',
    ));

    // Social Media Section
    $wp_customize->add_section('xiaomi_sari_social', array(
        'title'    => __('شبکه‌های اجتماعی', 'xiaomi-sari'),
        'priority' => 40,
    ));

    // Instagram
    $wp_customize->add_setting('social_instagram', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_instagram', array(
        'label'    => __('لینک اینستاگرام', 'xiaomi-sari'),
        'section'  => 'xiaomi_sari_social',
        'type'     => 'url',
    ));

    // Telegram
    $wp_customize->add_setting('social_telegram', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_telegram', array(
        'label'    => __('لینک تلگرام', 'xiaomi-sari'),
        'section'  => 'xiaomi_sari_social',
        'type'     => 'url',
    ));

    // WhatsApp
    $wp_customize->add_setting('social_whatsapp', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_whatsapp', array(
        'label'    => __('لینک واتساپ', 'xiaomi-sari'),
        'section'  => 'xiaomi_sari_social',
        'type'     => 'url',
    ));
}
add_action('customize_register', 'xiaomi_sari_customize_register');

/**
 * Output Custom CSS from Customizer
 */
function xiaomi_sari_custom_css() {
    $primary_color = get_theme_mod('primary_color', '#f97316');
    
    // Convert hex to HSL for CSS variables
    list($h, $s, $l) = xiaomi_sari_hex_to_hsl($primary_color);
    
    $css = "
    :root {
        --primary: {$h} {$s}% {$l}%;
        --accent: {$h} {$s}% {$l}%;
        --ring: {$h} {$s}% {$l}%;
    }";
    
    wp_add_inline_style('xiaomi-sari-style', $css);
}
add_action('wp_enqueue_scripts', 'xiaomi_sari_custom_css', 20);

/**
 * Convert Hex to HSL
 */
function xiaomi_sari_hex_to_hsl($hex) {
    $hex = ltrim($hex, '#');
    
    $r = hexdec(substr($hex, 0, 2)) / 255;
    $g = hexdec(substr($hex, 2, 2)) / 255;
    $b = hexdec(substr($hex, 4, 2)) / 255;
    
    $max = max($r, $g, $b);
    $min = min($r, $g, $b);
    
    $l = ($max + $min) / 2;
    
    if ($max == $min) {
        $h = $s = 0;
    } else {
        $d = $max - $min;
        $s = $l > 0.5 ? $d / (2 - $max - $min) : $d / ($max + $min);
        
        switch ($max) {
            case $r:
                $h = ($g - $b) / $d + ($g < $b ? 6 : 0);
                break;
            case $g:
                $h = ($b - $r) / $d + 2;
                break;
            case $b:
                $h = ($r - $g) / $d + 4;
                break;
        }
        
        $h /= 6;
    }
    
    return array(
        round($h * 360),
        round($s * 100),
        round($l * 100)
    );
}

/**
 * Helper function: Get Theme Contact Info
 */
function xiaomi_sari_get_contact_info($key = '') {
    $contact_info = array(
        'phone'   => get_theme_mod('contact_phone', '01133333333'),
        'address' => get_theme_mod('contact_address', 'ساری، خیابان فرهنگ'),
        'hours'   => get_theme_mod('contact_hours', '۹ صبح تا ۹ شب'),
    );
    
    if ($key && isset($contact_info[$key])) {
        return $contact_info[$key];
    }
    
    return $contact_info;
}

/**
 * Helper function: Get Theme Social Links
 */
function xiaomi_sari_get_social_links() {
    return array(
        'instagram' => get_theme_mod('social_instagram', ''),
        'telegram'  => get_theme_mod('social_telegram', ''),
        'whatsapp'  => get_theme_mod('social_whatsapp', ''),
    );
}

/**
 * Helper function: Format Price in Persian
 */
function xiaomi_sari_format_price($price) {
    $persian_digits = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
    $english_digits = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    
    $formatted = number_format($price);
    return str_replace($english_digits, $persian_digits, $formatted);
}

/**
 * Helper function: Convert to Persian Numbers
 */
function xiaomi_sari_to_persian($string) {
    $persian_digits = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
    $english_digits = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    
    return str_replace($english_digits, $persian_digits, $string);
}

/**
 * AJAX Handler: Lead Form Submission
 */
function xiaomi_sari_submit_lead() {
    check_ajax_referer('xiaomi_sari_nonce', 'nonce');
    
    $name  = sanitize_text_field($_POST['name'] ?? '');
    $phone = sanitize_text_field($_POST['phone'] ?? '');
    $email = sanitize_email($_POST['email'] ?? '');
    $message = sanitize_textarea_field($_POST['message'] ?? '');
    
    if (empty($name) || empty($phone)) {
        wp_send_json_error(array('message' => 'لطفا فیلدهای ضروری را پر کنید.'));
    }
    
    // Save to database or send email
    $admin_email = get_option('admin_email');
    $subject = 'درخواست جدید از فرم تماس - ' . $name;
    $body = "نام: {$name}\nتلفن: {$phone}\nایمیل: {$email}\n\nپیام:\n{$message}";
    
    $sent = wp_mail($admin_email, $subject, $body);
    
    if ($sent) {
        wp_send_json_success(array('message' => 'پیام شما با موفقیت ارسال شد.'));
    } else {
        wp_send_json_error(array('message' => 'خطا در ارسال پیام. لطفا دوباره تلاش کنید.'));
    }
}
add_action('wp_ajax_xiaomi_sari_submit_lead', 'xiaomi_sari_submit_lead');
add_action('wp_ajax_nopriv_xiaomi_sari_submit_lead', 'xiaomi_sari_submit_lead');

/**
 * WooCommerce: Customize Add to Cart Button
 */
function xiaomi_sari_wc_add_to_cart_btn($button, $product) {
    return str_replace('button', 'button btn btn-primary', $button);
}
add_filter('woocommerce_loop_add_to_cart_link', 'xiaomi_sari_wc_add_to_cart_btn', 10, 2);

/**
 * WooCommerce: Change number of products per row
 */
function xiaomi_sari_wc_loop_columns() {
    return 4;
}
add_filter('loop_shop_columns', 'xiaomi_sari_wc_loop_columns');

/**
 * WooCommerce: Change number of products per page
 */
function xiaomi_sari_wc_products_per_page() {
    return 12;
}
add_filter('loop_shop_per_page', 'xiaomi_sari_wc_products_per_page');

/**
 * Shortcode: Featured Products
 */
function xiaomi_sari_featured_products_shortcode($atts) {
    $atts = shortcode_atts(array(
        'count'    => 6,
        'category' => '',
    ), $atts);
    
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => $atts['count'],
        'meta_key'       => '_featured',
        'meta_value'     => 'yes',
    );
    
    if (!empty($atts['category'])) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => $atts['category'],
            ),
        );
    }
    
    $products = new WP_Query($args);
    
    ob_start();
    
    if ($products->have_posts()) {
        echo '<div class="products-grid">';
        
        while ($products->have_posts()) {
            $products->the_post();
            global $product;
            
            $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
            $price = $product->get_price_html();
            $sale_price = $product->get_sale_price();
            $regular_price = $product->get_regular_price();
            
            ?>
            <div class="product-card glass-card-hover">
                <div class="product-image-wrapper">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title_attribute(); ?>" class="product-image">
                    </a>
                    
                    <?php if ($product->is_on_sale()) : ?>
                    <span class="product-discount-badge">
                        <?php 
                        $discount = round((($regular_price - $sale_price) / $regular_price) * 100);
                        echo xiaomi_sari_to_persian($discount) . '٪ تخفیف';
                        ?>
                    </span>
                    <?php endif; ?>
                    
                    <span class="product-category-badge glass-effect">
                        <?php 
                        $terms = get_the_terms(get_the_ID(), 'product_cat');
                        if ($terms) echo esc_html($terms[0]->name);
                        ?>
                    </span>
                    
                    <div class="product-overlay">
                        <a href="<?php the_permalink(); ?>" class="product-action-btn primary">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </a>
                        <button class="product-action-btn secondary add-to-cart" data-product-id="<?php echo get_the_ID(); ?>">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="9" cy="21" r="1"/>
                                <circle cx="20" cy="21" r="1"/>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
                            </svg>
                        </button>
                    </div>
                </div>
                
                <div class="product-info">
                    <a href="<?php the_permalink(); ?>">
                        <h3 class="product-title"><?php the_title(); ?></h3>
                    </a>
                    <div class="product-price-wrapper">
                        <div>
                            <p class="product-price"><?php echo $price; ?></p>
                        </div>
                        <button class="btn btn-icon btn-primary add-to-cart" data-product-id="<?php echo get_the_ID(); ?>">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="9" cy="21" r="1"/>
                                <circle cx="20" cy="21" r="1"/>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <?php
        }
        
        echo '</div>';
        
        wp_reset_postdata();
    }
    
    return ob_get_clean();
}
add_shortcode('xiaomi_featured_products', 'xiaomi_sari_featured_products_shortcode');

/**
 * Shortcode: Product Categories
 */
function xiaomi_sari_categories_shortcode($atts) {
    $atts = shortcode_atts(array(
        'count'     => 5,
        'parent'    => 0,
        'hide_empty' => true,
    ), $atts);
    
    $categories = get_terms(array(
        'taxonomy'   => 'product_cat',
        'number'     => $atts['count'],
        'parent'     => $atts['parent'],
        'hide_empty' => $atts['hide_empty'],
    ));
    
    ob_start();
    
    if (!empty($categories) && !is_wp_error($categories)) {
        echo '<div class="categories-grid">';
        
        foreach ($categories as $category) {
            $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
            $image = wp_get_attachment_url($thumbnail_id);
            
            ?>
            <a href="<?php echo get_term_link($category); ?>" class="category-card">
                <div class="category-image-wrapper">
                    <?php if ($image) : ?>
                    <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($category->name); ?>" class="category-image">
                    <?php endif; ?>
                </div>
                <div class="category-overlay">
                    <h3 class="category-name"><?php echo esc_html($category->name); ?></h3>
                </div>
            </a>
            <?php
        }
        
        echo '</div>';
    }
    
    return ob_get_clean();
}
add_shortcode('xiaomi_categories', 'xiaomi_sari_categories_shortcode');

/**
 * Shortcode: Testimonials
 */
function xiaomi_sari_testimonials_shortcode($atts) {
    $atts = shortcode_atts(array(
        'count' => 3,
    ), $atts);
    
    // Default testimonials - can be replaced with custom post type
    $testimonials = array(
        array(
            'name'    => 'محمد رضایی',
            'role'    => 'مشتری',
            'initial' => 'م',
            'text'    => 'بسیار راضی هستم از خریدم. کیفیت محصول عالی بود و پشتیبانی فوق‌العاده. قطعا دوباره خرید می‌کنم.',
            'rating'  => 5,
        ),
        array(
            'name'    => 'زهرا احمدی',
            'role'    => 'مشتری',
            'initial' => 'ز',
            'text'    => 'ارسال سریع و بسته‌بندی مناسب. گوشی کاملا اورجینال بود و با گارانتی معتبر. ممنون از شیائومی ساری.',
            'rating'  => 5,
        ),
        array(
            'name'    => 'علی محمدی',
            'role'    => 'مشتری',
            'initial' => 'ع',
            'text'    => 'قیمت‌ها نسبت به بازار خیلی مناسب‌تره. مشاوره خریدشون هم عالی بود و کمک کرد بهترین انتخاب رو داشته باشم.',
            'rating'  => 5,
        ),
    );
    
    ob_start();
    
    echo '<div class="testimonials-grid">';
    
    foreach (array_slice($testimonials, 0, $atts['count']) as $testimonial) {
        ?>
        <div class="testimonial-card glass-card">
            <div class="testimonial-stars">
                <?php for ($i = 0; $i < $testimonial['rating']; $i++) : ?>
                <svg class="testimonial-star" viewBox="0 0 24 24" fill="currentColor">
                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                </svg>
                <?php endfor; ?>
            </div>
            <p class="testimonial-text"><?php echo esc_html($testimonial['text']); ?></p>
            <div class="testimonial-author">
                <div class="testimonial-avatar"><?php echo esc_html($testimonial['initial']); ?></div>
                <div>
                    <div class="testimonial-name"><?php echo esc_html($testimonial['name']); ?></div>
                    <div class="testimonial-role"><?php echo esc_html($testimonial['role']); ?></div>
                </div>
            </div>
        </div>
        <?php
    }
    
    echo '</div>';
    
    return ob_get_clean();
}
add_shortcode('xiaomi_testimonials', 'xiaomi_sari_testimonials_shortcode');

/**
 * Shortcode: Lead Form
 */
function xiaomi_sari_lead_form_shortcode($atts) {
    $atts = shortcode_atts(array(
        'title'       => 'دریافت مشاوره رایگان',
        'description' => 'شماره خود را وارد کنید تا کارشناسان ما با شما تماس بگیرند.',
    ), $atts);
    
    ob_start();
    ?>
    <div class="lead-form-wrapper glass-card">
        <h2 class="lead-title"><?php echo esc_html($atts['title']); ?></h2>
        <p class="lead-description"><?php echo esc_html($atts['description']); ?></p>
        <form class="lead-form" id="xiaomi-lead-form">
            <input type="text" name="name" class="form-input form-input-lg" placeholder="نام و نام خانوادگی" required>
            <input type="tel" name="phone" class="form-input form-input-lg" placeholder="شماره موبایل" required>
            <button type="submit" class="btn btn-primary btn-lg">ثبت درخواست</button>
        </form>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('xiaomi_lead_form', 'xiaomi_sari_lead_form_shortcode');

/**
 * Shortcode: Value Propositions
 */
function xiaomi_sari_values_shortcode() {
    $values = array(
        array(
            'icon'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
            'title' => 'گارانتی اصالت کالا',
            'desc'  => 'تمامی محصولات با ضمانت اصالت و گارانتی معتبر ارائه می‌شوند',
        ),
        array(
            'icon'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>',
            'title' => 'ارسال سریع و رایگان',
            'desc'  => 'ارسال رایگان به سراسر استان مازندران در کمتر از ۲۴ ساعت',
        ),
        array(
            'icon'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>',
            'title' => 'بهترین قیمت بازار',
            'desc'  => 'تضمین پایین‌ترین قیمت با امکان مقایسه قیمت',
        ),
        array(
            'icon'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>',
            'title' => 'پشتیبانی تخصصی',
            'desc'  => 'مشاوره رایگان و پشتیبانی ۷ روز هفته',
        ),
    );
    
    ob_start();
    
    echo '<div class="value-grid">';
    
    foreach ($values as $value) {
        ?>
        <div class="value-card glass-card">
            <div class="value-icon"><?php echo $value['icon']; ?></div>
            <h3 class="value-title"><?php echo esc_html($value['title']); ?></h3>
            <p class="value-description"><?php echo esc_html($value['desc']); ?></p>
        </div>
        <?php
    }
    
    echo '</div>';
    
    return ob_get_clean();
}
add_shortcode('xiaomi_values', 'xiaomi_sari_values_shortcode');

/**
 * Disable Gutenberg for specific pages (optional)
 */
function xiaomi_sari_disable_gutenberg($current_status, $post_type) {
    if ($post_type === 'page') {
        return false;
    }
    return $current_status;
}
// Uncomment to disable Gutenberg for pages
// add_filter('use_block_editor_for_post_type', 'xiaomi_sari_disable_gutenberg', 10, 2);

/**
 * Add body classes
 */
function xiaomi_sari_body_classes($classes) {
    $classes[] = 'xiaomi-sari-theme';
    $classes[] = 'dark-mode';
    
    if (is_front_page()) {
        $classes[] = 'front-page';
    }
    
    if (class_exists('WooCommerce')) {
        if (is_shop() || is_product_category() || is_product_tag()) {
            $classes[] = 'shop-page';
        }
        if (is_product()) {
            $classes[] = 'single-product-page';
        }
        if (is_cart()) {
            $classes[] = 'cart-page';
        }
        if (is_checkout()) {
            $classes[] = 'checkout-page';
        }
    }
    
    return $classes;
}
add_filter('body_class', 'xiaomi_sari_body_classes');

/**
 * Remove WordPress version meta tag
 */
remove_action('wp_head', 'wp_generator');

/**
 * Defer non-critical JavaScript
 */
function xiaomi_sari_defer_scripts($tag, $handle) {
    $defer_scripts = array('xiaomi-sari-scripts');
    
    if (in_array($handle, $defer_scripts)) {
        return str_replace(' src', ' defer src', $tag);
    }
    
    return $tag;
}
add_filter('script_loader_tag', 'xiaomi_sari_defer_scripts', 10, 2);

/**
 * Add preconnect for external resources
 */
function xiaomi_sari_preconnect() {
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php
}
add_action('wp_head', 'xiaomi_sari_preconnect', 1);
