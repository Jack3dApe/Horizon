document.addEventListener('DOMContentLoaded', function () {
    const genresContainer = document.getElementById('genres-container');
    const genreSelector = document.getElementById('genre-selector');
    const addGenreButton = document.getElementById('add-genre');

    addGenreButton.addEventListener('click', function () {
        const selectedOption = genreSelector.options[genreSelector.selectedIndex];
        const genreId = selectedOption.value;
        const genreName = selectedOption.getAttribute('data-name');

        if (genreId) {
            if (document.querySelector(`input[type="hidden"][value="${genreId}"]`)) {
                alert('This genre is already added.');
                return;
            }

            const genreGroup = document.createElement('div');
            genreGroup.classList.add('input-group', 'mb-2', 'genre-group');

            genreGroup.innerHTML = `
                <input type="text" class="form-control" value="${genreName}" readonly>
                <input type="hidden" name="genres[]" value="${genreId}">
                <button type="button" class="btn btn-danger remove-genre">
                    <i class="ti ti-minus"></i>
                </button>
            `;

            genresContainer.appendChild(genreGroup);

            genreGroup.querySelector('.remove-genre').addEventListener('click', function () {
                genreGroup.remove();
            });

            genreSelector.selectedIndex = 0;
        }
    });
});
