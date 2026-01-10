<?php
session_start();
 include 'inc/header.php'; 
require_once('admin/inc/db_config.php');
if (!isset($_SESSION['user_id'])) {
   header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $complaint_type = mysqli_real_escape_string($con, $_POST['complaint_type']);
    $description    = mysqli_real_escape_string($con, $_POST['description']);

    // Handle anonymous logic
    if (isset($_POST['anonymous']) && $complaint_type === 'Harassment') {
        $student_name = NULL;
        $semester = NULL;
        $is_anonymous = 1;
    } else {
        if (empty($_POST['name']) || empty($_POST['semester'])) {
            echo "<script>
                alert('Name and Semester are required');
                window.history.back();
            </script>";
            exit;
        }

        $student_name = mysqli_real_escape_string($con, $_POST['name']);
        $semester = mysqli_real_escape_string($con, $_POST['semester']);
        $is_anonymous = 0;
    }

    $query = "INSERT INTO complaints 
              (complaint_type, student_name, semester, description, is_anonymous, created_at)
              VALUES (?, ?, ?, ?, ?, NOW())";

    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {
        mysqli_stmt_bind_param(
            $stmt,
            "ssssi",
            $complaint_type,
            $student_name,
            $semester,
            $description,
            $is_anonymous
        );

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>
                alert('Complaint submitted successfully. It will be reviewed confidentially.');
                window.location.href='complain.php';
            </script>";
        } else {
            echo "<script>alert('Submission failed. Try again.');</script>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Database Error: " . mysqli_error($con);
    }
}
?>

<div class="page-container">
    <div class="complaint-card">
        <h2>📝 Student Complaint Form</h2>
        <p>Your concerns will be handled confidentially.</p>

        <form method="POST" onsubmit="return validateComplaint()">

            <div class="field-group">
                <label>Complaint Type</label>
                <select name="complaint_type" id="complaintType" onchange="handleComplaintType()" required>
                    <option value="">-- Select Complaint Type --</option>
                    <option value="Study Related">Study Related</option>
                    <option value="Examination">Examination</option>
                    <option value="Faculty Issue">Faculty Issue</option>
                    <option value="Harassment">Harassment</option>
                    <option value="Infrastructure">Infrastructure</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div id="identityFields">
                <div class="field-group">
                    <label>Your Name</label>
                    <input type="text" name="name" placeholder="Enter your full name">
                </div>

                <div class="field-group">
                    <label>Semester</label>
                    <input type="text" name="semester" placeholder="Eg: 4th Semester">
                </div>
            </div>

            <div class="checkbox-area" id="anonymousBox" style="display:none;">
                <label>
                    <input type="checkbox" name="anonymous" id="anonymous" onchange="toggleAnonymous()">
                    Submit Anonymously
                </label>
            </div>

            <div class="field-group">
                <label>Complaint Description</label>
                <textarea name="description" placeholder="Describe your concern..." required></textarea>
            </div>

            <button type="submit">Submit Complaint</button>
        </form>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
