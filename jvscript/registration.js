function register() {
    const regUsername = document.getElementById('registerUsername').value;
    const regPassword = document.getElementById('registerPassword').value;

    alert('Username: ' + regUsername + '\nPassword: ' + regPassword);

    // Check if the username is already taken
    if (isUsernameTaken(regUsername)) {
        alert('Username already taken. Choose another one.');
        return;
    }

    // Store the user data in localStorage
    const users = JSON.parse(localStorage.getItem('users')) || [];
    users.push({ username: regUsername, password: regPassword });
    localStorage.setItem('users', JSON.stringify(users));

    alert('Registration successful! You will now be redirected to the login page.');

    // Redirect to the login page
    window.location.href = "login.html";
}

function isUsernameTaken(username) {
    const users = JSON.parse(localStorage.getItem('users')) || [];
    return users.some(user => user.username === username);
}
