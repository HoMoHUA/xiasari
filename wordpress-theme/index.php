<?php
/**
 * Main Index Template
 *
 * @package Xiaomi_Sari
 */

if (!defined('ABSPATH')) {
    exit;
}

xiaomi_sari_header_template();
?>

<main class="pt-32 pb-20">
    <div class="container mx-auto px-4">
        <?php if (have_posts()): ?>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php while (have_posts()): the_post(); ?>
                    <article class="glass-card rounded-2xl overflow-hidden scroll-animate animate-fade-up">
                        <?php if (has_post_thumbnail()): ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium_large', array('class' => 'w-full aspect-video object-cover')); ?>
                            </a>
                        <?php endif; ?>
                        <div class="p-6">
                            <h2 class="text-xl font-bold text-foreground mb-4">
                                <a href="<?php the_permalink(); ?>" class="hover:text-primary transition-colors">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                            <p class="text-muted mb-4">
                                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                            </p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-secondary btn-sm rounded-xl">
                                ادامه مطلب
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <div class="mt-12">
                <?php the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => 'قبلی',
                    'next_text' => 'بعدی',
                )); ?>
            </div>
        <?php else: ?>
            <div class="empty-state">
                <div class="empty-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                </div>
                <h2 class="empty-title">مطلبی یافت نشد</h2>
                <p class="empty-text">هیچ مطلبی برای نمایش وجود ندارد.</p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
xiaomi_sari_footer_template();
