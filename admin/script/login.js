document.getElementById("adminLoginForm").addEventListener("submit", function(e) {
    e.preventDefault();

    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value.trim();

    if (email === "" || password === "") {
        alert("Please fill in all fields.");
        return;
    }

    // UI only – backend logic will be added later
    alert("Login UI validated successfully (Backend will be connected later)");
});

function togglePassword() {
    const passInput = document.getElementById("password");
    passInput.type = passInput.type === "password" ? "text" : "password";
}
