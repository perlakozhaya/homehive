function validatePassword() {
    let password = document.getElementById('password');
    let confirmPassword = document.getElementById('confirm-password');
    let errorMessage = document.getElementById('error-message');
    let registerButton = document.getElementById('register-button');

    if (password.value !== confirmPassword.value) {
        errorMessage.innerHTML = 'Passwords do not match';
        registerButton.disabled = true;
        // registerButton.classList.add('disable-element');
    } else {
        errorMessage.innerHTML = '';
        registerButton.disabled = false;
        // registerButton.classList.remove('disable-element');
    }
}

function openNav() {
    document.getElementById("sidebar").style.width = "250px";
    document.getElementById("open-sidebar").style.display = "none";
    document.getElementById("dashboard-main").style.marginLeft = "250px";
    document.getElementById("open-sidebar").style.display = "none";
}

function closeNav() {
    document.getElementById("sidebar").style.width = "0";
    document.getElementById("open-sidebar").style.marginLeft = "0";
    document.getElementById("open-sidebar").style.display = "block";
}

document.addEventListener("DOMContentLoaded", function() {
    var sidebarLinks = document.querySelectorAll(".side-nav a");

    sidebarLinks.forEach(function(link) {
        link.addEventListener("click", function(event) {
            event.preventDefault();
            var contentUrl = link.getAttribute("data-content");
            loadContent(contentUrl);
        });
    });

    function loadContent(url) {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", url, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById("dashboard-content").innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    }
});