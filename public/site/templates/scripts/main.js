document.addEventListener('DOMContentLoaded', function () {
    const headerAccordCont = document.querySelector('[data-js=header_accord_container]');
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
            headerAccordCont.style.borderBottom = "3px solid #D9D4D7";
            searchForm.classList.add('visible');

            // Set background color to #f6f6f6 when search link is clicked
            searchBtn.classList.add('selected');
            // Revert background color of the menu button when search link is clicked
            menuIcon.style.transform = 'none';
            menuBtn.classList.remove('selected');
        } else {
            headerAccordCont.style.borderBottom = "none";
            headerAccord.classList.remove('header_accord--search');
            searchForm.classList.remove('visible');

            // Revert background color of the search link when search bar is closed
            searchBtn.classList.remove('selected');
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
            headerAccordCont.style.borderBottom = "3px solid #D9D4D7";
            infoMenu.classList.add('visible');
            srvcsMenu.classList.add('visible');

            menuIcon.style.transform = 'rotate(-180deg)';
            menuBtn.classList.add('selected');
            // Revert background color of the search link when menu button is clicked
            searchBtn.classList.remove('selected');
        } else {
            headerAccordCont.style.borderBottom = "none";
            headerAccord.classList.remove('header_accord--menu');
            infoMenu.classList.remove('visible');
            srvcsMenu.classList.remove('visible');

            menuIcon.style.transform = 'none';
            menuBtn.classList.remove('selected');
        }
    });

    const reportBtn = document.querySelector('.main__report');
    const reportFrm = document.querySelector('.report_form');

    reportBtn.setAttribute('role', 'button');

    reportBtn.addEventListener('click', function () {
        reportFrm.style.display = "flex";
        this.style.display = "none";
    });

    reportBtn.addEventListener('keydown', function (e) {
        if (e.keyCode === 32 || e.keyCode === 13) { // Space or Enter key
            reportFrm.style.display = "flex";
            reportFrm.focus();
            this.style.display = "none";
        }
    });
});

