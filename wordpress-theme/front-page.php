<?php get_header(); ?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-title" data-animate="fade-up">
                    شیائومی ساری:
                    <span class="highlight">جدیدترین گجت‌ها، بهترین قیمت‌ها</span>
                </h1>
                <p class="hero-description" data-animate="fade-up" data-animate-delay="150">
                    تنوع کامل محصولات شیائومی، از موبایل تا لوازم خانگی هوشمند، با تضمین قیمت رقابتی و اصالت کالا.
                </p>
                <div class="hero-buttons" data-animate="fade-up" data-animate-delay="300">
                    <a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>" class="btn btn-hero">مشاهده محصولات و قیمت‌ها</a>
                    <a href="<?php echo home_url('/contact'); ?>" class="btn btn-hero-outline">دریافت مشاوره تلفنی رایگان</a>
                </div>
            </div>
            <div class="hero-image-wrapper" data-animate="scale-in" data-animate-delay="200">
                <img src="<?php echo XIAOMI_SARI_THEME_URI; ?>/assets/images/hero-products.jpg" alt="محصولات شیائومی" class="hero-image">
                <div class="hero-decoration-1"></div>
                <div class="hero-decoration-2"></div>
            </div>
        </div>
    </div>
    <div class="scroll-indicator">
        <div class="scroll-indicator-inner">
            <div class="scroll-indicator-dot"></div>
        </div>
    </div>
</section>

<!-- Value Proposition -->
<section class="value-section">
    <div class="container">
        <?php echo do_shortcode('[xiaomi_values]'); ?>
    </div>
</section>

<!-- Product Categories -->
<section class="categories-section">
    <div class="container">
        <h2 class="section-title" data-animate="fade-up">دسته‌بندی <span class="highlight">محصولات</span></h2>
        <?php echo do_shortcode('[xiaomi_categories count="5"]'); ?>
    </div>
</section>

<!-- Featured Products -->
<section class="products-section">
    <div class="bg-decoration-1"></div>
    <div class="bg-decoration-2"></div>
    <div class="container">
        <h2 class="section-title" data-animate="fade-up">پیشنهادهای <span class="highlight">ویژه و پرفروش</span></h2>
        <p class="section-subtitle" data-animate="fade-up">محبوب‌ترین محصولات با بهترین قیمت‌ها</p>
        <?php echo do_shortcode('[xiaomi_featured_products count="6"]'); ?>
    </div>
</section>

<!-- Lead Form -->
<section class="lead-section">
    <div class="container">
        <div class="lead-container">
            <?php echo do_shortcode('[xiaomi_lead_form]'); ?>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="testimonials-section">
    <div class="container">
        <h2 class="section-title" data-animate="fade-up">نظرات <span class="highlight">مشتریان</span></h2>
        <?php echo do_shortcode('[xiaomi_testimonials count="3"]'); ?>
    </div>
</section>

<!-- FAQ -->
<section class="faq-section">
    <div class="container">
        <div class="faq-container">
            <h2 class="section-title" data-animate="fade-up">سوالات <span class="highlight">متداول</span></h2>
            <div class="faq-list">
                <div class="faq-item glass-card">
                    <button class="faq-question">
                        <span>آیا محصولات شما اورجینال هستند؟</span>
                        <svg class="faq-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">بله، تمامی محصولات ما با گارانتی اصالت کالا عرضه می‌شوند و مستقیما از نمایندگی‌های رسمی شیائومی تهیه می‌شوند.</div>
                    </div>
                </div>
                <div class="faq-item glass-card">
                    <button class="faq-question">
                        <span>شرایط گارانتی محصولات چگونه است؟</span>
                        <svg class="faq-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">تمامی محصولات دارای گارانتی ۱۸ ماهه شرکتی هستند و خدمات پس از فروش توسط نمایندگی‌های مجاز ارائه می‌شود.</div>
                    </div>
                </div>
                <div class="faq-item glass-card">
                    <button class="faq-question">
                        <span>هزینه ارسال چقدر است؟</span>
                        <svg class="faq-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">ارسال به سراسر استان مازندران رایگان است و برای سایر استان‌ها بر اساس وزن و مسافت محاسبه می‌شود.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
