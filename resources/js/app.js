const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

document.addEventListener('DOMContentLoaded', () => {
    const revealElements = document.querySelectorAll('.reveal');

    if ('IntersectionObserver' in window && revealElements.length > 0) {
        const revealObserver = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    entry.target.classList.toggle('is-visible', entry.isIntersecting);
                });
            },
            { threshold: 0.1, rootMargin: '0px 0px -6% 0px' },
        );

        revealElements.forEach((element) => revealObserver.observe(element));
    } else {
        revealElements.forEach((element) => element.classList.add('is-visible'));
    }

    const counters = document.querySelectorAll('[data-counter]');

    if (counters.length > 0) {
        const runCounter = (element) => {
            const target = Number(element.dataset.counter || 0);
            const suffix = element.dataset.suffix || '';

            if (prefersReducedMotion) {
                element.textContent = `${target}${suffix}`;

                return;
            }

            const start = performance.now();
            const duration = 1600;

            const tick = (now) => {
                const progress = Math.min((now - start) / duration, 1);
                const eased = 1 - Math.pow(1 - progress, 3);

                element.textContent = `${Math.round(target * eased)}${suffix}`;

                if (progress < 1) {
                    requestAnimationFrame(tick);
                } else {
                    element.textContent = `${target}${suffix}`;
                }
            };

            requestAnimationFrame(tick);
        };

        const counterObserver = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        runCounter(entry.target);
                        counterObserver.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.35 },
        );

        counters.forEach((counter) => {
            counter.textContent = `0${counter.dataset.suffix || ''}`;
            counterObserver.observe(counter);
        });
    }

    const slider = document.querySelector('[data-hero-slider]');

    if (slider) {
        const slides = Array.from(slider.querySelectorAll('[data-slide]'));
        const dots = Array.from(slider.querySelectorAll('[data-dot]'));
        let currentSlide = 0;
        let autoplay;

        const showSlide = (index) => {
            currentSlide = (index + slides.length) % slides.length;

            slides.forEach((slide, slideIndex) => {
                const isActive = slideIndex === currentSlide;
                slide.classList.toggle('is-active', isActive);
                slide.toggleAttribute('inert', !isActive);
                slide.setAttribute('aria-hidden', isActive ? 'false' : 'true');
            });

            dots.forEach((dot, dotIndex) => {
                const isActive = dotIndex === currentSlide;
                dot.classList.toggle('is-active', isActive);
                dot.setAttribute('aria-pressed', isActive ? 'true' : 'false');
            });
        };

        const stopAutoplay = () => window.clearInterval(autoplay);

        const startAutoplay = () => {
            stopAutoplay();

            if (prefersReducedMotion) {
                return;
            }

            autoplay = window.setInterval(() => showSlide(currentSlide + 1), 7000);
        };

        slider.querySelectorAll('[data-hero-next]').forEach((button) => {
            button.addEventListener('click', () => {
                showSlide(currentSlide + 1);
                startAutoplay();
            });
        });

        slider.querySelectorAll('[data-hero-prev]').forEach((button) => {
            button.addEventListener('click', () => {
                showSlide(currentSlide - 1);
                startAutoplay();
            });
        });

        dots.forEach((dot) => {
            dot.addEventListener('click', () => {
                showSlide(Number(dot.dataset.index));
                startAutoplay();
            });
        });

        slider.addEventListener('mouseenter', stopAutoplay);
        slider.addEventListener('mouseleave', startAutoplay);
        slider.addEventListener('focusin', stopAutoplay);
        slider.addEventListener('focusout', () => {
            if (!slider.contains(document.activeElement)) {
                startAutoplay();
            }
        });

        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                stopAutoplay();
            } else {
                startAutoplay();
            }
        });

        showSlide(0);
        startAutoplay();
    }

    const header = document.querySelector('[data-header]');
    const progressBar = document.querySelector('#scroll-progress');
    const backToTop = document.querySelector('#back-to-top');

    const handleScroll = () => {
        const scrollTop = window.scrollY;

        if (header) {
            header.classList.toggle('is-scrolled', scrollTop > 12);
        }

        if (progressBar) {
            const scrollable = document.documentElement.scrollHeight - window.innerHeight;
            progressBar.style.width = `${scrollable > 0 ? (scrollTop / scrollable) * 100 : 0}%`;
        }

        if (backToTop) {
            backToTop.classList.toggle('is-visible', scrollTop > 620);
        }
    };

    window.addEventListener('scroll', handleScroll, { passive: true });
    handleScroll();

    if (backToTop) {
        backToTop.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: prefersReducedMotion ? 'auto' : 'smooth' });
        });
    }

    const menuToggle = document.querySelector('[data-mobile-toggle]');
    const mobileMenu = document.querySelector('[data-mobile-menu]');

    if (menuToggle && mobileMenu) {
        const openIcon = menuToggle.querySelector('[data-icon-open]');
        const closeIcon = menuToggle.querySelector('[data-icon-close]');

        const setMenuOpen = (open) => {
            menuToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
            mobileMenu.classList.toggle('is-open', open);
            openIcon?.classList.toggle('hidden', open);
            closeIcon?.classList.toggle('hidden', !open);
        };

        menuToggle.addEventListener('click', () => {
            setMenuOpen(menuToggle.getAttribute('aria-expanded') !== 'true');
        });

        mobileMenu.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', () => setMenuOpen(false));
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) {
                setMenuOpen(false);
            }
        });
    }

    document.querySelectorAll('[data-submit-form]').forEach((form) => {
        form.addEventListener('submit', () => {
            const button = form.querySelector('[type="submit"]');
            const label = button?.querySelector('[data-submit-label]');

            if (button) {
                button.disabled = true;
                button.classList.add('cursor-wait', 'opacity-70');
            }

            if (label) {
                label.textContent = 'Sending...';
            }
        });
    });

    const formFeedback = document.querySelector('[data-success], [data-form-errors]');

    if (formFeedback) {
        window.setTimeout(() => {
            const offset = formFeedback.getBoundingClientRect().top + window.scrollY - 150;

            window.scrollTo({ top: offset, behavior: prefersReducedMotion ? 'auto' : 'smooth' });
        }, 120);
    }
});
