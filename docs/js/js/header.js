document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.querySelector('.ds-menu-toggle');
    const nav = document.querySelector('.ds-nav');
    const dropdowns = document.querySelectorAll('.ds-nav-dropdown');

    if (!toggle || !nav) {
        return;
    }

    const closeDropdowns = () => {
        dropdowns.forEach((dropdown) => {
            const trigger = dropdown.querySelector('.ds-nav-trigger');

            dropdown.classList.remove('is-open');

            if (trigger) {
                trigger.setAttribute('aria-expanded', 'false');
            }
        });
    };

    const openMenu = () => {
        nav.classList.add('is-open');
        toggle.classList.add('is-active');
        toggle.setAttribute('aria-expanded', 'true');
        toggle.setAttribute('aria-label', 'Fermer le menu');
        document.body.classList.add('menu-open');
    };

    const closeMenu = () => {
        nav.classList.remove('is-open');
        toggle.classList.remove('is-active');
        toggle.setAttribute('aria-expanded', 'false');
        toggle.setAttribute('aria-label', 'Ouvrir le menu');
        document.body.classList.remove('menu-open');
        closeDropdowns();
    };

    toggle.addEventListener('click', (event) => {
        event.preventDefault();
        event.stopPropagation();

        if (nav.classList.contains('is-open')) {
            closeMenu();
        } else {
            openMenu();
        }
    });

    dropdowns.forEach((dropdown) => {
        const trigger = dropdown.querySelector('.ds-nav-trigger');

        if (!trigger) {
            return;
        }

        trigger.addEventListener('click', (event) => {
            if (window.innerWidth > 980) {
                return;
            }

            event.preventDefault();
            event.stopPropagation();

            const isOpen = dropdown.classList.contains('is-open');

            dropdowns.forEach((item) => {
                if (item !== dropdown) {
                    item.classList.remove('is-open');

                    const itemTrigger = item.querySelector('.ds-nav-trigger');

                    if (itemTrigger) {
                        itemTrigger.setAttribute('aria-expanded', 'false');
                    }
                }
            });

            dropdown.classList.toggle('is-open', !isOpen);
            trigger.setAttribute('aria-expanded', !isOpen ? 'true' : 'false');
        });
    });

    nav.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', closeMenu);
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closeMenu();
        }
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth > 980) {
            closeMenu();
        }
    });
});
