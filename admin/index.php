<?php
require_once('inc/db_config.php');

// Ensure session is started for the redirection logic to work later
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['login'])) {
    $name = mysqli_real_escape_string($con, $_POST['admin_name']);
    $pass = $_POST['admin_pass'];

    // Query to check admin
    $query = "SELECT * FROM `admin` WHERE `admin_name` = ? AND `admin_pass` = ? LIMIT 1";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "ss", $name, $pass);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        
        // Setting session variables
        $_SESSION['adminLogin'] = true;
        $_SESSION['adminId'] = $row['id'];
        
        // Success redirect
        header("Location: dashboard.php");
        exit; 
    } else {
        echo "<script>alert('Login Failed! Invalid Username or Password');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login - BCA NMS</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <section class="admin-login-section">
        <div class="login-container">
            <div class="login-header">
                <h2>Admin Login</h2>
                <p>Access the BCA Notice Management System</p>
            </div>

            <form action="index.php" method="POST" id="adminLoginForm" class="login-form">
                <div class="form-group">
                    <label for="name">Admin Name</label>
                    <input type="text" id="name" name="admin_name" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="password-wrapper">
                        <input type="password" id="password" name="admin_pass" placeholder="Enter password" required>
                        <span class="toggle-password" onclick="togglePassword()">👁</span>
                    </div>
                </div>

                <button type="submit" name="login" class="login-btn">Login</button>
                <p class="login-note">Authorized personnel only.</p>
            </form>
        </div>
    </section>

    <script>
        function togglePassword() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>
</html>