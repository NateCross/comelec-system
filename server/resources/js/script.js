// Buttons
const userButton = document.querySelector('#user-btn')
const seeMoreButton = document.querySelector('#see-more-btn');

// Icons
const seeMoreAngleUp = document.querySelector('#see-more-angle');
const userAngleUp = document.querySelector('#user-angle');

// Exit Buttons
const modalExitButton = document.querySelector('#modal-exit-btn');

// Modals
const modal = document.querySelector('.modal');

// Menus
const userMenu = document.querySelector('.user');
const seeMoreMenu = document.querySelector('.see-more');

// Exit Toggle
modalExitButton.addEventListener('click', () => {
 modal.classList.remove('active');
});

// Pop up
userButton.addEventListener('click', () => {
 userMenu.classList.toggle('active');
 userAngleUp.classList.toggle('fa-angle-down');
 userAngleUp.classList.toggle('fa-angle-up');
});

seeMoreButton.addEventListener('click', () => {
 seeMoreMenu.classList.toggle('active');
 seeMoreAngleUp.classList.toggle('fa-angle-down');
 seeMoreAngleUp.classList.toggle('fa-angle-up');
});