<?php include 'inc/header.php'; ?>
<?php
require_once('admin/inc/db_config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $subject = !empty($_POST['subject'])
        ? mysqli_real_escape_string($con, $_POST['subject'])
        : NULL;

    $message = mysqli_real_escape_string($con, $_POST['message']);
    $rating  = (int) $_POST['rating'];

    if (empty($message) || $rating < 1 || $rating > 5) {
        echo "<script>
            alert('Please provide valid feedback and rating.');
            window.history.back();
        </script>";
        exit;
    }

    $query = "INSERT INTO feedbacks (subject, message, rating, created_at)
              VALUES (?, ?, ?, NOW())";

    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssi", $subject, $message, $rating);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>
                alert('Thank you for your feedback!');
                window.location.href='feedback.php';
            </script>";
        } else {
            echo "<script>alert('Failed to submit feedback. Try again.');</script>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo 'Database Error: ' . mysqli_error($con);
    }
}
?>

<div class="page-container">
    <div class="feedback-card">
        <h2>⭐ Student Feedback</h2>
        <p>Your feedback helps us improve the system.</p>

        <form method="POST">

            <label>Subject</label>
            <input type="text" name="subject" placeholder="Eg: Teaching, System, Facilities">

            <label>Feedback Message</label>
            <textarea name="message" rows="5" placeholder="Write your feedback here..." required></textarea>

            <label>Rating</label>
            <select name="rating" required>
                <option value="5">★★★★★ Excellent</option>
                <option value="4">★★★★ Good</option>
                <option value="3">★★★ Average</option>
                <option value="2">★★ Poor</option>
                <option value="1">★ Very Poor</option>
            </select>

            <button type="submit">Submit Feedback</button>
        </form>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
