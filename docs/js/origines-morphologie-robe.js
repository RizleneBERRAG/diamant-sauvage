document.addEventListener('DOMContentLoaded', () => {
    const reveals = document.querySelectorAll('.bengal-reveal');

    if (!reveals.length) {
        return;
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.16
    });

    reveals.forEach((element) => {
        observer.observe(element);
    });
});

