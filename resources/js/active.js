const adminBtn = document.querySelector('.admin-choose-action-btn');
const chooseList = document.querySelector('.admin-choose-action-list');
const img = document.querySelector('img');
const mobileAdminBtn = document.querySelector('.mobile-admin-choose-action-btn');
const mobileAdminList = document.querySelector('.mobile-admin-choose-action-list');
const body = document.querySelector('#admin-body');

mobileAdminBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    mobileAdminList.classList.toggle('active');
    body.classList.toggle('hidden');
});

adminBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    chooseList.classList.toggle('active');
    mobileAdminList.classList.toggle('active');
});

document.addEventListener('click', () => {
    chooseList.classList.remove('active');
    mobileAdminList.classList.remove('active');
});

chooseList.addEventListener('click', (e) => {
    e.stopPropagation();
});

mobileAdminList.addEventListener('click', (e) => {
    e.stopPropagation();
});
