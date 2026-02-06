<?php
/**
 * Default Page Template
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
                <header class="text-center mb-12 scroll-animate animate-fade-up">
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-foreground mb-4">
                        <?php the_title(); ?>
                    </h1>
                </header>

                <div class="glass-card rounded-3xl p-8 md:p-12 scroll-animate animate-fade-up">
                    <div class="prose prose-lg prose-invert max-w-none">
                        <?php the_content(); ?>
                    </div>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php
xiaomi_sari_footer_template();
