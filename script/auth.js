function submitRegister() {
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;

    // Password rules
    const passwordPattern =
        /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    if (!passwordPattern.test(password)) {
        alert(
            "Password must be at least 8 characters long and include:\n" +
            "- 1 uppercase letter\n" +
            "- 1 number\n" +
            "- 1 special character"
        );
        return false;
    }

    if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return false;
    }

    // Show admin verification popup
    document.getElementById("popup").style.display = "flex";

    return false; // Prevent actual form submission for demo
}

// Function to close the popup
function closePopup() {
    document.getElementById("popup").style.display = "none";
}