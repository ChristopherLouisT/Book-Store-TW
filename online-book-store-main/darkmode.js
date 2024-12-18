/*Dark mode*/
document.addEventListener('DOMContentLoaded', () => {
    const darkModeToggle = document.getElementById('darkModeToggle');
    const body = document.body;
    const navbar = document.querySelector('.navbar');

    if (localStorage.getItem('dark-mode') === 'enabled') {
        enableDarkMode();
    }

    darkModeToggle.addEventListener('click', () => {
        if (body.classList.contains('dark-mode')) {
            disableDarkMode();
        } else {
            enableDarkMode();
        }
    });

    function enableDarkMode() {
        body.classList.add('dark-mode');
        navbar.classList.add('dark-mode');
        document.querySelectorAll('.card').forEach(card => card.classList.add('dark-mode'));
        document.querySelectorAll('table').forEach(table => table.classList.add('dark-mode'));
        document.querySelectorAll('.alink').forEach(alink => alink.classList.add('dark-mode'));
        document.querySelectorAll('.list-group-item').forEach(item => item.classList.add('dark-mode'));
        document.querySelectorAll('.book-popup').forEach(popup => popup.classList.add('dark-mode'));
        localStorage.setItem('dark-mode', 'enabled');
        darkModeToggle.textContent = 'Light Mode';
    }

    function disableDarkMode() {
        body.classList.remove('dark-mode');
        navbar.classList.remove('dark-mode');
        document.querySelectorAll('.card').forEach(card => card.classList.remove('dark-mode'));
        document.querySelectorAll('.list-group-item').forEach(item => item.classList.remove('dark-mode'));
        document.querySelectorAll('.book-popup').forEach(popup => popup.classList.remove('dark-mode'));
        localStorage.setItem('dark-mode', 'disabled');
        darkModeToggle.textContent = 'Dark Mode';
    }
});
