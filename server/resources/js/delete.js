// Button
const deleteButton = document.querySelector('#delete-btn');

// Exit Button
const deleteExitButton = document.querySelector('#delete-exit-btn');

// Modal
const deleteModal = document.querySelector('.delete');

// Exit Toggle
deleteExitButton.addEventListener('click', () => {
 deleteModal.classList.remove('active');
});

// Pop up
deleteButton.addEventListener('click', () => {
 deleteModal.classList.toggle('active');
});