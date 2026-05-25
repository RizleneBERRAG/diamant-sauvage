document.addEventListener('DOMContentLoaded', () => {

    /* =========================
       Reveal au scroll
    ========================= */

    const revealElements = document.querySelectorAll('.reveal-up, .reveal-scale');

    if (revealElements.length) {
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.16
        });

        revealElements.forEach((element) => {
            revealObserver.observe(element);
        });
    }

    /* =========================
       Smart images
    ========================= */

    const smartImages = document.querySelectorAll('.smart-image');

    smartImages.forEach((frame) => {
        const img = frame.querySelector('img');

        if (!img) return;

        const applySmartFit = () => {
            if (!img.naturalWidth || !img.naturalHeight || !frame.clientWidth || !frame.clientHeight) {
                return;
            }

            frame.style.setProperty('--smart-img', `url("${img.currentSrc || img.src}")`);

            const frameRatio = frame.clientWidth / frame.clientHeight;
            const imageRatio = img.naturalWidth / img.naturalHeight;

            const isSmall =
                img.naturalWidth < frame.clientWidth * 1.15 ||
                img.naturalHeight < frame.clientHeight * 1.15;

            const isVeryDifferentRatio = Math.abs(frameRatio - imageRatio) > 0.55;

            frame.classList.remove('is-cover', 'is-contain');

            if (isSmall || isVeryDifferentRatio) {
                frame.classList.add('is-contain');
            } else {
                frame.classList.add('is-cover');
            }
        };

        if (img.complete) {
            applySmartFit();
        } else {
            img.addEventListener('load', applySmartFit, { once: true });
        }

        window.addEventListener('resize', applySmartFit);
    });

    /* =========================
       Interactions desktop uniquement
    ========================= */

    const canHover = window.matchMedia('(hover: hover) and (pointer: fine)').matches;
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (canHover && !prefersReducedMotion) {
        const tiltCards = document.querySelectorAll('.tilt-card');

        tiltCards.forEach((card) => {
            card.addEventListener('mousemove', (event) => {
                const rect = card.getBoundingClientRect();

                const x = event.clientX - rect.left;
                const y = event.clientY - rect.top;

                const centerX = rect.width / 2;
                const centerY = rect.height / 2;

                const rotateX = ((y - centerY) / centerY) * -5;
                const rotateY = ((x - centerX) / centerX) * 5;

                card.style.transform = `perspective(900px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-6px)`;
            });

            card.addEventListener('mouseleave', () => {
                card.style.transform = '';
            });
        });

        const magneticButtons = document.querySelectorAll('.magnetic-btn');

        magneticButtons.forEach((button) => {
            button.addEventListener('mousemove', (event) => {
                const rect = button.getBoundingClientRect();

                const x = event.clientX - rect.left - rect.width / 2;
                const y = event.clientY - rect.top - rect.height / 2;

                button.style.transform = `translate(${x * 0.14}px, ${y * 0.22}px)`;
            });

            button.addEventListener('mouseleave', () => {
                button.style.transform = '';
            });
        });
    }

    /* =========================
       Galerie mobile auto + swipe manuel
    ========================= */

    const slider = document.querySelector('.home-gallery .gallery-masonry');

    if (slider) {
        const mobileQuery = window.matchMedia('(max-width: 760px)');

        let interval = null;
        let resumeTimer = null;
        let isPaused = false;

        const getSlides = () => {
            return Array.from(slider.querySelectorAll('.gallery-photo'));
        };

        const getCurrentIndex = () => {
            const slides = getSlides();

            let closestIndex = 0;
            let closestDistance = Infinity;

            slides.forEach((slide, index) => {
                const distance = Math.abs(slide.offsetLeft - slider.scrollLeft);

                if (distance < closestDistance) {
                    closestDistance = distance;
                    closestIndex = index;
                }
            });

            return closestIndex;
        };

        const goToSlide = (index) => {
            const slides = getSlides();

            if (!slides.length || !slides[index]) return;

            slider.scrollTo({
                left: slides[index].offsetLeft - 14,
                behavior: 'smooth'
            });
        };

        const goToNextSlide = () => {
            if (!mobileQuery.matches || isPaused) return;

            const slides = getSlides();

            if (!slides.length) return;

            const currentIndex = getCurrentIndex();
            const nextIndex = currentIndex >= slides.length - 1 ? 0 : currentIndex + 1;

            goToSlide(nextIndex);
        };

        const startAutoSlider = () => {
            clearInterval(interval);

            if (mobileQuery.matches && !prefersReducedMotion) {
                interval = setInterval(goToNextSlide, 1800);
            }
        };

        const pauseSlider = () => {
            isPaused = true;
            clearTimeout(resumeTimer);
        };

        const resumeSliderLater = () => {
            clearTimeout(resumeTimer);

            resumeTimer = setTimeout(() => {
                isPaused = false;
            }, 1200);
        };

        slider.addEventListener('touchstart', pauseSlider, { passive: true });
        slider.addEventListener('touchend', resumeSliderLater);
        slider.addEventListener('pointerdown', pauseSlider);
        slider.addEventListener('pointerup', resumeSliderLater);
        slider.addEventListener('pointercancel', resumeSliderLater);

        if (mobileQuery.addEventListener) {
            mobileQuery.addEventListener('change', startAutoSlider);
        } else {
            mobileQuery.addListener(startAutoSlider);
        }

        startAutoSlider();
    }
});
