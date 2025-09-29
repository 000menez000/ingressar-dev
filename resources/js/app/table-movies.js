document.addEventListener('DOMContentLoaded', () => {
    const checkboxAll = document.getElementById('checkbox-all');
    const checkboxes = document.querySelectorAll('.checkbox-row');

    checkboxAll.addEventListener('change', () => {
        checkboxes.forEach(cb => cb.checked = checkboxAll.checked);
    })

})