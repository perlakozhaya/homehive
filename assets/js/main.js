function validatePassword() {
    let password = document.getElementById('password');
    let confirmPassword = document.getElementById('confirm-password');
    let errorMessage = document.getElementById('error-message');
    let submitButton = document.getElementById('submit-button');

    if (password.value !== confirmPassword.value) {
        errorMessage.innerHTML = 'Passwords do not match';
        submitButton.disabled = true;
    } else {
        errorMessage.innerHTML = '';
        submitButton.disabled = false;
    }
}

function openNav() {
    document.getElementById("sidebar").style.width = "250px";
    document.getElementById("open-sidebar").style.display = "none";
    document.getElementById("dashboard-main").style.paddingLeft = "250px";
}

function closeNav() {
    document.getElementById("sidebar").style.width = "0";
    document.getElementById("open-sidebar").style.display = "block";
    document.getElementById("dashboard-main").style.paddingLeft = "0";
}