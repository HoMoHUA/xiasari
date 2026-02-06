<?php
/**
 * Template Name: صفحه محصول
 * Single Product Page Template
 *
 * @package Xiaomi_Sari
 */

if (!defined('ABSPATH')) {
    exit;
}

xiaomi_sari_header_template();

// Get product ID from query
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 1;

// Sample products data
$products = array(
    1 => array(
        'name' => 'Xiaomi 14 Ultra',
        'price' => '۴۵,۹۰۰,۰۰۰',
        'old_price' => '۴۹,۰۰۰,۰۰۰',
        'discount' => '۷٪',
        'category' => 'موبایل',
        'rating' => 4.9,
        'reviews' => 234,
        'description' => 'پرچمدار شیائومی با دوربین لایکا، پردازنده اسنپدراگون ۸ نسل ۳ و صفحه نمایش AMOLED با رفرش ریت ۱۲۰ هرتز',
        'colors' => array('مشکی', 'سفید', 'سبز'),
        'specs' => array(
            array('label' => 'پردازنده', 'value' => 'Snapdragon 8 Gen 3'),
            array('label' => 'رم', 'value' => '16 گیگابایت'),
            array('label' => 'حافظه داخلی', 'value' => '512 گیگابایت'),
            array('label' => 'صفحه نمایش', 'value' => '6.73 اینچ AMOLED 120Hz'),
            array('label' => 'دوربین اصلی', 'value' => '50MP Leica Summilux'),
            array('label' => 'باتری', 'value' => '5300 میلی‌آمپر ساعت'),
        ),
    ),
    2 => array(
        'name' => 'Xiaomi TV A Pro 55"',
        'price' => '۲۲,۵۰۰,۰۰۰',
        'old_price' => '۲۵,۰۰۰,۰۰۰',
        'discount' => '۱۰٪',
        'category' => 'تلویزیون',
        'rating' => 4.7,
        'reviews' => 156,
        'description' => 'تلویزیون هوشمند ۵۵ اینچی با کیفیت ۴K UHD، سیستم عامل Google TV و پشتیبانی از Dolby Vision',
        'colors' => array('مشکی'),
        'specs' => array(
            array('label' => 'سایز صفحه', 'value' => '55 اینچ'),
            array('label' => 'رزولوشن', 'value' => '4K UHD (3840x2160)'),
            array('label' => 'پنل', 'value' => 'LED'),
            array('label' => 'رفرش ریت', 'value' => '60Hz'),
            array('label' => 'سیستم عامل', 'value' => 'Google TV'),
            array('label' => 'صدا', 'value' => 'Dolby Audio, DTS-HD'),
        ),
    ),
);

$product = isset($products[$product_id]) ? $products[$product_id] : $products[1];
?>

<main class="relative z-10 pt-32 pb-20">
    <div class="container mx-auto px-4">
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-sm text-muted mb-8 scroll-animate animate-fade-up">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-primary transition-colors">صفحه اصلی</a>
            <span>/</span>
            <a href="<?php echo esc_url(home_url('/shop')); ?>" class="hover:text-primary transition-colors">محصولات</a>
            <span>/</span>
            <span class="text-foreground"><?php echo esc_html($product['name']); ?></span>
        </nav>

        <div class="grid lg:grid-cols-2 gap-12 lg:gap-20">
            <!-- Product Image Section -->
            <div class="relative scroll-animate animate-fade-up">
                <div class="glass-card product-detail-image rounded-3xl p-8 overflow-hidden">
                    <?php if ($product['discount']): ?>
                        <div class="absolute top-6 right-6 z-20">
                            <span class="bg-primary text-primary-foreground text-sm font-bold px-4 py-2 rounded-full animate-pulse-glow">
                                <?php echo esc_html($product['discount']); ?> تخفیف
                            </span>
                        </div>
                    <?php endif; ?>

                    <div class="absolute top-6 left-6 z-20">
                        <span class="glass-effect text-foreground text-xs px-3 py-1.5 rounded-full">
                            <?php echo esc_html($product['category']); ?>
                        </span>
                    </div>

                    <img 
                        src="<?php echo XIAOMI_SARI_THEME_URI; ?>/assets/images/product-<?php echo $product_id; ?>.jpg"
                        alt="<?php echo esc_attr($product['name']); ?>"
                        class="product-detail-img w-full"
                    >
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-4 mt-6">
                    <button class="flex-1 glass-card rounded-2xl p-4 flex items-center justify-center gap-2 text-muted transition-all duration-300 hover:scale-105 wishlist-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg>
                        <span class="text-sm">افزودن به علاقه‌مندی</span>
                    </button>
                    <button class="glass-card rounded-2xl p-4 flex items-center justify-center gap-2 text-muted hover:text-primary transition-all duration-300 hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><line x1="8.59" x2="15.42" y1="13.51" y2="17.49"/><line x1="15.41" x2="8.59" y1="6.51" y2="10.49"/></svg>
                        <span class="text-sm">اشتراک‌گذاری</span>
                    </button>
                </div>
            </div>

            <!-- Product Info Section -->
            <div class="product-detail-info">
                <div class="scroll-animate animate-fade-up" style="animation-delay: 0.1s;">
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-foreground mb-4">
                        <?php echo esc_html($product['name']); ?>
                    </h1>
                    
                    <!-- Rating -->
                    <div class="product-rating mb-6">
                        <div class="rating-stars">
                            <?php for ($i = 0; $i < 5; $i++): ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="<?php echo $i < floor($product['rating']) ? 'currentColor' : 'none'; ?>" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <?php endfor; ?>
                        </div>
                        <span class="rating-value"><?php echo $product['rating']; ?></span>
                        <span class="rating-count">(<?php echo $product['reviews']; ?> نظر)</span>
                    </div>

                    <p class="text-lg text-muted leading-relaxed">
                        <?php echo esc_html($product['description']); ?>
                    </p>
                </div>

                <!-- Price Section -->
                <div class="glass-card product-price-card rounded-3xl scroll-animate animate-fade-up" style="animation-delay: 0.2s;">
                    <div class="flex items-baseline gap-4 mb-4">
                        <span class="product-current-price"><?php echo esc_html($product['price']); ?></span>
                        <span class="text-lg text-muted">تومان</span>
                    </div>
                    <?php if ($product['old_price']): ?>
                        <p class="text-muted line-through text-lg">
                            <?php echo esc_html($product['old_price']); ?> تومان
                        </p>
                    <?php endif; ?>
                    
                    <div class="product-stock">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        <span>موجود در انبار</span>
                    </div>
                </div>

                <!-- Color Selection -->
                <div class="glass-card color-selector rounded-3xl scroll-animate animate-fade-up" style="animation-delay: 0.3s;">
                    <h3 class="color-selector-title">انتخاب رنگ</h3>
                    <div class="color-options">
                        <?php foreach ($product['colors'] as $index => $color): ?>
                            <button class="color-option <?php echo $index === 0 ? 'active' : ''; ?>">
                                <?php echo esc_html($color); ?>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- CTA Buttons -->
                <div class="product-cta scroll-animate animate-fade-up" style="animation-delay: 0.4s;">
                    <button class="btn btn-primary btn-lg flex-1 rounded-2xl animate-pulse-glow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
                        افزودن به سبد خرید
                    </button>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="glass-card rounded-2xl p-4 flex items-center justify-center hover:bg-secondary transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                    </a>
                </div>

                <!-- Features -->
                <div class="product-features scroll-animate animate-fade-up" style="animation-delay: 0.5s;">
                    <div class="glass-card feature-card rounded-2xl">
                        <svg class="feature-icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/></svg>
                        <span class="feature-text">گارانتی اصالت</span>
                    </div>
                    <div class="glass-card feature-card rounded-2xl">
                        <svg class="feature-icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"/><path d="M15 18H9"/><path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14"/><circle cx="17" cy="18" r="2"/><circle cx="7" cy="18" r="2"/></svg>
                        <span class="feature-text">ارسال رایگان</span>
                    </div>
                    <div class="glass-card feature-card rounded-2xl">
                        <svg class="feature-icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12a9 9 0 0 0-9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/><path d="M3 12a9 9 0 0 0 9 9 9.75 9.75 0 0 0 6.74-2.74L21 16"/><path d="M16 21h5v-5"/></svg>
                        <span class="feature-text">۷ روز بازگشت</span>
                    </div>
                </div>

                <!-- Specs -->
                <div class="glass-card specs-card rounded-3xl scroll-animate animate-fade-up" style="animation-delay: 0.6s;">
                    <button class="specs-toggle">
                        <span>مشخصات فنی</span>
                        <svg class="specs-toggle-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                    </button>
                    <div class="specs-list" style="display: none;">
                        <?php foreach ($product['specs'] as $spec): ?>
                            <div class="spec-item">
                                <span class="spec-label"><?php echo esc_html($spec['label']); ?></span>
                                <span class="spec-value"><?php echo esc_html($spec['value']); ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
xiaomi_sari_footer_template();
