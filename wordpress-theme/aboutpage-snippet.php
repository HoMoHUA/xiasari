<?php
/**
 * About Page Snippet - Matching React About.tsx Exactly
 * Sections: Hero, Stats, Values, Story
 * @package Xiaomi_Sari
 */
if (!defined('ABSPATH')) exit;

xiaomi_sari_header_template();
?>

<main class="pt-32 pb-20">

<!-- Hero Section -->
<section class="container mx-auto px-4 mb-20">
    <div class="scroll-animate">
        <div class="text-center max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-foreground mb-6">
                درباره <span class="text-primary">شیائومی ساری</span>
            </h1>
            <p class="text-xl text-muted-foreground leading-relaxed">
                فروشگاه تخصصی محصولات شیائومی در ساری. ما با بیش از ۵ سال تجربه در زمینه فروش 
                محصولات شیائومی، بهترین خدمات را به شما ارائه می‌دهیم.
            </p>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-16 bg-secondary/30">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <?php
            $stats = array(
                array('number' => '۵+', 'label' => 'سال تجربه'),
                array('number' => '۱۰,۰۰۰+', 'label' => 'مشتری راضی'),
                array('number' => '۵۰۰+', 'label' => 'محصول'),
                array('number' => '۹۸٪', 'label' => 'رضایت مشتری'),
            );
            foreach ($stats as $i => $stat): ?>
            <div class="scroll-animate anim-scale" data-delay="<?php echo $i * 100; ?>">
                <div class="stat-item">
                    <div class="stat-value"><?php echo $stat['number']; ?></div>
                    <div class="stat-label"><?php echo $stat['label']; ?></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="py-20">
    <div class="container mx-auto px-4">
        <div class="scroll-animate">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-16 text-foreground">
                ارزش‌ها و <span class="text-primary">اهداف ما</span>
            </h2>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php
            $values = array(
                array('title' => 'ماموریت ما', 'desc' => 'ارائه بهترین محصولات شیائومی با قیمت مناسب و خدمات پس از فروش عالی', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg>'),
                array('title' => 'ارزش‌های ما', 'desc' => 'صداقت، کیفیت و رضایت مشتری در اولویت کار ماست', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg>'),
                array('title' => 'تضمین کیفیت', 'desc' => 'تمامی محصولات دارای گارانتی اصالت و ضمانت بازگشت کالا هستند', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>'),
                array('title' => 'تیم ما', 'desc' => 'تیمی متعهد و متخصص برای ارائه بهترین خدمات به شما', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>'),
            );
            foreach ($values as $i => $v): ?>
            <div class="scroll-animate" data-delay="<?php echo $i * 100; ?>">
                <div class="glass-card rounded-2xl p-8 text-center hover:scale-105 transition-transform duration-300" style="transition:transform 0.3s;">
                    <div class="value-card-icon">
                        <?php echo $v['icon']; ?>
                    </div>
                    <h3 class="text-xl font-bold text-foreground mb-4"><?php echo $v['title']; ?></h3>
                    <p class="text-muted-foreground"><?php echo $v['desc']; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Story Section -->
<section class="py-20 bg-secondary/30">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="scroll-animate">
                <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 text-foreground">
                    داستان <span class="text-primary">ما</span>
                </h2>
                <div class="glass-card rounded-3xl p-8 md:p-12">
                    <p class="text-lg text-muted-foreground leading-relaxed mb-6">
                        فروشگاه شیائومی ساری در سال ۱۳۹۸ با هدف ارائه محصولات اورجینال شیائومی به مردم عزیز مازندران 
                        تاسیس شد. ما از ابتدا متعهد به ارائه محصولات با کیفیت و قیمت مناسب بوده‌ایم.
                    </p>
                    <p class="text-lg text-muted-foreground leading-relaxed mb-6">
                        امروز، ما به یکی از معتبرترین فروشگاه‌های تخصصی شیائومی در شمال کشور تبدیل شده‌ایم و 
                        افتخار داریم که بیش از ۱۰,۰۰۰ مشتری راضی داریم.
                    </p>
                    <p class="text-lg text-muted-foreground leading-relaxed">
                        تیم ما متشکل از متخصصین با تجربه در زمینه تکنولوژی و خدمات مشتری است که همواره 
                        آماده پاسخگویی به سوالات و نیازهای شما هستند.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

</main>

<?php
xiaomi_sari_footer_template();
