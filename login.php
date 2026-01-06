<?php include 'inc/header.php'; ?>

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

<?php include 'inc/footer.php'; ?>
