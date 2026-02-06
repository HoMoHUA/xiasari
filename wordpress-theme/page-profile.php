<?php
/**
 * Template Name: پروفایل کاربری
 * User Profile Page Template
 *
 * @package Xiaomi_Sari
 */

if (!defined('ABSPATH')) {
    exit;
}

xiaomi_sari_header_template();

$menu_items = array(
    array('id' => 'profile', 'label' => 'اطلاعات حساب', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>'),
    array('id' => 'orders', 'label' => 'سفارش‌های من', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7.5 4.27 9 5.15"/><path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/><path d="m3.3 7 8.7 5 8.7-5"/><path d="M12 22V12"/></svg>'),
    array('id' => 'wishlist', 'label' => 'علاقه‌مندی‌ها', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg>'),
    array('id' => 'addresses', 'label' => 'آدرس‌های من', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>'),
    array('id' => 'settings', 'label' => 'تنظیمات', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/><circle cx="12" cy="12" r="3"/></svg>'),
);

$orders = array(
    array('id' => 'ORD-1234', 'date' => '۱۴۰۳/۰۹/۱۵', 'status' => 'تحویل شده', 'status_class' => 'delivered', 'total' => '۴۵,۹۰۰,۰۰۰'),
    array('id' => 'ORD-1235', 'date' => '۱۴۰۳/۰۹/۱۰', 'status' => 'در حال ارسال', 'status_class' => 'shipping', 'total' => '۱۸,۹۰۰,۰۰۰'),
);

$wishlist = array(
    array('id' => 1, 'name' => 'Xiaomi 14 Ultra', 'price' => '۴۵,۹۰۰,۰۰۰'),
    array('id' => 4, 'name' => 'Redmi Note 13 Pro+', 'price' => '۱۸,۹۰۰,۰۰۰'),
);
?>

<main class="pt-32 pb-20">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl md:text-4xl font-bold text-foreground mb-8 scroll-animate animate-fade-up">
            حساب <span class="text-primary">کاربری</span>
        </h1>

        <div class="grid lg:grid-cols-4 gap-8">
            <!-- Sidebar -->
            <div class="scroll-animate animate-fade-up" style="animation-delay: 0.1s;">
                <div class="glass-card profile-sidebar rounded-2xl">
                    <!-- User Info -->
                    <div class="profile-user">
                        <div class="profile-avatar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        </div>
                        <div>
                            <h3 class="profile-name">علی محمدی</h3>
                            <p class="profile-phone">۰۹۱۲۳۴۵۶۷۸۹</p>
                        </div>
                    </div>

                    <!-- Menu -->
                    <nav class="profile-menu">
                        <?php foreach ($menu_items as $index => $item): ?>
                            <button class="profile-menu-item <?php echo $index === 0 ? 'active' : ''; ?>" data-tab="<?php echo esc_attr($item['id']); ?>">
                                <div class="profile-menu-item-content">
                                    <?php echo $item['icon']; ?>
                                    <span><?php echo esc_html($item['label']); ?></span>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                            </button>
                        <?php endforeach; ?>
                    </nav>
                </div>
            </div>

            <!-- Content -->
            <div class="lg:col-span-3">
                <div class="glass-card rounded-2xl p-8 scroll-animate animate-fade-up" style="animation-delay: 0.2s;">
                    
                    <!-- Profile Tab -->
                    <div id="tab-profile" class="profile-tab-content">
                        <h2 class="text-2xl font-bold text-foreground mb-6">اطلاعات حساب کاربری</h2>
                        <form class="space-y-6">
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label class="form-label">نام</label>
                                    <input type="text" class="form-input rounded-xl h-12" value="علی">
                                </div>
                                <div>
                                    <label class="form-label">نام خانوادگی</label>
                                    <input type="text" class="form-input rounded-xl h-12" value="محمدی">
                                </div>
                                <div>
                                    <label class="form-label">شماره موبایل</label>
                                    <input type="tel" class="form-input rounded-xl h-12" value="۰۹۱۲۳۴۵۶۷۸۹">
                                </div>
                                <div>
                                    <label class="form-label">ایمیل</label>
                                    <input type="email" class="form-input rounded-xl h-12" value="ali@example.com">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-xl">ذخیره تغییرات</button>
                        </form>
                    </div>

                    <!-- Orders Tab -->
                    <div id="tab-orders" class="profile-tab-content" style="display: none;">
                        <h2 class="text-2xl font-bold text-foreground mb-6">سفارش‌های من</h2>
                        <?php foreach ($orders as $order): ?>
                            <div class="glass-card order-card rounded-2xl">
                                <div class="order-header">
                                    <div class="order-id">
                                        <span class="order-id-label">شماره سفارش:</span>
                                        <span class="order-id-value"><?php echo esc_html($order['id']); ?></span>
                                    </div>
                                    <span class="order-status <?php echo esc_attr($order['status_class']); ?>"><?php echo esc_html($order['status']); ?></span>
                                </div>
                                <div class="order-items">
                                    <div class="order-item-image">
                                        <img src="<?php echo XIAOMI_SARI_THEME_URI; ?>/assets/images/product-1.jpg" alt="Product">
                                    </div>
                                </div>
                                <div class="order-footer">
                                    <span class="order-date"><?php echo esc_html($order['date']); ?></span>
                                    <span class="order-total"><?php echo esc_html($order['total']); ?> تومان</span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Wishlist Tab -->
                    <div id="tab-wishlist" class="profile-tab-content" style="display: none;">
                        <h2 class="text-2xl font-bold text-foreground mb-6">علاقه‌مندی‌ها</h2>
                        <div class="grid sm:grid-cols-2 gap-6">
                            <?php foreach ($wishlist as $item): ?>
                                <div class="glass-card wishlist-item rounded-2xl">
                                    <div class="wishlist-image">
                                        <img src="<?php echo XIAOMI_SARI_THEME_URI; ?>/assets/images/product-<?php echo $item['id']; ?>.jpg" alt="<?php echo esc_attr($item['name']); ?>">
                                    </div>
                                    <div class="wishlist-info">
                                        <h3 class="wishlist-title"><?php echo esc_html($item['name']); ?></h3>
                                        <p class="wishlist-price"><?php echo esc_html($item['price']); ?> تومان</p>
                                        <a href="<?php echo esc_url(home_url('/product/?id=' . $item['id'])); ?>" class="btn btn-ghost btn-sm rounded-xl mt-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                                            مشاهده
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Addresses Tab -->
                    <div id="tab-addresses" class="profile-tab-content" style="display: none;">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-2xl font-bold text-foreground">آدرس‌های من</h2>
                            <button class="btn btn-primary rounded-xl">افزودن آدرس جدید</button>
                        </div>
                        <div class="glass-card address-card rounded-2xl">
                            <div class="address-header">
                                <div>
                                    <span class="address-badge">پیش‌فرض</span>
                                    <h3 class="address-title">منزل</h3>
                                </div>
                                <button class="btn btn-ghost btn-sm rounded-xl">ویرایش</button>
                            </div>
                            <p class="address-text">ساری، خیابان فرهنگ، پلاک ۱۲۳</p>
                            <p class="address-contact">علی محمدی - ۰۹۱۲۳۴۵۶۷۸۹</p>
                        </div>
                    </div>

                    <!-- Settings Tab -->
                    <div id="tab-settings" class="profile-tab-content" style="display: none;">
                        <h2 class="text-2xl font-bold text-foreground mb-6">تنظیمات</h2>
                        <div class="glass-card rounded-2xl p-6 space-y-4">
                            <div class="settings-item">
                                <div>
                                    <h3 class="settings-label">اعلان‌های ایمیل</h3>
                                    <p class="settings-description">دریافت ایمیل برای سفارش‌ها و تخفیف‌ها</p>
                                </div>
                                <input type="checkbox" class="settings-toggle" checked>
                            </div>
                            <div class="settings-item">
                                <div>
                                    <h3 class="settings-label">اعلان‌های پیامک</h3>
                                    <p class="settings-description">دریافت پیامک برای وضعیت سفارش</p>
                                </div>
                                <input type="checkbox" class="settings-toggle" checked>
                            </div>
                        </div>
                        <button class="btn btn-danger rounded-xl mt-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
                            خروج از حساب کاربری
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>

<?php
xiaomi_sari_footer_template();
