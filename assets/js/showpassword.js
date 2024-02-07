
const passwordInput = document.getElementById('password');
const togglePasswordButton = document.querySelector('.toggle-password');

togglePasswordButton.addEventListener('click', function () {
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        togglePasswordButton.querySelector('i').classList.remove('bi-eye');
        togglePasswordButton.querySelector('i').classList.add('bi-eye-slash');
    } else {
        passwordInput.type = 'password';
        togglePasswordButton.querySelector('i').classList.remove('bi-eye-slash');
        togglePasswordButton.querySelector('i').classList.add('bi-eye');
    }
});