const modal = document.getElementById('Suchen-modal');
const buttonSearch = document.querySelector('#open-modal');
const buttonClose = modal.querySelector('.close');

buttonSearch.addEventListener('click', () => {
    modal.style.display = 'block';
})

buttonClose.addEventListener('click', () => {
    modal.style.display = 'none';
})

window.addEventListener('click', (event) => {
    if (event.target === modal) {
        modal.style.display = 'none';
    }
})