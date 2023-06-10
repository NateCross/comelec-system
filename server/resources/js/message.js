// Exit Button
const messageExitButton = document.querySelector('#exit-message');

// Messages
const message = document.querySelector('.message');

// Exit Toggle
messageExitButton.addEventListener('click', () => {
 message.classList.toggle('active');
});