<?php
/**
 * Homepage Snippet - Matching React Index.tsx Exactly
 * Sections: Hero, ValueProposition, ProductCategories, FeaturedProducts, LeadForm, Testimonials, FAQ
 * @package Xiaomi_Sari
 */
if (!defined('ABSPATH')) exit;

xiaomi_sari_header_template();
?>

<main>

<!-- ═══════════════════════════════════════════
     HERO SECTION (React: HeroSection.tsx)
     2-column grid: text + image, gradient bg
     ═══════════════════════════════════════════ -->
<section class="hero-section">
    <div class="container" style="padding-top:8rem; padding-bottom:6rem;">
        <div class="hero-grid">
            <!-- Content -->
            <div class="hero-content">
                <div class="scroll-animate" data-delay="0">
                    <h1 class="hero-title">
                        شیائومی ساری:
                        <span class="hero-subtitle">جدیدترین گجت‌ها، بهترین قیمت‌ها</span>
                    </h1>
                </div>
                <div class="scroll-animate" data-delay="150">
                    <p class="hero-description">
                        تنوع کامل محصولات شیائومی، از موبایل تا لوازم خانگی هوشمند، با تضمین قیمت رقابتی و اصالت کالا.
                    </p>
                </div>
                <div class="scroll-animate" data-delay="300">
                    <div class="hero-buttons">
                        <a href="<?php echo esc_url(home_url('/shop')); ?>" class="btn btn-hero">مشاهده محصولات و قیمت‌ها</a>
                        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-hero-outline">دریافت مشاوره تلفنی رایگان</a>
                    </div>
                </div>
            </div>

            <!-- Hero Image -->
            <div class="scroll-animate anim-scale" data-delay="200">
                <div class="hero-image-wrapper">
                    <img src="<?php echo XIAOMI_SARI_THEME_URI; ?>/assets/images/hero-products.jpg" alt="محصولات شیائومی - گوشی، تلویزیون، جارو رباتیک و گجت‌های هوشمند" class="hero-image">
                    <div class="hero-deco-1"></div>
                    <div class="hero-deco-2"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="scroll-indicator">
        <div class="scroll-indicator-box">
            <div class="scroll-indicator-dot"></div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════
     VALUE PROPOSITION (React: ValueProposition.tsx)
     3 cards: قیمت رقابتی, تنوع کامل, اصالت کالا
     ═══════════════════════════════════════════ -->
<section class="py-20 bg-background" id="about">
    <div class="container">
        <div class="scroll-animate">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-16 text-foreground">
                چرا <span class="text-primary">شیائومی ساری</span>؟
            </h2>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="scroll-animate" data-delay="0">
                <div class="group p-8 bg-card rounded-2xl border border-border hover:border-primary/30 transition-all duration-300 hover:shadow-xl hover:-translate-y-1" style="transition: all 0.3s;">
                    <div class="w-16 h-16 bg-primary/10 rounded-2xl flex items-center justify-center mb-6" style="transition: background-color 0.3s;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color:var(--primary)"><circle cx="12" cy="12" r="8"/><line x1="3" y1="3" x2="6" y2="6"/><line x1="21" y1="3" x2="18" y2="6"/><line x1="3" y1="21" x2="6" y2="18"/><line x1="21" y1="21" x2="18" y2="18"/></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-card-foreground">قیمت رقابتی</h3>
                    <p class="text-muted-foreground leading-relaxed">تضمین بهترین قیمت در بازار</p>
                </div>
            </div>
            <div class="scroll-animate" data-delay="150">
                <div class="group p-8 bg-card rounded-2xl border border-border hover:border-primary/30 transition-all duration-300 hover:shadow-xl hover:-translate-y-1" style="transition: all 0.3s;">
                    <div class="w-16 h-16 bg-primary/10 rounded-2xl flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color:var(--primary)"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-card-foreground">تنوع کامل</h3>
                    <p class="text-muted-foreground leading-relaxed">دسترسی به تمام محصولات شیائومی</p>
                </div>
            </div>
            <div class="scroll-animate" data-delay="300">
                <div class="group p-8 bg-card rounded-2xl border border-border hover:border-primary/30 transition-all duration-300 hover:shadow-xl hover:-translate-y-1" style="transition: all 0.3s;">
                    <div class="w-16 h-16 bg-primary/10 rounded-2xl flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color:var(--primary)"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/><path d="m9 12 2 2 4-4"/></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-card-foreground">اصالت کالا</h3>
                    <p class="text-muted-foreground leading-relaxed">ضمانت اصالت و گارانتی معتبر</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════
     PRODUCT CATEGORIES (React: ProductCategories.tsx)
     5 category cards with images
     ═══════════════════════════════════════════ -->
<section class="py-20 bg-secondary/30">
    <div class="container">
        <div class="scroll-animate">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-16 text-foreground">
                دسته‌بندی <span class="text-primary">محصولات</span>
            </h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            <?php
            $categories = array(
                array('name' => 'موبایل', 'image' => 'category-phone.jpg'),
                array('name' => 'تلویزیون', 'image' => 'category-tv.jpg'),
                array('name' => 'جارو رباتیک', 'image' => 'category-vacuum.jpg'),
                array('name' => 'مانیتور', 'image' => 'category-monitor.jpg'),
                array('name' => 'لوازم خانگی', 'image' => 'category-appliances.jpg'),
            );
            foreach ($categories as $i => $cat): ?>
            <div class="scroll-animate anim-scale" data-delay="<?php echo $i * 100; ?>">
                <a href="#" class="category-card-link bg-card rounded-2xl border border-border hover:border-primary/30 hover:shadow-xl" style="transition: all 0.3s;">
                    <div class="aspect-square p-4">
                        <img src="<?php echo XIAOMI_SARI_THEME_URI; ?>/assets/images/<?php echo $cat['image']; ?>" alt="<?php echo esc_attr($cat['name']); ?>" class="category-img">
                    </div>
                    <div class="category-gradient">
                        <h3 class="category-name"><?php echo $cat['name']; ?></h3>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════
     FEATURED PRODUCTS (React: FeaturedProducts.tsx)
     6 products with hover overlay
     ═══════════════════════════════════════════ -->
<section class="py-20 bg-background relative overflow-hidden" id="products">
    <div class="pointer-events-none" style="position:absolute;inset:0;">
        <div style="position:absolute;top:25%;right:0;width:24rem;height:24rem;background:rgba(var(--primary-rgb),0.05);border-radius:9999px;filter:blur(64px);"></div>
        <div style="position:absolute;bottom:0;left:25%;width:20rem;height:20rem;background:rgba(var(--primary-rgb),0.05);border-radius:9999px;filter:blur(64px);"></div>
    </div>

    <div class="container relative z-10">
        <div class="scroll-animate">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-4 text-foreground">
                پیشنهادهای <span class="text-primary">ویژه و پرفروش</span>
            </h2>
            <p class="text-muted-foreground text-center mb-16 max-w-2xl mx-auto">محبوب‌ترین محصولات با بهترین قیمت‌ها</p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
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
            <div class="scroll-animate" data-delay="<?php echo $i * 100; ?>">
                <div class="group glass-card-hover product-card rounded-2xl overflow-hidden">
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
                        <span class="product-discount-badge animate-pulse-glow"><?php echo $p['discount']; ?> تخفیف</span>
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
                            <button class="btn btn-primary btn-icon" style="transition:transform 0.3s;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════
     LEAD FORM (React: LeadForm.tsx)
     Orange bg, name + phone inputs
     ═══════════════════════════════════════════ -->
<section class="lead-section py-20" id="contact">
    <div class="container">
        <div class="max-w-2xl mx-auto text-center">
            <div class="scroll-animate">
                <h2 class="lead-title">نیاز به مشاوره داری؟</h2>
                <p class="lead-description">
                    شماره تماس خود را وارد کنید تا کارشناسان ما در اسرع وقت برای مشاوره تخصصی و استعلام قیمت با شما تماس بگیرند.
                </p>
            </div>
            <div class="scroll-animate" data-delay="200">
                <form class="lead-form space-y-4">
                    <div class="lead-form-row">
                        <div class="form-input-wrapper">
                            <svg class="form-input-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                            <input type="text" name="name" class="form-input form-input-h14 form-input-bg-dark rounded-xl pr-12 text-right" placeholder="نام شما (اختیاری)">
                        </div>
                        <div class="form-input-wrapper">
                            <svg class="form-input-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            <input type="tel" name="phone" class="form-input form-input-h14 form-input-bg-dark rounded-xl pr-12 text-right" placeholder="شماره تماس *" required>
                        </div>
                    </div>
                    <button type="submit" class="lead-submit-btn">درخواست مشاوره رایگان</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════
     TESTIMONIALS (React: Testimonials.tsx)
     Slider with arrows and dots
     ═══════════════════════════════════════════ -->
<section class="py-20 bg-secondary/30">
    <div class="container">
        <div class="scroll-animate">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-16 text-foreground">
                تجربه خرید <span class="text-primary">مشتریان ما</span>
            </h2>
        </div>

        <div class="scroll-animate anim-scale" data-delay="200">
            <div class="max-w-3xl mx-auto relative">
                <div class="bg-card rounded-3xl p-8 md:p-12 shadow-lg border border-border">
                    <!-- Quote Icon -->
                    <svg class="testimonial-quote-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V21z"/><path d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2h.75c0 2.25.25 4-2.75 4v3c0 1 0 1 1 1z"/></svg>

                    <?php
                    $testimonials = array(
                        array('name' => 'علی محمدی', 'text' => 'خرید موبایل از شیائومی ساری یکی از بهترین تجربه‌های خریدم بود. قیمت واقعاً رقابتی بود و کالا اصل.', 'rating' => 5),
                        array('name' => 'مریم احمدی', 'text' => 'تلویزیون شیائومی که خریدم عالی بود. پشتیبانی فروشگاه هم خیلی سریع و حرفه‌ای پاسخگو بودند.', 'rating' => 5),
                        array('name' => 'رضا کریمی', 'text' => 'جارو رباتیک Roborock خریدم و کاملاً راضی هستم. مشاوره قبل از خرید خیلی کمک کرد.', 'rating' => 5),
                    );
                    foreach ($testimonials as $j => $t): ?>
                    <div class="testimonial-slide" <?php if ($j > 0) echo 'style="display:none;"'; ?>>
                        <p class="testimonial-text"><?php echo $t['text']; ?></p>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="testimonial-name"><?php echo $t['name']; ?></p>
                                <div class="testimonial-stars">
                                    <?php for ($s = 0; $s < $t['rating']; $s++): ?>
                                    <span>★</span>
                                    <?php endfor; ?>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <button class="slider-nav-btn slider-prev">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m9 18 6-6-6-6"/></svg>
                                </button>
                                <button class="slider-nav-btn slider-next">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m15 18-6-6 6-6"/></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <div class="slider-dots">
                    <?php foreach ($testimonials as $k => $t): ?>
                    <button class="slider-dot <?php if ($k === 0) echo 'active'; ?>"></button>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════
     FAQ (React: FAQ.tsx)
     Accordion with card items
     ═══════════════════════════════════════════ -->
<section class="py-20 bg-background">
    <div class="container">
        <div class="scroll-animate">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-16 text-foreground">
                سوالات <span class="text-primary">متداول</span>
            </h2>
        </div>

        <div class="scroll-animate" data-delay="200">
            <div class="max-w-3xl mx-auto space-y-4">
                <?php
                $faqs = array(
                    array('q' => 'آیا محصولات شما اصل هستند؟', 'a' => 'بله، تمام محصولات ما کاملاً اصل و دارای گارانتی معتبر هستند. ما مستقیماً از نمایندگی‌های رسمی شیائومی تأمین می‌کنیم.'),
                    array('q' => 'نحوه ارسال و زمان تحویل چگونه است؟', 'a' => 'ارسال در ساری رایگان و تحویل در همان روز انجام می‌شود. برای سایر شهرها، ارسال توسط پست پیشتاز ظرف ۲ تا ۴ روز کاری انجام می‌گیرد.'),
                    array('q' => 'شرایط گارانتی محصولات چگونه است؟', 'a' => 'تمام محصولات دارای ۱۸ ماه گارانتی رسمی شرکتی هستند. در صورت بروز هرگونه مشکل، می‌توانید به مراکز خدمات مجاز مراجعه کنید.'),
                    array('q' => 'آیا امکان خرید اقساطی وجود دارد؟', 'a' => 'بله، امکان خرید اقساطی با کارت‌های اعتباری بانک‌های طرف قرارداد وجود دارد. برای اطلاعات بیشتر با ما تماس بگیرید.'),
                    array('q' => 'چگونه می‌توانم از اصالت کالا مطمئن شوم؟', 'a' => 'تمام محصولات دارای کد رهگیری اصالت هستند که می‌توانید از طریق سایت رسمی شیائومی آن را بررسی کنید. همچنین هولوگرام اصالت روی تمام بسته‌بندی‌ها موجود است.'),
                );
                foreach ($faqs as $f): ?>
                <div class="faq-item">
                    <button class="faq-question">
                        <span><?php echo $f['q']; ?></span>
                        <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                    </button>
                    <div class="faq-answer">
                        <p class="faq-answer-text"><?php echo $f['a']; ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

</main>

<?php
xiaomi_sari_footer_template();
