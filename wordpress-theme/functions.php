<?php
/**
 * Xiaomi Sari Theme - Complete All-In-One Functions
 * تمام CSS، JS، فونت‌ها و قالب‌های صفحات به صورت یکپارچه
 * فونت: AzarMehr (اول) + Vazirmatn از CDN (فالبک)
 *
 * @package Xiaomi_Sari
 * @version 3.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

// Theme Constants
define('XIAOMI_SARI_VERSION', '3.0.0');
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
 * Enqueue Inline Styles
 */
function xiaomi_sari_inline_styles() {
    wp_register_style('xiaomi-sari-main', false);
    wp_enqueue_style('xiaomi-sari-main');
    
    $css = xiaomi_sari_get_all_css();
    wp_add_inline_style('xiaomi-sari-main', $css);
}
add_action('wp_enqueue_scripts', 'xiaomi_sari_inline_styles');

/**
 * Enqueue Inline Scripts
 */
function xiaomi_sari_inline_scripts() {
    wp_register_script('xiaomi-sari-main', false, array(), null, true);
    wp_enqueue_script('xiaomi-sari-main');
    
    wp_localize_script('xiaomi-sari-main', 'xiaomiSari', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('xiaomi_sari_nonce'),
        'themeUrl' => XIAOMI_SARI_THEME_URI,
    ));
    
    $js = xiaomi_sari_get_all_js();
    wp_add_inline_script('xiaomi-sari-main', $js);
}
add_action('wp_enqueue_scripts', 'xiaomi_sari_inline_scripts');

/**
 * Get All CSS - شامل فونت‌ها، متغیرها و استایل‌ها
 */
function xiaomi_sari_get_all_css() {
    ob_start();
    ?>
/* ============================================
   FONTS - AzarMehr (Primary) + Vazirmatn (Fallback from CDN)
   ============================================ */

@font-face {
    font-family: 'AzarMehr';
    src: url('https://noormahbookcity.ir/wp-content/uploads/fonts/400-AzarMehr-Regular.woff2') format('woff2');
    font-weight: 400;
    font-display: swap;
}

@font-face {
    font-family: 'AzarMehr';
    src: url('https://noormahbookcity.ir/wp-content/uploads/fonts/500-AzarMehr-Medium.woff2') format('woff2');
    font-weight: 500;
    font-display: swap;
}

@font-face {
    font-family: 'AzarMehr';
    src: url('https://noormahbookcity.ir/wp-content/uploads/fonts/700-AzarMehr-Bold.woff2') format('woff2');
    font-weight: 700;
    font-display: swap;
}

@import url('https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css');

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
    font-family: 'AzarMehr', 'Vazirmatn', sans-serif !important;
    background-color: var(--background);
    color: var(--foreground);
    line-height: 1.6;
    direction: rtl;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

h1, h2, h3, h4, h5, h6, p, span, a, button, input, textarea, select, label, div {
    font-family: 'AzarMehr', 'Vazirmatn', sans-serif !important;
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
.text-center { text-align: center; }
.text-right { text-align: right; }

.bg-background { background-color: var(--background) !important; }
.bg-card { background-color: var(--card) !important; }
.bg-secondary { background-color: var(--secondary) !important; }
.bg-primary { background-color: var(--primary) !important; }

.rounded-sm { border-radius: var(--radius-sm); }
.rounded { border-radius: var(--radius); }
.rounded-lg { border-radius: var(--radius-lg); }
.rounded-xl { border-radius: var(--radius-xl); }
.rounded-2xl { border-radius: var(--radius-2xl); }
.rounded-3xl { border-radius: 1.5rem; }
.rounded-full { border-radius: 9999px; }

.flex { display: flex; }
.flex-col { flex-direction: column; }
.items-center { align-items: center; }
.justify-center { justify-content: center; }
.justify-between { justify-content: space-between; }
.gap-2 { gap: 0.5rem; }
.gap-3 { gap: 0.75rem; }
.gap-4 { gap: 1rem; }
.gap-6 { gap: 1.5rem; }
.gap-8 { gap: 2rem; }
.gap-12 { gap: 3rem; }

.grid { display: grid; }
.grid-cols-1 { grid-template-columns: repeat(1, minmax(0, 1fr)); }
.grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
.grid-cols-3 { grid-template-columns: repeat(3, minmax(0, 1fr)); }
.grid-cols-4 { grid-template-columns: repeat(4, minmax(0, 1fr)); }

@media (min-width: 640px) {
    .sm\:grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
}
@media (min-width: 768px) {
    .md\:grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    .md\:grid-cols-3 { grid-template-columns: repeat(3, minmax(0, 1fr)); }
    .md\:grid-cols-4 { grid-template-columns: repeat(4, minmax(0, 1fr)); }
}
@media (min-width: 1024px) {
    .lg\:grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    .lg\:grid-cols-3 { grid-template-columns: repeat(3, minmax(0, 1fr)); }
    .lg\:grid-cols-4 { grid-template-columns: repeat(4, minmax(0, 1fr)); }
}
@media (min-width: 1280px) {
    .xl\:grid-cols-4 { grid-template-columns: repeat(4, minmax(0, 1fr)); }
}

.mb-2 { margin-bottom: 0.5rem; }
.mb-4 { margin-bottom: 1rem; }
.mb-6 { margin-bottom: 1.5rem; }
.mb-8 { margin-bottom: 2rem; }
.mb-12 { margin-bottom: 3rem; }
.mb-16 { margin-bottom: 4rem; }
.mb-20 { margin-bottom: 5rem; }

.mt-4 { margin-top: 1rem; }
.mt-6 { margin-top: 1.5rem; }
.mt-8 { margin-top: 2rem; }

.pt-32 { padding-top: 8rem; }
.pb-20 { padding-bottom: 5rem; }
.py-8 { padding-top: 2rem; padding-bottom: 2rem; }
.py-12 { padding-top: 3rem; padding-bottom: 3rem; }
.py-16 { padding-top: 4rem; padding-bottom: 4rem; }
.py-20 { padding-top: 5rem; padding-bottom: 5rem; }
.px-4 { padding-left: 1rem; padding-right: 1rem; }
.px-6 { padding-left: 1.5rem; padding-right: 1.5rem; }
.p-4 { padding: 1rem; }
.p-6 { padding: 1.5rem; }
.p-8 { padding: 2rem; }

.w-full { width: 100%; }
.h-12 { height: 3rem; }
.h-14 { height: 3.5rem; }

.mx-auto { margin-left: auto; margin-right: auto; }
.max-w-4xl { max-width: 56rem; }
.max-w-lg { max-width: 32rem; }

.font-bold { font-weight: 700; }
.font-semibold { font-weight: 600; }
.font-medium { font-weight: 500; }

.text-sm { font-size: 0.875rem; }
.text-lg { font-size: 1.125rem; }
.text-xl { font-size: 1.25rem; }
.text-2xl { font-size: 1.5rem; }
.text-3xl { font-size: 1.875rem; }
.text-4xl { font-size: 2.25rem; }
.text-5xl { font-size: 3rem; }

@media (min-width: 768px) {
    .md\:text-4xl { font-size: 2.25rem; }
    .md\:text-5xl { font-size: 3rem; }
}
@media (min-width: 1024px) {
    .lg\:text-6xl { font-size: 3.75rem; }
}

.leading-relaxed { line-height: 1.625; }
.line-through { text-decoration: line-through; }

.overflow-hidden { overflow: hidden; }
.relative { position: relative; }
.absolute { position: absolute; }
.fixed { position: fixed; }
.inset-0 { top: 0; right: 0; bottom: 0; left: 0; }

.z-10 { z-index: 10; }
.z-20 { z-index: 20; }
.z-50 { z-index: 50; }

.transition-all { transition: all var(--transition-normal); }
.transition-transform { transition: transform var(--transition-normal); }
.transition-colors { transition: color var(--transition-fast), background-color var(--transition-fast); }
.duration-300 { transition-duration: 300ms; }
.duration-700 { transition-duration: 700ms; }

.hover\:scale-105:hover { transform: scale(1.05); }
.hover\:scale-110:hover { transform: scale(1.1); }

.border { border-width: 1px; }
.border-t { border-top-width: 1px; }
.border-border { border-color: var(--border); }

.space-y-4 > * + * { margin-top: 1rem; }
.space-y-6 > * + * { margin-top: 1.5rem; }

.aspect-square { aspect-ratio: 1 / 1; }

.object-contain { object-fit: contain; }
.object-cover { object-fit: cover; }

.pointer-events-none { pointer-events: none; }
.cursor-pointer { cursor: pointer; }

.min-h-screen { min-height: 100vh; }
.sticky { position: sticky; }
.top-32 { top: 8rem; }
.top-0 { top: 0; }
.left-0 { left: 0; }
.right-0 { right: 0; }

.flex-shrink-0 { flex-shrink: 0; }
.flex-1 { flex: 1 1 0%; }
.min-w-0 { min-width: 0; }

.sr-only { 
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border-width: 0;
}

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
    cursor: pointer;
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
    border-radius: 9999px;
}

.btn-lg {
    padding: 1rem 2rem;
    font-size: 1.125rem;
    height: 3.5rem;
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
    transition: all 0.3s ease-out;
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
    transition: all 0.3s ease-out;
}

.site-header.scrolled .header-content {
    height: 3.5rem;
    padding: 0 1.5rem;
}

.site-logo {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary);
    transition: all 0.3s ease-out;
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

.nav-actions {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.cart-badge {
    position: relative;
}

.cart-count {
    position: absolute;
    top: -0.5rem;
    right: -0.5rem;
    background: var(--primary);
    color: var(--primary-foreground);
    font-size: 0.75rem;
    font-weight: 700;
    min-width: 1.25rem;
    height: 1.25rem;
    border-radius: 9999px;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* ============================================
   HERO SECTION
   ============================================ */

.hero-section {
    position: relative;
    min-height: 100vh;
    display: flex;
    align-items: center;
    overflow: hidden;
    padding-top: 5rem;
}

.hero-background {
    position: absolute;
    inset: 0;
    z-index: 0;
}

.hero-background img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.hero-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to left, rgba(18, 18, 18, 0.3), rgba(18, 18, 18, 0.95) 70%);
}

.hero-content {
    position: relative;
    z-index: 10;
    max-width: 48rem;
}

.hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(var(--primary-rgb), 0.1);
    border: 1px solid rgba(var(--primary-rgb), 0.3);
    color: var(--primary);
    font-size: 0.875rem;
    font-weight: 500;
    padding: 0.5rem 1rem;
    border-radius: 9999px;
    margin-bottom: 1.5rem;
}

.hero-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--foreground);
    line-height: 1.2;
    margin-bottom: 1.5rem;
}

@media (min-width: 768px) {
    .hero-title {
        font-size: 3.75rem;
    }
}

@media (min-width: 1024px) {
    .hero-title {
        font-size: 4.5rem;
    }
}

.hero-description {
    font-size: 1.125rem;
    color: var(--muted-foreground);
    line-height: 1.75;
    margin-bottom: 2rem;
    max-width: 36rem;
}

@media (min-width: 768px) {
    .hero-description {
        font-size: 1.25rem;
    }
}

.hero-buttons {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
}

.hero-stats {
    display: flex;
    gap: 3rem;
    margin-top: 4rem;
    padding-top: 2rem;
    border-top: 1px solid var(--border);
}

.hero-stat {
    text-align: center;
}

.hero-stat-value {
    font-size: 2.25rem;
    font-weight: 700;
    color: var(--primary);
    margin-bottom: 0.25rem;
}

@media (min-width: 768px) {
    .hero-stat-value {
        font-size: 3rem;
    }
}

.hero-stat-label {
    font-size: 0.875rem;
    color: var(--muted-foreground);
}

/* ============================================
   SECTIONS
   ============================================ */

.section {
    padding: 5rem 0;
}

.section-header {
    text-align: center;
    margin-bottom: 4rem;
}

.section-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: var(--secondary);
    color: var(--primary);
    font-size: 0.875rem;
    font-weight: 500;
    padding: 0.5rem 1rem;
    border-radius: 9999px;
    margin-bottom: 1rem;
}

.section-title {
    font-size: 2rem;
    font-weight: 700;
    color: var(--foreground);
    margin-bottom: 1rem;
}

@media (min-width: 768px) {
    .section-title {
        font-size: 2.5rem;
    }
}

.section-description {
    font-size: 1.125rem;
    color: var(--muted-foreground);
    max-width: 42rem;
    margin: 0 auto;
}

.section-bg {
    background: rgba(var(--primary-rgb), 0.02);
}

/* ============================================
   CARDS
   ============================================ */

.value-card {
    padding: 2rem;
    text-align: center;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.value-card:hover {
    transform: translateY(-8px);
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
    color: var(--primary);
}

.value-icon svg {
    width: 2rem;
    height: 2rem;
}

.value-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--foreground);
    margin-bottom: 0.75rem;
}

.value-description {
    font-size: 0.875rem;
    color: var(--muted-foreground);
    line-height: 1.625;
}

/* Category Card */
.category-card {
    position: relative;
    overflow: hidden;
    aspect-ratio: 4 / 3;
    cursor: pointer;
}

.category-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1);
}

.category-card:hover img {
    transform: scale(1.1);
}

.category-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    padding: 1.5rem;
}

.category-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--foreground);
    margin-bottom: 0.5rem;
}

.category-count {
    font-size: 0.875rem;
    color: var(--primary);
}

/* Product Card */
.product-card {
    overflow: hidden;
}

.product-image-wrapper {
    position: relative;
    aspect-ratio: 1;
    background: rgba(var(--primary-rgb), 0.02);
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.product-image-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    padding: 1rem;
    transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1);
}

.product-card:hover .product-image-wrapper img {
    transform: scale(1.1);
}

.product-overlay {
    position: absolute;
    inset: 0;
    background: rgba(18, 18, 18, 0.6);
    backdrop-filter: blur(8px);
    opacity: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
    transition: opacity 0.3s ease;
}

.product-card:hover .product-overlay {
    opacity: 1;
}

.product-overlay-btn {
    width: 3rem;
    height: 3rem;
    border-radius: 9999px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: transform 0.3s ease;
}

.product-overlay-btn:hover {
    transform: scale(1.1);
}

.product-overlay-btn.primary {
    background: var(--primary);
    color: var(--primary-foreground);
}

.product-overlay-btn.secondary {
    background: var(--secondary);
    color: var(--foreground);
}

.product-badge {
    position: absolute;
    top: 1rem;
    padding: 0.25rem 0.75rem;
    border-radius: 9999px;
    font-size: 0.75rem;
    font-weight: 700;
}

.product-badge.discount {
    right: 1rem;
    background: var(--primary);
    color: var(--primary-foreground);
}

.product-badge.category {
    left: 1rem;
    background: rgba(18, 18, 18, 0.6);
    backdrop-filter: blur(10px);
    color: var(--foreground);
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

.product-price-row {
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

/* Testimonial Card */
.testimonial-card {
    padding: 2rem;
}

.testimonial-rating {
    display: flex;
    gap: 0.25rem;
    margin-bottom: 1rem;
    color: #facc15;
}

.testimonial-text {
    font-size: 1rem;
    color: var(--foreground);
    line-height: 1.75;
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
    border-radius: 9999px;
    background: linear-gradient(135deg, var(--primary), hsl(30, 95%, 60%));
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-foreground);
    font-weight: 700;
}

.testimonial-name {
    font-weight: 600;
    color: var(--foreground);
}

.testimonial-product {
    font-size: 0.875rem;
    color: var(--muted-foreground);
}

/* ============================================
   FAQ ACCORDION
   ============================================ */

.faq-item {
    border-bottom: 1px solid var(--border);
}

.faq-item:last-child {
    border-bottom: none;
}

.faq-question {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1.5rem 0;
    text-align: right;
    font-weight: 600;
    color: var(--foreground);
    transition: color var(--transition-fast);
    cursor: pointer;
    background: none;
    border: none;
}

.faq-question:hover {
    color: var(--primary);
}

.faq-icon {
    width: 1.5rem;
    height: 1.5rem;
    color: var(--primary);
    transition: transform var(--transition-normal);
    flex-shrink: 0;
}

.faq-item.open .faq-icon {
    transform: rotate(180deg);
}

.faq-answer {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease, padding 0.3s ease;
}

.faq-item.open .faq-answer {
    max-height: 500px;
    padding-bottom: 1.5rem;
}

.faq-answer-text {
    color: var(--muted-foreground);
    line-height: 1.75;
}

/* ============================================
   LEAD FORM
   ============================================ */

.lead-form-section {
    background: linear-gradient(135deg, rgba(var(--primary-rgb), 0.1), rgba(var(--primary-rgb), 0.05));
    border-radius: var(--radius-2xl);
    padding: 3rem 2rem;
}

@media (min-width: 768px) {
    .lead-form-section {
        padding: 4rem;
    }
}

.lead-form {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    max-width: 32rem;
    margin: 0 auto;
}

@media (min-width: 768px) {
    .lead-form {
        flex-direction: row;
        max-width: 36rem;
    }
}

.lead-form .form-input {
    flex: 1;
}

/* ============================================
   FOOTER
   ============================================ */

.site-footer {
    background: var(--card);
    border-top: 1px solid var(--border);
    padding: 4rem 0 2rem;
}

.footer-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 2rem;
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

.footer-brand {
    max-width: 20rem;
}

.footer-logo {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary);
    margin-bottom: 1rem;
}

.footer-description {
    color: var(--muted-foreground);
    font-size: 0.875rem;
    line-height: 1.75;
    margin-bottom: 1.5rem;
}

.footer-social {
    display: flex;
    gap: 0.75rem;
}

.social-link {
    width: 2.5rem;
    height: 2.5rem;
    background: var(--secondary);
    border-radius: 9999px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--foreground);
    transition: all var(--transition-fast);
}

.social-link:hover {
    background: var(--primary);
    color: var(--primary-foreground);
}

.footer-title {
    font-weight: 700;
    color: var(--foreground);
    margin-bottom: 1.5rem;
}

.footer-links {
    list-style: none;
}

.footer-link {
    display: block;
    color: var(--muted-foreground);
    font-size: 0.875rem;
    padding: 0.5rem 0;
    transition: color var(--transition-fast);
}

.footer-link:hover {
    color: var(--primary);
}

.footer-contact-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    color: var(--muted-foreground);
    font-size: 0.875rem;
    margin-bottom: 1rem;
}

.footer-contact-icon {
    width: 1.25rem;
    height: 1.25rem;
    color: var(--primary);
}

.footer-bottom {
    padding-top: 2rem;
    border-top: 1px solid var(--border);
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1rem;
}

@media (min-width: 768px) {
    .footer-bottom {
        flex-direction: row;
        justify-content: space-between;
    }
}

.footer-copyright {
    color: var(--muted-foreground);
    font-size: 0.875rem;
}

/* ============================================
   FLOATING TOOLBAR
   ============================================ */

.floating-toolbar {
    position: fixed;
    z-index: 40;
}

/* Mobile - Bottom Center */
@media (max-width: 1023px) {
    .floating-toolbar {
        bottom: 1.5rem;
        left: 50%;
        transform: translateX(-50%);
    }
}

/* Desktop - Right Side */
@media (min-width: 1024px) {
    .floating-toolbar {
        top: 50%;
        right: 1.5rem;
        transform: translateY(-50%);
    }
}

.toolbar-container {
    display: flex;
    padding: 0.5rem;
    border-radius: 9999px;
    background: rgba(26, 26, 26, 0.9);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
}

@media (max-width: 1023px) {
    .toolbar-container {
        flex-direction: row;
        gap: 0.25rem;
    }
}

@media (min-width: 1024px) {
    .toolbar-container {
        flex-direction: column;
        gap: 0.5rem;
    }
}

.toolbar-btn {
    width: 2.75rem;
    height: 2.75rem;
    border-radius: 9999px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--foreground);
    transition: all var(--transition-fast);
    position: relative;
}

.toolbar-btn:hover {
    background: var(--secondary);
    color: var(--primary);
}

.toolbar-btn.active {
    background: var(--primary);
    color: var(--primary-foreground);
}

.toolbar-badge {
    position: absolute;
    top: -0.25rem;
    right: -0.25rem;
    background: var(--primary);
    color: var(--primary-foreground);
    font-size: 0.625rem;
    font-weight: 700;
    min-width: 1rem;
    height: 1rem;
    border-radius: 9999px;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* ============================================
   PAGE TEMPLATES
   ============================================ */

.page-header {
    text-align: center;
    max-width: 56rem;
    margin: 0 auto 5rem;
}

.page-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--foreground);
    margin-bottom: 1.5rem;
}

@media (min-width: 768px) {
    .page-title {
        font-size: 3rem;
    }
}

@media (min-width: 1024px) {
    .page-title {
        font-size: 3.75rem;
    }
}

.page-description {
    font-size: 1.25rem;
    color: var(--muted-foreground);
    line-height: 1.625;
}

/* Stats Section */
.stats-section {
    padding: 4rem 0;
    background: rgba(var(--primary-rgb), 0.02);
}

.stat-item {
    text-align: center;
}

.stat-value {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--primary);
    margin-bottom: 0.5rem;
}

@media (min-width: 768px) {
    .stat-value {
        font-size: 3rem;
    }
}

.stat-label {
    color: var(--muted-foreground);
}

/* Contact Info Card */
.contact-card {
    display: flex;
    align-items: center;
    gap: 1.5rem;
    padding: 1.5rem;
    transition: transform 0.3s ease;
}

.contact-card:hover {
    transform: scale(1.05);
}

.contact-icon {
    width: 3.5rem;
    height: 3.5rem;
    background: rgba(var(--primary-rgb), 0.1);
    border-radius: var(--radius-xl);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary);
    flex-shrink: 0;
}

.contact-icon svg {
    width: 1.5rem;
    height: 1.5rem;
}

.contact-title {
    font-size: 1.125rem;
    font-weight: 700;
    color: var(--foreground);
    margin-bottom: 0.25rem;
}

.contact-value {
    color: var(--muted-foreground);
}

.contact-value a:hover {
    color: var(--primary);
}

/* Social Links */
.social-links-grid {
    display: flex;
    gap: 1rem;
}

.social-btn {
    width: 3rem;
    height: 3rem;
    background: rgba(var(--primary-rgb), 0.1);
    border-radius: var(--radius-xl);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--foreground);
    transition: all var(--transition-fast);
}

.social-btn:hover {
    background: var(--primary);
    color: var(--primary-foreground);
}

/* Map */
.map-container {
    overflow: hidden;
    border-radius: var(--radius-xl);
}

.map-container iframe {
    filter: grayscale(100%);
}

/* Shop Filters */
.shop-filters {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

@media (min-width: 1024px) {
    .shop-filters {
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
    }
}

.search-wrapper {
    position: relative;
    width: 100%;
    max-width: 24rem;
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

.filter-buttons {
    display: flex;
    flex-wrap: wrap;
    gap: 0.75rem;
}

.filter-btn {
    padding: 0.5rem 1rem;
    border-radius: var(--radius-xl);
    font-weight: 500;
    transition: all 0.3s ease;
    cursor: pointer;
    background: var(--secondary);
    color: var(--foreground);
    border: none;
}

.filter-btn:hover {
    background: var(--secondary);
    opacity: 0.8;
}

.filter-btn.active {
    background: var(--primary);
    color: var(--primary-foreground);
}

/* Cart Item */
.cart-item {
    display: flex;
    gap: 1.5rem;
    padding: 1.5rem;
}

.cart-item-image {
    width: 6rem;
    height: 6rem;
    background: rgba(var(--primary-rgb), 0.02);
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

.cart-item-title {
    font-size: 1.125rem;
    font-weight: 700;
    color: var(--foreground);
    transition: color var(--transition-fast);
}

.cart-item-title:hover {
    color: var(--primary);
}

.cart-item-color {
    color: var(--muted-foreground);
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

.cart-item-actions {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 1rem;
}

.quantity-control {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.quantity-btn {
    width: 2.5rem;
    height: 2.5rem;
    border-radius: var(--radius-xl);
    background: var(--secondary);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background-color var(--transition-fast);
    cursor: pointer;
    border: none;
    color: var(--foreground);
}

.quantity-btn:hover {
    background: rgba(var(--primary-rgb), 0.2);
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

.remove-btn {
    color: var(--muted-foreground);
    transition: color var(--transition-fast);
    background: none;
    border: none;
    cursor: pointer;
}

.remove-btn:hover {
    color: var(--destructive);
}

/* Order Summary */
.order-summary {
    padding: 1.5rem;
}

.summary-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--foreground);
    margin-bottom: 1.5rem;
}

.discount-form {
    display: flex;
    gap: 0.5rem;
    margin-bottom: 1.5rem;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    color: var(--muted-foreground);
    margin-bottom: 1rem;
}

.summary-total {
    display: flex;
    justify-content: space-between;
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--foreground);
    padding-top: 1rem;
    border-top: 1px solid var(--border);
}

.summary-total-value {
    color: var(--primary);
}

.free-shipping-note {
    font-size: 0.875rem;
    color: #22c55e;
    margin-bottom: 1rem;
}

/* Profile Sidebar */
.profile-sidebar {
    padding: 1.5rem;
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
    border-radius: 9999px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary);
}

.profile-avatar svg {
    width: 2rem;
    height: 2rem;
}

.profile-name {
    font-weight: 700;
    color: var(--foreground);
}

.profile-phone {
    font-size: 0.875rem;
    color: var(--muted-foreground);
}

.profile-menu {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.profile-menu-item {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0.75rem;
    border-radius: var(--radius-xl);
    transition: all var(--transition-fast);
    color: var(--muted-foreground);
    background: none;
    border: none;
    cursor: pointer;
    text-align: right;
}

.profile-menu-item:hover {
    background: var(--secondary);
}

.profile-menu-item.active {
    background: rgba(var(--primary-rgb), 0.1);
    color: var(--primary);
}

.profile-menu-item-content {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

/* Order Card */
.order-card {
    padding: 1.5rem;
    margin-bottom: 1.5rem;
}

.order-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 1rem;
}

.order-id {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.order-id-label {
    color: var(--muted-foreground);
}

.order-id-value {
    font-weight: 700;
    color: var(--foreground);
}

.order-status {
    font-weight: 500;
}

.order-status.delivered {
    color: #22c55e;
}

.order-status.shipping {
    color: var(--primary);
}

.order-items {
    display: flex;
    gap: 1rem;
    margin-bottom: 1rem;
}

.order-item-image {
    width: 4rem;
    height: 4rem;
    background: rgba(var(--primary-rgb), 0.02);
    border-radius: var(--radius-xl);
    overflow: hidden;
}

.order-item-image img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    padding: 0.5rem;
}

.order-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 1rem;
    border-top: 1px solid var(--border);
}

.order-date {
    color: var(--muted-foreground);
}

.order-total {
    font-size: 1.125rem;
    font-weight: 700;
    color: var(--primary);
}

/* Wishlist Item */
.wishlist-item {
    display: flex;
    gap: 1rem;
    padding: 1.5rem;
}

.wishlist-image {
    width: 6rem;
    height: 6rem;
    background: rgba(var(--primary-rgb), 0.02);
    border-radius: var(--radius-xl);
    overflow: hidden;
    flex-shrink: 0;
}

.wishlist-image img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    padding: 0.5rem;
}

.wishlist-info {
    flex: 1;
}

.wishlist-title {
    font-weight: 700;
    color: var(--foreground);
    margin-bottom: 0.5rem;
}

.wishlist-price {
    font-weight: 700;
    color: var(--primary);
}

/* Address Card */
.address-card {
    padding: 1.5rem;
}

.address-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
}

.address-badge {
    background: rgba(var(--primary-rgb), 0.1);
    color: var(--primary);
    font-size: 0.75rem;
    padding: 0.25rem 0.5rem;
    border-radius: 9999px;
    margin-left: 0.5rem;
}

.address-title {
    font-weight: 700;
    color: var(--foreground);
}

.address-text {
    color: var(--muted-foreground);
    margin-top: 0.5rem;
}

.address-contact {
    color: var(--muted-foreground);
    margin-top: 0.25rem;
}

/* Settings */
.settings-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1rem 0;
    border-bottom: 1px solid var(--border);
}

.settings-item:last-child {
    border-bottom: none;
}

.settings-label {
    font-weight: 700;
    color: var(--foreground);
}

.settings-description {
    font-size: 0.875rem;
    color: var(--muted-foreground);
}

.settings-toggle {
    width: 1.25rem;
    height: 1.25rem;
    accent-color: var(--primary);
}

/* Product Detail */
.product-detail-image {
    position: relative;
    padding: 2rem;
    overflow: hidden;
}

.product-detail-img {
    width: 100%;
    aspect-ratio: 1;
    object-fit: contain;
    transition: transform 0.3s ease;
}

.product-detail-info {
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.product-rating {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.rating-stars {
    display: flex;
    gap: 0.25rem;
    color: #facc15;
}

.rating-value {
    font-weight: 600;
    color: var(--foreground);
}

.rating-count {
    color: var(--muted-foreground);
}

.product-price-card {
    padding: 1.5rem;
}

.product-current-price {
    font-size: 2.25rem;
    font-weight: 700;
    color: var(--primary);
}

.product-stock {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #22c55e;
    margin-top: 1rem;
}

.color-selector {
    padding: 1.5rem;
}

.color-selector-title {
    font-size: 1.125rem;
    font-weight: 600;
    color: var(--foreground);
    margin-bottom: 1rem;
}

.color-options {
    display: flex;
    gap: 1rem;
}

.color-option {
    padding: 0.75rem 1.5rem;
    border-radius: var(--radius-xl);
    border: 2px solid var(--border);
    color: var(--muted-foreground);
    background: none;
    cursor: pointer;
    transition: all 0.3s ease;
}

.color-option:hover {
    border-color: rgba(var(--primary-rgb), 0.5);
}

.color-option.active {
    border-color: var(--primary);
    background: rgba(var(--primary-rgb), 0.1);
    color: var(--primary);
}

.product-cta {
    display: flex;
    gap: 1rem;
}

.product-features {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
}

.feature-card {
    padding: 1rem;
    text-align: center;
    transition: transform 0.3s ease;
}

.feature-card:hover {
    transform: scale(1.05);
}

.feature-icon {
    width: 2rem;
    height: 2rem;
    color: var(--primary);
    margin: 0 auto 0.5rem;
}

.feature-text {
    font-size: 0.875rem;
    color: var(--muted-foreground);
}

.specs-card {
    padding: 1.5rem;
}

.specs-toggle {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 1.125rem;
    font-weight: 600;
    color: var(--foreground);
    background: none;
    border: none;
    cursor: pointer;
    padding: 0;
}

.specs-toggle-icon {
    width: 1.5rem;
    height: 1.5rem;
    color: var(--primary);
    transition: transform 0.3s ease;
}

.specs-toggle-icon.open {
    transform: rotate(180deg);
}

.specs-list {
    display: grid;
    gap: 1rem;
    margin-top: 1.5rem;
    padding-top: 1.5rem;
    border-top: 1px solid var(--border);
}

@media (min-width: 768px) {
    .specs-list {
        grid-template-columns: repeat(2, 1fr);
    }
}

.spec-item {
    display: flex;
    justify-content: space-between;
    padding: 0.75rem;
    background: var(--secondary);
    border-radius: var(--radius);
}

.spec-label {
    color: var(--muted-foreground);
}

.spec-value {
    font-weight: 500;
    color: var(--foreground);
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 4rem 2rem;
}

.empty-icon {
    width: 6rem;
    height: 6rem;
    background: var(--secondary);
    border-radius: 9999px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 2rem;
}

.empty-icon svg {
    width: 3rem;
    height: 3rem;
    color: var(--muted-foreground);
}

.empty-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--foreground);
    margin-bottom: 1rem;
}

.empty-text {
    color: var(--muted-foreground);
    margin-bottom: 2rem;
}

/* ============================================
   ANIMATIONS
   ============================================ */

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
        transform: scale(0.9);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateX(30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes float {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-20px);
    }
}

@keyframes pulse-glow {
    0%, 100% {
        box-shadow: 0 0 20px rgba(var(--primary-rgb), 0.3);
    }
    50% {
        box-shadow: 0 0 40px rgba(var(--primary-rgb), 0.5);
    }
}

.animate-fade-up {
    animation: fadeUp 0.6s ease-out forwards;
}

.animate-scale-in {
    animation: scaleIn 0.5s ease-out forwards;
}

.animate-slide-in {
    animation: slideIn 0.5s ease-out forwards;
}

.animate-float {
    animation: float 3s ease-in-out infinite;
}

.animate-pulse-glow {
    animation: pulse-glow 2s ease-in-out infinite;
}

/* Scroll Animation Classes */
.scroll-animate {
    opacity: 0;
}

.scroll-animate.animate-fade-up {
    transform: translateY(30px);
}

.scroll-animate.animate-scale-in {
    transform: scale(0.9);
}

.scroll-animate.animate-slide-in {
    transform: translateX(30px);
}

.scroll-animate.visible {
    opacity: 1;
    transform: translateY(0) scale(1) translateX(0);
    transition: opacity 0.6s ease-out, transform 0.6s ease-out;
}

/* ============================================
   WOOCOMMERCE OVERRIDES
   ============================================ */

.woocommerce .products {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1.5rem;
}

@media (min-width: 768px) {
    .woocommerce .products {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (min-width: 1024px) {
    .woocommerce .products {
        grid-template-columns: repeat(4, 1fr);
    }
}

.woocommerce .product {
    background: rgba(26, 26, 26, 0.4);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.05);
    border-radius: var(--radius-xl);
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.woocommerce .product:hover {
    background: rgba(26, 26, 26, 0.6);
    border-color: rgba(var(--primary-rgb), 0.3);
}

.woocommerce .product img {
    aspect-ratio: 1;
    object-fit: contain;
    padding: 1rem;
    background: rgba(var(--primary-rgb), 0.02);
}

.woocommerce .product .woocommerce-loop-product__title {
    font-size: 1rem;
    font-weight: 700;
    color: var(--foreground);
    padding: 1rem 1rem 0.5rem;
}

.woocommerce .product .price {
    padding: 0 1rem 1rem;
    color: var(--primary);
    font-weight: 700;
}

.woocommerce .product .button {
    background: var(--primary);
    color: var(--primary-foreground);
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: var(--radius-xl);
    font-weight: 600;
    margin: 0 1rem 1rem;
    transition: all var(--transition-normal);
}

.woocommerce .product .button:hover {
    background: hsl(24, 95%, 48%);
}

/* ============================================
   ELEMENTOR OVERRIDES
   ============================================ */

.elementor-section {
    background-color: var(--background) !important;
}

.elementor-widget-container {
    font-family: 'AzarMehr', 'Vazirmatn', sans-serif !important;
}

.elementor-heading-title {
    font-family: 'AzarMehr', 'Vazirmatn', sans-serif !important;
    color: var(--foreground) !important;
}

.elementor-text-editor {
    color: var(--muted-foreground) !important;
}

.elementor-button {
    background-color: var(--primary) !important;
    border-radius: var(--radius-xl) !important;
    font-family: 'AzarMehr', 'Vazirmatn', sans-serif !important;
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

    // ============================================
    // HEADER SCROLL EFFECT
    // ============================================
    const header = document.querySelector('.site-header');
    if (header) {
        let lastScroll = 0;
        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset;
            if (currentScroll > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
            lastScroll = currentScroll;
        }, { passive: true });
    }

    // ============================================
    // SCROLL ANIMATIONS
    // ============================================
    const observerOptions = {
        root: null,
        rootMargin: '0px 0px -100px 0px',
        threshold: 0.1
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll('.scroll-animate').forEach(function(el) {
        observer.observe(el);
    });

    // ============================================
    // 3D TILT EFFECT FOR PRODUCT IMAGES
    // ============================================
    document.querySelectorAll('.product-tilt').forEach(function(card) {
        card.addEventListener('mousemove', function(e) {
            const rect = card.getBoundingClientRect();
            const x = (e.clientX - rect.left) / rect.width - 0.5;
            const y = (e.clientY - rect.top) / rect.height - 0.5;
            const img = card.querySelector('img');
            if (img) {
                img.style.transform = 'perspective(1000px) rotateY(' + (x * 20) + 'deg) rotateX(' + (-y * 20) + 'deg) scale(1.05)';
            }
        });
        card.addEventListener('mouseleave', function() {
            const img = card.querySelector('img');
            if (img) {
                img.style.transform = 'perspective(1000px) rotateY(0) rotateX(0) scale(1)';
            }
        });
    });

    // ============================================
    // FAQ ACCORDION
    // ============================================
    document.querySelectorAll('.faq-question').forEach(function(question) {
        question.addEventListener('click', function() {
            const item = this.closest('.faq-item');
            const isOpen = item.classList.contains('open');
            
            // Close all other items
            document.querySelectorAll('.faq-item').forEach(function(faq) {
                faq.classList.remove('open');
            });
            
            // Toggle current item
            if (!isOpen) {
                item.classList.add('open');
            }
        });
    });

    // ============================================
    // LEAD FORM SUBMISSION
    // ============================================
    const leadForm = document.querySelector('.lead-form');
    if (leadForm) {
        leadForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const phoneInput = this.querySelector('input[name="phone"]');
            if (phoneInput && phoneInput.value) {
                // AJAX submission
                const formData = new FormData();
                formData.append('action', 'xiaomi_sari_lead_form');
                formData.append('phone', phoneInput.value);
                formData.append('nonce', xiaomiSari.nonce);

                fetch(xiaomiSari.ajaxUrl, {
                    method: 'POST',
                    body: formData
                })
                .then(function(response) { return response.json(); })
                .then(function(data) {
                    if (data.success) {
                        showNotification('شماره شما با موفقیت ثبت شد!', 'success');
                        phoneInput.value = '';
                    } else {
                        showNotification('خطا در ثبت شماره', 'error');
                    }
                })
                .catch(function() {
                    showNotification('خطا در ارتباط با سرور', 'error');
                });
            }
        });
    }

    // ============================================
    // CONTACT FORM SUBMISSION
    // ============================================
    const contactForm = document.querySelector('.contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            formData.append('action', 'xiaomi_sari_contact_form');
            formData.append('nonce', xiaomiSari.nonce);

            fetch(xiaomiSari.ajaxUrl, {
                method: 'POST',
                body: formData
            })
            .then(function(response) { return response.json(); })
            .then(function(data) {
                if (data.success) {
                    showNotification('پیام شما با موفقیت ارسال شد!', 'success');
                    contactForm.reset();
                } else {
                    showNotification('خطا در ارسال پیام', 'error');
                }
            })
            .catch(function() {
                showNotification('خطا در ارتباط با سرور', 'error');
            });
        });
    }

    // ============================================
    // NOTIFICATION SYSTEM
    // ============================================
    function showNotification(message, type) {
        type = type || 'info';
        const notification = document.createElement('div');
        notification.className = 'notification notification-' + type;
        notification.style.cssText = 'position: fixed; bottom: 2rem; right: 2rem; padding: 1rem 1.5rem; border-radius: 1rem; z-index: 9999; font-weight: 500; animation: slideIn 0.3s ease;';
        
        if (type === 'success') {
            notification.style.background = '#22c55e';
            notification.style.color = '#fff';
        } else if (type === 'error') {
            notification.style.background = '#ef4444';
            notification.style.color = '#fff';
        } else {
            notification.style.background = 'var(--primary)';
            notification.style.color = 'var(--primary-foreground)';
        }
        
        notification.textContent = message;
        document.body.appendChild(notification);
        
        setTimeout(function() {
            notification.style.animation = 'fadeUp 0.3s ease reverse';
            setTimeout(function() {
                notification.remove();
            }, 300);
        }, 3000);
    }

    // ============================================
    // MOBILE MENU TOGGLE
    // ============================================
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const mobileMenu = document.querySelector('.mobile-menu');
    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', function() {
            mobileMenu.classList.toggle('open');
            document.body.classList.toggle('menu-open');
        });
    }

    // ============================================
    // SMOOTH SCROLL FOR ANCHOR LINKS
    // ============================================
    document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
        anchor.addEventListener('click', function(e) {
            var href = this.getAttribute('href');
            if (href && href.length > 1) {
                var target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });

    // ============================================
    // QUANTITY CONTROLS
    // ============================================
    document.querySelectorAll('.quantity-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            const input = this.parentElement.querySelector('.quantity-value');
            if (!input) return;
            
            let value = parseInt(input.textContent) || 1;
            if (this.classList.contains('quantity-minus')) {
                value = Math.max(1, value - 1);
            } else if (this.classList.contains('quantity-plus')) {
                value++;
            }
            input.textContent = value;
            
            // Trigger update event
            const event = new CustomEvent('quantityChange', { detail: { value: value } });
            this.parentElement.dispatchEvent(event);
        });
    });

    // ============================================
    // FILTER BUTTONS
    // ============================================
    document.querySelectorAll('.filter-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.filter-btn').forEach(function(b) {
                b.classList.remove('active');
            });
            this.classList.add('active');
            
            const category = this.dataset.category;
            filterProducts(category);
        });
    });

    function filterProducts(category) {
        document.querySelectorAll('.product-card').forEach(function(card) {
            if (category === 'all' || card.dataset.category === category) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // ============================================
    // PROFILE TAB NAVIGATION
    // ============================================
    document.querySelectorAll('.profile-menu-item').forEach(function(item) {
        item.addEventListener('click', function() {
            document.querySelectorAll('.profile-menu-item').forEach(function(i) {
                i.classList.remove('active');
            });
            this.classList.add('active');
            
            const tabId = this.dataset.tab;
            document.querySelectorAll('.profile-tab-content').forEach(function(content) {
                content.style.display = 'none';
            });
            var targetTab = document.getElementById('tab-' + tabId);
            if (targetTab) {
                targetTab.style.display = 'block';
            }
        });
    });

    // ============================================
    // SPECS TOGGLE
    // ============================================
    document.querySelectorAll('.specs-toggle').forEach(function(toggle) {
        toggle.addEventListener('click', function() {
            const specsList = this.closest('.specs-card').querySelector('.specs-list');
            const icon = this.querySelector('.specs-toggle-icon');
            
            if (specsList.style.display === 'none' || !specsList.style.display) {
                specsList.style.display = 'grid';
                icon.classList.add('open');
            } else {
                specsList.style.display = 'none';
                icon.classList.remove('open');
            }
        });
    });

    // ============================================
    // PRODUCT IMAGE TILT EFFECT
    // ============================================
    const productDetailImage = document.querySelector('.product-detail-image');
    if (productDetailImage) {
        productDetailImage.addEventListener('mousemove', function(e) {
            const rect = this.getBoundingClientRect();
            const x = (e.clientX - rect.left) / rect.width - 0.5;
            const y = (e.clientY - rect.top) / rect.height - 0.5;
            const img = this.querySelector('.product-detail-img');
            if (img) {
                img.style.transform = 'perspective(1000px) rotateY(' + (x * 20) + 'deg) rotateX(' + (-y * 20) + 'deg)';
            }
        });
        
        productDetailImage.addEventListener('mouseleave', function() {
            const img = this.querySelector('.product-detail-img');
            if (img) {
                img.style.transform = 'perspective(1000px) rotateY(0) rotateX(0)';
            }
        });
    }

    // ============================================
    // COLOR SELECTOR
    // ============================================
    document.querySelectorAll('.color-option').forEach(function(option) {
        option.addEventListener('click', function() {
            document.querySelectorAll('.color-option').forEach(function(o) {
                o.classList.remove('active');
            });
            this.classList.add('active');
        });
    });

    // ============================================
    // WISHLIST TOGGLE
    // ============================================
    document.querySelectorAll('.wishlist-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            this.classList.toggle('active');
            const icon = this.querySelector('svg');
            if (icon) {
                icon.style.fill = this.classList.contains('active') ? 'currentColor' : 'none';
            }
        });
    });

})();
    <?php
    return ob_get_clean();
}

/**
 * Header Template Function
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
<body <?php body_class('bg-background text-foreground'); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="container">
        <div class="header-content">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
                شیائومی ساری
            </a>
            
            <nav class="main-nav">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-link">صفحه اصلی</a>
                <a href="<?php echo esc_url(home_url('/shop')); ?>" class="nav-link">فروشگاه</a>
                <a href="<?php echo esc_url(home_url('/about')); ?>" class="nav-link">درباره ما</a>
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="nav-link">تماس با ما</a>
            </nav>
            
            <div class="nav-actions">
                <a href="<?php echo esc_url(home_url('/cart')); ?>" class="btn btn-ghost btn-icon cart-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
                    <?php if (function_exists('WC') && WC()->cart): ?>
                    <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                    <?php endif; ?>
                </a>
                <a href="<?php echo esc_url(home_url('/profile')); ?>" class="btn btn-ghost btn-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                </a>
            </div>
        </div>
    </div>
</header>
    <?php
}

/**
 * Footer Template Function
 */
function xiaomi_sari_footer_template() {
    ?>
<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <!-- Brand -->
            <div class="footer-brand">
                <div class="footer-logo">شیائومی ساری</div>
                <p class="footer-description">
                    فروشگاه تخصصی محصولات شیائومی در ساری. ارائه‌دهنده انواع گوشی، لوازم جانبی و محصولات هوشمند با گارانتی اصالت و قیمت مناسب.
                </p>
                <div class="footer-social">
                    <a href="#" class="social-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                    </a>
                    <a href="#" class="social-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/></svg>
                    </a>
                </div>
            </div>
            
            <!-- Quick Links -->
            <div>
                <h4 class="footer-title">دسترسی سریع</h4>
                <ul class="footer-links">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>" class="footer-link">صفحه اصلی</a></li>
                    <li><a href="<?php echo esc_url(home_url('/shop')); ?>" class="footer-link">فروشگاه</a></li>
                    <li><a href="<?php echo esc_url(home_url('/about')); ?>" class="footer-link">درباره ما</a></li>
                    <li><a href="<?php echo esc_url(home_url('/contact')); ?>" class="footer-link">تماس با ما</a></li>
                </ul>
            </div>
            
            <!-- Categories -->
            <div>
                <h4 class="footer-title">دسته‌بندی‌ها</h4>
                <ul class="footer-links">
                    <li><a href="#" class="footer-link">موبایل</a></li>
                    <li><a href="#" class="footer-link">تلویزیون</a></li>
                    <li><a href="#" class="footer-link">لوازم خانگی</a></li>
                    <li><a href="#" class="footer-link">لوازم جانبی</a></li>
                </ul>
            </div>
            
            <!-- Contact -->
            <div>
                <h4 class="footer-title">تماس با ما</h4>
                <div class="footer-contact-item">
                    <svg class="footer-contact-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    <span>۰۱۱-۳۳۳۳۳۳۳۳</span>
                </div>
                <div class="footer-contact-item">
                    <svg class="footer-contact-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                    <span>ساری، خیابان فرهنگ</span>
                </div>
                <div class="footer-contact-item">
                    <svg class="footer-contact-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    <span>شنبه تا پنجشنبه ۹-۲۱</span>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p class="footer-copyright">
                © <?php echo date('Y'); ?> شیائومی ساری. تمامی حقوق محفوظ است.
            </p>
        </div>
    </div>
</footer>

<!-- Floating Toolbar -->
<div class="floating-toolbar">
    <div class="toolbar-container">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="toolbar-btn <?php echo is_front_page() ? 'active' : ''; ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        </a>
        <a href="<?php echo esc_url(home_url('/shop')); ?>" class="toolbar-btn <?php echo is_shop() ? 'active' : ''; ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7.5 4.27 9 5.15"/><path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/><path d="m3.3 7 8.7 5 8.7-5"/><path d="M12 22V12"/></svg>
        </a>
        <a href="<?php echo esc_url(home_url('/cart')); ?>" class="toolbar-btn cart-badge">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
            <?php if (function_exists('WC') && WC()->cart && WC()->cart->get_cart_contents_count() > 0): ?>
            <span class="toolbar-badge"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
            <?php endif; ?>
        </a>
        <a href="tel:01133333333" class="toolbar-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        </a>
        <a href="<?php echo esc_url(home_url('/profile')); ?>" class="toolbar-btn <?php echo is_page('profile') ? 'active' : ''; ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
        </a>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
    <?php
}

/**
 * AJAX Handler for Lead Form
 */
function xiaomi_sari_lead_form_handler() {
    check_ajax_referer('xiaomi_sari_nonce', 'nonce');
    
    $phone = sanitize_text_field($_POST['phone']);
    
    if (!empty($phone)) {
        // Here you can save to database or send email
        // For now, just return success
        wp_send_json_success(array('message' => 'شماره با موفقیت ثبت شد'));
    } else {
        wp_send_json_error(array('message' => 'شماره تلفن الزامی است'));
    }
}
add_action('wp_ajax_xiaomi_sari_lead_form', 'xiaomi_sari_lead_form_handler');
add_action('wp_ajax_nopriv_xiaomi_sari_lead_form', 'xiaomi_sari_lead_form_handler');

/**
 * AJAX Handler for Contact Form
 */
function xiaomi_sari_contact_form_handler() {
    check_ajax_referer('xiaomi_sari_nonce', 'nonce');
    
    $name = sanitize_text_field($_POST['name']);
    $phone = sanitize_text_field($_POST['phone']);
    $email = sanitize_email($_POST['email']);
    $message = sanitize_textarea_field($_POST['message']);
    
    if (!empty($name) && !empty($phone) && !empty($message)) {
        // Here you can save to database or send email
        wp_send_json_success(array('message' => 'پیام با موفقیت ارسال شد'));
    } else {
        wp_send_json_error(array('message' => 'لطفا تمام فیلدها را پر کنید'));
    }
}
add_action('wp_ajax_xiaomi_sari_contact_form', 'xiaomi_sari_contact_form_handler');
add_action('wp_ajax_nopriv_xiaomi_sari_contact_form', 'xiaomi_sari_contact_form_handler');

/**
 * Shortcodes
 */

// Values Section
function xiaomi_sari_values_shortcode() {
    ob_start();
    ?>
    <section class="section">
        <div class="container">
            <div class="section-header scroll-animate animate-fade-up">
                <span class="section-badge">چرا شیائومی ساری؟</span>
                <h2 class="section-title">مزایای خرید از ما</h2>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="glass-card value-card rounded-2xl scroll-animate animate-fade-up">
                    <div class="value-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/><path d="m9 12 2 2 4-4"/></svg>
                    </div>
                    <h3 class="value-title">گارانتی اصالت کالا</h3>
                    <p class="value-description">تمامی محصولات دارای گارانتی اصالت و سلامت فیزیکی هستند</p>
                </div>
                <div class="glass-card value-card rounded-2xl scroll-animate animate-fade-up" style="animation-delay: 0.1s;">
                    <div class="value-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"/><path d="M15 18H9"/><path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14"/><circle cx="17" cy="18" r="2"/><circle cx="7" cy="18" r="2"/></svg>
                    </div>
                    <h3 class="value-title">ارسال سریع</h3>
                    <p class="value-description">ارسال رایگان برای خریدهای بالای ۵۰۰ هزار تومان</p>
                </div>
                <div class="glass-card value-card rounded-2xl scroll-animate animate-fade-up" style="animation-delay: 0.2s;">
                    <div class="value-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg>
                    </div>
                    <h3 class="value-title">پشتیبانی ۲۴/۷</h3>
                    <p class="value-description">پاسخگویی به سوالات شما در تمام ساعات شبانه‌روز</p>
                </div>
                <div class="glass-card value-card rounded-2xl scroll-animate animate-fade-up" style="animation-delay: 0.3s;">
                    <div class="value-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 15h2a2 2 0 1 0 0-4h-3c-.6 0-1.1.2-1.4.6L3 17"/><path d="m7 21 1.6-1.4c.3-.4.8-.6 1.4-.6h4c1.1 0 2.1-.4 2.8-1.2l4.6-4.4a2 2 0 0 0-2.75-2.91l-4.2 3.9"/><path d="m2 16 6 6"/><circle cx="16" cy="9" r="2.9"/><circle cx="6" cy="5" r="3"/></svg>
                    </div>
                    <h3 class="value-title">قیمت مناسب</h3>
                    <p class="value-description">بهترین قیمت‌ها با تضمین برگشت تفاوت قیمت</p>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('xiaomi_values', 'xiaomi_sari_values_shortcode');

// Categories Section
function xiaomi_sari_categories_shortcode() {
    ob_start();
    ?>
    <section class="section section-bg">
        <div class="container">
            <div class="section-header scroll-animate animate-fade-up">
                <span class="section-badge">دسته‌بندی‌ها</span>
                <h2 class="section-title">محصولات بر اساس دسته‌بندی</h2>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <a href="#" class="glass-card-hover category-card rounded-2xl scroll-animate animate-fade-up">
                    <img src="<?php echo XIAOMI_SARI_THEME_URI; ?>/assets/images/category-phone.jpg" alt="موبایل">
                    <div class="category-overlay">
                        <h3 class="category-title">موبایل</h3>
                        <span class="category-count">+۵۰ محصول</span>
                    </div>
                </a>
                <a href="#" class="glass-card-hover category-card rounded-2xl scroll-animate animate-fade-up" style="animation-delay: 0.1s;">
                    <img src="<?php echo XIAOMI_SARI_THEME_URI; ?>/assets/images/category-tv.jpg" alt="تلویزیون">
                    <div class="category-overlay">
                        <h3 class="category-title">تلویزیون</h3>
                        <span class="category-count">+۲۰ محصول</span>
                    </div>
                </a>
                <a href="#" class="glass-card-hover category-card rounded-2xl scroll-animate animate-fade-up" style="animation-delay: 0.2s;">
                    <img src="<?php echo XIAOMI_SARI_THEME_URI; ?>/assets/images/category-vacuum.jpg" alt="جارو رباتیک">
                    <div class="category-overlay">
                        <h3 class="category-title">جارو رباتیک</h3>
                        <span class="category-count">+۱۵ محصول</span>
                    </div>
                </a>
                <a href="#" class="glass-card-hover category-card rounded-2xl scroll-animate animate-fade-up" style="animation-delay: 0.3s;">
                    <img src="<?php echo XIAOMI_SARI_THEME_URI; ?>/assets/images/category-monitor.jpg" alt="مانیتور">
                    <div class="category-overlay">
                        <h3 class="category-title">مانیتور</h3>
                        <span class="category-count">+۱۰ محصول</span>
                    </div>
                </a>
                <a href="#" class="glass-card-hover category-card rounded-2xl scroll-animate animate-fade-up" style="animation-delay: 0.4s;">
                    <img src="<?php echo XIAOMI_SARI_THEME_URI; ?>/assets/images/category-appliances.jpg" alt="لوازم خانگی">
                    <div class="category-overlay">
                        <h3 class="category-title">لوازم خانگی</h3>
                        <span class="category-count">+۳۰ محصول</span>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('xiaomi_categories', 'xiaomi_sari_categories_shortcode');

// Featured Products
function xiaomi_sari_featured_products_shortcode($atts) {
    $atts = shortcode_atts(array(
        'limit' => 6,
    ), $atts);

    ob_start();
    ?>
    <section class="section" id="products">
        <div class="container">
            <div class="section-header scroll-animate animate-fade-up">
                <span class="section-badge">محصولات ویژه</span>
                <h2 class="section-title">پرفروش‌ترین محصولات</h2>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <?php
                if (function_exists('wc_get_products')) {
                    $products = wc_get_products(array(
                        'limit' => $atts['limit'],
                        'status' => 'publish',
                        'orderby' => 'popularity',
                    ));
                    
                    foreach ($products as $index => $product) {
                        $image = wp_get_attachment_image_src($product->get_image_id(), 'medium');
                        $regular_price = $product->get_regular_price();
                        $sale_price = $product->get_sale_price();
                        ?>
                        <div class="glass-card-hover product-card rounded-2xl scroll-animate animate-fade-up" style="animation-delay: <?php echo $index * 0.1; ?>s;" data-category="<?php echo esc_attr($product->get_categories()[0]->name ?? ''); ?>">
                            <div class="product-image-wrapper product-tilt">
                                <img src="<?php echo esc_url($image[0] ?? ''); ?>" alt="<?php echo esc_attr($product->get_name()); ?>">
                                <div class="product-overlay">
                                    <a href="<?php echo esc_url($product->get_permalink()); ?>" class="product-overlay-btn primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                                    </a>
                                    <button class="product-overlay-btn secondary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
                                    </button>
                                </div>
                                <?php if ($sale_price): ?>
                                    <span class="product-badge discount">تخفیف</span>
                                <?php endif; ?>
                            </div>
                            <div class="product-info">
                                <a href="<?php echo esc_url($product->get_permalink()); ?>">
                                    <h3 class="product-title"><?php echo esc_html($product->get_name()); ?></h3>
                                </a>
                                <div class="product-price-row">
                                    <div>
                                        <p class="product-price"><?php echo number_format($product->get_price()); ?> تومان</p>
                                        <?php if ($sale_price): ?>
                                            <p class="product-original-price"><?php echo number_format($regular_price); ?> تومان</p>
                                        <?php endif; ?>
                                    </div>
                                    <button class="btn btn-primary btn-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    // Demo products if WooCommerce not active
                    $demo_products = array(
                        array('name' => 'Xiaomi 14 Ultra', 'price' => '۴۵,۹۰۰,۰۰۰', 'old_price' => '۴۹,۰۰۰,۰۰۰', 'discount' => '۷٪', 'category' => 'موبایل'),
                        array('name' => 'Xiaomi TV A Pro 55"', 'price' => '۲۲,۵۰۰,۰۰۰', 'old_price' => '۲۵,۰۰۰,۰۰۰', 'discount' => '۱۰٪', 'category' => 'تلویزیون'),
                        array('name' => 'Roborock S8 Pro Ultra', 'price' => '۳۸,۰۰۰,۰۰۰', 'old_price' => null, 'discount' => null, 'category' => 'جارو رباتیک'),
                        array('name' => 'Redmi Note 13 Pro+', 'price' => '۱۸,۹۰۰,۰۰۰', 'old_price' => '۲۰,۵۰۰,۰۰۰', 'discount' => '۸٪', 'category' => 'موبایل'),
                        array('name' => 'Xiaomi Monitor 27"', 'price' => '۸,۵۰۰,۰۰۰', 'old_price' => null, 'discount' => null, 'category' => 'مانیتور'),
                        array('name' => 'Mi Air Purifier 4', 'price' => '۴,۲۰۰,۰۰۰', 'old_price' => '۴,۸۰۰,۰۰۰', 'discount' => '۱۲٪', 'category' => 'لوازم خانگی'),
                    );
                    
                    foreach ($demo_products as $index => $product) {
                        ?>
                        <div class="glass-card-hover product-card rounded-2xl scroll-animate animate-fade-up" style="animation-delay: <?php echo $index * 0.05; ?>s;" data-category="<?php echo esc_attr($product['category']); ?>">
                            <div class="product-image-wrapper product-tilt">
                                <img src="<?php echo XIAOMI_SARI_THEME_URI; ?>/assets/images/product-<?php echo $index + 1; ?>.jpg" alt="<?php echo esc_attr($product['name']); ?>">
                                <div class="product-overlay">
                                    <a href="#" class="product-overlay-btn primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                                    </a>
                                    <button class="product-overlay-btn secondary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
                                    </button>
                                </div>
                                <?php if ($product['discount']): ?>
                                    <span class="product-badge discount"><?php echo $product['discount']; ?> تخفیف</span>
                                <?php endif; ?>
                                <span class="product-badge category"><?php echo $product['category']; ?></span>
                            </div>
                            <div class="product-info">
                                <a href="#">
                                    <h3 class="product-title"><?php echo esc_html($product['name']); ?></h3>
                                </a>
                                <div class="product-price-row">
                                    <div>
                                        <p class="product-price"><?php echo $product['price']; ?> تومان</p>
                                        <?php if ($product['old_price']): ?>
                                            <p class="product-original-price"><?php echo $product['old_price']; ?> تومان</p>
                                        <?php endif; ?>
                                    </div>
                                    <button class="btn btn-primary btn-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="text-center mt-8 scroll-animate animate-fade-up">
                <a href="<?php echo esc_url(home_url('/shop')); ?>" class="btn btn-secondary btn-lg rounded-2xl">
                    مشاهده همه محصولات
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                </a>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('xiaomi_featured_products', 'xiaomi_sari_featured_products_shortcode');

// Testimonials
function xiaomi_sari_testimonials_shortcode() {
    ob_start();
    ?>
    <section class="section section-bg">
        <div class="container">
            <div class="section-header scroll-animate animate-fade-up">
                <span class="section-badge">نظرات مشتریان</span>
                <h2 class="section-title">مشتریان ما چه می‌گویند</h2>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="glass-card testimonial-card rounded-2xl scroll-animate animate-fade-up">
                    <div class="testimonial-rating">
                        <?php for ($i = 0; $i < 5; $i++): ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        <?php endfor; ?>
                    </div>
                    <p class="testimonial-text">
                        خرید از شیائومی ساری تجربه فوق‌العاده‌ای بود. محصول اصل با بهترین قیمت و ارسال سریع. حتما باز هم خرید می‌کنم.
                    </p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">ع</div>
                        <div>
                            <p class="testimonial-name">علی محمدی</p>
                            <p class="testimonial-product">خریدار Xiaomi 14 Ultra</p>
                        </div>
                    </div>
                </div>
                <div class="glass-card testimonial-card rounded-2xl scroll-animate animate-fade-up" style="animation-delay: 0.1s;">
                    <div class="testimonial-rating">
                        <?php for ($i = 0; $i < 5; $i++): ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        <?php endfor; ?>
                    </div>
                    <p class="testimonial-text">
                        پشتیبانی عالی و مشاوره حرفه‌ای. تلویزیون شیائومی که خریدم واقعا کیفیت بی‌نظیری داره. ممنون از تیم شیائومی ساری.
                    </p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">م</div>
                        <div>
                            <p class="testimonial-name">مریم رضایی</p>
                            <p class="testimonial-product">خریدار Xiaomi TV A Pro</p>
                        </div>
                    </div>
                </div>
                <div class="glass-card testimonial-card rounded-2xl scroll-animate animate-fade-up" style="animation-delay: 0.2s;">
                    <div class="testimonial-rating">
                        <?php for ($i = 0; $i < 5; $i++): ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        <?php endfor; ?>
                    </div>
                    <p class="testimonial-text">
                        جارو رباتیک Roborock که از اینجا خریدم فوق‌العاده‌ست. قیمت منصفانه و گارانتی معتبر. پیشنهاد می‌کنم حتما سر بزنید.
                    </p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">ح</div>
                        <div>
                            <p class="testimonial-name">حسین کریمی</p>
                            <p class="testimonial-product">خریدار Roborock S8</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('xiaomi_testimonials', 'xiaomi_sari_testimonials_shortcode');

// Lead Form
function xiaomi_sari_lead_form_shortcode() {
    ob_start();
    ?>
    <section class="section">
        <div class="container">
            <div class="lead-form-section scroll-animate animate-fade-up">
                <div class="text-center mb-8">
                    <h2 class="section-title mb-4">از تخفیف‌های ویژه باخبر شوید</h2>
                    <p class="section-description">شماره موبایل خود را وارد کنید تا از جدیدترین تخفیف‌ها و محصولات مطلع شوید</p>
                </div>
                <form class="lead-form">
                    <input type="tel" name="phone" class="form-input form-input-lg rounded-2xl" placeholder="شماره موبایل (مثال: ۰۹۱۲۳۴۵۶۷۸۹)" required>
                    <button type="submit" class="btn btn-hero rounded-2xl">
                        ثبت شماره
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                    </button>
                </form>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('xiaomi_lead_form', 'xiaomi_sari_lead_form_shortcode');

// FAQ Section
function xiaomi_sari_faq_shortcode() {
    ob_start();
    ?>
    <section class="section">
        <div class="container">
            <div class="section-header scroll-animate animate-fade-up">
                <span class="section-badge">سوالات متداول</span>
                <h2 class="section-title">پاسخ به سوالات شما</h2>
            </div>
            <div class="max-w-4xl mx-auto">
                <div class="glass-card rounded-3xl p-6 scroll-animate animate-fade-up">
                    <div class="faq-item open">
                        <button class="faq-question">
                            <span>آیا محصولات شما اصل هستند؟</span>
                            <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                        </button>
                        <div class="faq-answer">
                            <p class="faq-answer-text">بله، تمامی محصولات فروشگاه شیائومی ساری ۱۰۰٪ اورجینال و دارای گارانتی اصالت کالا هستند. ما مستقیماً از نمایندگی‌های رسمی شیائومی تامین می‌کنیم.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <button class="faq-question">
                            <span>شرایط گارانتی چگونه است؟</span>
                            <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                        </button>
                        <div class="faq-answer">
                            <p class="faq-answer-text">تمامی محصولات دارای گارانتی ۱۸ ماهه شرکتی هستند. در صورت بروز هرگونه مشکل، می‌توانید از خدمات گارانتی استفاده کنید.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <button class="faq-question">
                            <span>امکان خرید اقساطی وجود دارد؟</span>
                            <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                        </button>
                        <div class="faq-answer">
                            <p class="faq-answer-text">بله، امکان خرید اقساطی با چک یا کارت اعتباری بانک‌های طرف قرارداد وجود دارد. برای اطلاعات بیشتر با ما تماس بگیرید.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <button class="faq-question">
                            <span>هزینه و زمان ارسال چقدر است؟</span>
                            <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                        </button>
                        <div class="faq-answer">
                            <p class="faq-answer-text">ارسال برای خریدهای بالای ۵۰۰ هزار تومان رایگان است. زمان ارسال در ساری ۱ روزه و سایر شهرها ۲ تا ۳ روز کاری می‌باشد.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('xiaomi_faq', 'xiaomi_sari_faq_shortcode');

// Hero Section
function xiaomi_sari_hero_shortcode($atts) {
    $atts = shortcode_atts(array(
        'title' => 'تکنولوژی پیشرفته',
        'subtitle' => 'در دستان شما',
        'description' => 'جدیدترین محصولات شیائومی با گارانتی اصالت و بهترین قیمت در فروشگاه شیائومی ساری',
    ), $atts);
    
    ob_start();
    ?>
    <section class="hero-section">
        <div class="hero-background">
            <img src="<?php echo XIAOMI_SARI_THEME_URI; ?>/assets/images/hero-products.jpg" alt="Hero Background">
            <div class="hero-overlay"></div>
        </div>
        <div class="container">
            <div class="hero-content scroll-animate animate-fade-up">
                <div class="hero-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
                    نمایندگی رسمی شیائومی
                </div>
                <h1 class="hero-title">
                    <?php echo esc_html($atts['title']); ?>
                    <span class="text-primary"><?php echo esc_html($atts['subtitle']); ?></span>
                </h1>
                <p class="hero-description">
                    <?php echo esc_html($atts['description']); ?>
                </p>
                <div class="hero-buttons">
                    <a href="<?php echo esc_url(home_url('/shop')); ?>" class="btn btn-hero rounded-2xl animate-pulse-glow">
                        مشاهده محصولات
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                    </a>
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-hero-outline rounded-2xl">
                        تماس با ما
                    </a>
                </div>
                <div class="hero-stats">
                    <div class="hero-stat">
                        <div class="hero-stat-value">۵۰۰+</div>
                        <div class="hero-stat-label">محصول</div>
                    </div>
                    <div class="hero-stat">
                        <div class="hero-stat-value">۱۰K+</div>
                        <div class="hero-stat-label">مشتری</div>
                    </div>
                    <div class="hero-stat">
                        <div class="hero-stat-value">۵+</div>
                        <div class="hero-stat-label">سال تجربه</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('xiaomi_hero', 'xiaomi_sari_hero_shortcode');
