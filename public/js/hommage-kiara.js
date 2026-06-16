document.addEventListener('DOMContentLoaded', () => {
    const tribute = document.getElementById('kiaraTribute');

    if (!tribute) return;

    const closeButton = document.getElementById('kiaraTributeClose');
    const enterButton = document.getElementById('kiaraTributeEnter');
    const rememberCheckbox = document.getElementById('kiaraTributeRemember');
    const slides = Array.from(tribute.querySelectorAll('.kiara-tribute__image'));

    const alreadyHidden = localStorage.getItem('kiaraTributeHidden');

    if (!alreadyHidden) {
        setTimeout(() => {
            tribute.classList.add('is-visible');
            tribute.setAttribute('aria-hidden', 'false');
            document.body.classList.add('kiara-tribute-open');
        }, 300);
    }

    let currentSlide = 0;
    let touchStartY = null;
    let hasClosedByScroll = false;

    function showNextSlide() {
        if (slides.length <= 1) return;

        slides[currentSlide].classList.remove('is-active');

        currentSlide = (currentSlide + 1) % slides.length;

        slides[currentSlide].classList.add('is-active');
    }

    const slideInterval = setInterval(showNextSlide, 4200);

    function closeTribute() {
        tribute.classList.remove('is-visible');
        tribute.classList.add('is-hidden');
        tribute.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('kiara-tribute-open');

        if (rememberCheckbox && rememberCheckbox.checked) {
            localStorage.setItem('kiaraTributeHidden', 'true');
        }
    }

    closeButton?.addEventListener('click', closeTribute);
    enterButton?.addEventListener('click', closeTribute);

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && tribute.classList.contains('is-visible')) {
            closeTribute();
        }
    });

    tribute.addEventListener('wheel', (event) => {
        if (!tribute.classList.contains('is-visible')) return;

        if (event.deltaY > 35 && !hasClosedByScroll) {
            hasClosedByScroll = true;
            closeTribute();
        }
    }, { passive: true });

    tribute.addEventListener('touchstart', (event) => {
        touchStartY = event.touches[0].clientY;
    }, { passive: true });

    tribute.addEventListener('touchmove', (event) => {
        if (touchStartY === null || hasClosedByScroll) return;

        const currentY = event.touches[0].clientY;
        const distance = currentY - touchStartY;

        if (distance > 70) {
            hasClosedByScroll = true;
            closeTribute();
        }
    }, { passive: true });

    window.addEventListener('beforeunload', () => {
        clearInterval(slideInterval);
    });
});
