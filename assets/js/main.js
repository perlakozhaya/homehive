function validatePassword() {
    let password = document.getElementById('password');
    let confirmPassword = document.getElementById('confirm-password');
    let errorMessage = document.getElementById('error-message');
    let registerButton = document.getElementById('register-button');

    if (password.value !== confirmPassword.value) {
        errorMessage.innerHTML = 'Passwords do not match';
        registerButton.disabled = true;
        registerButton.classList.add('disable-element');
    } else {
        errorMessage.innerHTML = '';
        registerButton.disabled = false;
        registerButton.classList.remove('disable-element');
    }
}
// confirmPassword.addEventListener('input', validatePassword);