/**
 * Xiaomi Sari Theme - Main JavaScript
 */

(function() {
    'use strict';

    // DOM Ready
    document.addEventListener('DOMContentLoaded', function() {
        initHeader();
        initMobileMenu();
        initFAQ();
        initLeadForm();
        initScrollAnimations();
        initProductSpecs();
        initQuantityControls();
        initWishlist();
    });

    /**
     * Header Scroll Effect
     */
    function initHeader() {
        const header = document.querySelector('.site-header');
        if (!header) return;

        let lastScroll = 0;
        const scrollThreshold = 80;

        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset;

            if (currentScroll > scrollThreshold) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }

            lastScroll = currentScroll;
        }, { passive: true });
    }

    /**
     * Mobile Menu Toggle
     */
    function initMobileMenu() {
        const toggleBtn = document.querySelector('.mobile-menu-toggle');
        const mobileMenu = document.querySelector('.mobile-menu');

        if (!toggleBtn || !mobileMenu) return;

        toggleBtn.addEventListener('click', function() {
            const isOpen = mobileMenu.classList.contains('active');
            
            mobileMenu.classList.toggle('active');
            toggleBtn.setAttribute('aria-expanded', !isOpen);

            // Animate hamburger icon
            const spans = toggleBtn.querySelectorAll('span');
            spans.forEach((span, index) => {
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

        // Close menu when clicking on links
        const menuLinks = mobileMenu.querySelectorAll('a');
        menuLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                mobileMenu.classList.remove('active');
            });
        });
    }

    /**
     * FAQ Accordion
     */
    function initFAQ() {
        const faqItems = document.querySelectorAll('.faq-item');

        faqItems.forEach(function(item) {
            const question = item.querySelector('.faq-question');

            if (!question) return;

            question.addEventListener('click', function() {
                const isOpen = item.classList.contains('active');

                // Close all other items
                faqItems.forEach(function(otherItem) {
                    if (otherItem !== item) {
                        otherItem.classList.remove('active');
                    }
                });

                // Toggle current item
                item.classList.toggle('active');
            });
        });
    }

    /**
     * Lead Form AJAX Submission
     */
    function initLeadForm() {
        const form = document.getElementById('xiaomi-lead-form');

        if (!form) return;

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(form);
            formData.append('action', 'xiaomi_sari_submit_lead');
            formData.append('nonce', xiaomiSari.nonce);

            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'در حال ارسال...';
            submitBtn.disabled = true;

            fetch(xiaomiSari.ajaxUrl, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showToast(data.data.message, 'success');
                    form.reset();
                } else {
                    showToast(data.data.message, 'error');
                }
            })
            .catch(error => {
                showToast('خطا در ارسال درخواست. لطفا دوباره تلاش کنید.', 'error');
            })
            .finally(() => {
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            });
        });
    }

    /**
     * Scroll Animations using Intersection Observer
     */
    function initScrollAnimations() {
        const animatedElements = document.querySelectorAll('[data-animate]');

        if (!animatedElements.length) return;

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    const element = entry.target;
                    const animation = element.dataset.animate;
                    const delay = element.dataset.animateDelay || 0;

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

    /**
     * Product Specifications Toggle
     */
    function initProductSpecs() {
        const specsCard = document.querySelector('.product-specs-card');

        if (!specsCard) return;

        const header = specsCard.querySelector('.product-specs-header');
        const content = specsCard.querySelector('.product-specs-content');
        const toggle = specsCard.querySelector('.product-specs-toggle');

        header.addEventListener('click', function() {
            const isOpen = content.classList.contains('open');

            content.classList.toggle('open');
            toggle.classList.toggle('open');
        });
    }

    /**
     * Cart Quantity Controls
     */
    function initQuantityControls() {
        const quantityControls = document.querySelectorAll('.quantity-controls');

        quantityControls.forEach(function(control) {
            const minusBtn = control.querySelector('[data-action="minus"]');
            const plusBtn = control.querySelector('[data-action="plus"]');
            const valueDisplay = control.querySelector('.quantity-value');

            if (!minusBtn || !plusBtn || !valueDisplay) return;

            minusBtn.addEventListener('click', function() {
                let value = parseInt(valueDisplay.textContent);
                if (value > 1) {
                    value--;
                    valueDisplay.textContent = value;
                    updateCartItem(control.dataset.itemId, value);
                }
            });

            plusBtn.addEventListener('click', function() {
                let value = parseInt(valueDisplay.textContent);
                value++;
                valueDisplay.textContent = value;
                updateCartItem(control.dataset.itemId, value);
            });
        });
    }

    /**
     * Update Cart Item Quantity (AJAX)
     */
    function updateCartItem(itemId, quantity) {
        if (typeof wc_add_to_cart_params === 'undefined') return;

        // Implement WooCommerce AJAX cart update here
        console.log('Update item:', itemId, 'to quantity:', quantity);
    }

    /**
     * Wishlist Toggle
     */
    function initWishlist() {
        const wishlistBtns = document.querySelectorAll('[data-wishlist]');

        wishlistBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                const productId = btn.dataset.wishlist;
                const isWishlisted = btn.classList.contains('wishlisted');

                btn.classList.toggle('wishlisted');

                // Save to localStorage
                let wishlist = JSON.parse(localStorage.getItem('xiaomi_wishlist') || '[]');
                
                if (isWishlisted) {
                    wishlist = wishlist.filter(id => id !== productId);
                    showToast('از علاقه‌مندی‌ها حذف شد', 'info');
                } else {
                    wishlist.push(productId);
                    showToast('به علاقه‌مندی‌ها اضافه شد', 'success');
                }

                localStorage.setItem('xiaomi_wishlist', JSON.stringify(wishlist));
            });
        });

        // Check wishlist on page load
        const wishlist = JSON.parse(localStorage.getItem('xiaomi_wishlist') || '[]');
        wishlist.forEach(function(productId) {
            const btn = document.querySelector('[data-wishlist="' + productId + '"]');
            if (btn) {
                btn.classList.add('wishlisted');
            }
        });
    }

    /**
     * Show Toast Notification
     */
    function showToast(message, type = 'info') {
        // Remove existing toasts
        const existingToast = document.querySelector('.toast');
        if (existingToast) {
            existingToast.remove();
        }

        const toast = document.createElement('div');
        toast.className = 'toast toast-' + type;
        toast.innerHTML = '<span>' + message + '</span>';
        toast.style.cssText = `
            position: fixed;
            bottom: 100px;
            left: 50%;
            transform: translateX(-50%) translateY(100px);
            background-color: var(--card);
            color: var(--foreground);
            padding: 1rem 2rem;
            border-radius: var(--radius-xl);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            z-index: 9999;
            transition: transform 0.3s ease;
            border: 1px solid var(--border);
        `;

        if (type === 'success') {
            toast.style.borderColor = 'hsl(142, 76%, 36%)';
        } else if (type === 'error') {
            toast.style.borderColor = 'hsl(0, 62.8%, 50%)';
        }

        document.body.appendChild(toast);

        // Animate in
        requestAnimationFrame(function() {
            toast.style.transform = 'translateX(-50%) translateY(0)';
        });

        // Auto remove
        setTimeout(function() {
            toast.style.transform = 'translateX(-50%) translateY(100px)';
            setTimeout(function() {
                toast.remove();
            }, 300);
        }, 3000);
    }

    /**
     * Smooth Scroll for Anchor Links
     */
    document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
        anchor.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;

            const target = document.querySelector(targetId);
            if (target) {
                e.preventDefault();
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    /**
     * Category Filter (Shop Page)
     */
    const categoryFilters = document.querySelectorAll('.category-filter-btn');
    const mobileFilterToggle = document.querySelector('.mobile-filter-toggle');
    const mobileFilters = document.querySelector('.mobile-filters');

    categoryFilters.forEach(function(btn) {
        btn.addEventListener('click', function() {
            categoryFilters.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const category = btn.dataset.category;
            filterProducts(category);
        });
    });

    if (mobileFilterToggle && mobileFilters) {
        mobileFilterToggle.addEventListener('click', function() {
            mobileFilters.classList.toggle('active');
        });
    }

    function filterProducts(category) {
        const products = document.querySelectorAll('.product-card');
        
        products.forEach(function(product) {
            const productCategory = product.dataset.category;
            
            if (category === 'all' || productCategory === category) {
                product.style.display = '';
                product.classList.add('animate-fade-up');
            } else {
                product.style.display = 'none';
            }
        });
    }

    /**
     * Product Image 3D Tilt Effect
     */
    const productDetailImage = document.querySelector('.product-detail-image');
    const productDetailWrapper = document.querySelector('.product-detail-image-wrapper');

    if (productDetailImage && productDetailWrapper) {
        productDetailWrapper.addEventListener('mousemove', function(e) {
            const rect = productDetailWrapper.getBoundingClientRect();
            const x = (e.clientX - rect.left) / rect.width - 0.5;
            const y = (e.clientY - rect.top) / rect.height - 0.5;

            productDetailImage.style.transform = 
                'perspective(1000px) rotateY(' + (x * 20) + 'deg) rotateX(' + (-y * 20) + 'deg)';
        });

        productDetailWrapper.addEventListener('mouseleave', function() {
            productDetailImage.style.transform = '';
        });
    }

    /**
     * Color Selection
     */
    const colorButtons = document.querySelectorAll('.product-color-btn');
    
    colorButtons.forEach(function(btn) {
        btn.addEventListener('click', function() {
            colorButtons.forEach(b => b.classList.remove('selected'));
            btn.classList.add('selected');
        });
    });

    /**
     * Profile Tab Navigation
     */
    const profileMenuItems = document.querySelectorAll('.profile-menu-item');
    const profileContents = document.querySelectorAll('.profile-tab-content');

    profileMenuItems.forEach(function(item) {
        item.addEventListener('click', function() {
            const targetTab = item.dataset.tab;

            profileMenuItems.forEach(m => m.classList.remove('active'));
            item.classList.add('active');

            profileContents.forEach(function(content) {
                if (content.dataset.tab === targetTab) {
                    content.style.display = 'block';
                } else {
                    content.style.display = 'none';
                }
            });
        });
    });

    /**
     * Search Functionality
     */
    const searchInput = document.querySelector('.search-input');
    
    if (searchInput) {
        let searchTimeout;
        
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            
            searchTimeout = setTimeout(function() {
                const query = searchInput.value.toLowerCase();
                const products = document.querySelectorAll('.product-card');
                
                products.forEach(function(product) {
                    const title = product.querySelector('.product-title');
                    if (title) {
                        const titleText = title.textContent.toLowerCase();
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

    /**
     * Add to Cart Animation
     */
    document.querySelectorAll('.add-to-cart').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            
            const productId = btn.dataset.productId;
            
            // Add animation class
            btn.classList.add('adding');
            
            // Simulate adding to cart
            setTimeout(function() {
                btn.classList.remove('adding');
                showToast('محصول به سبد خرید اضافه شد', 'success');
            }, 500);
        });
    });

})();
