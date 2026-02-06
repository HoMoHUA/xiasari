<?php
/**
 * Template Name: فروشگاه
 * Shop Page Template
 *
 * @package Xiaomi_Sari
 */

if (!defined('ABSPATH')) {
    exit;
}

xiaomi_sari_header_template();

// Sample products data
$products = array(
    array('id' => 1, 'name' => 'Xiaomi 14 Ultra', 'price' => '۴۵,۹۰۰,۰۰۰', 'old_price' => '۴۹,۰۰۰,۰۰۰', 'discount' => '۷٪', 'category' => 'موبایل'),
    array('id' => 2, 'name' => 'Xiaomi TV A Pro 55"', 'price' => '۲۲,۵۰۰,۰۰۰', 'old_price' => '۲۵,۰۰۰,۰۰۰', 'discount' => '۱۰٪', 'category' => 'تلویزیون'),
    array('id' => 3, 'name' => 'Roborock S8 Pro Ultra', 'price' => '۳۸,۰۰۰,۰۰۰', 'old_price' => null, 'discount' => null, 'category' => 'جارو رباتیک'),
    array('id' => 4, 'name' => 'Redmi Note 13 Pro+', 'price' => '۱۸,۹۰۰,۰۰۰', 'old_price' => '۲۰,۵۰۰,۰۰۰', 'discount' => '۸٪', 'category' => 'موبایل'),
    array('id' => 5, 'name' => 'Xiaomi Monitor 27"', 'price' => '۸,۵۰۰,۰۰۰', 'old_price' => null, 'discount' => null, 'category' => 'مانیتور'),
    array('id' => 6, 'name' => 'Mi Air Purifier 4', 'price' => '۴,۲۰۰,۰۰۰', 'old_price' => '۴,۸۰۰,۰۰۰', 'discount' => '۱۲٪', 'category' => 'لوازم خانگی'),
);

$categories = array('همه', 'موبایل', 'تلویزیون', 'جارو رباتیک', 'مانیتور', 'لوازم خانگی');
?>

<main class="pt-32 pb-20">
    <!-- Hero Section -->
    <section class="container mx-auto px-4 mb-12">
        <div class="text-center max-w-4xl mx-auto scroll-animate animate-fade-up">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-foreground mb-6">
                فروشگاه <span class="text-primary">شیائومی ساری</span>
            </h1>
            <p class="text-xl text-muted leading-relaxed">
                جدیدترین محصولات شیائومی با بهترین قیمت
            </p>
        </div>
    </section>

    <!-- Filters Section -->
    <section class="container mx-auto px-4 mb-12">
        <div class="glass-card rounded-2xl p-6 scroll-animate animate-fade-up" style="animation-delay: 0.1s;">
            <div class="shop-filters">
                <!-- Search -->
                <div class="search-wrapper">
                    <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                    <input type="text" id="search-input" class="form-input search-input rounded-xl h-12" placeholder="جستجوی محصول...">
                </div>

                <!-- Category Filters -->
                <div class="filter-buttons">
                    <?php foreach ($categories as $index => $category): ?>
                        <button class="filter-btn <?php echo $index === 0 ? 'active' : ''; ?>" data-category="<?php echo $index === 0 ? 'all' : esc_attr($category); ?>">
                            <?php echo esc_html($category); ?>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Grid -->
    <section class="container mx-auto px-4">
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php foreach ($products as $index => $product): ?>
                <div class="glass-card-hover product-card rounded-2xl scroll-animate animate-fade-up" style="animation-delay: <?php echo $index * 0.05; ?>s;" data-category="<?php echo esc_attr($product['category']); ?>">
                    <!-- Product Image -->
                    <div class="product-image-wrapper product-tilt">
                        <img src="<?php echo XIAOMI_SARI_THEME_URI; ?>/assets/images/product-<?php echo $product['id']; ?>.jpg" alt="<?php echo esc_attr($product['name']); ?>">
                        
                        <!-- Overlay on Hover -->
                        <div class="product-overlay">
                            <a href="<?php echo esc_url(home_url('/product/?id=' . $product['id'])); ?>" class="product-overlay-btn primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                            </a>
                            <button class="product-overlay-btn secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
                            </button>
                        </div>

                        <?php if ($product['discount']): ?>
                            <span class="product-badge discount"><?php echo esc_html($product['discount']); ?> تخفیف</span>
                        <?php endif; ?>
                        <span class="product-badge category"><?php echo esc_html($product['category']); ?></span>
                    </div>

                    <!-- Product Info -->
                    <div class="product-info">
                        <a href="<?php echo esc_url(home_url('/product/?id=' . $product['id'])); ?>">
                            <h3 class="product-title"><?php echo esc_html($product['name']); ?></h3>
                        </a>
                        <div class="product-price-row">
                            <div>
                                <p class="product-price"><?php echo esc_html($product['price']); ?> تومان</p>
                                <?php if ($product['old_price']): ?>
                                    <p class="product-original-price"><?php echo esc_html($product['old_price']); ?> تومان</p>
                                <?php endif; ?>
                            </div>
                            <button class="btn btn-primary btn-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Empty State -->
        <div id="empty-state" class="empty-state" style="display: none;">
            <p class="text-muted text-lg">محصولی یافت نشد</p>
        </div>
    </section>
</main>

<?php
xiaomi_sari_footer_template();
