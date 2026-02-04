<!DOCTYPE html>
<html <?php language_attributes(); ?> class="dark">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#121212">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Header -->
<header class="site-header" id="site-header">
    <div class="container">
        <div class="header-content">
            <!-- Logo -->
            <a href="<?php echo home_url(); ?>" class="site-logo">
                <?php echo get_bloginfo('name'); ?>
            </a>

            <!-- Desktop Navigation -->
            <nav class="main-nav">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'items_wrap'     => '%3$s',
                    'link_before'    => '<span class="nav-link">',
                    'link_after'     => '</span>',
                    'fallback_cb'    => function() {
                        echo '<a href="' . home_url() . '" class="nav-link">صفحه اصلی</a>';
                        echo '<a href="' . get_permalink(wc_get_page_id('shop')) . '" class="nav-link">محصولات</a>';
                        echo '<a href="' . home_url('/about') . '" class="nav-link">درباره ما</a>';
                        echo '<a href="' . home_url('/contact') . '" class="nav-link">تماس با ما</a>';
                    }
                ));
                ?>
            </nav>

            <!-- CTA -->
            <div class="header-cta">
                <a href="tel:<?php echo xiaomi_sari_get_contact_info('phone'); ?>" class="header-phone">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                    </svg>
                    <span><?php echo xiaomi_sari_to_persian(xiaomi_sari_get_contact_info('phone')); ?></span>
                </a>
                <a href="<?php echo home_url('/contact'); ?>" class="btn btn-primary btn-sm">تماس با ما</a>
            </div>

            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-toggle" aria-label="منوی موبایل" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>

        <!-- Mobile Menu -->
        <nav class="mobile-menu">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'mobile',
                'container'      => false,
                'items_wrap'     => '%3$s',
                'link_before'    => '<span class="mobile-nav-link">',
                'link_after'     => '</span>',
                'fallback_cb'    => function() {
                    echo '<a href="' . home_url() . '" class="mobile-nav-link">صفحه اصلی</a>';
                    echo '<a href="' . get_permalink(wc_get_page_id('shop')) . '" class="mobile-nav-link">محصولات</a>';
                    echo '<a href="' . home_url('/about') . '" class="mobile-nav-link">درباره ما</a>';
                    echo '<a href="' . home_url('/contact') . '" class="mobile-nav-link">تماس با ما</a>';
                }
            ));
            ?>
        </nav>
    </div>
</header>
