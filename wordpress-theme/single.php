<?php
/**
 * Single Post Template
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
        <?php while (have_posts()): the_post(); ?>
            <article class="max-w-4xl mx-auto">
                <!-- Breadcrumb -->
                <nav class="flex items-center gap-2 text-sm text-muted mb-8 scroll-animate animate-fade-up">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-primary transition-colors">صفحه اصلی</a>
                    <span>/</span>
                    <span class="text-foreground"><?php the_title(); ?></span>
                </nav>

                <?php if (has_post_thumbnail()): ?>
                    <div class="glass-card rounded-3xl overflow-hidden mb-8 scroll-animate animate-fade-up">
                        <?php the_post_thumbnail('large', array('class' => 'w-full')); ?>
                    </div>
                <?php endif; ?>

                <header class="mb-8 scroll-animate animate-fade-up">
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-foreground mb-4">
                        <?php the_title(); ?>
                    </h1>
                    <div class="flex items-center gap-4 text-muted">
                        <span><?php echo get_the_date(); ?></span>
                        <span>•</span>
                        <span><?php the_author(); ?></span>
                    </div>
                </header>

                <div class="glass-card rounded-3xl p-8 md:p-12 scroll-animate animate-fade-up">
                    <div class="prose prose-lg prose-invert max-w-none">
                        <?php the_content(); ?>
                    </div>
                </div>

                <?php if (comments_open()): ?>
                    <div class="glass-card rounded-3xl p-8 md:p-12 mt-8 scroll-animate animate-fade-up">
                        <?php comments_template(); ?>
                    </div>
                <?php endif; ?>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php
xiaomi_sari_footer_template();
