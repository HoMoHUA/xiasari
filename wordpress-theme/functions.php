<?php
/**
 * Xiaomi Sari Theme - Complete All-In-One Functions
 * تمام CSS، JS، فونت‌ها و قالب‌ها به صورت یکپارچه
 * فونت اصلی: AzarMehr | فالبک: Vazirmatn از CDN
 *
 * @package Xiaomi_Sari
 * @version 4.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

define('XIAOMI_SARI_VERSION', '4.0.0');
define('XIAOMI_SARI_THEME_DIR', get_template_directory());
define('XIAOMI_SARI_THEME_URI', get_template_directory_uri());

/* ============================================
   THEME SETUP
   ============================================ */
function xiaomi_sari_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-width'  => true,
        'flex-height' => true,
    ));
    add_theme_support('html5', array('search-form','comment-form','comment-list','gallery','caption','script','style'));
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
    add_theme_support('editor-styles');
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');

    register_nav_menus(array(
        'primary' => 'منوی اصلی',
        'footer'  => 'منوی فوتر',
        'mobile'  => 'منوی موبایل',
    ));

    global $content_width;
    if (!isset($content_width)) $content_width = 1400;
}
add_action('after_setup_theme', 'xiaomi_sari_setup');

/* ============================================
   ENQUEUE INLINE STYLES
   ============================================ */
function xiaomi_sari_inline_styles() {
    wp_register_style('xiaomi-sari-main', false);
    wp_enqueue_style('xiaomi-sari-main');
    wp_add_inline_style('xiaomi-sari-main', xiaomi_sari_get_all_css());
}
add_action('wp_enqueue_scripts', 'xiaomi_sari_inline_styles');

/* ============================================
   ENQUEUE INLINE SCRIPTS
   ============================================ */
function xiaomi_sari_inline_scripts() {
    wp_register_script('xiaomi-sari-main', false, array(), null, true);
    wp_enqueue_script('xiaomi-sari-main');
    wp_localize_script('xiaomi-sari-main', 'xiaomiSari', array(
        'ajaxUrl'  => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('xiaomi_sari_nonce'),
        'themeUrl' => XIAOMI_SARI_THEME_URI,
    ));
    wp_add_inline_script('xiaomi-sari-main', xiaomi_sari_get_all_js());
}
add_action('wp_enqueue_scripts', 'xiaomi_sari_inline_scripts');

/* ============================================
   ALL CSS - Matching React Output Exactly
   ============================================ */
function xiaomi_sari_get_all_css() {
    ob_start();
    ?>

/* ── FONTS ── */
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

/* ── CSS VARIABLES ── */
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

/* ── BASE RESET ── */
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; font-size: 16px; color-scheme: dark; }
body {
    font-family: 'AzarMehr', 'Vazirmatn', sans-serif !important;
    background-color: var(--background);
    color: var(--foreground);
    line-height: 1.6;
    direction: rtl;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
h1,h2,h3,h4,h5,h6,p,span,a,button,input,textarea,select,label,div {
    font-family: 'AzarMehr', 'Vazirmatn', sans-serif !important;
}
a { color: inherit; text-decoration: none; transition: color var(--transition-fast); }
a:hover { color: var(--primary); }
img { max-width: 100%; height: auto; display: block; }
button { cursor: pointer; font-family: inherit; border: none; background: none; }
input, textarea, select { font-family: inherit; font-size: inherit; }
ul, ol { list-style: none; }

/* ── LAYOUT UTILITIES ── */
.container { width: 100%; max-width: 1400px; margin: 0 auto; padding: 0 1rem; }
@media (min-width: 768px) { .container { padding: 0 2rem; } }

.min-h-screen { min-height: 100vh; }
.relative { position: relative; }
.absolute { position: absolute; }
.fixed { position: fixed; }
.inset-0 { top:0; right:0; bottom:0; left:0; }
.overflow-hidden { overflow: hidden; }
.z-10 { z-index: 10; }
.z-50 { z-index: 50; }

.flex { display: flex; }
.flex-col { flex-direction: column; }
.flex-wrap { flex-wrap: wrap; }
.flex-1 { flex: 1 1 0%; }
.flex-shrink-0 { flex-shrink: 0; }
.items-center { align-items: center; }
.items-start { align-items: flex-start; }
.justify-center { justify-content: center; }
.justify-between { justify-content: space-between; }
.justify-around { justify-content: space-around; }

.gap-1 { gap: 0.25rem; }
.gap-2 { gap: 0.5rem; }
.gap-3 { gap: 0.75rem; }
.gap-4 { gap: 1rem; }
.gap-6 { gap: 1.5rem; }
.gap-8 { gap: 2rem; }
.gap-12 { gap: 3rem; }

.grid { display: grid; }
.grid-cols-1 { grid-template-columns: repeat(1, 1fr); }
.grid-cols-2 { grid-template-columns: repeat(2, 1fr); }
.grid-cols-3 { grid-template-columns: repeat(3, 1fr); }
.grid-cols-4 { grid-template-columns: repeat(4, 1fr); }
@media (min-width: 640px) {
    .sm\:flex-row { flex-direction: row; }
    .sm\:grid-cols-2 { grid-template-columns: repeat(2, 1fr); }
    .sm\:w-auto { width: auto; }
}
@media (min-width: 768px) {
    .md\:hidden { display: none; }
    .md\:flex { display: flex; }
    .md\:block { display: block; }
    .md\:grid-cols-2 { grid-template-columns: repeat(2, 1fr); }
    .md\:grid-cols-3 { grid-template-columns: repeat(3, 1fr); }
    .md\:grid-cols-4 { grid-template-columns: repeat(4, 1fr); }
    .md\:text-5xl { font-size: 3rem; }
    .md\:text-4xl { font-size: 2.25rem; }
    .md\:text-2xl { font-size: 1.5rem; }
    .md\:text-xl { font-size: 1.25rem; }
    .md\:p-12 { padding: 3rem; }
    .md\:pb-16 { padding-bottom: 4rem; }
}
@media (min-width: 1024px) {
    .lg\:hidden { display: none; }
    .lg\:flex { display: flex; }
    .lg\:block { display: block; }
    .lg\:grid-cols-2 { grid-template-columns: repeat(2, 1fr); }
    .lg\:grid-cols-3 { grid-template-columns: repeat(3, 1fr); }
    .lg\:grid-cols-4 { grid-template-columns: repeat(4, 1fr); }
    .lg\:grid-cols-5 { grid-template-columns: repeat(5, 1fr); }
    .lg\:text-6xl { font-size: 3.75rem; }
    .lg\:w-96 { width: 24rem; }
}
@media (min-width: 1280px) {
    .xl\:grid-cols-4 { grid-template-columns: repeat(4, 1fr); }
}

/* spacing */
.mb-1 { margin-bottom: 0.25rem; }
.mb-2 { margin-bottom: 0.5rem; }
.mb-3 { margin-bottom: 0.75rem; }
.mb-4 { margin-bottom: 1rem; }
.mb-6 { margin-bottom: 1.5rem; }
.mb-8 { margin-bottom: 2rem; }
.mb-10 { margin-bottom: 2.5rem; }
.mb-12 { margin-bottom: 3rem; }
.mb-16 { margin-bottom: 4rem; }
.mb-20 { margin-bottom: 5rem; }
.mt-2 { margin-top: 0.5rem; }
.mt-4 { margin-top: 1rem; }
.mt-8 { margin-top: 2rem; }
.mx-auto { margin-left: auto; margin-right: auto; }
.mr-2 { margin-right: 0.5rem; }
.ml-2 { margin-left: 0.5rem; }
.pt-32 { padding-top: 8rem; }
.pb-20 { padding-bottom: 5rem; }
.pb-24 { padding-bottom: 6rem; }
.pb-32 { padding-bottom: 8rem; }
.py-3 { padding-top: 0.75rem; padding-bottom: 0.75rem; }
.py-4 { padding-top: 1rem; padding-bottom: 1rem; }
.py-6 { padding-top: 1.5rem; padding-bottom: 1.5rem; }
.py-8 { padding-top: 2rem; padding-bottom: 2rem; }
.py-12 { padding-top: 3rem; padding-bottom: 3rem; }
.py-16 { padding-top: 4rem; padding-bottom: 4rem; }
.py-20 { padding-top: 5rem; padding-bottom: 5rem; }
.px-2 { padding-left: 0.5rem; padding-right: 0.5rem; }
.px-3 { padding-left: 0.75rem; padding-right: 0.75rem; }
.px-4 { padding-left: 1rem; padding-right: 1rem; }
.px-6 { padding-left: 1.5rem; padding-right: 1.5rem; }
.p-4 { padding: 1rem; }
.p-6 { padding: 1.5rem; }
.p-8 { padding: 2rem; }
.pr-12 { padding-right: 3rem; }

.w-full { width: 100%; }
.w-5 { width: 1.25rem; }
.w-6 { width: 1.5rem; }
.w-8 { width: 2rem; }
.w-10 { width: 2.5rem; }
.w-12 { width: 3rem; }
.w-14 { width: 3.5rem; }
.w-16 { width: 4rem; }
.w-48 { width: 12rem; }
.w-64 { width: 16rem; }
.h-0\.5 { height: 0.125rem; }
.h-3 { height: 0.75rem; }
.h-5 { height: 1.25rem; }
.h-6 { height: 1.5rem; }
.h-8 { height: 2rem; }
.h-10 { height: 2.5rem; }
.h-12 { height: 3rem; }
.h-14 { height: 3.5rem; }
.h-16 { height: 4rem; }
.h-20 { height: 5rem; }
.h-48 { height: 12rem; }
.h-64 { height: 16rem; }
.min-h-\[150px\] { min-height: 150px; }
.max-w-xl { max-width: 36rem; }
.max-w-2xl { max-width: 42rem; }
.max-w-3xl { max-width: 48rem; }
.max-w-4xl { max-width: 56rem; }
.max-w-5xl { max-width: 64rem; }

/* text */
.text-center { text-align: center; }
.text-right { text-align: right; }
.font-bold { font-weight: 700; }
.font-semibold { font-weight: 600; }
.font-medium { font-weight: 500; }
.text-xs { font-size: 0.75rem; }
.text-\[10px\] { font-size: 10px; }
.text-sm { font-size: 0.875rem; }
.text-base { font-size: 1rem; }
.text-lg { font-size: 1.125rem; }
.text-xl { font-size: 1.25rem; }
.text-2xl { font-size: 1.5rem; }
.text-3xl { font-size: 1.875rem; }
.text-4xl { font-size: 2.25rem; }
.text-5xl { font-size: 3rem; }
.leading-tight { line-height: 1.25; }
.leading-relaxed { line-height: 1.625; }
.line-through { text-decoration: line-through; }
.whitespace-nowrap { white-space: nowrap; }

/* colors using design tokens */
.text-foreground { color: var(--foreground); }
.text-primary { color: var(--primary); }
.text-primary-foreground { color: var(--primary-foreground); }
.text-card-foreground { color: var(--card-foreground); }
.text-muted-foreground { color: var(--muted-foreground); }
.text-background { color: var(--background); }
.bg-background { background-color: var(--background); }
.bg-card { background-color: var(--card); }
.bg-secondary { background-color: var(--secondary); }
.bg-primary { background-color: var(--primary); }
.bg-primary-foreground { background-color: var(--primary-foreground); }
.bg-secondary\/20 { background: rgba(38,38,38,0.2); }
.bg-secondary\/30 { background: rgba(38,38,38,0.3); }
.bg-primary\/5 { background: rgba(var(--primary-rgb),0.05); }
.bg-primary\/10 { background: rgba(var(--primary-rgb),0.1); }
.bg-primary\/20 { background: rgba(var(--primary-rgb),0.2); }
.bg-background\/60 { background: rgba(18,18,18,0.6); }
.bg-background\/10 { background: rgba(18,18,18,0.1); }
.bg-background\/70 { background: rgba(18,18,18,0.7); }
.text-background\/70 { color: rgba(18,18,18,0.7); }
.text-background\/50 { color: rgba(18,18,18,0.5); }
.text-primary\/80 { color: rgba(var(--primary-rgb),0.8); }

.border { border-width: 1px; border-style: solid; }
.border-t { border-top-width: 1px; border-top-style: solid; }
.border-b { border-bottom-width: 1px; border-bottom-style: solid; }
.border-border { border-color: var(--border); }
.border-primary\/30 { border-color: rgba(var(--primary-rgb),0.3); }
.border-white\/5 { border-color: rgba(255,255,255,0.05); }
.border-white\/10 { border-color: rgba(255,255,255,0.1); }
.border-white\/20 { border-color: rgba(255,255,255,0.2); }
.border-0 { border: none; }

.rounded { border-radius: var(--radius); }
.rounded-lg { border-radius: var(--radius-lg); }
.rounded-xl { border-radius: var(--radius-xl); }
.rounded-2xl { border-radius: var(--radius-2xl); }
.rounded-3xl { border-radius: 1.5rem; }
.rounded-full { border-radius: 9999px; }

.shadow-lg { box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1); }
.shadow-2xl { box-shadow: 0 25px 50px -12px rgba(0,0,0,0.25); }

.opacity-0 { opacity: 0; }
.opacity-50 { opacity: 0.5; }
.group:hover .group-hover\:opacity-100 { opacity: 1; }
.group:hover .group-hover\:scale-105 { transform: scale(1.05); }
.group:hover .group-hover\:scale-110 { transform: scale(1.1); }
.group:hover .group-hover\:text-primary { color: var(--primary); }
.group:hover .group-hover\:bg-primary\/20 { background: rgba(var(--primary-rgb),0.2); }
.group:hover .group-hover\:border-primary\/30 { border-color: rgba(var(--primary-rgb),0.3); }
.hover\:text-primary:hover { color: var(--primary); }
.hover\:bg-primary:hover { background-color: var(--primary); }
.hover\:text-primary-foreground:hover { color: var(--primary-foreground); }
.hover\:bg-white\/10:hover { background: rgba(255,255,255,0.1); }
.hover\:bg-secondary\/80:hover { background: rgba(38,38,38,0.8); }
.hover\:bg-background\/90:hover { background: rgba(18,18,18,0.9); }
.hover\:opacity-80:hover { opacity: 0.8; }
.hover\:scale-105:hover { transform: scale(1.05); }
.hover\:scale-110:hover { transform: scale(1.1); }
.hover\:-translate-y-1:hover { transform: translateY(-0.25rem); }
.hover\:-translate-y-2:hover { transform: translateY(-0.5rem); }
.hover\:shadow-xl:hover { box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1); }
.hover\:no-underline:hover { text-decoration: none; }

.transition-all { transition: all var(--transition-normal); }
.transition-colors { transition: color var(--transition-fast), background-color var(--transition-fast), border-color var(--transition-fast); }
.transition-transform { transition: transform var(--transition-normal); }
.duration-200 { transition-duration: 200ms; }
.duration-300 { transition-duration: 300ms; }
.duration-500 { transition-duration: 500ms; }
.duration-700 { transition-duration: 700ms; }

.object-contain { object-fit: contain; }
.object-cover { object-fit: cover; }
.aspect-square { aspect-ratio: 1/1; }
.pointer-events-none { pointer-events: none; }
.cursor-pointer { cursor: pointer; }
.space-y-4 > * + * { margin-top: 1rem; }
.space-y-6 > * + * { margin-top: 1.5rem; }
.space-y-8 > * + * { margin-top: 2rem; }

.blur-2xl { filter: blur(40px); }
.blur-3xl { filter: blur(64px); }
.backdrop-blur-sm { backdrop-filter: blur(4px); -webkit-backdrop-filter: blur(4px); }
.backdrop-blur-xl { backdrop-filter: blur(24px); -webkit-backdrop-filter: blur(24px); }
.backdrop-blur-2xl { backdrop-filter: blur(40px); -webkit-backdrop-filter: blur(40px); }
.grayscale { filter: grayscale(100%); }

.-top-8 { top: -2rem; }
.-right-8 { right: -2rem; }
.-bottom-8 { bottom: -2rem; }
.-left-8 { left: -2rem; }
.top-0 { top: 0; }
.top-3 { top: 0.75rem; }
.top-4 { top: 1rem; }
.left-0 { left: 0; }
.left-4 { left: 1rem; }
.right-0 { right: 0; }
.right-4 { right: 1rem; }
.bottom-0 { bottom: 0; }
.bottom-4 { bottom: 1rem; }
.bottom-8 { bottom: 2rem; }
.inset-x-0 { left: 0; right: 0; }
.left-1\/2 { left: 50%; }
.-translate-x-1\/2 { transform: translateX(-50%); }
.-translate-y-1\/2 { transform: translateY(-50%); }
.top-1\/2 { top: 50%; }

.hidden { display: none; }
.block { display: block; }
.inline-flex { display: inline-flex; }

.animate-bounce {
    animation: bounce 1s infinite;
}
@keyframes bounce {
    0%, 100% { transform: translateY(-25%) translateX(-50%); animation-timing-function: cubic-bezier(0.8,0,1,1); }
    50% { transform: translateY(0) translateX(-50%); animation-timing-function: cubic-bezier(0,0,0.2,1); }
}

/* ── GLASS EFFECTS (matching React) ── */
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

/* ── BUTTONS (matching React Button component) ── */
.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    font-weight: 600;
    padding: 0.625rem 1.25rem;
    border-radius: var(--radius-xl);
    transition: all var(--transition-normal);
    white-space: nowrap;
    cursor: pointer;
    font-size: 0.875rem;
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
.btn-secondary:hover { background-color: hsl(0, 0%, 18%); }
.btn-ghost {
    background: transparent;
    color: var(--foreground);
}
.btn-ghost:hover { background-color: var(--secondary); }
.btn-hero {
    background: linear-gradient(135deg, var(--primary), hsl(30, 95%, 60%));
    color: var(--primary-foreground);
    padding: 1rem 2rem;
    font-size: 1.125rem;
    box-shadow: var(--shadow-glow);
    border-radius: var(--radius-xl);
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
    border-radius: var(--radius-xl);
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
    padding: 0.75rem 1.5rem;
    font-size: 1.125rem;
    height: 3.5rem;
}
.btn-sm { padding: 0.375rem 0.75rem; font-size: 0.875rem; }
.btn-danger { background-color: hsl(0, 62.8%, 30.6%); color: var(--foreground); }
.btn-danger:hover { background-color: hsl(0, 62.8%, 40%); }

/* ── FORMS ── */
.form-input, .form-textarea {
    width: 100%;
    padding: 0.75rem 1rem;
    background-color: var(--secondary);
    border: 1px solid var(--border);
    border-radius: var(--radius-xl);
    color: var(--foreground);
    font-size: 1rem;
    transition: border-color var(--transition-fast), box-shadow var(--transition-fast);
}
.form-input:focus, .form-textarea:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(var(--primary-rgb), 0.2);
}
.form-input::placeholder, .form-textarea::placeholder { color: var(--muted-foreground); }
.form-input-h12 { height: 3rem; }
.form-input-h14 { height: 3.5rem; }
.form-input-bg-dark { background-color: var(--background); border: none; }

/* ── HEADER (matching React Header.tsx exactly) ── */
.site-header {
    position: fixed;
    z-index: var(--z-header);
    transition: all 0.3s ease-out;
    top: 0; left: 0; right: 0;
    background: rgba(18, 18, 18, 0.8);
    backdrop-filter: blur(24px);
    -webkit-backdrop-filter: blur(24px);
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
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
.header-inner {
    transition: all 0.3s ease-out;
}
.site-header:not(.scrolled) .header-inner {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 1rem;
}
@media (min-width: 768px) {
    .site-header:not(.scrolled) .header-inner { padding: 0 2rem; }
}
.site-header.scrolled .header-inner {
    padding: 0 1.5rem;
}
.header-content {
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 5rem;
    transition: all 0.3s ease-out;
}
.site-header.scrolled .header-content {
    height: 3.5rem;
}
.site-logo {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary);
    transition: all 0.3s ease-out;
}
.site-logo:hover { opacity: 0.8; color: var(--primary); }
.site-header.scrolled .site-logo { font-size: 1.125rem; }
.main-nav {
    display: none;
    align-items: center;
    gap: 1.5rem;
}
@media (min-width: 768px) { .main-nav { display: flex; } }
.nav-link {
    font-weight: 500;
    color: var(--foreground);
    transition: color 200ms ease;
}
.nav-link:hover { color: var(--primary); }
.nav-actions {
    display: none;
    align-items: center;
    gap: 0.75rem;
}
@media (min-width: 768px) { .nav-actions { display: flex; } }
.nav-phone {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--muted-foreground);
    transition: color var(--transition-fast);
}
.nav-phone:hover { color: var(--primary); }
.nav-phone-text {
    font-size: 0.875rem;
    transition: all 0.3s ease-out;
}
.site-header.scrolled .nav-phone-text { font-size: 0.75rem; }

/* Mobile Menu Toggle */
.mobile-menu-btn {
    display: block;
    padding: 0.5rem;
    border-radius: var(--radius-xl);
    transition: background-color var(--transition-fast);
}
.mobile-menu-btn:hover { background: rgba(255,255,255,0.1); }
@media (min-width: 768px) { .mobile-menu-btn { display: none; } }
.hamburger-line {
    display: block;
    width: 1.5rem;
    height: 2px;
    background: var(--foreground);
    transition: all 0.3s;
    position: absolute;
    left: 0;
}
.hamburger-box { position: relative; width: 1.5rem; height: 1.5rem; }
.hamburger-line:nth-child(1) { top: 4px; }
.hamburger-line:nth-child(2) { top: 11px; }
.hamburger-line:nth-child(3) { top: 18px; }
.mobile-menu-open .hamburger-line:nth-child(1) { top: 11px; transform: rotate(45deg); }
.mobile-menu-open .hamburger-line:nth-child(2) { opacity: 0; }
.mobile-menu-open .hamburger-line:nth-child(3) { top: 11px; transform: rotate(-45deg); }

.mobile-menu {
    max-height: 0;
    overflow: hidden;
    transition: all 0.3s;
}
@media (min-width: 768px) { .mobile-menu { display: none !important; } }
.mobile-menu.open { max-height: 16rem; padding-bottom: 1rem; }
.mobile-nav-link {
    display: block;
    color: var(--foreground);
    font-weight: 500;
    padding: 0.75rem 1rem;
    border-radius: var(--radius-xl);
    transition: color var(--transition-fast), background-color var(--transition-fast);
}
.mobile-nav-link:hover {
    color: var(--primary);
    background: rgba(255,255,255,0.05);
}

/* ── HERO SECTION (matching React HeroSection.tsx - 2-column grid) ── */
.hero-section {
    position: relative;
    min-height: 100vh;
    background: linear-gradient(to bottom, var(--background), rgba(38,38,38,0.3));
    overflow: hidden;
}
.hero-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 3rem;
    align-items: center;
}
@media (min-width: 1024px) {
    .hero-grid { grid-template-columns: repeat(2, 1fr); }
}
.hero-content { display: flex; flex-direction: column; gap: 2rem; }
.hero-title {
    font-size: 2.25rem;
    font-weight: 700;
    line-height: 1.25;
    color: var(--foreground);
}
@media (min-width: 768px) { .hero-title { font-size: 3rem; } }
@media (min-width: 1024px) { .hero-title { font-size: 3.75rem; } }
.hero-subtitle { display: block; color: var(--primary); margin-top: 0.5rem; }
.hero-description {
    font-size: 1.125rem;
    color: var(--muted-foreground);
    line-height: 1.625;
    max-width: 36rem;
}
@media (min-width: 768px) { .hero-description { font-size: 1.25rem; } }
.hero-buttons { display: flex; flex-direction: column; gap: 1rem; }
@media (min-width: 640px) { .hero-buttons { flex-direction: row; } }
.hero-image-wrapper { position: relative; }
.hero-image {
    width: 100%;
    height: auto;
    border-radius: var(--radius-2xl);
    box-shadow: 0 25px 50px -12px rgba(0,0,0,0.25);
    position: relative;
    z-index: 10;
}
.hero-deco-1 {
    position: absolute;
    top: -2rem;
    right: -2rem;
    width: 16rem;
    height: 16rem;
    background: rgba(var(--primary-rgb),0.1);
    border-radius: 9999px;
    filter: blur(64px);
}
.hero-deco-2 {
    position: absolute;
    bottom: -2rem;
    left: -2rem;
    width: 12rem;
    height: 12rem;
    background: rgba(var(--primary-rgb),0.05);
    border-radius: 9999px;
    filter: blur(40px);
}
.scroll-indicator {
    position: absolute;
    bottom: 2rem;
    left: 50%;
    transform: translateX(-50%);
    animation: bounce 1s infinite;
}
@media (max-width: 767px) { .scroll-indicator { display: none; } }
.scroll-indicator-box {
    width: 1.5rem;
    height: 2.5rem;
    border: 2px solid rgba(166,166,166,0.3);
    border-radius: 9999px;
    display: flex;
    justify-content: center;
}
.scroll-indicator-dot {
    width: 0.375rem;
    height: 0.75rem;
    background: rgba(166,166,166,0.3);
    border-radius: 9999px;
    margin-top: 0.5rem;
}

/* ── SECTION STYLES ── */
.section-title-primary { color: var(--primary); }

/* ── PRODUCT CARD (matching React FeaturedProducts.tsx) ── */
.product-card { overflow: hidden; }
.product-image-area {
    position: relative;
    aspect-ratio: 1;
    background: rgba(38,38,38,0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}
.product-image-area img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    padding: 1rem;
    transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1);
}
.product-card:hover .product-image-area img,
.group:hover .product-image-area img {
    transform: scale(1.1);
}
.product-hover-overlay {
    position: absolute;
    inset: 0;
    background: rgba(18,18,18,0.6);
    backdrop-filter: blur(4px);
    -webkit-backdrop-filter: blur(4px);
    opacity: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
    transition: all 0.3s ease;
}
.product-card:hover .product-hover-overlay,
.group:hover .product-hover-overlay {
    opacity: 1;
}
.overlay-btn {
    width: 3rem;
    height: 3rem;
    border-radius: 9999px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: transform 0.3s ease;
    cursor: pointer;
    border: none;
}
.overlay-btn:hover { transform: scale(1.1); }
.overlay-btn-primary { background: var(--primary); color: var(--primary-foreground); }
.overlay-btn-secondary { background: var(--secondary); color: var(--foreground); }
.product-discount-badge {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: var(--primary);
    color: var(--primary-foreground);
    font-size: 0.875rem;
    font-weight: 700;
    padding: 0.25rem 0.75rem;
    border-radius: 9999px;
}
.product-category-badge {
    position: absolute;
    top: 1rem;
    left: 1rem;
    background: rgba(18,18,18,0.6);
    backdrop-filter: blur(40px);
    color: var(--foreground);
    font-size: 0.75rem;
    padding: 0.25rem 0.5rem;
    border-radius: var(--radius-sm);
}
.product-info { padding: 1.5rem; }
.product-name {
    font-size: 1.125rem;
    font-weight: 700;
    margin-bottom: 1rem;
    color: var(--card-foreground);
    transition: color var(--transition-fast);
}
.product-card:hover .product-name,
.group:hover .product-name {
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
.product-old-price {
    font-size: 0.875rem;
    color: var(--muted-foreground);
    text-decoration: line-through;
}

/* ── CATEGORY CARD (matching React ProductCategories.tsx) ── */
.category-card-link {
    display: block;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}
.category-card-link:hover { transform: translateY(-0.5rem); box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1); }
.category-card-link:hover .category-img { transform: scale(1.05); }
.category-img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    transition: transform 0.5s ease;
}
.category-gradient {
    position: absolute;
    inset: 0;
    left: 0; right: 0; bottom: 0;
    background: linear-gradient(to top, rgba(18,18,18,0.8), transparent);
    display: flex;
    align-items: flex-end;
    justify-content: center;
    padding: 1rem;
}
.category-name {
    font-size: 1.125rem;
    font-weight: 700;
    color: var(--background);
    text-align: center;
}

/* ── LEAD FORM SECTION (matching React LeadForm.tsx) ── */
.lead-section {
    background-color: var(--primary);
}
.lead-section .lead-title {
    color: var(--primary-foreground);
    font-size: 1.875rem;
    font-weight: 700;
    margin-bottom: 1rem;
}
@media (min-width: 768px) { .lead-section .lead-title { font-size: 2.25rem; } }
.lead-section .lead-description {
    color: rgba(255,255,255,0.8);
    font-size: 1.125rem;
    margin-bottom: 2.5rem;
}
.lead-form-row {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}
@media (min-width: 640px) { .lead-form-row { flex-direction: row; } }
.lead-form-row .form-input-wrapper {
    position: relative;
    flex: 1;
}
.lead-form-row .form-input-icon {
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    width: 1.25rem;
    height: 1.25rem;
    color: var(--muted-foreground);
}
.lead-submit-btn {
    width: 100%;
    background: var(--background);
    color: var(--primary);
    font-weight: 700;
    padding: 0.75rem 2rem;
    border-radius: var(--radius-xl);
    font-size: 1rem;
    transition: all var(--transition-normal);
    cursor: pointer;
    border: none;
}
@media (min-width: 640px) { .lead-submit-btn { width: auto; } }
.lead-submit-btn:hover { background: rgba(18,18,18,0.9); }

/* ── TESTIMONIAL (matching React Testimonials.tsx - slider) ── */
.testimonial-slider-card {
    padding: 2rem 3rem;
}
@media (max-width: 767px) { .testimonial-slider-card { padding: 2rem; } }
.testimonial-quote-icon {
    width: 3rem;
    height: 3rem;
    color: rgba(var(--primary-rgb),0.2);
    margin-bottom: 1.5rem;
}
.testimonial-text {
    font-size: 1.25rem;
    color: var(--card-foreground);
    line-height: 1.625;
    margin-bottom: 2rem;
}
@media (min-width: 768px) { .testimonial-text { font-size: 1.5rem; } }
.testimonial-name {
    font-weight: 700;
    font-size: 1.125rem;
    color: var(--card-foreground);
}
.testimonial-stars {
    display: flex;
    gap: 0.25rem;
    margin-top: 0.25rem;
    color: var(--primary);
}
.slider-nav-btn {
    width: 3rem;
    height: 3rem;
    border-radius: 9999px;
    background: var(--secondary);
    display: flex;
    align-items: center;
    justify-content: center;
    border: none;
    cursor: pointer;
    color: var(--foreground);
    transition: all var(--transition-fast);
}
.slider-nav-btn:hover {
    background: var(--primary);
    color: var(--primary-foreground);
}
.slider-dots {
    display: flex;
    justify-content: center;
    gap: 0.5rem;
    margin-top: 2rem;
}
.slider-dot {
    width: 0.75rem;
    height: 0.75rem;
    border-radius: 9999px;
    background: rgba(166,166,166,0.3);
    border: none;
    cursor: pointer;
    transition: all 0.3s;
}
.slider-dot.active {
    background: var(--primary);
    width: 2rem;
}
.slider-dot:hover { background: rgba(166,166,166,0.5); }

/* ── FAQ (matching React FAQ.tsx - accordion) ── */
.faq-item {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: var(--radius-xl);
    padding: 0 1.5rem;
    margin-bottom: 1rem;
    transition: border-color var(--transition-fast);
}
.faq-item.open { border-color: rgba(var(--primary-rgb),0.3); }
.faq-question {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1.5rem 0;
    text-align: right;
    font-weight: 500;
    font-size: 1.125rem;
    color: var(--foreground);
    cursor: pointer;
    background: none;
    border: none;
    transition: color var(--transition-fast);
}
.faq-question:hover { color: var(--primary); text-decoration: none; }
.faq-icon {
    width: 1.25rem;
    height: 1.25rem;
    color: var(--muted-foreground);
    transition: transform var(--transition-normal);
    flex-shrink: 0;
}
.faq-item.open .faq-icon { transform: rotate(180deg); }
.faq-answer {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease, padding 0.3s ease;
}
.faq-item.open .faq-answer { max-height: 500px; padding-bottom: 1.5rem; }
.faq-answer-text {
    color: var(--muted-foreground);
    line-height: 1.625;
}

/* ── FOOTER (matching React Footer.tsx) ── */
.site-footer {
    background: var(--foreground);
    color: var(--background);
    padding: 4rem 0 8rem;
}
@media (min-width: 768px) { .site-footer { padding-bottom: 4rem; } }
.footer-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 3rem;
    margin-bottom: 3rem;
}
@media (min-width: 768px) { .footer-grid { grid-template-columns: repeat(2, 1fr); } }
@media (min-width: 1024px) { .footer-grid { grid-template-columns: repeat(4, 1fr); } }
.footer-logo { font-size: 1.5rem; font-weight: 700; color: var(--primary); margin-bottom: 1rem; }
.footer-description { color: rgba(18,18,18,0.7); line-height: 1.625; }
.footer-title { font-size: 1.125rem; font-weight: 700; margin-bottom: 1rem; }
.footer-link {
    display: block;
    color: rgba(18,18,18,0.7);
    padding: 0.375rem 0;
    transition: color var(--transition-fast);
}
.footer-link:hover { color: var(--primary); }
.footer-contact-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    color: rgba(18,18,18,0.7);
    margin-bottom: 0.75rem;
}
.footer-contact-icon { width: 1.25rem; height: 1.25rem; color: var(--primary); flex-shrink: 0; }
.footer-social { display: flex; gap: 1rem; margin-top: 1rem; }
.social-link {
    width: 3rem;
    height: 3rem;
    background: rgba(18,18,18,0.1);
    border-radius: 9999px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all var(--transition-fast);
    color: inherit;
}
.social-link:hover { background: var(--primary); color: var(--primary-foreground); }
.footer-bottom {
    border-top: 1px solid rgba(18,18,18,0.1);
    padding-top: 2rem;
    text-align: center;
}
.footer-copyright { color: rgba(18,18,18,0.5); }

/* ── FLOATING TOOLBAR (matching React MobileToolbar.tsx) ── */
/* Mobile - Bottom */
.floating-toolbar-mobile {
    position: fixed;
    bottom: 1rem;
    left: 1rem;
    right: 1rem;
    z-index: 50;
    transition: all 0.5s;
}
@media (min-width: 768px) { .floating-toolbar-mobile { display: none; } }
.floating-toolbar-mobile.toolbar-hidden { transform: translateY(6rem); opacity: 0; }
.toolbar-inner {
    position: relative;
    border-radius: 1.5rem;
    padding: 2px;
    background: linear-gradient(135deg, rgba(var(--primary-rgb),0.3), rgba(255,255,255,0.1), rgba(var(--primary-rgb),0.3));
}
.toolbar-bg {
    position: relative;
    background: rgba(18,18,18,0.8);
    backdrop-filter: blur(40px);
    -webkit-backdrop-filter: blur(40px);
    border-radius: 1.5rem;
    overflow: hidden;
}
.toolbar-items {
    position: relative;
    z-index: 10;
    display: flex;
    align-items: center;
    justify-content: space-around;
    padding: 0.75rem 0.5rem;
}
.toolbar-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.25rem;
    padding: 0.5rem 0.75rem;
    border-radius: var(--radius-2xl);
    transition: all 0.3s;
    color: var(--foreground);
    background: none;
    border: none;
    cursor: pointer;
}
.toolbar-item:hover { background: rgba(var(--primary-rgb),0.1); }
.toolbar-item:hover .toolbar-icon { color: var(--primary); transform: scale(1.1); }
.toolbar-item:hover .toolbar-label { color: var(--primary); }
.toolbar-icon {
    width: 1.25rem;
    height: 1.25rem;
    transition: color 0.3s, transform 0.3s;
}
.toolbar-label {
    font-size: 10px;
    color: var(--muted-foreground);
    transition: color 0.3s;
}
.toolbar-glow {
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 50%;
    height: 2px;
    background: linear-gradient(to right, transparent, var(--primary), transparent);
    opacity: 0.5;
}

/* Desktop - Right Side */
.floating-toolbar-desktop {
    position: fixed;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    z-index: 50;
    transition: all 0.5s;
    display: none;
}
@media (min-width: 768px) { .floating-toolbar-desktop { display: block; } }
.floating-toolbar-desktop.toolbar-hidden { transform: translateY(-50%) translateX(6rem); opacity: 0; }
.toolbar-desktop-items {
    position: relative;
    z-index: 10;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.25rem;
    padding: 1rem 0.5rem;
}
.toolbar-divider {
    width: 2rem;
    height: 1px;
    background: rgba(255,255,255,0.1);
    margin: 0.25rem 0;
}
.toolbar-desktop-glow {
    position: absolute;
    right: 0;
    top: 50%;
    transform: translateY(-50%);
    height: 50%;
    width: 2px;
    background: linear-gradient(to bottom, transparent, var(--primary), transparent);
    opacity: 0.5;
}

/* ── SHOP PAGE STYLES ── */
.filter-btn {
    padding: 0.5rem 1rem;
    border-radius: var(--radius-xl);
    font-weight: 500;
    transition: all 0.3s;
    cursor: pointer;
    background: var(--secondary);
    color: var(--foreground);
    border: none;
}
.filter-btn:hover { opacity: 0.8; }
.filter-btn.active { background: var(--primary); color: var(--primary-foreground); }
.search-input-wrapper {
    position: relative;
    width: 100%;
}
@media (min-width: 1024px) { .search-input-wrapper { width: 24rem; } }
.search-input-icon {
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    width: 1.25rem;
    height: 1.25rem;
    color: var(--muted-foreground);
}
.search-input { padding-right: 3rem; }

/* ── ABOUT PAGE STYLES ── */
.stat-item { text-align: center; }
.stat-value { font-size: 2.25rem; font-weight: 700; color: var(--primary); margin-bottom: 0.5rem; }
@media (min-width: 768px) { .stat-value { font-size: 3rem; } }
.stat-label { color: var(--muted-foreground); }
.value-card-icon {
    width: 4rem;
    height: 4rem;
    background: rgba(var(--primary-rgb),0.1);
    border-radius: var(--radius-2xl);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    color: var(--primary);
}
.value-card-icon svg { width: 2rem; height: 2rem; }

/* ── SCROLL ANIMATIONS ── */
@keyframes fadeUp { from { opacity:0; transform:translateY(30px); } to { opacity:1; transform:translateY(0); } }
@keyframes scaleIn { from { opacity:0; transform:scale(0.9); } to { opacity:1; transform:scale(1); } }
@keyframes slideIn { from { opacity:0; transform:translateX(30px); } to { opacity:1; transform:translateX(0); } }
@keyframes pulseGlow { 0%,100% { box-shadow:0 0 20px rgba(var(--primary-rgb),0.3); } 50% { box-shadow:0 0 40px rgba(var(--primary-rgb),0.5); } }
.animate-pulse-glow { animation: pulseGlow 2s ease-in-out infinite; }

.scroll-animate { opacity: 0; transform: translateY(30px); }
.scroll-animate.anim-scale { transform: scale(0.9); }
.scroll-animate.visible {
    opacity: 1;
    transform: translateY(0) scale(1);
    transition: opacity 0.6s ease-out, transform 0.6s ease-out;
}

/* ── WOOCOMMERCE OVERRIDES ── */
.woocommerce .products { display: grid; grid-template-columns: repeat(2,1fr); gap: 1.5rem; }
@media (min-width: 768px) { .woocommerce .products { grid-template-columns: repeat(3,1fr); } }
@media (min-width: 1024px) { .woocommerce .products { grid-template-columns: repeat(4,1fr); } }
.woocommerce .product {
    background: rgba(26,26,26,0.4);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255,255,255,0.05);
    border-radius: var(--radius-xl);
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.4,0,0.2,1);
}
.woocommerce .product:hover { background: rgba(26,26,26,0.6); border-color: rgba(var(--primary-rgb),0.3); }
.woocommerce .product img { aspect-ratio: 1; object-fit: contain; padding: 1rem; background: rgba(var(--primary-rgb),0.02); }
.woocommerce .product .woocommerce-loop-product__title { font-size: 1rem; font-weight: 700; color: var(--foreground); padding: 1rem 1rem 0.5rem; }
.woocommerce .product .price { padding: 0 1rem 1rem; color: var(--primary); font-weight: 700; }
.woocommerce .product .button {
    background: var(--primary); color: var(--primary-foreground); border: none;
    padding: 0.75rem 1.5rem; border-radius: var(--radius-xl); font-weight: 600;
    margin: 0 1rem 1rem; transition: all var(--transition-normal);
}
.woocommerce .product .button:hover { background: hsl(24,95%,48%); }

/* ── ELEMENTOR OVERRIDES ── */
.elementor-section { background-color: var(--background) !important; }
.elementor-widget-container { font-family: 'AzarMehr','Vazirmatn',sans-serif !important; }
.elementor-heading-title { font-family: 'AzarMehr','Vazirmatn',sans-serif !important; color: var(--foreground) !important; }
.elementor-text-editor { color: var(--muted-foreground) !important; }
.elementor-button { background-color: var(--primary) !important; border-radius: var(--radius-xl) !important; font-family: 'AzarMehr','Vazirmatn',sans-serif !important; }
.elementor-button:hover { background-color: hsl(24,95%,48%) !important; }

    <?php
    return ob_get_clean();
}

/* ============================================
   ALL JAVASCRIPT
   ============================================ */
function xiaomi_sari_get_all_js() {
    ob_start();
    ?>
(function() {
    'use strict';

    // ── HEADER SCROLL EFFECT ──
    var header = document.querySelector('.site-header');
    if (header) {
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 80) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        }, { passive: true });
    }

    // ── SCROLL ANIMATIONS ──
    var observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                var delay = entry.target.dataset.delay || 0;
                setTimeout(function() {
                    entry.target.classList.add('visible');
                }, delay);
                observer.unobserve(entry.target);
            }
        });
    }, { rootMargin: '0px 0px -80px 0px', threshold: 0.1 });

    document.querySelectorAll('.scroll-animate').forEach(function(el) {
        observer.observe(el);
    });

    // ── FAQ ACCORDION ──
    document.querySelectorAll('.faq-question').forEach(function(q) {
        q.addEventListener('click', function() {
            var item = this.closest('.faq-item');
            var isOpen = item.classList.contains('open');
            document.querySelectorAll('.faq-item').forEach(function(f) { f.classList.remove('open'); });
            if (!isOpen) item.classList.add('open');
        });
    });

    // ── TESTIMONIAL SLIDER ──
    var slides = document.querySelectorAll('.testimonial-slide');
    var dots = document.querySelectorAll('.slider-dot');
    var currentSlide = 0;

    function showSlide(index) {
        slides.forEach(function(s) { s.style.display = 'none'; });
        dots.forEach(function(d) { d.classList.remove('active'); });
        if (slides[index]) { slides[index].style.display = 'block'; }
        if (dots[index]) { dots[index].classList.add('active'); }
        currentSlide = index;
    }

    var prevBtn = document.querySelector('.slider-prev');
    var nextBtn = document.querySelector('.slider-next');
    if (prevBtn) prevBtn.addEventListener('click', function() {
        showSlide((currentSlide - 1 + slides.length) % slides.length);
    });
    if (nextBtn) nextBtn.addEventListener('click', function() {
        showSlide((currentSlide + 1) % slides.length);
    });
    dots.forEach(function(dot, i) {
        dot.addEventListener('click', function() { showSlide(i); });
    });
    if (slides.length > 0) showSlide(0);

    // ── MOBILE MENU ──
    var menuBtn = document.querySelector('.mobile-menu-btn');
    var mobileMenu = document.querySelector('.mobile-menu');
    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', function() {
            mobileMenu.classList.toggle('open');
            menuBtn.classList.toggle('mobile-menu-open');
        });
    }

    // ── FLOATING TOOLBAR SCROLL ──
    var toolbarMobile = document.querySelector('.floating-toolbar-mobile');
    var toolbarDesktop = document.querySelector('.floating-toolbar-desktop');
    var lastScrollY = 0;
    window.addEventListener('scroll', function() {
        var currentY = window.pageYOffset;
        var hidden = currentY > lastScrollY && currentY > 100;
        if (toolbarMobile) toolbarMobile.classList.toggle('toolbar-hidden', hidden);
        if (toolbarDesktop) toolbarDesktop.classList.toggle('toolbar-hidden', hidden);
        lastScrollY = currentY;
    }, { passive: true });

    // ── SMOOTH SCROLL ──
    document.querySelectorAll('a[href^="#"]').forEach(function(a) {
        a.addEventListener('click', function(e) {
            var href = this.getAttribute('href');
            if (href && href.length > 1) {
                var target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }
        });
    });

    // ── SCROLL TO TOP ──
    document.querySelectorAll('.scroll-top-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    });

    // ── LEAD FORM AJAX ──
    var leadForm = document.querySelector('.lead-form');
    if (leadForm) {
        leadForm.addEventListener('submit', function(e) {
            e.preventDefault();
            var fd = new FormData(this);
            fd.append('action', 'xiaomi_sari_lead_form');
            fd.append('nonce', xiaomiSari.nonce);
            fetch(xiaomiSari.ajaxUrl, { method: 'POST', body: fd })
                .then(function(r) { return r.json(); })
                .then(function(d) {
                    showNotification(d.success ? 'درخواست شما ثبت شد!' : 'خطا در ثبت', d.success ? 'success' : 'error');
                    if (d.success) leadForm.reset();
                })
                .catch(function() { showNotification('خطا در ارتباط با سرور', 'error'); });
        });
    }

    // ── CONTACT FORM AJAX ──
    var contactForm = document.querySelector('.contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            var fd = new FormData(this);
            fd.append('action', 'xiaomi_sari_contact_form');
            fd.append('nonce', xiaomiSari.nonce);
            fetch(xiaomiSari.ajaxUrl, { method: 'POST', body: fd })
                .then(function(r) { return r.json(); })
                .then(function(d) {
                    showNotification(d.success ? 'پیام شما ارسال شد!' : 'خطا در ارسال', d.success ? 'success' : 'error');
                    if (d.success) contactForm.reset();
                })
                .catch(function() { showNotification('خطا در ارتباط با سرور', 'error'); });
        });
    }

    // ── NOTIFICATION ──
    function showNotification(message, type) {
        var n = document.createElement('div');
        n.style.cssText = 'position:fixed;bottom:2rem;right:2rem;padding:1rem 1.5rem;border-radius:1rem;z-index:9999;font-weight:500;color:#fff;animation:fadeUp 0.3s ease;';
        n.style.background = type === 'success' ? '#22c55e' : type === 'error' ? '#ef4444' : 'hsl(24,95%,53%)';
        n.textContent = message;
        document.body.appendChild(n);
        setTimeout(function() { n.remove(); }, 3000);
    }

    // ── SHOP FILTER ──
    document.querySelectorAll('.filter-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.filter-btn').forEach(function(b) { b.classList.remove('active'); });
            this.classList.add('active');
            var cat = this.dataset.category;
            document.querySelectorAll('.product-card').forEach(function(card) {
                card.style.display = (cat === 'all' || card.dataset.category === cat) ? '' : 'none';
            });
        });
    });

    // ── SEARCH ──
    var searchInput = document.querySelector('.shop-search-input');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            var q = this.value.toLowerCase();
            document.querySelectorAll('.product-card').forEach(function(card) {
                var name = card.dataset.name || '';
                card.style.display = name.toLowerCase().includes(q) ? '' : 'none';
            });
        });
    }

})();
    <?php
    return ob_get_clean();
}

/* ============================================
   HEADER TEMPLATE FUNCTION
   ============================================ */
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

<header class="site-header">
    <div class="header-inner">
        <div class="header-content">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">شیائومی ساری</a>

            <nav class="main-nav">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-link">صفحه اصلی</a>
                <a href="<?php echo esc_url(home_url('/shop')); ?>" class="nav-link">محصولات</a>
                <a href="<?php echo esc_url(home_url('/about')); ?>" class="nav-link">درباره ما</a>
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="nav-link">تماس با ما</a>
            </nav>

            <div class="nav-actions">
                <a href="tel:01133333333" class="nav-phone">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    <span class="nav-phone-text">۰۱۱-۳۳۳۳۳۳۳۳</span>
                </a>
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary btn-sm rounded-xl">تماس با ما</a>
            </div>

            <button class="mobile-menu-btn" aria-label="منو">
                <div class="hamburger-box">
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                </div>
            </button>
        </div>

        <div class="mobile-menu">
            <nav>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="mobile-nav-link">صفحه اصلی</a>
                <a href="<?php echo esc_url(home_url('/shop')); ?>" class="mobile-nav-link">محصولات</a>
                <a href="<?php echo esc_url(home_url('/about')); ?>" class="mobile-nav-link">درباره ما</a>
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="mobile-nav-link">تماس با ما</a>
            </nav>
        </div>
    </div>
</header>
    <?php
}

/* ============================================
   FOOTER TEMPLATE FUNCTION
   ============================================ */
function xiaomi_sari_footer_template() {
    ?>
<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <div>
                <h3 class="footer-logo">شیائومی ساری</h3>
                <p class="footer-description">فروشگاه تخصصی محصولات شیائومی با تضمین اصالت کالا و بهترین قیمت در بازار.</p>
            </div>
            <div>
                <h4 class="footer-title">دسترسی سریع</h4>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="footer-link">صفحه اصلی</a>
                <a href="<?php echo esc_url(home_url('/shop')); ?>" class="footer-link">محصولات</a>
                <a href="<?php echo esc_url(home_url('/about')); ?>" class="footer-link">درباره ما</a>
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="footer-link">تماس با ما</a>
            </div>
            <div>
                <h4 class="footer-title">اطلاعات تماس</h4>
                <div class="footer-contact-item">
                    <svg class="footer-contact-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    <span>۰۱۱-۳۳۳۳۳۳۳۳</span>
                </div>
                <div class="footer-contact-item">
                    <svg class="footer-contact-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                    <span>ساری، خیابان فرهنگ</span>
                </div>
                <div class="footer-contact-item">
                    <svg class="footer-contact-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    <span>۹ صبح تا ۹ شب</span>
                </div>
            </div>
            <div>
                <h4 class="footer-title">شبکه‌های اجتماعی</h4>
                <div class="footer-social">
                    <a href="#" class="social-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                    </a>
                    <a href="#" class="social-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/></svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p class="footer-copyright">© ۱۴۰۳ شیائومی ساری - تمامی حقوق محفوظ است.</p>
        </div>
    </div>
</footer>

<!-- Floating Toolbar - Mobile -->
<div class="floating-toolbar-mobile">
    <div class="toolbar-inner">
        <div class="toolbar-bg">
            <div class="toolbar-items">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="toolbar-item">
                    <svg class="toolbar-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                    <span class="toolbar-label">خانه</span>
                </a>
                <a href="<?php echo esc_url(home_url('/shop')); ?>" class="toolbar-item">
                    <svg class="toolbar-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                    <span class="toolbar-label">محصولات</span>
                </a>
                <a href="<?php echo esc_url(home_url('/cart')); ?>" class="toolbar-item">
                    <svg class="toolbar-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
                    <span class="toolbar-label">سبد</span>
                </a>
                <a href="tel:01133333333" class="toolbar-item">
                    <svg class="toolbar-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    <span class="toolbar-label">تماس</span>
                </a>
                <button class="toolbar-item scroll-top-btn">
                    <svg class="toolbar-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
                    <span class="toolbar-label">بالا</span>
                </button>
            </div>
            <div class="toolbar-glow"></div>
        </div>
    </div>
</div>

<!-- Floating Toolbar - Desktop -->
<div class="floating-toolbar-desktop">
    <div class="toolbar-inner">
        <div class="toolbar-bg">
            <div class="toolbar-desktop-items">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="toolbar-item">
                    <svg class="toolbar-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                    <span class="toolbar-label">خانه</span>
                </a>
                <a href="<?php echo esc_url(home_url('/shop')); ?>" class="toolbar-item">
                    <svg class="toolbar-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                    <span class="toolbar-label">محصولات</span>
                </a>
                <a href="<?php echo esc_url(home_url('/cart')); ?>" class="toolbar-item">
                    <svg class="toolbar-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
                    <span class="toolbar-label">سبد</span>
                </a>
                <a href="tel:01133333333" class="toolbar-item">
                    <svg class="toolbar-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    <span class="toolbar-label">تماس</span>
                </a>
                <div class="toolbar-divider"></div>
                <button class="toolbar-item scroll-top-btn">
                    <svg class="toolbar-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
                    <span class="toolbar-label">بالا</span>
                </button>
            </div>
            <div class="toolbar-desktop-glow"></div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
    <?php
}

/* ============================================
   AJAX HANDLERS
   ============================================ */
function xiaomi_sari_lead_form_handler() {
    check_ajax_referer('xiaomi_sari_nonce', 'nonce');
    $phone = sanitize_text_field($_POST['phone']);
    if (!empty($phone)) {
        wp_send_json_success(array('message' => 'شماره با موفقیت ثبت شد'));
    } else {
        wp_send_json_error(array('message' => 'شماره تلفن الزامی است'));
    }
}
add_action('wp_ajax_xiaomi_sari_lead_form', 'xiaomi_sari_lead_form_handler');
add_action('wp_ajax_nopriv_xiaomi_sari_lead_form', 'xiaomi_sari_lead_form_handler');

function xiaomi_sari_contact_form_handler() {
    check_ajax_referer('xiaomi_sari_nonce', 'nonce');
    $name = sanitize_text_field($_POST['name']);
    $phone = sanitize_text_field($_POST['phone']);
    $email = sanitize_email($_POST['email']);
    $message = sanitize_textarea_field($_POST['message']);
    if (!empty($name) && !empty($phone) && !empty($message)) {
        wp_send_json_success(array('message' => 'پیام با موفقیت ارسال شد'));
    } else {
        wp_send_json_error(array('message' => 'لطفا تمام فیلدها را پر کنید'));
    }
}
add_action('wp_ajax_xiaomi_sari_contact_form', 'xiaomi_sari_contact_form_handler');
add_action('wp_ajax_nopriv_xiaomi_sari_contact_form', 'xiaomi_sari_contact_form_handler');
