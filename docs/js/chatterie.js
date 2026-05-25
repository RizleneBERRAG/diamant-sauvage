document.addEventListener('DOMContentLoaded', () => {
    const revealItems = document.querySelectorAll('.cattery-reveal');

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

    document.querySelectorAll('.cattery-scroll').forEach((link) => {
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

    const canHover = window.matchMedia('(hover: hover) and (pointer: fine)').matches;
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (canHover && !prefersReducedMotion) {
        const cards = document.querySelectorAll('.cattery-pillar-card, .cattery-color-card');

        cards.forEach((card) => {
            card.addEventListener('mousemove', (event) => {
                const rect = card.getBoundingClientRect();
                const x = event.clientX - rect.left;
                const y = event.clientY - rect.top;

                const centerX = rect.width / 2;
                const centerY = rect.height / 2;

                const rotateX = ((y - centerY) / centerY) * -3;
                const rotateY = ((x - centerX) / centerX) * 3;

                card.style.transform = `perspective(900px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-6px)`;
            });

            card.addEventListener('mouseleave', () => {
                card.style.transform = '';
            });
        });
    }

    const heroVideoSection = document.querySelector('.cattery-hero-video');
    const heroVideo = document.querySelector('.js-cattery-hero-video');

    if (heroVideoSection && heroVideo) {
        heroVideo.muted = true;
        heroVideo.setAttribute('muted', '');
        heroVideo.setAttribute('playsinline', '');
        heroVideo.setAttribute('webkit-playsinline', '');

        const showFallback = () => {
            heroVideoSection.classList.remove('is-video-playing');
            heroVideoSection.classList.add('is-video-fallback');
        };

        const showVideo = () => {
            heroVideoSection.classList.remove('is-video-fallback');
            heroVideoSection.classList.add('is-video-playing');
        };

        const tryPlayVideo = () => {
            const playPromise = heroVideo.play();

            if (playPromise !== undefined) {
                playPromise
                    .then(showVideo)
                    .catch(showFallback);
            }
        };

        heroVideo.addEventListener('canplay', tryPlayVideo, { once: true });
        heroVideo.addEventListener('playing', showVideo);
        heroVideo.addEventListener('error', showFallback);

        tryPlayVideo();
    }

    const spaceSliders = document.querySelectorAll('[data-cattery-slider]');

    spaceSliders.forEach((slider) => {
        const track = slider.querySelector('.cattery-space-track');
        const slides = slider.querySelectorAll('.cattery-space-slide');
        const prevButton = slider.querySelector('.cattery-slider-prev');
        const nextButton = slider.querySelector('.cattery-slider-next');
        const dotsContainer = slider.querySelector('.cattery-slider-dots');

        if (!track || slides.length <= 1 || !dotsContainer) {
            if (prevButton) prevButton.style.display = 'none';
            if (nextButton) nextButton.style.display = 'none';
            return;
        }

        let currentIndex = 0;
        let autoplayId = null;
        let startX = 0;
        let currentX = 0;
        let isDragging = false;

        slides.forEach((_, index) => {
            const dot = document.createElement('button');
            dot.type = 'button';
            dot.setAttribute('aria-label', `Voir lâ€™image ${index + 1}`);

            if (index === 0) {
                dot.classList.add('is-active');
            }

            dot.addEventListener('click', () => {
                goToSlide(index);
                restartAutoplay();
            });

            dotsContainer.appendChild(dot);
        });

        const dots = dotsContainer.querySelectorAll('button');

        const updateSlider = () => {
            track.style.transform = `translateX(-${currentIndex * 100}%)`;

            dots.forEach((dot, index) => {
                dot.classList.toggle('is-active', index === currentIndex);
            });
        };

        const goToSlide = (index) => {
            currentIndex = (index + slides.length) % slides.length;
            updateSlider();
        };

        const nextSlide = () => {
            goToSlide(currentIndex + 1);
        };

        const prevSlide = () => {
            goToSlide(currentIndex - 1);
        };

        const startAutoplay = () => {
            stopAutoplay();
            autoplayId = setInterval(nextSlide, 4200);
        };

        const stopAutoplay = () => {
            if (autoplayId) {
                clearInterval(autoplayId);
                autoplayId = null;
            }
        };

        const restartAutoplay = () => {
            stopAutoplay();
            startAutoplay();
        };

        if (nextButton) {
            nextButton.addEventListener('click', () => {
                nextSlide();
                restartAutoplay();
            });
        }

        if (prevButton) {
            prevButton.addEventListener('click', () => {
                prevSlide();
                restartAutoplay();
            });
        }

        slider.addEventListener('mouseenter', stopAutoplay);
        slider.addEventListener('mouseleave', startAutoplay);

        slider.addEventListener('touchstart', (event) => {
            startX = event.touches[0].clientX;
            currentX = startX;
            isDragging = true;
            stopAutoplay();
        }, { passive: true });

        slider.addEventListener('touchmove', (event) => {
            if (!isDragging) return;
            currentX = event.touches[0].clientX;
        }, { passive: true });

        slider.addEventListener('touchend', () => {
            if (!isDragging) return;

            const diff = startX - currentX;

            if (Math.abs(diff) > 45) {
                if (diff > 0) {
                    nextSlide();
                } else {
                    prevSlide();
                }
            }

            isDragging = false;
            restartAutoplay();
        });

        startAutoplay();
    });
});

