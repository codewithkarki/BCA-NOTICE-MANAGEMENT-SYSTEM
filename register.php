<?php include 'inc/header.php'; ?>

<div class="auth-container">
    <div class="auth-card">
        <h2>Student Registration</h2>
        <p>Create account for BCA NMS</p>

        <form onsubmit="return submitRegister()">

            <div class="field-group">
                <label>Full Name</label>
                <input type="text" id="name" placeholder="Enter full name" required>
            </div>

            <div class="field-group">
                <label>Email</label>
                <input type="email" id="email" placeholder="Enter email" required>
            </div>

            <div class="field-group">
                <label>Phone Number</label>
                <input type="number" id="phone" placeholder="98XXXXXXXX" required>
            </div>

            <div class="field-group">
                <label>Address</label>
                <input type="text" id="address" placeholder="Enter address" required>
            </div>

            <div class="field-group">
                <label>Semester</label>
                <input type="text" id="semester" placeholder="Eg: 4th Semester" required>
            </div>

            <div class="field-group">
                <label>Registration Number</label>
                <input type="number" id="regno" placeholder="TU Reg No" required>
            </div>

            <div class="field-group">
    <label>Password</label>
    <input type="password" id="password" placeholder="Create password" required>
</div>

<div class="field-group">
    <label>Confirm Password</label>
    <input type="password" id="confirmPassword" placeholder="Re-enter password" required>
</div>

<div class="password-hint">
    Password must contain at least:
    <ul>
        <li>8 characters</li>
        <li>1 uppercase letter</li>
        <li>1 number</li>
        <li>1 special character</li>
    </ul>
</div>

            <button type="submit">Register</button>
        </form>
    </div>
</div>

<!-- POPUP -->
<div class="popup" id="popup">
    <div class="popup-box">
        <h3>Registration Submitted</h3>
        <p>Your account will be activated after admin verification.</p>
        <button onclick="closePopup()">OK</button>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
