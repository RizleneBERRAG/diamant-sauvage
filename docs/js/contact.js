document.addEventListener('DOMContentLoaded', function () {
    const revealItems = document.querySelectorAll('.contact-reveal');
    const scrollLinks = document.querySelectorAll('.contact-scroll[href^="#"]');

    /*
    |--------------------------------------------------------------------------
    | Apparitions douces
    |--------------------------------------------------------------------------
    */

    if ('IntersectionObserver' in window && revealItems.length) {
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.12
        });

        revealItems.forEach((item) => {
            revealObserver.observe(item);
        });
    } else {
        revealItems.forEach((item) => {
            item.classList.add('is-visible');
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Scroll doux uniquement pour les liens d'ancrage
    |--------------------------------------------------------------------------
    */

    scrollLinks.forEach((link) => {
        link.addEventListener('click', function (event) {
            const targetId = link.getAttribute('href');

            if (!targetId || targetId === '#') return;

            const target = document.querySelector(targetId);

            if (!target) return;

            event.preventDefault();

            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        });
    });

    /*
    |--------------------------------------------------------------------------
    | Effet focus sur les champs
    |--------------------------------------------------------------------------
    */

    document
        .querySelectorAll('.luxury-contact-form input, .luxury-contact-form textarea, .luxury-contact-form select')
        .forEach((field) => {
            field.addEventListener('focus', function () {
                const label = field.closest('label');

                if (label) {
                    label.classList.add('is-focused');
                }
            });

            field.addEventListener('blur', function () {
                const label = field.closest('label');

                if (label) {
                    label.classList.remove('is-focused');
                }
            });
        });

    /*
    |--------------------------------------------------------------------------
    | Modal avis Google
    |--------------------------------------------------------------------------
    */

    const reviewModal = document.getElementById('reviewModal');
    const reviewOpenButtons = document.querySelectorAll('.static-review-open');
    const reviewCloseButtons = document.querySelectorAll('[data-review-close]');

    const modalAvatar = document.getElementById('reviewModalAvatar');
    const modalName = document.getElementById('reviewModalName');
    const modalDate = document.getElementById('reviewModalDate');
    const modalStars = document.getElementById('reviewModalStars');
    const modalText = document.getElementById('reviewModalText');

    function openReviewModal(button) {
        if (!reviewModal || !button) return;

        const name = button.dataset.name || 'Avis Google';
        const date = button.dataset.date || '';
        const rating = parseInt(button.dataset.rating || '5', 10);
        const text = button.dataset.text || '';

        if (modalAvatar) {
            modalAvatar.textContent = name.charAt(0).toUpperCase();
        }

        if (modalName) {
            modalName.textContent = name;
        }

        if (modalDate) {
            modalDate.textContent = date;
        }

        if (modalStars) {
            modalStars.textContent = '★'.repeat(rating) + '☆'.repeat(Math.max(0, 5 - rating));
        }

        if (modalText) {
            modalText.textContent = text;
        }

        reviewModal.classList.add('is-open');
        reviewModal.setAttribute('aria-hidden', 'false');
        document.body.classList.add('modal-open');
    }

    function closeReviewModal() {
        if (!reviewModal) return;

        reviewModal.classList.remove('is-open');
        reviewModal.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('modal-open');
    }

    reviewOpenButtons.forEach((button) => {
        button.addEventListener('click', function () {
            openReviewModal(button);
        });
    });

    reviewCloseButtons.forEach((button) => {
        button.addEventListener('click', closeReviewModal);
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && reviewModal && reviewModal.classList.contains('is-open')) {
            closeReviewModal();
        }
    });
});
