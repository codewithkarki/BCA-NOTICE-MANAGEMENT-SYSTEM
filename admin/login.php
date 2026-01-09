<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css\login.css">
</head>
<body>
    <!-- ADMIN LOGIN SECTION -->
<section class="admin-login-section">
    <div class="login-container">
        <div class="login-header">
            <h2>Admin Login</h2>
            <p>Access the BCA Notice Management System</p>
        </div>

        <form id="adminLoginForm" class="login-form">
            <div class="form-group">
                <label for="email">Admin Email</label>
                <input type="email" id="email" placeholder="admin@nms.edu" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="password-wrapper">
                    <input type="password" id="password" placeholder="Enter password" required>
                    <span class="toggle-password" onclick="togglePassword()">👁</span>
                </div>
            </div>

            <button type="submit" class="login-btn">Login</button>

            <p class="login-note">
                Authorized personnel only.
            </p>
        </form>
    </div>
</section>
<script src="script\login.js"></script>
</body>
</html>


