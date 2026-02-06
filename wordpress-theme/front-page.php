<?php
/**
 * Front Page Template
 * @package Xiaomi_Sari
 */
if (!defined('ABSPATH')) exit;

xiaomi_sari_header_template();
echo do_shortcode('[xiaomi_hero]');
echo do_shortcode('[xiaomi_values]');
echo do_shortcode('[xiaomi_categories]');
echo do_shortcode('[xiaomi_featured_products]');
echo do_shortcode('[xiaomi_lead_form]');
echo do_shortcode('[xiaomi_testimonials]');
echo do_shortcode('[xiaomi_faq]');
xiaomi_sari_footer_template();
