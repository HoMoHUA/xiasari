<!-- Footer -->
<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <!-- Brand -->
            <div class="footer-brand">
                <a href="<?php echo home_url(); ?>" class="site-logo"><?php echo get_bloginfo('name'); ?></a>
                <p>فروشگاه تخصصی محصولات شیائومی با تضمین اصالت کالا و بهترین قیمت در بازار.</p>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="footer-title">دسترسی سریع</h4>
                <ul class="footer-links">
                    <li><a href="<?php echo home_url(); ?>">صفحه اصلی</a></li>
                    <li><a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>">محصولات</a></li>
                    <li><a href="<?php echo home_url('/about'); ?>">درباره ما</a></li>
                    <li><a href="<?php echo home_url('/contact'); ?>">تماس با ما</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
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

            <!-- Social Media -->
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

<!-- Mobile Toolbar -->
<nav class="mobile-toolbar">
    <a href="<?php echo home_url(); ?>" class="toolbar-item <?php echo is_front_page() ? 'active' : ''; ?>">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        <span>خانه</span>
    </a>
    <a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>" class="toolbar-item <?php echo is_shop() ? 'active' : ''; ?>">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        <span>محصولات</span>
    </a>
    <a href="<?php echo wc_get_cart_url(); ?>" class="toolbar-item <?php echo is_cart() ? 'active' : ''; ?>">
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
