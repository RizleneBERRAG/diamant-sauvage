document.addEventListener('DOMContentLoaded', () => {
    /* =========================
       FEUILLE CSS AVIS — CHARGEMENT SÛR
    ========================= */

    if (!document.querySelector('link[href*="contact-reviews.css"]')) {
        const reviewStylesheet = document.createElement('link');
        reviewStylesheet.rel = 'stylesheet';
        reviewStylesheet.href = '/css/contact-reviews.css';
        document.head.appendChild(reviewStylesheet);
    }

    /* =========================
       ANIMATION AU SCROLL
    ========================= */

    const revealItems = document.querySelectorAll('.contact-reveal');

    if (revealItems.length) {
        if ('IntersectionObserver' in window) {
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
        } else {
            revealItems.forEach((item) => item.classList.add('is-visible'));
        }
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
       FORMULAIRE — FOCUS PREMIUM
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
       ICÔNES CONTACT — MOBILE
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

    /* =========================
       AVIS GOOGLE — MODAL PREMIUM
    ========================= */

    const reviewModal = document.getElementById('reviewModal');
    const reviewModalAvatar = document.getElementById('reviewModalAvatar');
    const reviewModalName = document.getElementById('reviewModalName');
    const reviewModalDate = document.getElementById('reviewModalDate');
    const reviewModalStars = document.getElementById('reviewModalStars');
    const reviewModalText = document.getElementById('reviewModalText');

    const getStars = (rating) => {
        const score = Math.max(0, Math.min(5, Number(rating) || 5));
        let stars = '';

        for (let i = 1; i <= 5; i++) {
            stars += i <= score ? '★' : '☆';
        }

        return stars;
    };

    const openReviewModal = (button) => {
        if (
            !reviewModal ||
            !reviewModalAvatar ||
            !reviewModalName ||
            !reviewModalDate ||
            !reviewModalStars ||
            !reviewModalText
        ) {
            return;
        }

        const name = button.dataset.name || 'Avis Google';
        const date = button.dataset.date || '';
        const rating = button.dataset.rating || 5;
        const text = button.dataset.text || '';

        reviewModalAvatar.textContent = name.charAt(0).toUpperCase();
        reviewModalName.textContent = name;
        reviewModalDate.textContent = date;
        reviewModalStars.textContent = getStars(rating);
        reviewModalText.textContent = text;

        reviewModal.classList.add('is-open');
        reviewModal.setAttribute('aria-hidden', 'false');
        document.body.classList.add('modal-open');
    };

    const closeReviewModal = () => {
        if (!reviewModal) {
            return;
        }

        reviewModal.classList.remove('is-open');
        reviewModal.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('modal-open');
    };

    document.querySelectorAll('.static-review-open').forEach((button) => {
        button.addEventListener('click', () => {
            openReviewModal(button);
        });
    });

    document.querySelectorAll('[data-review-close]').forEach((button) => {
        button.addEventListener('click', closeReviewModal);
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && reviewModal?.classList.contains('is-open')) {
            closeReviewModal();
        }
    });
});
