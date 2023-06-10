// Button
const verifyButton = document.querySelector('#verify-btn');
const denyButton = document.querySelector('#deny-btn');

// Exit Button
const verifyExitButton = document.querySelector('#verify-exit-btn');
const denyExitButton = document.querySelector('#deny-exit-btn');

// Modal
const verifyModal = document.querySelector('.verify');
const denyModal = document.querySelector('.deny');

// Exit Toggle
verifyExitButton.addEventListener('click', () => {
 verifyModal.classList.remove('active');
});

denyExitButton.addEventListener('click', () => {
 denyModal.classList.remove('active');
});

// Pop up
verifyButton.addEventListener('click', () => {
 verifyModal.classList.toggle('active');
});

denyButton.addEventListener('click', () => {
 denyModal.classList.toggle('active');
 verifyModal.classList.remove('active');
});

