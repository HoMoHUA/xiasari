<?php
/**
 * Template Name: تماس با ما
 * Contact Us Page Template
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
                تماس با <span class="text-primary">ما</span>
            </h1>
            <p class="text-xl text-muted leading-relaxed">
                سوالی دارید؟ با ما در تماس باشید. تیم ما آماده پاسخگویی به شماست.
            </p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="container mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="scroll-animate animate-fade-up">
                <div class="glass-card rounded-3xl p-8 md:p-12">
                    <h2 class="text-2xl font-bold text-foreground mb-8">ارسال پیام</h2>
                    <form class="contact-form space-y-6" method="post">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="form-label">نام و نام خانوادگی</label>
                                <input type="text" name="name" class="form-input rounded-xl h-12" placeholder="نام خود را وارد کنید" required>
                            </div>
                            <div>
                                <label class="form-label">شماره تماس</label>
                                <input type="tel" name="phone" class="form-input rounded-xl h-12" placeholder="۰۹۱۲۳۴۵۶۷۸۹" required>
                            </div>
                        </div>
                        <div>
                            <label class="form-label">ایمیل</label>
                            <input type="email" name="email" class="form-input rounded-xl h-12" placeholder="email@example.com">
                        </div>
                        <div>
                            <label class="form-label">پیام</label>
                            <textarea name="message" class="form-textarea rounded-xl" rows="5" placeholder="پیام خود را بنویسید..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-full rounded-xl">
                            ارسال پیام
                        </button>
                    </form>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="space-y-6">
                <div class="glass-card contact-card rounded-2xl scroll-animate animate-fade-up">
                    <div class="contact-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    </div>
                    <div>
                        <h3 class="contact-title">تلفن</h3>
                        <p class="contact-value"><a href="tel:01133333333">۰۱۱-۳۳۳۳۳۳۳۳</a></p>
                    </div>
                </div>

                <div class="glass-card contact-card rounded-2xl scroll-animate animate-fade-up" style="animation-delay: 0.1s;">
                    <div class="contact-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                    </div>
                    <div>
                        <h3 class="contact-title">آدرس</h3>
                        <p class="contact-value">ساری، خیابان فرهنگ، پلاک ۱۲۳</p>
                    </div>
                </div>

                <div class="glass-card contact-card rounded-2xl scroll-animate animate-fade-up" style="animation-delay: 0.2s;">
                    <div class="contact-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    </div>
                    <div>
                        <h3 class="contact-title">ساعات کاری</h3>
                        <p class="contact-value">شنبه تا پنجشنبه: ۹ صبح تا ۹ شب</p>
                    </div>
                </div>

                <div class="glass-card contact-card rounded-2xl scroll-animate animate-fade-up" style="animation-delay: 0.3s;">
                    <div class="contact-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                    </div>
                    <div>
                        <h3 class="contact-title">ایمیل</h3>
                        <p class="contact-value"><a href="mailto:info@xiaomisari.ir">info@xiaomisari.ir</a></p>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="glass-card rounded-2xl p-6 scroll-animate animate-fade-up" style="animation-delay: 0.4s;">
                    <h3 class="text-lg font-bold text-foreground mb-4">ما را دنبال کنید</h3>
                    <div class="social-links-grid">
                        <a href="#" class="social-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                        </a>
                        <a href="#" class="social-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Map -->
                <div class="glass-card map-container rounded-2xl scroll-animate animate-fade-up" style="animation-delay: 0.5s;">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3214.8!2d53.06!3d36.56!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzbCsDMzJzM2LjAiTiA1M8KwMDMnMzYuMCJF!5e0!3m2!1sen!2sir!4v1234567890"
                        width="100%"
                        height="250"
                        style="border: 0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
xiaomi_sari_footer_template();
