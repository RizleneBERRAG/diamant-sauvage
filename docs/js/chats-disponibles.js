const filterButtons = document.querySelectorAll('.filter-btn');
const kittenCards = document.querySelectorAll('.kitten-card');

filterButtons.forEach((button) => {
    button.addEventListener('click', () => {
        const filter = button.dataset.filter;

        filterButtons.forEach((btn) => btn.classList.remove('active'));
        button.classList.add('active');

        kittenCards.forEach((card) => {
            const status = card.dataset.status;

            if (filter === 'all' || status === filter) {
                card.classList.remove('is-hidden');
            } else {
                card.classList.add('is-hidden');
            }
        });
    });
});

