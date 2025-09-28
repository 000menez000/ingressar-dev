const clearButton = document.getElementById('clear-filters');
const checkboxes = document.querySelectorAll('#category-body input[type="checkbox"]');
const allCategoriesFilterButton = document.getElementById('all-categories-filter')

clearButton.addEventListener('click', () => {
    checkboxes.forEach(cb => cb.checked = false);
});

allCategoriesFilterButton.addEventListener('click', (event) => {
    event.preventDefault();

    checkboxes.forEach(cb => cb.checked = true);
});

