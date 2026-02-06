<?php
/**
 * Template Name: سبد خرید
 * Cart Page Template
 *
 * @package Xiaomi_Sari
 */

if (!defined('ABSPATH')) {
    exit;
}

xiaomi_sari_header_template();

// Sample cart items
$cart_items = array(
    array('id' => 1, 'name' => 'Xiaomi 14 Ultra', 'price' => '۴۵,۹۰۰,۰۰۰', 'price_num' => 45900000, 'quantity' => 1, 'color' => 'مشکی'),
    array('id' => 4, 'name' => 'Redmi Note 13 Pro+', 'price' => '۱۸,۹۰۰,۰۰۰', 'price_num' => 18900000, 'quantity' => 2, 'color' => 'بنفش'),
);

$subtotal = 0;
foreach ($cart_items as $item) {
    $subtotal += $item['price_num'] * $item['quantity'];
}
$shipping = $subtotal > 50000000 ? 0 : 500000;
$total = $subtotal + $shipping;
?>

<main class="pt-32 pb-20">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl md:text-4xl font-bold text-foreground mb-8 scroll-animate animate-fade-up">
            سبد <span class="text-primary">خرید</span>
        </h1>

        <?php if (empty($cart_items)): ?>
            <!-- Empty Cart -->
            <div class="empty-state scroll-animate animate-fade-up">
                <div class="empty-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
                </div>
                <h2 class="empty-title">سبد خرید شما خالی است</h2>
                <p class="empty-text">به نظر می‌رسد هنوز محصولی به سبد خرید اضافه نکرده‌اید.</p>
                <a href="<?php echo esc_url(home_url('/shop')); ?>" class="btn btn-primary btn-lg rounded-xl">
                    مشاهده محصولات
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                </a>
            </div>
        <?php else: ?>
            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Cart Items -->
                <div class="lg:col-span-2 space-y-6">
                    <?php foreach ($cart_items as $index => $item): ?>
                        <div class="glass-card cart-item rounded-2xl scroll-animate animate-fade-up" style="animation-delay: <?php echo $index * 0.1; ?>s;">
                            <!-- Image -->
                            <a href="<?php echo esc_url(home_url('/product/?id=' . $item['id'])); ?>" class="cart-item-image">
                                <img src="<?php echo XIAOMI_SARI_THEME_URI; ?>/assets/images/product-<?php echo $item['id']; ?>.jpg" alt="<?php echo esc_attr($item['name']); ?>">
                            </a>

                            <!-- Info -->
                            <div class="cart-item-info">
                                <div class="flex items-start justify-between gap-4">
                                    <div>
                                        <a href="<?php echo esc_url(home_url('/product/?id=' . $item['id'])); ?>" class="cart-item-title">
                                            <?php echo esc_html($item['name']); ?>
                                        </a>
                                        <p class="cart-item-color">رنگ: <?php echo esc_html($item['color']); ?></p>
                                    </div>
                                    <button class="remove-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                                    </button>
                                </div>

                                <div class="cart-item-actions">
                                    <!-- Quantity -->
                                    <div class="quantity-control">
                                        <button class="quantity-btn quantity-minus">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
                                        </button>
                                        <span class="quantity-value"><?php echo $item['quantity']; ?></span>
                                        <button class="quantity-btn quantity-plus">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                                        </button>
                                    </div>

                                    <!-- Price -->
                                    <p class="cart-item-price">
                                        <?php echo number_format($item['price_num'] * $item['quantity']); ?> تومان
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Order Summary -->
                <div>
                    <div class="glass-card order-summary rounded-2xl sticky top-32 scroll-animate animate-fade-up" style="animation-delay: 0.2s;">
                        <h2 class="summary-title">خلاصه سفارش</h2>

                        <!-- Discount Code -->
                        <div class="discount-form">
                            <input type="text" class="form-input rounded-xl" placeholder="کد تخفیف را وارد کنید">
                            <button class="btn btn-secondary rounded-xl px-6">اعمال</button>
                        </div>

                        <div class="space-y-4 border-t border-border pt-6">
                            <div class="summary-row">
                                <span>جمع محصولات</span>
                                <span><?php echo number_format($subtotal); ?> تومان</span>
                            </div>
                            <div class="summary-row">
                                <span>هزینه ارسال</span>
                                <span><?php echo $shipping === 0 ? 'رایگان' : number_format($shipping) . ' تومان'; ?></span>
                            </div>
                            <?php if ($shipping === 0): ?>
                                <p class="free-shipping-note">ارسال رایگان برای خرید بالای ۵۰ میلیون تومان</p>
                            <?php endif; ?>
                            <div class="summary-total">
                                <span>مجموع</span>
                                <span class="summary-total-value"><?php echo number_format($total); ?> تومان</span>
                            </div>
                        </div>

                        <button class="btn btn-primary btn-lg w-full mt-6 rounded-xl">
                            ادامه و پرداخت
                        </button>

                        <a href="<?php echo esc_url(home_url('/shop')); ?>" class="btn btn-ghost w-full mt-4 rounded-xl">
                            ادامه خرید
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
xiaomi_sari_footer_template();
