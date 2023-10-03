document.getElementById('showRegisterForm').addEventListener('click', function() {
    document.getElementById('loginBox').style.display = 'none';
    document.getElementById('registerBox').style.display = 'block';
});

document.getElementById('showLoginForm').addEventListener('click', function() {
    document.getElementById('registerBox').style.display = 'none';
    document.getElementById('loginBox').style.display = 'block';
});