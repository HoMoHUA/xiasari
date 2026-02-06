<?php
/**
 * 404 Page Template
 *
 * @package Xiaomi_Sari
 */

if (!defined('ABSPATH')) {
    exit;
}

xiaomi_sari_header_template();
?>

<main class="pt-32 pb-20 min-h-screen flex items-center justify-center">
    <div class="container mx-auto px-4">
        <div class="empty-state scroll-animate animate-fade-up">
            <div class="text-8xl font-bold text-primary mb-4">۴۰۴</div>
            <h1 class="empty-title">صفحه مورد نظر یافت نشد</h1>
            <p class="empty-text">متأسفانه صفحه‌ای که به دنبال آن هستید وجود ندارد یا منتقل شده است.</p>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary btn-lg rounded-xl">
                بازگشت به صفحه اصلی
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
            </a>
        </div>
    </div>
</main>

<?php
xiaomi_sari_footer_template();
