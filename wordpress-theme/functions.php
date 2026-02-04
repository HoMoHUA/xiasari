<?php
/**
 * Xiaomi Sari Theme - All-In-One Functions
 * شامل تمام CSS، JS و PHP به صورت یکپارچه
 * منابع به صورت لوکال بارگذاری می‌شوند
 *
 * @package Xiaomi_Sari
 * @version 2.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

// Theme Constants
define('XIAOMI_SARI_VERSION', '2.0.0');
define('XIAOMI_SARI_THEME_DIR', get_template_directory());
define('XIAOMI_SARI_THEME_URI', get_template_directory_uri());

/**
 * Theme Setup
 */
function xiaomi_sari_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-width'  => true,
        'flex-height' => true,
    ));
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style',
    ));
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    register_nav_menus(array(
        'primary' => __('منوی اصلی', 'xiaomi-sari'),
        'footer'  => __('منوی فوتر', 'xiaomi-sari'),
        'mobile'  => __('منوی موبایل', 'xiaomi-sari'),
    ));

    add_theme_support('editor-styles');
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');

    global $content_width;
    if (!isset($content_width)) {
        $content_width = 1400;
    }
}
add_action('after_setup_theme', 'xiaomi_sari_setup');

/**
 * Enqueue Inline Styles (No External CSS Files)
 */
function xiaomi_sari_inline_styles() {
    // Register empty stylesheet for inline styles
    wp_register_style('xiaomi-sari-main', false);
    wp_enqueue_style('xiaomi-sari-main');
    
    // All CSS inlined
    $css = xiaomi_sari_get_all_css();
    wp_add_inline_style('xiaomi-sari-main', $css);
}
add_action('wp_enqueue_scripts', 'xiaomi_sari_inline_styles');

/**
 * Enqueue Inline Scripts (No External JS Files)
 */
function xiaomi_sari_inline_scripts() {
    // Register empty script for inline
    wp_register_script('xiaomi-sari-main', false, array(), null, true);
    wp_enqueue_script('xiaomi-sari-main');
    
    // Pass PHP variables to JS
    wp_localize_script('xiaomi-sari-main', 'xiaomiSari', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('xiaomi_sari_nonce'),
        'themeUrl' => XIAOMI_SARI_THEME_URI,
    ));
    
    // All JS inlined
    $js = xiaomi_sari_get_all_js();
    wp_add_inline_script('xiaomi-sari-main', $js);
}
add_action('wp_enqueue_scripts', 'xiaomi_sari_inline_scripts');

/**
 * Load Local Vazirmatn Font
 */
function xiaomi_sari_local_fonts() {
    ?>
    <style>
    @font-face {
        font-family: 'Vazirmatn';
        font-style: normal;
        font-weight: 100 900;
        font-display: swap;
        src: url('<?php echo XIAOMI_SARI_THEME_URI; ?>/assets/fonts/Vazirmatn-Variable.woff2') format('woff2');
    }
    </style>
    <?php
}
add_action('wp_head', 'xiaomi_sari_local_fonts', 1);

/**
 * Get All CSS
 */
function xiaomi_sari_get_all_css() {
    ob_start();
    ?>
/* ============================================
   CSS VARIABLES / DESIGN TOKENS
   ============================================ */

:root {
  --background: hsl(0, 0%, 7%);
  --foreground: hsl(0, 0%, 95%);
  --card: hsl(0, 0%, 10%);
  --card-foreground: hsl(0, 0%, 95%);
  --popover: hsl(0, 0%, 10%);
  --popover-foreground: hsl(0, 0%, 95%);
  --primary: hsl(24, 95%, 53%);
  --primary-foreground: hsl(0, 0%, 100%);
  --primary-rgb: 249, 115, 22;
  --secondary: hsl(0, 0%, 15%);
  --secondary-foreground: hsl(0, 0%, 95%);
  --muted: hsl(0, 0%, 15%);
  --muted-foreground: hsl(0, 0%, 65%);
  --accent: hsl(24, 95%, 53%);
  --accent-foreground: hsl(0, 0%, 100%);
  --destructive: hsl(0, 62.8%, 30.6%);
  --destructive-foreground: hsl(0, 0%, 95%);
  --border: hsl(0, 0%, 20%);
  --input: hsl(0, 0%, 20%);
  --ring: hsl(24, 95%, 53%);
  --radius: 0.75rem;
  --radius-sm: 0.5rem;
  --radius-lg: 1rem;
  --radius-xl: 1.5rem;
  --radius-2xl: 2rem;
  --shadow-card: 0 4px 20px -4px rgba(0, 0, 0, 0.3);
  --shadow-card-hover: 0 8px 30px -6px rgba(0, 0, 0, 0.4);
  --shadow-button: 0 4px 14px -2px rgba(var(--primary-rgb), 0.4);
  --shadow-glow: 0 0 20px rgba(var(--primary-rgb), 0.3);
  --transition-fast: 0.15s ease;
  --transition-normal: 0.3s ease;
  --transition-slow: 0.5s ease;
  --z-header: 50;
  --z-modal: 100;
  --z-tooltip: 150;
}

/* ============================================
   BASE STYLES
   ============================================ */

*, *::before, *::after {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

html {
  scroll-behavior: smooth;
  font-size: 16px;
  color-scheme: dark;
}

body {
  font-family: 'Vazirmatn', sans-serif !important;
  background-color: var(--background);
  color: var(--foreground);
  line-height: 1.6;
  direction: rtl;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

h1, h2, h3, h4, h5, h6, p, span, a, button, input, textarea, select, label, div {
  font-family: 'Vazirmatn', sans-serif !important;
}

a {
  color: inherit;
  text-decoration: none;
  transition: color var(--transition-fast);
}

a:hover {
  color: var(--primary);
}

img {
  max-width: 100%;
  height: auto;
  display: block;
}

button {
  cursor: pointer;
  font-family: inherit;
  border: none;
  background: none;
}

input, textarea, select {
  font-family: inherit;
  font-size: inherit;
}

/* ============================================
   UTILITY CLASSES
   ============================================ */

.container {
  width: 100%;
  max-width: 1400px;
  margin: 0 auto;
  padding: 0 1rem;
}

@media (min-width: 768px) {
  .container {
    padding: 0 2rem;
  }
}

.text-primary { color: var(--primary) !important; }
.text-foreground { color: var(--foreground) !important; }
.text-muted { color: var(--muted-foreground) !important; }
.text-background { color: var(--background) !important; }

.bg-background { background-color: var(--background) !important; }
.bg-card { background-color: var(--card) !important; }
.bg-secondary { background-color: var(--secondary) !important; }
.bg-primary { background-color: var(--primary) !important; }

.rounded-sm { border-radius: var(--radius-sm); }
.rounded { border-radius: var(--radius); }
.rounded-lg { border-radius: var(--radius-lg); }
.rounded-xl { border-radius: var(--radius-xl); }
.rounded-2xl { border-radius: var(--radius-2xl); }
.rounded-full { border-radius: 9999px; }

/* ============================================
   GLASS EFFECT
   ============================================ */

.glass-effect {
  background: rgba(18, 18, 18, 0.6);
  backdrop-filter: blur(40px);
  -webkit-backdrop-filter: blur(40px);
  border: 1px solid rgba(255, 255, 255, 0.1);
  box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.15);
}

.glass-card {
  background: rgba(26, 26, 26, 0.4);
  backdrop-filter: blur(20px);
  -webkit-backdrop-filter: blur(20px);
  border: 1px solid rgba(255, 255, 255, 0.05);
  box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.2), inset 0 1px 0 0 rgba(255, 255, 255, 0.05);
}

.glass-card-hover {
  background: rgba(26, 26, 26, 0.4);
  backdrop-filter: blur(20px);
  -webkit-backdrop-filter: blur(20px);
  border: 1px solid rgba(255, 255, 255, 0.05);
  box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.2), inset 0 1px 0 0 rgba(255, 255, 255, 0.05);
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.glass-card-hover:hover {
  background: rgba(26, 26, 26, 0.6);
  border-color: rgba(var(--primary-rgb), 0.3);
}

/* ============================================
   BUTTONS
   ============================================ */

.btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 0.5rem;
  font-weight: 600;
  padding: 0.75rem 1.5rem;
  border-radius: var(--radius-xl);
  transition: all var(--transition-normal);
  white-space: nowrap;
}

.btn-primary {
  background-color: var(--primary);
  color: var(--primary-foreground);
  box-shadow: var(--shadow-button);
}

.btn-primary:hover {
  background-color: hsl(24, 95%, 48%);
  transform: translateY(-2px);
  box-shadow: 0 6px 20px -4px rgba(var(--primary-rgb), 0.5);
}

.btn-secondary {
  background-color: var(--secondary);
  color: var(--foreground);
}

.btn-secondary:hover {
  background-color: hsl(0, 0%, 18%);
}

.btn-ghost {
  background: transparent;
  color: var(--foreground);
}

.btn-ghost:hover {
  background-color: var(--secondary);
}

.btn-hero {
  background: linear-gradient(135deg, var(--primary), hsl(30, 95%, 60%));
  color: var(--primary-foreground);
  padding: 1rem 2rem;
  font-size: 1.125rem;
  box-shadow: var(--shadow-glow);
}

.btn-hero:hover {
  transform: translateY(-3px);
  box-shadow: 0 0 30px rgba(var(--primary-rgb), 0.5);
}

.btn-hero-outline {
  background: transparent;
  color: var(--foreground);
  border: 2px solid rgba(255, 255, 255, 0.2);
  padding: 1rem 2rem;
  font-size: 1.125rem;
}

.btn-hero-outline:hover {
  background-color: rgba(255, 255, 255, 0.1);
  border-color: rgba(255, 255, 255, 0.3);
}

.btn-icon {
  width: 2.5rem;
  height: 2.5rem;
  padding: 0;
}

.btn-lg {
  padding: 1rem 2rem;
  font-size: 1.125rem;
}

.btn-sm {
  padding: 0.5rem 1rem;
  font-size: 0.875rem;
}

.btn-danger {
  background-color: hsl(0, 62.8%, 30.6%);
  color: var(--foreground);
}

.btn-danger:hover {
  background-color: hsl(0, 62.8%, 40%);
}

/* ============================================
   FORMS
   ============================================ */

.form-input,
.form-textarea {
  width: 100%;
  padding: 0.75rem 1rem;
  background-color: var(--secondary);
  border: 1px solid var(--border);
  border-radius: var(--radius-xl);
  color: var(--foreground);
  font-size: 1rem;
  transition: border-color var(--transition-fast), box-shadow var(--transition-fast);
}

.form-input:focus,
.form-textarea:focus {
  outline: none;
  border-color: var(--primary);
  box-shadow: 0 0 0 3px rgba(var(--primary-rgb), 0.2);
}

.form-input::placeholder,
.form-textarea::placeholder {
  color: var(--muted-foreground);
}

.form-input-lg {
  padding: 1rem 1.25rem;
  height: 3rem;
}

.form-label {
  display: block;
  margin-bottom: 0.5rem;
  font-weight: 500;
  color: var(--foreground);
  font-size: 0.875rem;
}

/* ============================================
   HEADER
   ============================================ */

.site-header {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: var(--z-header);
  background: rgba(18, 18, 18, 0.8);
  backdrop-filter: blur(20px);
  -webkit-backdrop-filter: blur(20px);
  border-bottom: 1px solid rgba(255, 255, 255, 0.05);
  transition: all var(--transition-normal);
}

.site-header.scrolled {
  top: 0.75rem;
  left: 1rem;
  right: 1rem;
  max-width: 64rem;
  margin: 0 auto;
  border-radius: var(--radius-2xl);
  background: rgba(18, 18, 18, 0.9);
  border: 1px solid rgba(255, 255, 255, 0.1);
  box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
}

.header-content {
  display: flex;
  align-items: center;
  justify-content: space-between;
  height: 5rem;
  padding: 0 1rem;
  transition: all var(--transition-normal);
}

.site-header.scrolled .header-content {
  height: 3.5rem;
  padding: 0 1.5rem;
}

.site-logo {
  font-size: 1.5rem;
  font-weight: 700;
  color: var(--primary);
  transition: all var(--transition-normal);
}

.site-header.scrolled .site-logo {
  font-size: 1.125rem;
}

.main-nav {
  display: none;
  align-items: center;
  gap: 1.5rem;
}

@media (min-width: 768px) {
  .main-nav {
    display: flex;
  }
}

.nav-link {
  font-weight: 500;
  color: var(--foreground);
  transition: color var(--transition-fast);
}

.nav-link:hover {
  color: var(--primary);
}

.header-cta {
  display: none;
  align-items: center;
  gap: 0.75rem;
}

@media (min-width: 768px) {
  .header-cta {
    display: flex;
  }
}

.header-phone {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  color: var(--muted-foreground);
  transition: color var(--transition-fast);
}

.header-phone:hover {
  color: var(--primary);
}

.mobile-menu-toggle {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 2.5rem;
  height: 2.5rem;
  gap: 5px;
  border-radius: var(--radius-xl);
  transition: background-color var(--transition-fast);
}

.mobile-menu-toggle span {
  display: block;
  width: 20px;
  height: 2px;
  background-color: var(--foreground);
  transition: all var(--transition-normal);
}

.mobile-menu-toggle:hover {
  background-color: rgba(255, 255, 255, 0.1);
}

@media (min-width: 768px) {
  .mobile-menu-toggle {
    display: none;
  }
}

.mobile-menu {
  display: none;
  flex-direction: column;
  gap: 0.25rem;
  padding-bottom: 1rem;
}

.mobile-menu.active {
  display: flex;
}

@media (min-width: 768px) {
  .mobile-menu {
    display: none !important;
  }
}

.mobile-nav-link {
  display: block;
  padding: 0.75rem 1rem;
  font-weight: 500;
  color: var(--foreground);
  border-radius: var(--radius-xl);
  transition: all var(--transition-fast);
}

.mobile-nav-link:hover {
  color: var(--primary);
  background-color: rgba(255, 255, 255, 0.05);
}

/* ============================================
   HERO SECTION
   ============================================ */

.hero-section {
  position: relative;
  min-height: 100vh;
  background: linear-gradient(180deg, var(--background) 0%, rgba(38, 38, 38, 0.3) 100%);
  overflow: hidden;
  padding-top: 8rem;
  padding-bottom: 6rem;
}

.hero-content {
  display: grid;
  gap: 3rem;
  align-items: center;
}

@media (min-width: 1024px) {
  .hero-content {
    grid-template-columns: 1fr 1fr;
  }
}

.hero-text {
  display: flex;
  flex-direction: column;
  gap: 2rem;
}

.hero-title {
  font-size: 2.25rem;
  font-weight: 700;
  line-height: 1.2;
  color: var(--foreground);
}

@media (min-width: 768px) {
  .hero-title {
    font-size: 3rem;
  }
}

@media (min-width: 1024px) {
  .hero-title {
    font-size: 3.75rem;
  }
}

.hero-title .highlight {
  display: block;
  color: var(--primary);
  margin-top: 0.5rem;
}

.hero-description {
  font-size: 1.125rem;
  color: var(--muted-foreground);
  line-height: 1.8;
  max-width: 36rem;
}

@media (min-width: 768px) {
  .hero-description {
    font-size: 1.25rem;
  }
}

.hero-buttons {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

@media (min-width: 640px) {
  .hero-buttons {
    flex-direction: row;
  }
}

.hero-image-wrapper {
  position: relative;
}

.hero-image {
  position: relative;
  z-index: 10;
  width: 100%;
  border-radius: var(--radius-2xl);
  box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
}

.hero-decoration-1 {
  position: absolute;
  top: -2rem;
  right: -2rem;
  width: 16rem;
  height: 16rem;
  background: rgba(var(--primary-rgb), 0.1);
  border-radius: 50%;
  filter: blur(60px);
}

.hero-decoration-2 {
  position: absolute;
  bottom: -2rem;
  left: -2rem;
  width: 12rem;
  height: 12rem;
  background: rgba(var(--primary-rgb), 0.05);
  border-radius: 50%;
  filter: blur(40px);
}

.scroll-indicator {
  position: absolute;
  bottom: 2rem;
  left: 50%;
  transform: translateX(-50%);
  animation: bounce 1s infinite;
  display: none;
}

@media (min-width: 768px) {
  .scroll-indicator {
    display: block;
  }
}

.scroll-indicator-inner {
  width: 1.5rem;
  height: 2.5rem;
  border: 2px solid rgba(255, 255, 255, 0.3);
  border-radius: 9999px;
  display: flex;
  justify-content: center;
}

.scroll-indicator-dot {
  width: 0.375rem;
  height: 0.75rem;
  background-color: rgba(255, 255, 255, 0.3);
  border-radius: 9999px;
  margin-top: 0.5rem;
}

@keyframes bounce {
  0%, 100% { transform: translateX(-50%) translateY(0); }
  50% { transform: translateX(-50%) translateY(-10px); }
}

/* ============================================
   VALUE PROPOSITION
   ============================================ */

.value-section {
  padding: 5rem 0;
  background: linear-gradient(180deg, rgba(38, 38, 38, 0.3) 0%, var(--background) 100%);
}

.value-grid {
  display: grid;
  gap: 2rem;
}

@media (min-width: 768px) {
  .value-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (min-width: 1024px) {
  .value-grid {
    grid-template-columns: repeat(4, 1fr);
  }
}

.value-card {
  text-align: center;
  padding: 2rem;
  border-radius: var(--radius-2xl);
  transition: all var(--transition-normal);
}

.value-card:hover {
  transform: translateY(-0.5rem);
}

.value-icon {
  width: 4rem;
  height: 4rem;
  background: rgba(var(--primary-rgb), 0.1);
  border-radius: var(--radius-xl);
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 1.5rem;
}

.value-icon svg {
  width: 2rem;
  height: 2rem;
  color: var(--primary);
}

.value-title {
  font-size: 1.25rem;
  font-weight: 700;
  color: var(--foreground);
  margin-bottom: 0.75rem;
}

.value-description {
  color: var(--muted-foreground);
  line-height: 1.7;
}

/* ============================================
   SECTION TITLES
   ============================================ */

.section-title {
  font-size: 1.875rem;
  font-weight: 700;
  text-align: center;
  color: var(--foreground);
  margin-bottom: 4rem;
}

@media (min-width: 768px) {
  .section-title {
    font-size: 2.25rem;
  }
}

.section-title .highlight {
  color: var(--primary);
}

.section-subtitle {
  text-align: center;
  color: var(--muted-foreground);
  margin-bottom: 4rem;
  margin-top: -3rem;
  max-width: 42rem;
  margin-left: auto;
  margin-right: auto;
}

/* ============================================
   PRODUCT CATEGORIES
   ============================================ */

.categories-section {
  padding: 5rem 0;
  background-color: rgba(38, 38, 38, 0.3);
}

.categories-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 1.5rem;
}

@media (min-width: 768px) {
  .categories-grid {
    grid-template-columns: repeat(3, 1fr);
  }
}

@media (min-width: 1024px) {
  .categories-grid {
    grid-template-columns: repeat(5, 1fr);
  }
}

.category-card {
  position: relative;
  display: block;
  background-color: var(--card);
  border-radius: var(--radius-2xl);
  overflow: hidden;
  border: 1px solid var(--border);
  transition: all var(--transition-normal);
}

.category-card:hover {
  border-color: rgba(var(--primary-rgb), 0.3);
  box-shadow: var(--shadow-card-hover);
  transform: translateY(-0.5rem);
}

.category-image-wrapper {
  aspect-ratio: 1;
  padding: 1rem;
}

.category-image {
  width: 100%;
  height: 100%;
  object-fit: contain;
  transition: transform var(--transition-slow);
}

.category-card:hover .category-image {
  transform: scale(1.05);
}

.category-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(to top, rgba(18, 18, 18, 0.8) 0%, transparent 50%);
  display: flex;
  align-items: flex-end;
  padding: 1rem;
}

.category-name {
  font-size: 1.125rem;
  font-weight: 700;
  color: var(--foreground);
  text-align: center;
  width: 100%;
}

/* ============================================
   FEATURED PRODUCTS
   ============================================ */

.products-section {
  padding: 5rem 0;
  position: relative;
  overflow: hidden;
}

.products-section .bg-decoration-1 {
  position: absolute;
  top: 25%;
  right: 0;
  width: 24rem;
  height: 24rem;
  background: rgba(var(--primary-rgb), 0.05);
  border-radius: 50%;
  filter: blur(60px);
}

.products-section .bg-decoration-2 {
  position: absolute;
  bottom: 0;
  left: 25%;
  width: 20rem;
  height: 20rem;
  background: rgba(var(--primary-rgb), 0.05);
  border-radius: 50%;
  filter: blur(60px);
}

.products-grid {
  display: grid;
  gap: 2rem;
  position: relative;
  z-index: 10;
}

@media (min-width: 640px) {
  .products-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (min-width: 1024px) {
  .products-grid {
    grid-template-columns: repeat(3, 1fr);
  }
}

.product-card {
  border-radius: var(--radius-2xl);
  overflow: hidden;
}

.product-image-wrapper {
  position: relative;
  aspect-ratio: 1;
  background-color: rgba(38, 38, 38, 0.2);
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
}

.product-image {
  width: 100%;
  height: 100%;
  object-fit: contain;
  padding: 1rem;
  transition: transform 0.7s ease;
}

.product-card:hover .product-image {
  transform: scale(1.1);
}

.product-overlay {
  position: absolute;
  inset: 0;
  background: rgba(18, 18, 18, 0.6);
  backdrop-filter: blur(4px);
  opacity: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 1rem;
  transition: opacity var(--transition-normal);
}

.product-card:hover .product-overlay {
  opacity: 1;
}

.product-action-btn {
  width: 3rem;
  height: 3rem;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: transform var(--transition-normal);
}

.product-action-btn:hover {
  transform: scale(1.1);
}

.product-action-btn.primary {
  background-color: var(--primary);
  color: var(--primary-foreground);
}

.product-action-btn.secondary {
  background-color: var(--secondary);
  color: var(--foreground);
}

.product-discount-badge {
  position: absolute;
  top: 1rem;
  right: 1rem;
  background-color: var(--primary);
  color: var(--primary-foreground);
  font-size: 0.875rem;
  font-weight: 700;
  padding: 0.25rem 0.75rem;
  border-radius: 9999px;
  animation: pulse-glow 2s ease-in-out infinite;
}

.product-category-badge {
  position: absolute;
  top: 1rem;
  left: 1rem;
  font-size: 0.75rem;
  padding: 0.25rem 0.5rem;
  border-radius: var(--radius);
}

.product-info {
  padding: 1.5rem;
}

.product-title {
  font-size: 1.125rem;
  font-weight: 700;
  color: var(--card-foreground);
  margin-bottom: 1rem;
  transition: color var(--transition-fast);
}

.product-card:hover .product-title {
  color: var(--primary);
}

.product-price-wrapper {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.product-price {
  font-size: 1.25rem;
  font-weight: 700;
  color: var(--primary);
}

.product-original-price {
  font-size: 0.875rem;
  color: var(--muted-foreground);
  text-decoration: line-through;
}

@keyframes pulse-glow {
  0%, 100% { box-shadow: 0 0 20px rgba(var(--primary-rgb), 0.3); }
  50% { box-shadow: 0 0 40px rgba(var(--primary-rgb), 0.6); }
}

/* ============================================
   LEAD FORM SECTION
   ============================================ */

.lead-section {
  padding: 5rem 0;
  background-color: rgba(38, 38, 38, 0.3);
}

.lead-container {
  max-width: 48rem;
  margin: 0 auto;
}

.lead-form-wrapper {
  padding: 3rem;
  border-radius: var(--radius-2xl);
}

@media (min-width: 768px) {
  .lead-form-wrapper {
    padding: 4rem;
  }
}

.lead-title {
  font-size: 1.5rem;
  font-weight: 700;
  color: var(--foreground);
  text-align: center;
  margin-bottom: 0.5rem;
}

@media (min-width: 768px) {
  .lead-title {
    font-size: 1.875rem;
  }
}

.lead-description {
  text-align: center;
  color: var(--muted-foreground);
  margin-bottom: 2rem;
}

.lead-form {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

@media (min-width: 640px) {
  .lead-form {
    flex-direction: row;
  }
}

.lead-form .form-input {
  flex: 1;
}

/* ============================================
   TESTIMONIALS
   ============================================ */

.testimonials-section {
  padding: 5rem 0;
}

.testimonials-grid {
  display: grid;
  gap: 2rem;
}

@media (min-width: 768px) {
  .testimonials-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (min-width: 1024px) {
  .testimonials-grid {
    grid-template-columns: repeat(3, 1fr);
  }
}

.testimonial-card {
  padding: 2rem;
  border-radius: var(--radius-2xl);
  transition: transform var(--transition-normal);
}

.testimonial-card:hover {
  transform: translateY(-0.5rem);
}

.testimonial-stars {
  display: flex;
  gap: 0.25rem;
  margin-bottom: 1rem;
}

.testimonial-star {
  width: 1.25rem;
  height: 1.25rem;
  color: #facc15;
  fill: #facc15;
}

.testimonial-text {
  color: var(--muted-foreground);
  line-height: 1.8;
  margin-bottom: 1.5rem;
}

.testimonial-author {
  display: flex;
  align-items: center;
  gap: 1rem;
}

.testimonial-avatar {
  width: 3rem;
  height: 3rem;
  background: linear-gradient(135deg, var(--primary), hsl(30, 95%, 60%));
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--primary-foreground);
  font-weight: 700;
}

.testimonial-name {
  font-weight: 700;
  color: var(--foreground);
}

.testimonial-role {
  font-size: 0.875rem;
  color: var(--muted-foreground);
}

/* ============================================
   FAQ SECTION
   ============================================ */

.faq-section {
  padding: 5rem 0;
  background-color: rgba(38, 38, 38, 0.3);
}

.faq-container {
  max-width: 48rem;
  margin: 0 auto;
}

.faq-list {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.faq-item {
  border-radius: var(--radius-xl);
  overflow: hidden;
}

.faq-question {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 1.25rem 1.5rem;
  font-weight: 600;
  color: var(--foreground);
  text-align: right;
  transition: color var(--transition-fast);
}

.faq-question:hover {
  color: var(--primary);
}

.faq-icon {
  width: 1.25rem;
  height: 1.25rem;
  color: var(--primary);
  transition: transform var(--transition-normal);
}

.faq-item.active .faq-icon {
  transform: rotate(180deg);
}

.faq-answer {
  max-height: 0;
  overflow: hidden;
  transition: max-height var(--transition-normal);
}

.faq-item.active .faq-answer {
  max-height: 500px;
}

.faq-answer-content {
  padding: 0 1.5rem 1.25rem;
  color: var(--muted-foreground);
  line-height: 1.8;
}

/* ============================================
   FOOTER
   ============================================ */

.site-footer {
  background-color: var(--foreground);
  color: var(--background);
  padding: 4rem 0 8rem;
}

@media (min-width: 768px) {
  .site-footer {
    padding-bottom: 4rem;
  }
}

.footer-grid {
  display: grid;
  gap: 3rem;
  margin-bottom: 3rem;
}

@media (min-width: 768px) {
  .footer-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (min-width: 1024px) {
  .footer-grid {
    grid-template-columns: repeat(4, 1fr);
  }
}

.footer-brand .site-logo {
  margin-bottom: 1rem;
}

.footer-brand p {
  color: rgba(18, 18, 18, 0.7);
  line-height: 1.8;
}

.footer-title {
  font-size: 1.125rem;
  font-weight: 700;
  margin-bottom: 1rem;
}

.footer-links {
  list-style: none;
  display: flex;
  flex-direction: column;
  gap: 0.75rem;
}

.footer-links a {
  color: rgba(18, 18, 18, 0.7);
  transition: color var(--transition-fast);
}

.footer-links a:hover {
  color: var(--primary);
}

.footer-contact-item {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  color: rgba(18, 18, 18, 0.7);
  margin-bottom: 1rem;
}

.footer-contact-item svg {
  width: 1.25rem;
  height: 1.25rem;
  color: var(--primary);
}

.footer-social {
  display: flex;
  gap: 1rem;
}

.footer-social a {
  width: 3rem;
  height: 3rem;
  background-color: rgba(18, 18, 18, 0.1);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: background-color var(--transition-fast);
}

.footer-social a:hover {
  background-color: var(--primary);
}

.footer-social svg {
  width: 1.25rem;
  height: 1.25rem;
}

.footer-bottom {
  border-top: 1px solid rgba(18, 18, 18, 0.1);
  padding-top: 2rem;
  text-align: center;
  color: rgba(18, 18, 18, 0.5);
}

/* ============================================
   MOBILE TOOLBAR
   ============================================ */

.mobile-toolbar {
  position: fixed;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: var(--z-header);
  background: rgba(18, 18, 18, 0.95);
  backdrop-filter: blur(20px);
  -webkit-backdrop-filter: blur(20px);
  border-top: 1px solid rgba(255, 255, 255, 0.1);
  padding: 0.75rem 1rem;
  display: flex;
  justify-content: space-around;
}

@media (min-width: 768px) {
  .mobile-toolbar {
    display: none;
  }
}

.toolbar-item {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 0.25rem;
  color: var(--muted-foreground);
  font-size: 0.75rem;
  transition: color var(--transition-fast);
}

.toolbar-item:hover,
.toolbar-item.active {
  color: var(--primary);
}

.toolbar-item svg {
  width: 1.5rem;
  height: 1.5rem;
}

/* ============================================
   ABOUT PAGE
   ============================================ */

.about-hero {
  padding-top: 8rem;
  padding-bottom: 5rem;
  text-align: center;
}

.about-title {
  font-size: 2.25rem;
  font-weight: 700;
  color: var(--foreground);
  margin-bottom: 1.5rem;
}

@media (min-width: 768px) {
  .about-title {
    font-size: 3rem;
  }
}

@media (min-width: 1024px) {
  .about-title {
    font-size: 3.75rem;
  }
}

.about-description {
  font-size: 1.25rem;
  color: var(--muted-foreground);
  line-height: 1.8;
  max-width: 56rem;
  margin: 0 auto;
}

.stats-section {
  padding: 4rem 0;
  background-color: rgba(38, 38, 38, 0.3);
}

.stats-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 2rem;
}

@media (min-width: 768px) {
  .stats-grid {
    grid-template-columns: repeat(4, 1fr);
  }
}

.stat-item {
  text-align: center;
}

.stat-number {
  font-size: 2.25rem;
  font-weight: 700;
  color: var(--primary);
  margin-bottom: 0.5rem;
}

@media (min-width: 768px) {
  .stat-number {
    font-size: 3rem;
  }
}

.stat-label {
  color: var(--muted-foreground);
}

.story-section {
  padding: 5rem 0;
  background-color: rgba(38, 38, 38, 0.3);
}

.story-content {
  max-width: 56rem;
  margin: 0 auto;
}

.story-card {
  padding: 2rem;
  border-radius: var(--radius-2xl);
}

@media (min-width: 768px) {
  .story-card {
    padding: 3rem;
  }
}

.story-card p {
  font-size: 1.125rem;
  color: var(--muted-foreground);
  line-height: 1.8;
  margin-bottom: 1.5rem;
}

.story-card p:last-child {
  margin-bottom: 0;
}

/* ============================================
   CONTACT PAGE
   ============================================ */

.contact-section {
  padding-top: 8rem;
  padding-bottom: 5rem;
}

.contact-grid {
  display: grid;
  gap: 3rem;
}

@media (min-width: 1024px) {
  .contact-grid {
    grid-template-columns: 1fr 1fr;
  }
}

.contact-form-wrapper {
  padding: 2rem;
  border-radius: var(--radius-2xl);
}

@media (min-width: 768px) {
  .contact-form-wrapper {
    padding: 3rem;
  }
}

.contact-form-title {
  font-size: 1.5rem;
  font-weight: 700;
  color: var(--foreground);
  margin-bottom: 2rem;
}

.contact-form {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
}

.form-row {
  display: grid;
  gap: 1.5rem;
}

@media (min-width: 768px) {
  .form-row {
    grid-template-columns: repeat(2, 1fr);
  }
}

.contact-info-list {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
}

.contact-info-item {
  display: flex;
  align-items: center;
  gap: 1.5rem;
  padding: 1.5rem;
  border-radius: var(--radius-2xl);
  transition: transform var(--transition-normal);
}

.contact-info-item:hover {
  transform: scale(1.05);
}

.contact-info-icon {
  width: 3.5rem;
  height: 3.5rem;
  background: rgba(var(--primary-rgb), 0.1);
  border-radius: var(--radius-2xl);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.contact-info-icon svg {
  width: 1.5rem;
  height: 1.5rem;
  color: var(--primary);
}

.contact-info-title {
  font-size: 1.125rem;
  font-weight: 700;
  color: var(--foreground);
  margin-bottom: 0.25rem;
}

.contact-info-value {
  color: var(--muted-foreground);
}

.contact-social {
  padding: 1.5rem;
  border-radius: var(--radius-2xl);
}

.contact-social-title {
  font-size: 1.125rem;
  font-weight: 700;
  color: var(--foreground);
  margin-bottom: 1rem;
}

.contact-social-links {
  display: flex;
  gap: 1rem;
}

.contact-social-link {
  width: 3rem;
  height: 3rem;
  background: rgba(var(--primary-rgb), 0.1);
  border-radius: var(--radius-xl);
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all var(--transition-fast);
}

.contact-social-link:hover {
  background-color: var(--primary);
  color: var(--primary-foreground);
}

/* ============================================
   SHOP PAGE
   ============================================ */

.shop-hero {
  padding-top: 8rem;
  padding-bottom: 3rem;
  text-align: center;
}

.shop-filters {
  margin-bottom: 3rem;
}

.filters-wrapper {
  padding: 1.5rem;
  border-radius: var(--radius-2xl);
}

.filters-content {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
  align-items: center;
}

@media (min-width: 1024px) {
  .filters-content {
    flex-direction: row;
    justify-content: space-between;
  }
}

.search-wrapper {
  position: relative;
  width: 100%;
}

@media (min-width: 1024px) {
  .search-wrapper {
    width: 24rem;
  }
}

.search-icon {
  position: absolute;
  right: 1rem;
  top: 50%;
  transform: translateY(-50%);
  width: 1.25rem;
  height: 1.25rem;
  color: var(--muted-foreground);
}

.search-input {
  padding-right: 3rem;
}

.category-filters {
  display: none;
  flex-wrap: wrap;
  gap: 0.75rem;
}

@media (min-width: 1024px) {
  .category-filters {
    display: flex;
  }
}

.category-filter-btn {
  padding: 0.5rem 1rem;
  border-radius: var(--radius-xl);
  font-weight: 500;
  transition: all var(--transition-normal);
}

.category-filter-btn.active {
  background-color: var(--primary);
  color: var(--primary-foreground);
}

.category-filter-btn:not(.active) {
  background-color: var(--secondary);
  color: var(--foreground);
}

.category-filter-btn:not(.active):hover {
  background-color: hsl(0, 0%, 18%);
}

.mobile-filter-toggle {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.5rem 1rem;
  border-radius: var(--radius-xl);
  background-color: var(--secondary);
  color: var(--foreground);
}

@media (min-width: 1024px) {
  .mobile-filter-toggle {
    display: none;
  }
}

.mobile-filters {
  display: none;
  flex-wrap: wrap;
  gap: 0.5rem;
  margin-top: 1.5rem;
}

.mobile-filters.active {
  display: flex;
}

@media (min-width: 1024px) {
  .mobile-filters {
    display: none !important;
  }
}

.shop-products-grid {
  display: grid;
  gap: 1.5rem;
}

@media (min-width: 640px) {
  .shop-products-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (min-width: 1024px) {
  .shop-products-grid {
    grid-template-columns: repeat(3, 1fr);
  }
}

@media (min-width: 1280px) {
  .shop-products-grid {
    grid-template-columns: repeat(4, 1fr);
  }
}

/* ============================================
   CART PAGE
   ============================================ */

.cart-section {
  padding-top: 8rem;
  padding-bottom: 5rem;
}

.cart-title {
  font-size: 1.875rem;
  font-weight: 700;
  color: var(--foreground);
  margin-bottom: 2rem;
}

@media (min-width: 768px) {
  .cart-title {
    font-size: 2.25rem;
  }
}

.cart-grid {
  display: grid;
  gap: 2rem;
}

@media (min-width: 1024px) {
  .cart-grid {
    grid-template-columns: 2fr 1fr;
  }
}

.cart-items {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
}

.cart-item {
  padding: 1.5rem;
  border-radius: var(--radius-2xl);
}

.cart-item-content {
  display: flex;
  gap: 1.5rem;
}

.cart-item-image {
  width: 6rem;
  height: 6rem;
  background-color: rgba(38, 38, 38, 0.2);
  border-radius: var(--radius-xl);
  overflow: hidden;
  flex-shrink: 0;
}

@media (min-width: 768px) {
  .cart-item-image {
    width: 8rem;
    height: 8rem;
  }
}

.cart-item-image img {
  width: 100%;
  height: 100%;
  object-fit: contain;
  padding: 0.5rem;
}

.cart-item-info {
  flex: 1;
  min-width: 0;
}

.cart-item-header {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  gap: 1rem;
}

.cart-item-title {
  font-size: 1.125rem;
  font-weight: 700;
  color: var(--foreground);
  transition: color var(--transition-fast);
}

.cart-item-title:hover {
  color: var(--primary);
}

.cart-item-footer {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-top: 1rem;
}

.quantity-controls {
  display: flex;
  align-items: center;
  gap: 0.75rem;
}

.quantity-btn {
  width: 2.5rem;
  height: 2.5rem;
  border-radius: var(--radius-xl);
  background-color: var(--secondary);
  display: flex;
  align-items: center;
  justify-content: center;
  transition: background-color var(--transition-fast);
}

.quantity-btn:hover {
  background-color: hsl(0, 0%, 18%);
}

.quantity-value {
  font-size: 1.125rem;
  font-weight: 700;
  width: 2rem;
  text-align: center;
}

.cart-item-price {
  font-size: 1.25rem;
  font-weight: 700;
  color: var(--primary);
}

.cart-summary {
  position: sticky;
  top: 8rem;
}

.cart-summary-wrapper {
  padding: 1.5rem;
  border-radius: var(--radius-2xl);
}

.cart-summary-title {
  font-size: 1.25rem;
  font-weight: 700;
  color: var(--foreground);
  margin-bottom: 1.5rem;
}

.summary-details {
  border-top: 1px solid var(--border);
  padding-top: 1.5rem;
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.summary-row {
  display: flex;
  justify-content: space-between;
  color: var(--muted-foreground);
}

.summary-total {
  display: flex;
  justify-content: space-between;
  font-size: 1.25rem;
  font-weight: 700;
  color: var(--foreground);
}

.summary-total-value {
  color: var(--primary);
}

/* ============================================
   PROFILE PAGE
   ============================================ */

.profile-section {
  padding-top: 8rem;
  padding-bottom: 5rem;
}

.profile-title {
  font-size: 1.875rem;
  font-weight: 700;
  color: var(--foreground);
  margin-bottom: 2rem;
}

@media (min-width: 768px) {
  .profile-title {
    font-size: 2.25rem;
  }
}

.profile-grid {
  display: grid;
  gap: 2rem;
}

@media (min-width: 1024px) {
  .profile-grid {
    grid-template-columns: 1fr 3fr;
  }
}

.profile-sidebar {
  padding: 1.5rem;
  border-radius: var(--radius-2xl);
}

.profile-user {
  display: flex;
  align-items: center;
  gap: 1rem;
  padding-bottom: 1.5rem;
  border-bottom: 1px solid var(--border);
  margin-bottom: 1.5rem;
}

.profile-avatar {
  width: 4rem;
  height: 4rem;
  background: rgba(var(--primary-rgb), 0.1);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.profile-avatar svg {
  width: 2rem;
  height: 2rem;
  color: var(--primary);
}

.profile-user-name {
  font-weight: 700;
  color: var(--foreground);
}

.profile-user-phone {
  font-size: 0.875rem;
  color: var(--muted-foreground);
}

.profile-menu {
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
}

.profile-menu-item {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0.75rem;
  border-radius: var(--radius-xl);
  color: var(--muted-foreground);
  transition: all var(--transition-fast);
  cursor: pointer;
}

.profile-menu-item:hover,
.profile-menu-item.active {
  background: rgba(var(--primary-rgb), 0.1);
  color: var(--primary);
}

.profile-menu-item-content {
  display: flex;
  align-items: center;
  gap: 0.75rem;
}

.profile-menu-item svg {
  width: 1.25rem;
  height: 1.25rem;
}

.profile-content {
  padding: 2rem;
  border-radius: var(--radius-2xl);
}

.profile-content-title {
  font-size: 1.5rem;
  font-weight: 700;
  color: var(--foreground);
  margin-bottom: 1.5rem;
}

.profile-form-grid {
  display: grid;
  gap: 1.5rem;
}

@media (min-width: 768px) {
  .profile-form-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

.profile-tab-content {
  display: none;
}

.profile-tab-content.active {
  display: block;
}

/* ============================================
   PRODUCT DETAIL PAGE
   ============================================ */

.product-detail-section {
  padding-top: 8rem;
  padding-bottom: 5rem;
  position: relative;
}

.breadcrumb {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  font-size: 0.875rem;
  color: var(--muted-foreground);
  margin-bottom: 2rem;
}

.breadcrumb a {
  transition: color var(--transition-fast);
}

.breadcrumb a:hover {
  color: var(--primary);
}

.breadcrumb .current {
  color: var(--foreground);
}

.product-detail-grid {
  display: grid;
  gap: 3rem;
  position: relative;
  z-index: 10;
}

@media (min-width: 1024px) {
  .product-detail-grid {
    grid-template-columns: 1fr 1fr;
    gap: 5rem;
  }
}

.product-detail-image-wrapper {
  position: relative;
  padding: 2rem;
  border-radius: var(--radius-2xl);
  overflow: hidden;
}

.product-detail-image {
  position: relative;
  z-index: 10;
  aspect-ratio: 1;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: transform var(--transition-normal);
}

.product-detail-image img {
  width: 100%;
  height: 100%;
  object-fit: contain;
  filter: drop-shadow(0 25px 25px rgba(0, 0, 0, 0.15));
}

.product-detail-info {
  display: flex;
  flex-direction: column;
  gap: 2rem;
}

.product-detail-title {
  font-size: 1.875rem;
  font-weight: 700;
  color: var(--foreground);
  margin-bottom: 1rem;
}

@media (min-width: 768px) {
  .product-detail-title {
    font-size: 2.25rem;
  }
}

@media (min-width: 1024px) {
  .product-detail-title {
    font-size: 3rem;
  }
}

.product-rating {
  display: flex;
  align-items: center;
  gap: 1rem;
  margin-bottom: 1.5rem;
}

.product-rating-stars {
  display: flex;
  gap: 0.25rem;
}

.product-rating-star {
  width: 1.25rem;
  height: 1.25rem;
}

.product-rating-star.filled {
  color: #facc15;
  fill: #facc15;
}

.product-detail-description {
  font-size: 1.125rem;
  color: var(--muted-foreground);
  line-height: 1.8;
}

.product-price-card {
  padding: 1.5rem;
  border-radius: var(--radius-2xl);
}

.product-price-main {
  display: flex;
  align-items: baseline;
  gap: 1rem;
  margin-bottom: 1rem;
}

.product-price-value {
  font-size: 2.25rem;
  font-weight: 700;
  color: var(--primary);
}

.product-price-currency {
  font-size: 1.125rem;
  color: var(--muted-foreground);
}

.product-stock {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  margin-top: 1rem;
  color: hsl(142, 76%, 36%);
}

.product-stock svg {
  width: 1.25rem;
  height: 1.25rem;
}

.product-color-card {
  padding: 1.5rem;
  border-radius: var(--radius-2xl);
}

.product-color-title {
  font-size: 1.125rem;
  font-weight: 600;
  color: var(--foreground);
  margin-bottom: 1rem;
}

.product-color-options {
  display: flex;
  gap: 1rem;
}

.product-color-btn {
  padding: 0.75rem 1.5rem;
  border-radius: var(--radius-xl);
  border: 2px solid var(--border);
  color: var(--muted-foreground);
  transition: all var(--transition-normal);
}

.product-color-btn:hover {
  border-color: rgba(var(--primary-rgb), 0.5);
}

.product-color-btn.selected {
  border-color: var(--primary);
  background: rgba(var(--primary-rgb), 0.1);
  color: var(--primary);
  transform: scale(1.05);
}

.product-cta-wrapper {
  display: flex;
  gap: 1rem;
}

.product-cta-wrapper .btn {
  flex: 1;
  height: 3.5rem;
  font-size: 1.125rem;
}

.product-features {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 1rem;
}

.product-feature {
  text-align: center;
  padding: 1rem;
  border-radius: var(--radius-2xl);
  transition: transform var(--transition-normal);
}

.product-feature:hover {
  transform: scale(1.05);
}

.product-feature-icon {
  width: 2rem;
  height: 2rem;
  color: var(--primary);
  margin: 0 auto 0.5rem;
}

.product-feature-text {
  font-size: 0.875rem;
  color: var(--muted-foreground);
}

/* ============================================
   ANIMATIONS
   ============================================ */

.animate-fade-in {
  animation: fadeIn 0.6s ease-out forwards;
}

.animate-fade-up {
  animation: fadeUp 0.6s ease-out forwards;
}

.animate-scale-in {
  animation: scaleIn 0.5s ease-out forwards;
}

@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

@keyframes fadeUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes scaleIn {
  from {
    opacity: 0;
    transform: scale(0.95);
  }
  to {
    opacity: 1;
    transform: scale(1);
  }
}

@keyframes float {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-10px); }
}

/* Animation delays */
.delay-100 { animation-delay: 0.1s; }
.delay-200 { animation-delay: 0.2s; }
.delay-300 { animation-delay: 0.3s; }
.delay-400 { animation-delay: 0.4s; }
.delay-500 { animation-delay: 0.5s; }

/* ============================================
   WOOCOMMERCE COMPATIBILITY
   ============================================ */

.woocommerce-page .products .product {
  background-color: var(--card);
  border-radius: var(--radius-2xl);
  overflow: hidden;
}

.woocommerce .star-rating {
  color: #facc15;
}

.woocommerce a.button,
.woocommerce button.button,
.woocommerce input.button {
  background-color: var(--primary) !important;
  color: var(--primary-foreground) !important;
  border-radius: var(--radius-xl) !important;
}

.woocommerce a.button:hover,
.woocommerce button.button:hover,
.woocommerce input.button:hover {
  background-color: hsl(24, 95%, 48%) !important;
}

/* ============================================
   ELEMENTOR COMPATIBILITY
   ============================================ */

.elementor-widget {
  --e-global-color-primary: var(--primary);
  --e-global-color-secondary: var(--secondary);
  --e-global-color-text: var(--foreground);
  --e-global-color-accent: var(--primary);
}

.elementor-button {
  background-color: var(--primary) !important;
  border-radius: var(--radius-xl) !important;
}

.elementor-button:hover {
  background-color: hsl(24, 95%, 48%) !important;
}
    <?php
    return ob_get_clean();
}

/**
 * Get All JavaScript
 */
function xiaomi_sari_get_all_js() {
    ob_start();
    ?>
(function() {
    'use strict';

    document.addEventListener('DOMContentLoaded', function() {
        initHeader();
        initMobileMenu();
        initFAQ();
        initLeadForm();
        initScrollAnimations();
        initProductSpecs();
        initQuantityControls();
        initWishlist();
        initProfileTabs();
        initColorSelection();
        initCategoryFilters();
        initSearch();
        initAddToCart();
        initSmoothScroll();
    });

    function initHeader() {
        var header = document.querySelector('.site-header');
        if (!header) return;

        var scrollThreshold = 80;

        window.addEventListener('scroll', function() {
            if (window.pageYOffset > scrollThreshold) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        }, { passive: true });
    }

    function initMobileMenu() {
        var toggleBtn = document.querySelector('.mobile-menu-toggle');
        var mobileMenu = document.querySelector('.mobile-menu');

        if (!toggleBtn || !mobileMenu) return;

        toggleBtn.addEventListener('click', function() {
            var isOpen = mobileMenu.classList.contains('active');
            
            mobileMenu.classList.toggle('active');
            toggleBtn.setAttribute('aria-expanded', !isOpen);

            var spans = toggleBtn.querySelectorAll('span');
            spans.forEach(function(span, index) {
                if (isOpen) {
                    span.style.transform = '';
                    span.style.opacity = '';
                } else {
                    if (index === 0) span.style.transform = 'translateY(8px) rotate(45deg)';
                    if (index === 1) span.style.opacity = '0';
                    if (index === 2) span.style.transform = 'translateY(-8px) rotate(-45deg)';
                }
            });
        });

        var menuLinks = mobileMenu.querySelectorAll('a');
        menuLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                mobileMenu.classList.remove('active');
            });
        });
    }

    function initFAQ() {
        var faqItems = document.querySelectorAll('.faq-item');

        faqItems.forEach(function(item) {
            var question = item.querySelector('.faq-question');

            if (!question) return;

            question.addEventListener('click', function() {
                faqItems.forEach(function(otherItem) {
                    if (otherItem !== item) {
                        otherItem.classList.remove('active');
                    }
                });
                item.classList.toggle('active');
            });
        });
    }

    function initLeadForm() {
        var form = document.getElementById('xiaomi-lead-form');

        if (!form) return;

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(form);
            formData.append('action', 'xiaomi_sari_submit_lead');
            formData.append('nonce', xiaomiSari.nonce);

            var submitBtn = form.querySelector('button[type="submit"]');
            var originalText = submitBtn.textContent;
            submitBtn.textContent = 'در حال ارسال...';
            submitBtn.disabled = true;

            fetch(xiaomiSari.ajaxUrl, {
                method: 'POST',
                body: formData
            })
            .then(function(response) { return response.json(); })
            .then(function(data) {
                if (data.success) {
                    showToast(data.data.message, 'success');
                    form.reset();
                } else {
                    showToast(data.data.message, 'error');
                }
            })
            .catch(function() {
                showToast('خطا در ارسال درخواست. لطفا دوباره تلاش کنید.', 'error');
            })
            .finally(function() {
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            });
        });
    }

    function initScrollAnimations() {
        var animatedElements = document.querySelectorAll('[data-animate]');

        if (!animatedElements.length) return;

        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    var element = entry.target;
                    var animation = element.dataset.animate;
                    var delay = element.dataset.animateDelay || 0;

                    setTimeout(function() {
                        element.classList.add('animate-' + animation);
                        element.style.opacity = '1';
                    }, delay);

                    observer.unobserve(element);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        animatedElements.forEach(function(element) {
            element.style.opacity = '0';
            observer.observe(element);
        });
    }

    function initProductSpecs() {
        var specsCard = document.querySelector('.product-specs-card');

        if (!specsCard) return;

        var header = specsCard.querySelector('.product-specs-header');
        var content = specsCard.querySelector('.product-specs-content');
        var toggle = specsCard.querySelector('.product-specs-toggle');

        header.addEventListener('click', function() {
            content.classList.toggle('open');
            toggle.classList.toggle('open');
        });
    }

    function initQuantityControls() {
        var quantityControls = document.querySelectorAll('.quantity-controls');

        quantityControls.forEach(function(control) {
            var minusBtn = control.querySelector('[data-action="minus"]');
            var plusBtn = control.querySelector('[data-action="plus"]');
            var valueDisplay = control.querySelector('.quantity-value');

            if (!minusBtn || !plusBtn || !valueDisplay) return;

            minusBtn.addEventListener('click', function() {
                var value = parseInt(valueDisplay.textContent);
                if (value > 1) {
                    value--;
                    valueDisplay.textContent = value;
                }
            });

            plusBtn.addEventListener('click', function() {
                var value = parseInt(valueDisplay.textContent);
                value++;
                valueDisplay.textContent = value;
            });
        });
    }

    function initWishlist() {
        var wishlistBtns = document.querySelectorAll('[data-wishlist]');

        wishlistBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                var productId = btn.dataset.wishlist;
                var isWishlisted = btn.classList.contains('wishlisted');

                btn.classList.toggle('wishlisted');

                var wishlist = JSON.parse(localStorage.getItem('xiaomi_wishlist') || '[]');
                
                if (isWishlisted) {
                    wishlist = wishlist.filter(function(id) { return id !== productId; });
                    showToast('از علاقه‌مندی‌ها حذف شد', 'info');
                } else {
                    wishlist.push(productId);
                    showToast('به علاقه‌مندی‌ها اضافه شد', 'success');
                }

                localStorage.setItem('xiaomi_wishlist', JSON.stringify(wishlist));
            });
        });

        var wishlist = JSON.parse(localStorage.getItem('xiaomi_wishlist') || '[]');
        wishlist.forEach(function(productId) {
            var btn = document.querySelector('[data-wishlist="' + productId + '"]');
            if (btn) {
                btn.classList.add('wishlisted');
            }
        });
    }

    function initProfileTabs() {
        var menuItems = document.querySelectorAll('.profile-menu-item');
        var tabContents = document.querySelectorAll('.profile-tab-content');

        menuItems.forEach(function(item) {
            item.addEventListener('click', function() {
                var targetTab = item.dataset.tab;

                menuItems.forEach(function(m) { m.classList.remove('active'); });
                item.classList.add('active');

                tabContents.forEach(function(content) {
                    if (content.dataset.tab === targetTab) {
                        content.classList.add('active');
                        content.style.display = 'block';
                    } else {
                        content.classList.remove('active');
                        content.style.display = 'none';
                    }
                });
            });
        });
    }

    function initColorSelection() {
        var colorButtons = document.querySelectorAll('.product-color-btn');
        
        colorButtons.forEach(function(btn) {
            btn.addEventListener('click', function() {
                colorButtons.forEach(function(b) { b.classList.remove('selected'); });
                btn.classList.add('selected');
            });
        });
    }

    function initCategoryFilters() {
        var categoryFilters = document.querySelectorAll('.category-filter-btn');
        var mobileFilterToggle = document.querySelector('.mobile-filter-toggle');
        var mobileFilters = document.querySelector('.mobile-filters');

        categoryFilters.forEach(function(btn) {
            btn.addEventListener('click', function() {
                categoryFilters.forEach(function(b) { b.classList.remove('active'); });
                btn.classList.add('active');

                var category = btn.dataset.category;
                filterProducts(category);
            });
        });

        if (mobileFilterToggle && mobileFilters) {
            mobileFilterToggle.addEventListener('click', function() {
                mobileFilters.classList.toggle('active');
            });
        }
    }

    function filterProducts(category) {
        var products = document.querySelectorAll('.product-card');
        
        products.forEach(function(product) {
            var productCategory = product.dataset.category;
            
            if (category === 'all' || productCategory === category) {
                product.style.display = '';
                product.classList.add('animate-fade-up');
            } else {
                product.style.display = 'none';
            }
        });
    }

    function initSearch() {
        var searchInput = document.querySelector('.search-input');
        
        if (!searchInput) return;

        var searchTimeout;
        
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            
            searchTimeout = setTimeout(function() {
                var query = searchInput.value.toLowerCase();
                var products = document.querySelectorAll('.product-card');
                
                products.forEach(function(product) {
                    var title = product.querySelector('.product-title');
                    if (title) {
                        var titleText = title.textContent.toLowerCase();
                        if (titleText.includes(query) || query === '') {
                            product.style.display = '';
                        } else {
                            product.style.display = 'none';
                        }
                    }
                });
            }, 300);
        });
    }

    function initAddToCart() {
        document.querySelectorAll('.add-to-cart').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                
                btn.classList.add('adding');
                
                setTimeout(function() {
                    btn.classList.remove('adding');
                    showToast('محصول به سبد خرید اضافه شد', 'success');
                }, 500);
            });
        });
    }

    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
            anchor.addEventListener('click', function(e) {
                var targetId = this.getAttribute('href');
                if (targetId === '#') return;

                var target = document.querySelector(targetId);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }

    function showToast(message, type) {
        type = type || 'info';
        
        var existingToast = document.querySelector('.toast');
        if (existingToast) {
            existingToast.remove();
        }

        var toast = document.createElement('div');
        toast.className = 'toast toast-' + type;
        toast.innerHTML = '<span>' + message + '</span>';
        toast.style.cssText = 'position:fixed;bottom:100px;left:50%;transform:translateX(-50%) translateY(100px);background-color:var(--card);color:var(--foreground);padding:1rem 2rem;border-radius:var(--radius-xl);box-shadow:0 10px 40px rgba(0,0,0,0.3);z-index:9999;transition:transform 0.3s ease;border:1px solid var(--border);';

        if (type === 'success') {
            toast.style.borderColor = 'hsl(142, 76%, 36%)';
        } else if (type === 'error') {
            toast.style.borderColor = 'hsl(0, 62.8%, 50%)';
        }

        document.body.appendChild(toast);

        requestAnimationFrame(function() {
            toast.style.transform = 'translateX(-50%) translateY(0)';
        });

        setTimeout(function() {
            toast.style.transform = 'translateX(-50%) translateY(100px)';
            setTimeout(function() {
                toast.remove();
            }, 300);
        }, 3000);
    }

    window.showToast = showToast;
})();
    <?php
    return ob_get_clean();
}

/**
 * Register Widget Areas
 */
function xiaomi_sari_widgets_init() {
    register_sidebar(array(
        'name'          => __('سایدبار فروشگاه', 'xiaomi-sari'),
        'id'            => 'shop-sidebar',
        'description'   => __('ویجت‌های سایدبار صفحه فروشگاه', 'xiaomi-sari'),
        'before_widget' => '<div id="%1$s" class="widget glass-card rounded-2xl p-6 mb-6 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title text-lg font-bold text-foreground mb-4">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('فوتر ۱', 'xiaomi-sari'),
        'id'            => 'footer-1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('فوتر ۲', 'xiaomi-sari'),
        'id'            => 'footer-2',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'xiaomi_sari_widgets_init');

/**
 * Theme Customizer
 */
function xiaomi_sari_customize_register($wp_customize) {
    // Contact Info Section
    $wp_customize->add_section('xiaomi_sari_contact', array(
        'title'    => __('اطلاعات تماس', 'xiaomi-sari'),
        'priority' => 35,
    ));

    $wp_customize->add_setting('contact_phone', array(
        'default'           => '01133333333',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_phone', array(
        'label'    => __('شماره تلفن', 'xiaomi-sari'),
        'section'  => 'xiaomi_sari_contact',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('contact_address', array(
        'default'           => 'ساری، خیابان فرهنگ',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_address', array(
        'label'    => __('آدرس', 'xiaomi-sari'),
        'section'  => 'xiaomi_sari_contact',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('contact_hours', array(
        'default'           => '۹ صبح تا ۹ شب',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_hours', array(
        'label'    => __('ساعات کاری', 'xiaomi-sari'),
        'section'  => 'xiaomi_sari_contact',
        'type'     => 'text',
    ));

    // Social Media Section
    $wp_customize->add_section('xiaomi_sari_social', array(
        'title'    => __('شبکه‌های اجتماعی', 'xiaomi-sari'),
        'priority' => 40,
    ));

    $wp_customize->add_setting('social_instagram', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_instagram', array(
        'label'    => __('لینک اینستاگرام', 'xiaomi-sari'),
        'section'  => 'xiaomi_sari_social',
        'type'     => 'url',
    ));

    $wp_customize->add_setting('social_telegram', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_telegram', array(
        'label'    => __('لینک تلگرام', 'xiaomi-sari'),
        'section'  => 'xiaomi_sari_social',
        'type'     => 'url',
    ));

    $wp_customize->add_setting('social_whatsapp', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_whatsapp', array(
        'label'    => __('لینک واتساپ', 'xiaomi-sari'),
        'section'  => 'xiaomi_sari_social',
        'type'     => 'url',
    ));
}
add_action('customize_register', 'xiaomi_sari_customize_register');

/**
 * Helper Functions
 */
function xiaomi_sari_get_contact_info($key = '') {
    $contact_info = array(
        'phone'   => get_theme_mod('contact_phone', '01133333333'),
        'address' => get_theme_mod('contact_address', 'ساری، خیابان فرهنگ'),
        'hours'   => get_theme_mod('contact_hours', '۹ صبح تا ۹ شب'),
    );
    
    if ($key && isset($contact_info[$key])) {
        return $contact_info[$key];
    }
    
    return $contact_info;
}

function xiaomi_sari_get_social_links() {
    return array(
        'instagram' => get_theme_mod('social_instagram', ''),
        'telegram'  => get_theme_mod('social_telegram', ''),
        'whatsapp'  => get_theme_mod('social_whatsapp', ''),
    );
}

function xiaomi_sari_format_price($price) {
    $persian_digits = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
    $english_digits = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    
    $formatted = number_format($price);
    return str_replace($english_digits, $persian_digits, $formatted);
}

function xiaomi_sari_to_persian($string) {
    $persian_digits = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
    $english_digits = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    
    return str_replace($english_digits, $persian_digits, $string);
}

/**
 * AJAX Handler: Lead Form
 */
function xiaomi_sari_submit_lead() {
    check_ajax_referer('xiaomi_sari_nonce', 'nonce');
    
    $name  = sanitize_text_field($_POST['name'] ?? '');
    $phone = sanitize_text_field($_POST['phone'] ?? '');
    $email = sanitize_email($_POST['email'] ?? '');
    $message = sanitize_textarea_field($_POST['message'] ?? '');
    
    if (empty($name) || empty($phone)) {
        wp_send_json_error(array('message' => 'لطفا فیلدهای ضروری را پر کنید.'));
    }
    
    $admin_email = get_option('admin_email');
    $subject = 'درخواست جدید از فرم تماس - ' . $name;
    $body = "نام: {$name}\nتلفن: {$phone}\nایمیل: {$email}\n\nپیام:\n{$message}";
    
    $sent = wp_mail($admin_email, $subject, $body);
    
    if ($sent) {
        wp_send_json_success(array('message' => 'پیام شما با موفقیت ارسال شد.'));
    } else {
        wp_send_json_error(array('message' => 'خطا در ارسال پیام. لطفا دوباره تلاش کنید.'));
    }
}
add_action('wp_ajax_xiaomi_sari_submit_lead', 'xiaomi_sari_submit_lead');
add_action('wp_ajax_nopriv_xiaomi_sari_submit_lead', 'xiaomi_sari_submit_lead');

/**
 * WooCommerce Customizations
 */
function xiaomi_sari_wc_add_to_cart_btn($button, $product) {
    return str_replace('button', 'button btn btn-primary', $button);
}
add_filter('woocommerce_loop_add_to_cart_link', 'xiaomi_sari_wc_add_to_cart_btn', 10, 2);

function xiaomi_sari_wc_loop_columns() {
    return 4;
}
add_filter('loop_shop_columns', 'xiaomi_sari_wc_loop_columns');

function xiaomi_sari_wc_products_per_page() {
    return 12;
}
add_filter('loop_shop_per_page', 'xiaomi_sari_wc_products_per_page');

/**
 * Shortcode: Featured Products
 */
function xiaomi_sari_featured_products_shortcode($atts) {
    $atts = shortcode_atts(array(
        'count'    => 6,
        'category' => '',
    ), $atts);
    
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => $atts['count'],
        'meta_key'       => '_featured',
        'meta_value'     => 'yes',
    );
    
    if (!empty($atts['category'])) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => $atts['category'],
            ),
        );
    }
    
    $products = new WP_Query($args);
    
    ob_start();
    
    if ($products->have_posts()) {
        echo '<div class="products-grid">';
        
        while ($products->have_posts()) {
            $products->the_post();
            global $product;
            
            $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
            $price = $product->get_price_html();
            $sale_price = $product->get_sale_price();
            $regular_price = $product->get_regular_price();
            
            ?>
            <div class="product-card glass-card-hover">
                <div class="product-image-wrapper">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title_attribute(); ?>" class="product-image">
                    </a>
                    
                    <?php if ($product->is_on_sale()) : ?>
                    <span class="product-discount-badge">
                        <?php 
                        $discount = round((($regular_price - $sale_price) / $regular_price) * 100);
                        echo xiaomi_sari_to_persian($discount) . '٪ تخفیف';
                        ?>
                    </span>
                    <?php endif; ?>
                    
                    <span class="product-category-badge glass-effect">
                        <?php 
                        $terms = get_the_terms(get_the_ID(), 'product_cat');
                        if ($terms) echo esc_html($terms[0]->name);
                        ?>
                    </span>
                    
                    <div class="product-overlay">
                        <a href="<?php the_permalink(); ?>" class="product-action-btn primary">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </a>
                        <button class="product-action-btn secondary add-to-cart" data-product-id="<?php echo get_the_ID(); ?>">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="9" cy="21" r="1"/>
                                <circle cx="20" cy="21" r="1"/>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
                            </svg>
                        </button>
                    </div>
                </div>
                
                <div class="product-info">
                    <a href="<?php the_permalink(); ?>">
                        <h3 class="product-title"><?php the_title(); ?></h3>
                    </a>
                    <div class="product-price-wrapper">
                        <div>
                            <p class="product-price"><?php echo $price; ?></p>
                        </div>
                        <button class="btn btn-icon btn-primary add-to-cart" data-product-id="<?php echo get_the_ID(); ?>">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="9" cy="21" r="1"/>
                                <circle cx="20" cy="21" r="1"/>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <?php
        }
        
        echo '</div>';
        
        wp_reset_postdata();
    }
    
    return ob_get_clean();
}
add_shortcode('xiaomi_featured_products', 'xiaomi_sari_featured_products_shortcode');

/**
 * Shortcode: Product Categories
 */
function xiaomi_sari_categories_shortcode($atts) {
    $atts = shortcode_atts(array(
        'count'     => 5,
        'parent'    => 0,
        'hide_empty' => true,
    ), $atts);
    
    $categories = get_terms(array(
        'taxonomy'   => 'product_cat',
        'number'     => $atts['count'],
        'parent'     => $atts['parent'],
        'hide_empty' => $atts['hide_empty'],
    ));
    
    ob_start();
    
    if (!empty($categories) && !is_wp_error($categories)) {
        echo '<div class="categories-grid">';
        
        foreach ($categories as $category) {
            $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
            $image = wp_get_attachment_url($thumbnail_id);
            
            ?>
            <a href="<?php echo get_term_link($category); ?>" class="category-card">
                <div class="category-image-wrapper">
                    <?php if ($image) : ?>
                    <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($category->name); ?>" class="category-image">
                    <?php endif; ?>
                </div>
                <div class="category-overlay">
                    <h3 class="category-name"><?php echo esc_html($category->name); ?></h3>
                </div>
            </a>
            <?php
        }
        
        echo '</div>';
    }
    
    return ob_get_clean();
}
add_shortcode('xiaomi_categories', 'xiaomi_sari_categories_shortcode');

/**
 * Shortcode: Testimonials
 */
function xiaomi_sari_testimonials_shortcode($atts) {
    $atts = shortcode_atts(array(
        'count' => 3,
    ), $atts);
    
    $testimonials = array(
        array(
            'name'    => 'محمد رضایی',
            'role'    => 'مشتری',
            'initial' => 'م',
            'text'    => 'بسیار راضی هستم از خریدم. کیفیت محصول عالی بود و پشتیبانی فوق‌العاده. قطعا دوباره خرید می‌کنم.',
            'rating'  => 5,
        ),
        array(
            'name'    => 'زهرا احمدی',
            'role'    => 'مشتری',
            'initial' => 'ز',
            'text'    => 'ارسال سریع و بسته‌بندی مناسب. گوشی کاملا اورجینال بود و با گارانتی معتبر. ممنون از شیائومی ساری.',
            'rating'  => 5,
        ),
        array(
            'name'    => 'علی محمدی',
            'role'    => 'مشتری',
            'initial' => 'ع',
            'text'    => 'قیمت‌ها نسبت به بازار خیلی مناسب‌تره. مشاوره خریدشون هم عالی بود و کمک کرد بهترین انتخاب رو داشته باشم.',
            'rating'  => 5,
        ),
    );
    
    ob_start();
    
    echo '<div class="testimonials-grid">';
    
    foreach (array_slice($testimonials, 0, $atts['count']) as $testimonial) {
        ?>
        <div class="testimonial-card glass-card">
            <div class="testimonial-stars">
                <?php for ($i = 0; $i < $testimonial['rating']; $i++) : ?>
                <svg class="testimonial-star" viewBox="0 0 24 24" fill="currentColor">
                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                </svg>
                <?php endfor; ?>
            </div>
            <p class="testimonial-text"><?php echo esc_html($testimonial['text']); ?></p>
            <div class="testimonial-author">
                <div class="testimonial-avatar"><?php echo esc_html($testimonial['initial']); ?></div>
                <div>
                    <div class="testimonial-name"><?php echo esc_html($testimonial['name']); ?></div>
                    <div class="testimonial-role"><?php echo esc_html($testimonial['role']); ?></div>
                </div>
            </div>
        </div>
        <?php
    }
    
    echo '</div>';
    
    return ob_get_clean();
}
add_shortcode('xiaomi_testimonials', 'xiaomi_sari_testimonials_shortcode');

/**
 * Shortcode: Lead Form
 */
function xiaomi_sari_lead_form_shortcode($atts) {
    $atts = shortcode_atts(array(
        'title'       => 'دریافت مشاوره رایگان',
        'description' => 'شماره خود را وارد کنید تا کارشناسان ما با شما تماس بگیرند.',
    ), $atts);
    
    ob_start();
    ?>
    <div class="lead-form-wrapper glass-card">
        <h2 class="lead-title"><?php echo esc_html($atts['title']); ?></h2>
        <p class="lead-description"><?php echo esc_html($atts['description']); ?></p>
        <form class="lead-form" id="xiaomi-lead-form">
            <input type="text" name="name" class="form-input form-input-lg" placeholder="نام و نام خانوادگی" required>
            <input type="tel" name="phone" class="form-input form-input-lg" placeholder="شماره موبایل" required>
            <button type="submit" class="btn btn-primary btn-lg">ثبت درخواست</button>
        </form>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('xiaomi_lead_form', 'xiaomi_sari_lead_form_shortcode');

/**
 * Shortcode: Value Propositions
 */
function xiaomi_sari_values_shortcode() {
    $values = array(
        array(
            'icon'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
            'title' => 'گارانتی اصالت کالا',
            'desc'  => 'تمامی محصولات با ضمانت اصالت و گارانتی معتبر ارائه می‌شوند',
        ),
        array(
            'icon'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>',
            'title' => 'ارسال سریع و رایگان',
            'desc'  => 'ارسال رایگان به سراسر استان مازندران در کمتر از ۲۴ ساعت',
        ),
        array(
            'icon'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>',
            'title' => 'بهترین قیمت بازار',
            'desc'  => 'تضمین پایین‌ترین قیمت با امکان مقایسه قیمت',
        ),
        array(
            'icon'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>',
            'title' => 'پشتیبانی تخصصی',
            'desc'  => 'مشاوره رایگان و پشتیبانی ۷ روز هفته',
        ),
    );
    
    ob_start();
    
    echo '<div class="value-grid">';
    
    foreach ($values as $value) {
        ?>
        <div class="value-card glass-card">
            <div class="value-icon"><?php echo $value['icon']; ?></div>
            <h3 class="value-title"><?php echo esc_html($value['title']); ?></h3>
            <p class="value-description"><?php echo esc_html($value['desc']); ?></p>
        </div>
        <?php
    }
    
    echo '</div>';
    
    return ob_get_clean();
}
add_shortcode('xiaomi_values', 'xiaomi_sari_values_shortcode');

/**
 * Output Header Template
 */
function xiaomi_sari_header_template() {
    ?>
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

<header class="site-header" id="site-header">
    <div class="container">
        <div class="header-content">
            <a href="<?php echo home_url(); ?>" class="site-logo">
                <?php echo get_bloginfo('name'); ?>
            </a>

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
                        echo '<a href="' . (function_exists('wc_get_page_id') ? get_permalink(wc_get_page_id('shop')) : home_url('/shop')) . '" class="nav-link">محصولات</a>';
                        echo '<a href="' . home_url('/about') . '" class="nav-link">درباره ما</a>';
                        echo '<a href="' . home_url('/contact') . '" class="nav-link">تماس با ما</a>';
                    }
                ));
                ?>
            </nav>

            <div class="header-cta">
                <a href="tel:<?php echo xiaomi_sari_get_contact_info('phone'); ?>" class="header-phone">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                    </svg>
                    <span><?php echo xiaomi_sari_to_persian(xiaomi_sari_get_contact_info('phone')); ?></span>
                </a>
                <a href="<?php echo home_url('/contact'); ?>" class="btn btn-primary btn-sm">تماس با ما</a>
            </div>

            <button class="mobile-menu-toggle" aria-label="منوی موبایل" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>

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
                    echo '<a href="' . (function_exists('wc_get_page_id') ? get_permalink(wc_get_page_id('shop')) : home_url('/shop')) . '" class="mobile-nav-link">محصولات</a>';
                    echo '<a href="' . home_url('/about') . '" class="mobile-nav-link">درباره ما</a>';
                    echo '<a href="' . home_url('/contact') . '" class="mobile-nav-link">تماس با ما</a>';
                }
            ));
            ?>
        </nav>
    </div>
</header>
    <?php
}

/**
 * Output Footer Template
 */
function xiaomi_sari_footer_template() {
    ?>
<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand">
                <a href="<?php echo home_url(); ?>" class="site-logo"><?php echo get_bloginfo('name'); ?></a>
                <p>فروشگاه تخصصی محصولات شیائومی با تضمین اصالت کالا و بهترین قیمت در بازار.</p>
            </div>

            <div>
                <h4 class="footer-title">دسترسی سریع</h4>
                <ul class="footer-links">
                    <li><a href="<?php echo home_url(); ?>">صفحه اصلی</a></li>
                    <li><a href="<?php echo function_exists('wc_get_page_id') ? get_permalink(wc_get_page_id('shop')) : home_url('/shop'); ?>">محصولات</a></li>
                    <li><a href="<?php echo home_url('/about'); ?>">درباره ما</a></li>
                    <li><a href="<?php echo home_url('/contact'); ?>">تماس با ما</a></li>
                </ul>
            </div>

            <div>
                <h4 class="footer-title">اطلاعات تماس</h4>
                <div class="footer-contact-item">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    <span><?php echo xiaomi_sari_to_persian(xiaomi_sari_get_contact_info('phone')); ?></span>
                </div>
                <div class="footer-contact-item">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    <span><?php echo xiaomi_sari_get_contact_info('address'); ?></span>
                </div>
                <div class="footer-contact-item">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    <span><?php echo xiaomi_sari_get_contact_info('hours'); ?></span>
                </div>
            </div>

            <div>
                <h4 class="footer-title">شبکه‌های اجتماعی</h4>
                <div class="footer-social">
                    <?php $social = xiaomi_sari_get_social_links(); ?>
                    <?php if ($social['instagram']) : ?>
                    <a href="<?php echo esc_url($social['instagram']); ?>" target="_blank" rel="noopener">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                    </a>
                    <?php endif; ?>
                    <?php if ($social['telegram']) : ?>
                    <a href="<?php echo esc_url($social['telegram']); ?>" target="_blank" rel="noopener">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>© <?php echo xiaomi_sari_to_persian(date('Y')); ?> <?php echo get_bloginfo('name'); ?> - تمامی حقوق محفوظ است.</p>
        </div>
    </div>
</footer>

<nav class="mobile-toolbar">
    <a href="<?php echo home_url(); ?>" class="toolbar-item <?php echo is_front_page() ? 'active' : ''; ?>">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        <span>خانه</span>
    </a>
    <a href="<?php echo function_exists('wc_get_page_id') ? get_permalink(wc_get_page_id('shop')) : home_url('/shop'); ?>" class="toolbar-item <?php echo function_exists('is_shop') && is_shop() ? 'active' : ''; ?>">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        <span>محصولات</span>
    </a>
    <a href="<?php echo function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart'); ?>" class="toolbar-item <?php echo function_exists('is_cart') && is_cart() ? 'active' : ''; ?>">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
        <span>سبد خرید</span>
    </a>
    <a href="tel:<?php echo xiaomi_sari_get_contact_info('phone'); ?>" class="toolbar-item">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        <span>تماس</span>
    </a>
</nav>

<?php wp_footer(); ?>
</body>
</html>
    <?php
}

/**
 * Body Classes
 */
function xiaomi_sari_body_classes($classes) {
    $classes[] = 'xiaomi-sari-theme';
    $classes[] = 'dark-mode';
    
    if (is_front_page()) {
        $classes[] = 'front-page';
    }
    
    if (class_exists('WooCommerce')) {
        if (is_shop() || is_product_category() || is_product_tag()) {
            $classes[] = 'shop-page';
        }
        if (is_product()) {
            $classes[] = 'single-product-page';
        }
        if (is_cart()) {
            $classes[] = 'cart-page';
        }
        if (is_checkout()) {
            $classes[] = 'checkout-page';
        }
    }
    
    return $classes;
}
add_filter('body_class', 'xiaomi_sari_body_classes');

// Remove WordPress version meta tag
remove_action('wp_head', 'wp_generator');
