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

            <form onsubmit="return validateLogin()">
                <div class="field-group">
                    <label>Email Address</label>
                    <input type="email" id="loginEmail" placeholder="Enter your email" required>
                </div>

                <div class="field-group">
                    <label>Password</label>
                    <input type="password" id="loginPassword" placeholder="Enter your password" required>
                </div>

                <button type="submit">Login</button>
            </form>

            <div class="auth-footer">
                <p>New Student? <a href="register.php">Register Here</a></p>
            </div>
        </div>
    </div>
    <script src="script/auth.js"></script>
</body>

</html>