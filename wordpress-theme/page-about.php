<?php
/**
 * Template Name: درباره ما
 * About Us Page Template
 *
 * @package Xiaomi_Sari
 */

if (!defined('ABSPATH')) {
    exit;
}

xiaomi_sari_header_template();
?>

<main class="pt-32 pb-20">
    <!-- Hero Section -->
    <section class="container mx-auto px-4 mb-20">
        <div class="text-center max-w-4xl mx-auto scroll-animate animate-fade-up">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-foreground mb-6">
                درباره <span class="text-primary">شیائومی ساری</span>
            </h1>
            <p class="text-xl text-muted leading-relaxed">
                فروشگاه تخصصی محصولات شیائومی در ساری. ما با بیش از ۵ سال تجربه در زمینه فروش 
                محصولات شیائومی، بهترین خدمات را به شما ارائه می‌دهیم.
            </p>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="stat-item scroll-animate animate-scale-in">
                    <div class="stat-value">۵+</div>
                    <div class="stat-label">سال تجربه</div>
                </div>
                <div class="stat-item scroll-animate animate-scale-in" style="animation-delay: 0.1s;">
                    <div class="stat-value">۱۰,۰۰۰+</div>
                    <div class="stat-label">مشتری راضی</div>
                </div>
                <div class="stat-item scroll-animate animate-scale-in" style="animation-delay: 0.2s;">
                    <div class="stat-value">۵۰۰+</div>
                    <div class="stat-label">محصول</div>
                </div>
                <div class="stat-item scroll-animate animate-scale-in" style="animation-delay: 0.3s;">
                    <div class="stat-value">۹۸٪</div>
                    <div class="stat-label">رضایت مشتری</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="section">
        <div class="container mx-auto px-4">
            <h2 class="section-title text-center mb-16 scroll-animate animate-fade-up">
                ارزش‌ها و <span class="text-primary">اهداف ما</span>
            </h2>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="glass-card value-card rounded-2xl scroll-animate animate-fade-up">
                    <div class="value-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg>
                    </div>
                    <h3 class="value-title">ماموریت ما</h3>
                    <p class="value-description">ارائه بهترین محصولات شیائومی با قیمت مناسب و خدمات پس از فروش عالی</p>
                </div>
                <div class="glass-card value-card rounded-2xl scroll-animate animate-fade-up" style="animation-delay: 0.1s;">
                    <div class="value-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg>
                    </div>
                    <h3 class="value-title">ارزش‌های ما</h3>
                    <p class="value-description">صداقت، کیفیت و رضایت مشتری در اولویت کار ماست</p>
                </div>
                <div class="glass-card value-card rounded-2xl scroll-animate animate-fade-up" style="animation-delay: 0.2s;">
                    <div class="value-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>
                    </div>
                    <h3 class="value-title">تضمین کیفیت</h3>
                    <p class="value-description">تمامی محصولات دارای گارانتی اصالت و ضمانت بازگشت کالا هستند</p>
                </div>
                <div class="glass-card value-card rounded-2xl scroll-animate animate-fade-up" style="animation-delay: 0.3s;">
                    <div class="value-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    </div>
                    <h3 class="value-title">تیم ما</h3>
                    <p class="value-description">تیمی متعهد و متخصص برای ارائه بهترین خدمات به شما</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Story Section -->
    <section class="section section-bg">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h2 class="section-title text-center mb-12 scroll-animate animate-fade-up">
                    داستان <span class="text-primary">ما</span>
                </h2>
                <div class="glass-card rounded-3xl p-8 md:p-12 scroll-animate animate-fade-up">
                    <p class="text-lg text-muted leading-relaxed mb-6">
                        فروشگاه شیائومی ساری در سال ۱۳۹۸ با هدف ارائه محصولات اورجینال شیائومی به مردم عزیز مازندران 
                        تاسیس شد. ما از ابتدا متعهد به ارائه محصولات با کیفیت و قیمت مناسب بوده‌ایم.
                    </p>
                    <p class="text-lg text-muted leading-relaxed mb-6">
                        امروز، ما به یکی از معتبرترین فروشگاه‌های تخصصی شیائومی در شمال کشور تبدیل شده‌ایم و 
                        افتخار داریم که بیش از ۱۰,۰۰۰ مشتری راضی داریم.
                    </p>
                    <p class="text-lg text-muted leading-relaxed">
                        تیم ما متشکل از متخصصین با تجربه در زمینه تکنولوژی و خدمات مشتری است که همواره 
                        آماده پاسخگویی به سوالات و نیازهای شما هستند.
                    </p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
xiaomi_sari_footer_template();
