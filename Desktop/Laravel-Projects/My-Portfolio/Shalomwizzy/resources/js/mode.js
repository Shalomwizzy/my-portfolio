document.addEventListener('DOMContentLoaded', function() {
    var body = document.getElementById('body');
    var navbar = document.querySelector('.navbar');
    var toggleDarkModeButton = document.getElementById('toggle-dark-mode');

    var isDarkMode = localStorage.getItem('darkMode') === 'enabled';

    // Toggle dark mode on page load if it was enabled
    if (isDarkMode) {
        body.classList.add('dark-mode');
        navbar.classList.add('dark-mode-navbar');
    }

    toggleDarkModeButton.innerHTML = isDarkMode ? '<i class="fas fa-moon"></i>' : '<i class="fas fa-sun"></i>';

    toggleDarkModeButton.addEventListener('click', function() {
        isDarkMode = !isDarkMode;
        body.classList.toggle('dark-mode', isDarkMode);
        navbar.classList.toggle('dark-mode-navbar', isDarkMode);

        // Add logic for light mode
        body.classList.toggle('light-mode', !isDarkMode);
        navbar.classList.toggle('light-mode-navbar', !isDarkMode);

        toggleDarkModeButton.innerHTML = isDarkMode ? '<i class="fas fa-moon"></i>' : '<i class="fas fa-sun"></i>';

        localStorage.setItem('darkMode', isDarkMode ? 'enabled' : 'disabled');
    });
});





