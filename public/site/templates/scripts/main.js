document.addEventListener('DOMContentLoaded', function () {
    const dropdownIcon = document.getElementById('dropdown-icon');
    const accordion = document.querySelector('.accordion');
    const menuButton = document.querySelector('.overlap-group-2');

    // Set initial styles for the arrow icon and menu button
    dropdownIcon.style.paddingTop = '13px';
    dropdownIcon.style.paddingLeft = '62px';

    menuButton.addEventListener('click', function () {
        const information = document.querySelector('.information');
        const services = document.querySelector('.services');
        const separator = document.querySelector('.separator');

        // Toggle the visibility of information, services, and separator
        information.classList.toggle('visible');
        services.classList.toggle('visible');
        separator.classList.toggle('visible');

        // Toggle the icon based on the visibility of information
        if (information.classList.contains('visible')) {
            dropdownIcon.classList.replace('bxs-chevron-down', 'bxs-chevron-up');
            accordion.style.backgroundColor = '#f6f6f6'; // Change background color when menu is open
            menuButton.style.backgroundColor = '#f6f6f6'; // Change menu button background color
        } else {
            dropdownIcon.classList.replace('bxs-chevron-up', 'bxs-chevron-down');
            accordion.style.backgroundColor = '#ffffff'; // Reset to white when menu is closed
            menuButton.style.backgroundColor = '#ffffff'; // Reset menu button background color
        }
    });
});
