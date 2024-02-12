function login() {
    const loginUsername = document.getElementById('loginUsername').value;
    const loginPassword = document.getElementById('loginPassword').value;

    // Fetch stored users from localStorage
    const users = JSON.parse(localStorage.getItem('users')) || [];

    // Check if the entered credentials match any stored user
    const matchedUser = users.find(user => user.username === loginUsername && user.password === loginPassword);

    if (matchedUser) {
        // If credentials match, navigate to another HTML page (replace 'target.html' with your desired page)
        window.location.href = "home.html";
    } else {
        // If credentials don't match, display an alert or take appropriate action
        alert('Incorrect username or password. Please try again.');
    }
}
