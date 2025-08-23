const category_headers = document.querySelectorAll('.category-header');

function toggleReports(event) {
    const categoryHeader = event.currentTarget;
    const reportsContainer = categoryHeader.nextElementSibling;
    const arrow = categoryHeader.querySelector('.arrow');

    if (reportsContainer.style.display === 'block') {
        reportsContainer.style.display = 'none';
        arrow.style.transform = 'rotate(0deg)';
        reportsContainer.style.marginBottom = '0px';
    } else {
        reportsContainer.style.display = 'block';
        reportsContainer.style.marginBottom = '15px';
        arrow.style.transform = 'rotate(90deg)';
    }
}

category_headers.forEach(header => {
    header.addEventListener('click', toggleReports);
});
