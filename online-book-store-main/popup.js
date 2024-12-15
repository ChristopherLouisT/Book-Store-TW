document.addEventListener('DOMContentLoaded', () => {
    const bookImages = document.querySelectorAll('.book-card img.card-img-top');

    bookImages.forEach(image => {
        const bookId = image.closest('.book-card').getAttribute('data-id');
        const popup = document.getElementById(`popup-${bookId}`);

        image.addEventListener('click', () => {
            popup.style.display = 'flex';
        });

        popup.addEventListener('click', () => {
            popup.style.display = 'none';
        });
    });
});