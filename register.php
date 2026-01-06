<?php include 'inc/header.php'; ?>
<?php

require_once('admin/inc/db_config.php');

if (isset($_POST['register_btn'])) {

    $full_name = mysqli_real_escape_string($con, $_POST['full_name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone_number']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $semester = mysqli_real_escape_string($con, $_POST['semester']);
    $reg_no = mysqli_real_escape_string($con, $_POST['registration_number']);
    $password = $_POST['password'];


    $hashed_pass = password_hash($password, PASSWORD_BCRYPT);

    $query = "INSERT INTO `users` (`full_name`, `email`, `phone_number`, `address`, `semester`, `registration_number`, `password`, `datentime`) 
              VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";

    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {

        mysqli_stmt_bind_param($stmt, "sssssss", $full_name, $email, $phone, $address, $semester, $reg_no, $hashed_pass);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Registration Successful! <br> Your account will be activated after admin verification'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Registration Failed. Try again.');</script>";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Query Error: " . mysqli_error($con);
    }
}
?>

<div class="auth-container">
    <div class="auth-card">
        <h2>Student Registration</h2>
        <p>Create account for BCA NMS</p>

        <form action="register.php" method="POST" onsubmit="return submitRegister()">

            <div class="field-group">
                <label>Full Name</label>
                <input type="text" name="full_name" id="name" placeholder="Enter full name" required>
            </div>

            <div class="field-group">
                <label>Email</label>
                <input type="email" id="email" name="email" placeholder="Enter email" required>
            </div>

            <div class="field-group">
                <label>Phone Number</label>
                <input type="tel" id="phone" name="phone_number" placeholder="98XXXXXXXX" required>
            </div>

            <div class="field-group">
                <label>Address</label>
                <input type="text" id="address" name="address" placeholder="Enter address" required>
            </div>

            <div class="field-group">
                <label>Semester</label>
                <input type="text" id="semester" name="semester" placeholder="Eg: 4th Semester" required>
            </div>

            <div class="field-group">
                <label>Registration Number</label>
                <input type="number" id="regno" name="registration_number" placeholder="TU Reg No" required>
            </div>

            <div class="field-group">
                <label>Password</label>
                <input type="password" id="password" name="password" placeholder="Create password" required>
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

            <button type="submit" name="register_btn">Register</button>
        </form>
    </div>
</div>


<?php include 'inc/footer.php'; ?>