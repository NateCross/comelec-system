// Buttons
const accountDeleteButton = document.querySelector('#account-delete-btn');

// Exit Buttons
const accountDeleteExitButton = document.querySelector('#account-delete-exit-btn');

// Modal
const accountDeleteModal = document.querySelector('.account');

// Exit Toggle
accountDeleteExitButton.addEventListener('click', () => {
 accountDeleteModal.classList.remove('active');
});

// Pop up
accountDeleteButton.addEventListener('click', () => {
 accountDeleteModal.classList.toggle('active');
});
