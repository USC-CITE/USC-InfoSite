document.addEventListener('DOMContentLoaded', function () {
    const headerAccord = document.querySelector('[data-js=header_accord]');

    const menuIcon = document.querySelector('[data-js=menu_btn_icon]');
    const menuBtn = document.querySelector('[data-js=menu_btn]');

    const infoMenu = document.querySelector('[data-js=info_menu]');
    const srvcsMenu = document.querySelector('[data-js=srvcs_menu]');

    const searchBtn = document.querySelector('[data-js=search_btn]');
    const searchForm = document.querySelector('[data-js=search_form]');

    menuBtn.setAttribute('role', 'button');
    searchBtn.setAttribute('role', 'button');

    // Event listener for clicking the search link
    searchBtn.addEventListener('click', function (e) {
        e.preventDefault();
        // Toggle the visibility of the search bar and hide menu contents
        infoMenu.classList.remove('visible');
        srvcsMenu.classList.remove('visible');

        headerAccord.classList.remove('header_accord--menu');
        headerAccord.classList.add('header_accord--search');

        // Toggle the icon and background color based on the visibility of the search bar
        if (!searchForm.classList.contains('visible')) {
            searchForm.classList.add('visible');

            // Set background color to #f6f6f6 when search link is clicked
            searchBtn.style.backgroundColor = '#f6f6f6';
            // Revert background color of the menu button when search link is clicked
            menuIcon.style.transform = 'none';
            menuBtn.style.backgroundColor = '#ffffff';
        } else {
            headerAccord.classList.remove('header_accord--search');
            searchForm.classList.remove('visible');

            // Revert background color of the search link when search bar is closed
            searchBtn.style.backgroundColor = '#ffffff';
        }
    });

    // Event listener for clicking the menu button
    menuBtn.addEventListener('click', function (e) {
        e.preventDefault();
        headerAccord.classList.add('header_accord--menu');
        headerAccord.classList.remove('header_accord--search');
        searchForm.classList.remove('visible');

        // Toggle the icon and background color based on the visibility of infoMenu
        if (!infoMenu.classList.contains('visible')) {
            infoMenu.classList.add('visible');
            srvcsMenu.classList.add('visible');

            menuIcon.style.transform = 'rotate(-180deg)';
            menuBtn.style.backgroundColor = '#f6f6f6';
            // Revert background color of the search link when menu button is clicked
            searchBtn.style.backgroundColor = '#ffffff';
        } else {
            headerAccord.classList.remove('header_accord--menu');
            infoMenu.classList.remove('visible');
            srvcsMenu.classList.remove('visible');

            menuIcon.style.transform = 'none';
            menuBtn.style.backgroundColor = '#ffffff';
        }
    });
});

const reportBtn = document.querySelector('.main__report');
const reportFrm = document.querySelector('.report_form');

reportBtn.addEventListener('click', function () {
    reportFrm.style.display = 'flex';
    this.style.display = 'none';
});

// Cookies Banner
document.addEventListener('DOMContentLoaded', function () {
    localStorage.removeItem('cookiesChoice');
    const dialog = document.querySelector('[data-js-cookies-dialog]');
    const acceptBtn = document.querySelector('[data-js-cookies-accept]');
    const denyBtn = document.querySelector('[data-js-cookies-deny]');
    let overlay;

    // Show only if the user hasn’t made a choice
    if (!localStorage.getItem('cookiesChoice')) {
        if (typeof dialog.showModal === 'function') {
            dialog.showModal();
        } else {
            // Fallback for browsers that don't support <dialog>
            dialog.classList.add('cookies-banner--fallback');
            dialog.style.display = 'block';

            // Create overlay dynamically
            overlay = document.createElement('div');
            overlay.className = 'cookies-banner__overlay';
            document.body.appendChild(overlay);
        }
    }

    function closeDialog() {
        localStorage.setItem('cookiesChoice', this.dataset.choice);

        if (typeof dialog.close === 'function') {
            dialog.close();
        } else {
            dialog.style.display = 'none';
            if (overlay) {
                document.body.removeChild(overlay);
            }
        }
    }

    acceptBtn.dataset.choice = 'accepted';
    denyBtn.dataset.choice = 'denied';

    acceptBtn.addEventListener('click', closeDialog);
    denyBtn.addEventListener('click', closeDialog);
});
