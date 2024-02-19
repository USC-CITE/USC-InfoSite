document.addEventListener('DOMContentLoaded', function () {
    const dropdownIcon = document.getElementById('dropdown-icon');
    const accordion = document.querySelector('.accordion');
    const menuButton = document.querySelector('.overlap-group-2');
    const searchLink = document.querySelector('.search-link');
    const searchBar = document.querySelector('.search-bar');
    const information = document.querySelector('.information');
    const services = document.querySelector('.services');
    const separator = document.querySelector('.separator');

    // Set initial styles for the arrow icon and menu button
    dropdownIcon.style.paddingTop = '13px';
    dropdownIcon.style.paddingLeft = '62px';

    // Initially hide the search bar
    searchBar.style.display = 'none';

    // Event listener for clicking the search link
    searchLink.addEventListener('click', function () {
        // Toggle the visibility of the search bar and hide menu contents
        searchBar.style.display = searchBar.style.display === 'none' ? 'block' : 'none';
        information.classList.remove('visible');
        services.classList.remove('visible');
        separator.classList.remove('visible');

        // Toggle the icon and background color based on the visibility of the search bar
        if (searchBar.style.display === 'block') {
            accordion.style.backgroundColor = '#f6f6f6';
            searchLink.style.color = '#f6f6f6';
            // Set background color to #f6f6f6 when search link is clicked
            searchLink.style.backgroundColor = '#f6f6f6';
            // Revert background color of the menu button when search link is clicked
            menuButton.style.backgroundColor = 'transparent';
        } else {
            dropdownIcon.classList.toggle('bxs-chevron-up', false);
            dropdownIcon.classList.toggle('bxs-chevron-down', true);
            accordion.style.backgroundColor = '#ffffff';
            // Revert color of the search link when search bar is closed
            searchLink.style.color = '#ffffff';
            // Revert background color of the search link when search bar is closed
            searchLink.style.backgroundColor = 'transparent';
        }
    });

    // Event listener for clicking the menu button
    menuButton.addEventListener('click', function () {
        information.classList.toggle('visible');
        services.classList.toggle('visible');
        separator.classList.toggle('visible');
        searchBar.style.display = 'none';

        // Toggle the icon and background color based on the visibility of information
        if (information.classList.contains('visible')) {
            dropdownIcon.classList.replace('bxs-chevron-down', 'bxs-chevron-up');
            accordion.style.backgroundColor = '#f6f6f6';
            menuButton.style.backgroundColor = '#f6f6f6';
            searchLink.style.color = '#f6f6f6';
            // Revert background color of the search link when menu button is clicked
            searchLink.style.backgroundColor = 'transparent';
        } else {
            dropdownIcon.classList.replace('bxs-chevron-up', 'bxs-chevron-down');
            accordion.style.backgroundColor = '#ffffff';
            menuButton.style.backgroundColor = '#ffffff';
            // Revert color of the search link when menu is closed
            searchLink.style.color = '#ffffff';
        }
    });
});
