document.getElementById('subject').addEventListener('change', filterQuests);
document.getElementById('difficulty').addEventListener('change', filterQuests);

function filterQuests() {
    const subjectFilter = document.getElementById('subject').value;
    const difficultyFilter = document.getElementById('difficulty').value;

    const questCards = document.querySelectorAll('.quest-card');

    questCards.forEach(card => {
        const questCategory = card.getAttribute('data-category');
        const questDifficulty = card.getAttribute('data-difficulty');

        if (
            (subjectFilter === 'all' || subjectFilter === questCategory) &&
            (difficultyFilter === 'all' || difficultyFilter === questDifficulty)
        ) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}
