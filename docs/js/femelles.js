const femaleModal = document.getElementById('femaleModal');
const femaleButtons = document.querySelectorAll('.female-more');

const modalName = document.getElementById('modalName');
const modalRobe = document.getElementById('modalRobe');
const modalStatus = document.getElementById('modalStatus');
const modalTests = document.getElementById('modalTests');
const modalCharacter = document.getElementById('modalCharacter');
const modalDescription = document.getElementById('modalDescription');

femaleButtons.forEach((button) => {
    button.addEventListener('click', () => {
        const card = button.closest('.female-card');

        modalName.textContent = card.dataset.name;
        modalRobe.textContent = card.dataset.robe;
        modalStatus.textContent = card.dataset.status;
        modalTests.textContent = card.dataset.tests;
        modalCharacter.textContent = card.dataset.character;
        modalDescription.textContent = card.dataset.description;

        femaleModal.classList.add('is-open');
        femaleModal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    });
});

document.querySelectorAll('[data-close="true"]').forEach((element) => {
    element.addEventListener('click', () => {
        femaleModal.classList.remove('is-open');
        femaleModal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    });
});

document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && femaleModal.classList.contains('is-open')) {
        femaleModal.classList.remove('is-open');
        femaleModal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    }
});

