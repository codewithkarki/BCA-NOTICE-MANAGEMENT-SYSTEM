<?php
require_once('admin/inc/db_config.php');

if (isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = $_POST['password'];

    // 1. Search for the user by email
    $query = "SELECT * FROM `users` WHERE `email` = ? LIMIT 1";
    $stmt = mysqli_prepare($con, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($user = mysqli_fetch_assoc($result)) {
            // 2. Check if the account is verified by Admin
            if ($user['is_verified'] == 0) {
                echo "<script>alert('Your account is pending admin verification.');</script>";
            } 
            // 3. Verify the hashed password
            else if (password_verify($password, $user['password'])) {
                // Login successful! Save user data to Session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['full_name'];
                
                header("Location: index.php"); // Redirect to home/dashboard
                exit();
            } else {
                echo "<script>alert('Invalid Password!');</script>";
            }
        } else {
            echo "<script>alert('Email not found!');</script>";
        }
        mysqli_stmt_close($stmt);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="css/auth.css">
</head>

<body>
    <div class="auth-container">
        <div class="auth-card">
            <h2>Welcome Back</h2>
            <p>Login to continue to BCANMS</p>

            <form action="login.php" method="POST" onsubmit="return validateLogin()">
                <div class="field-group">
                    <label>Email Address</label>
                    <input type="email" id="loginEmail" name="email" placeholder="Enter your email" required>
                </div>

                <div class="field-group">
                    <label>Password</label>
                    <input type="password" id="loginPassword" name="password" placeholder="Enter your password" required>
                </div>

                <button type="submit" name="login_btn" >Login</button>
            </form>

            <div class="auth-footer">
                <p>New Student? <a href="register.php">Register Here</a></p>
            </div>
        </div>
    </div>
    <script src="script/auth.js"></script>
</body>

</html>