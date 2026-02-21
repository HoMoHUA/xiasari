<?php
/**
 * Shop Page Snippet - Matching React Shop.tsx Exactly
 * Search + Category Filters + Product Grid with hover overlays
 * @package Xiaomi_Sari
 */
if (!defined('ABSPATH')) exit;

xiaomi_sari_header_template();
?>

<main class="pt-32 pb-20">

<!-- Hero -->
<section class="container mx-auto px-4 mb-12">
    <div class="scroll-animate">
        <div class="text-center max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-foreground mb-6">
                فروشگاه <span class="text-primary">شیائومی ساری</span>
            </h1>
            <p class="text-xl text-muted-foreground leading-relaxed">
                جدیدترین محصولات شیائومی با بهترین قیمت
            </p>
        </div>
    </div>
</section>

<!-- Filters -->
<section class="container mx-auto px-4 mb-12">
    <div class="scroll-animate" data-delay="100">
        <div class="glass-card rounded-2xl p-6">
            <div class="flex flex-col lg:flex-row gap-6 items-center justify-between" style="display:flex;flex-direction:column;gap:1.5rem;">
                <!-- Search -->
                <div class="search-input-wrapper">
                    <svg class="search-input-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                    <input type="text" class="form-input form-input-h12 rounded-xl search-input shop-search-input" placeholder="جستجوی محصول..." style="padding-right:3rem;">
                </div>

                <!-- Category Filters - Desktop -->
                <div class="hidden lg:flex items-center gap-3" style="display:none;">
                    <?php
                    $cats = array('همه', 'موبایل', 'تلویزیون', 'جارو رباتیک', 'مانیتور', 'لوازم خانگی');
                    foreach ($cats as $idx => $c):
                        $dataVal = $idx === 0 ? 'all' : $c;
                    ?>
                    <button class="filter-btn <?php if ($idx === 0) echo 'active'; ?>" data-category="<?php echo esc_attr($dataVal); ?>"><?php echo $c; ?></button>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Mobile Filters (always visible on small screens) -->
            <div class="lg:hidden mt-6 flex flex-wrap gap-2" style="margin-top:1.5rem;display:flex;flex-wrap:wrap;gap:0.5rem;">
                <?php foreach ($cats as $idx => $c):
                    $dataVal = $idx === 0 ? 'all' : $c;
                ?>
                <button class="filter-btn <?php if ($idx === 0) echo 'active'; ?>" data-category="<?php echo esc_attr($dataVal); ?>"><?php echo $c; ?></button>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Products Grid -->
<section class="container mx-auto px-4">
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        <?php
        $products = array(
            array('id'=>1, 'name'=>'Xiaomi 14 Ultra', 'price'=>'۴۵,۹۰۰,۰۰۰', 'old'=>'۴۹,۰۰۰,۰۰۰', 'discount'=>'۷٪', 'cat'=>'موبایل', 'img'=>'xiaomi-14-ultra.jpg'),
            array('id'=>2, 'name'=>'Xiaomi TV A Pro 55"', 'price'=>'۲۲,۵۰۰,۰۰۰', 'old'=>'۲۵,۰۰۰,۰۰۰', 'discount'=>'۱۰٪', 'cat'=>'تلویزیون', 'img'=>'xiaomi-tv-a-pro.jpg'),
            array('id'=>3, 'name'=>'Roborock S8 Pro Ultra', 'price'=>'۳۸,۰۰۰,۰۰۰', 'old'=>null, 'discount'=>null, 'cat'=>'جارو رباتیک', 'img'=>'roborock-s8-pro.jpg'),
            array('id'=>4, 'name'=>'Redmi Note 13 Pro+', 'price'=>'۱۸,۹۰۰,۰۰۰', 'old'=>'۲۰,۵۰۰,۰۰۰', 'discount'=>'۸٪', 'cat'=>'موبایل', 'img'=>'redmi-note-13-pro.jpg'),
            array('id'=>5, 'name'=>'Xiaomi Monitor 27"', 'price'=>'۸,۵۰۰,۰۰۰', 'old'=>null, 'discount'=>null, 'cat'=>'مانیتور', 'img'=>'xiaomi-monitor-27.jpg'),
            array('id'=>6, 'name'=>'Mi Air Purifier 4', 'price'=>'۴,۲۰۰,۰۰۰', 'old'=>'۴,۸۰۰,۰۰۰', 'discount'=>'۱۲٪', 'cat'=>'لوازم خانگی', 'img'=>'mi-air-purifier-4.jpg'),
        );
        foreach ($products as $i => $p): ?>
        <div class="scroll-animate product-card" data-delay="<?php echo $i * 50; ?>" data-category="<?php echo esc_attr($p['cat']); ?>" data-name="<?php echo esc_attr($p['name']); ?>">
            <div class="group glass-card-hover rounded-2xl overflow-hidden">
                <div class="product-image-area">
                    <img src="<?php echo XIAOMI_SARI_THEME_URI; ?>/assets/images/products/<?php echo $p['img']; ?>" alt="<?php echo esc_attr($p['name']); ?>">
                    <div class="product-hover-overlay">
                        <a href="<?php echo esc_url(home_url('/product/' . $p['id'])); ?>" class="overlay-btn overlay-btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                        </a>
                        <button class="overlay-btn overlay-btn-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
                        </button>
                    </div>
                    <?php if ($p['discount']): ?>
                    <span class="product-discount-badge"><?php echo $p['discount']; ?> تخفیف</span>
                    <?php endif; ?>
                    <span class="product-category-badge"><?php echo $p['cat']; ?></span>
                </div>
                <div class="product-info">
                    <a href="<?php echo esc_url(home_url('/product/' . $p['id'])); ?>">
                        <h3 class="product-name"><?php echo esc_html($p['name']); ?></h3>
                    </a>
                    <div class="product-price-row">
                        <div>
                            <p class="product-price"><?php echo $p['price']; ?> تومان</p>
                            <?php if ($p['old']): ?>
                            <p class="product-old-price"><?php echo $p['old']; ?> تومان</p>
                            <?php endif; ?>
                        </div>
                        <button class="btn btn-primary btn-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

</main>

<?php
xiaomi_sari_footer_template();
