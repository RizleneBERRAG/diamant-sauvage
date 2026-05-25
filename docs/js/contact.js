document.addEventListener('DOMContentLoaded', () => {
    /* =========================
       ANIMATION AU SCROLL
    ========================= */

    const revealItems = document.querySelectorAll('.contact-reveal');

    if (revealItems.length) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.14
        });

        revealItems.forEach((item) => observer.observe(item));
    }

    /* =========================
       SCROLL DOUX
    ========================= */

    document.querySelectorAll('.contact-scroll').forEach((link) => {
        link.addEventListener('click', (event) => {
            const href = link.getAttribute('href');

            if (!href || !href.startsWith('#')) {
                return;
            }

            const target = document.querySelector(href);

            if (!target) {
                return;
            }

            event.preventDefault();

            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        });
    });

    /* =========================
       FORMULAIRE â€” FOCUS PREMIUM
    ========================= */

    const formFields = document.querySelectorAll(
        '.luxury-contact-form input, .luxury-contact-form textarea, .luxury-contact-form select'
    );

    formFields.forEach((field) => {
        const label = field.closest('label');

        field.addEventListener('focus', () => {
            if (label) {
                label.classList.add('is-focused');
            }
        });

        field.addEventListener('blur', () => {
            if (label) {
                label.classList.remove('is-focused');
            }
        });
    });

    /* =========================
       EFFET ICÃ”NES CONTACT MOBILE
    ========================= */

    const contactIcons = document.querySelectorAll('.contact-link-icon');

    contactIcons.forEach((icon) => {
        icon.addEventListener('touchstart', () => {
            icon.classList.add('is-touched');
        }, { passive: true });

        icon.addEventListener('touchend', () => {
            setTimeout(() => {
                icon.classList.remove('is-touched');
            }, 220);
        });
    });
});

