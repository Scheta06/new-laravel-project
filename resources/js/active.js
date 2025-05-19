const adminBtn = document.querySelector('.admin-choose-action-btn');
const chooseList = document.querySelector('.admin-choose-action-list');
const img = document.querySelector('img');

adminBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    chooseList.classList.toggle('active');
});

document.addEventListener('click', () => {
    chooseList.classList.remove('active');
});

chooseList.addEventListener('click', (e) => {
    e.stopPropagation();
});
