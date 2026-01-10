<?php 
include 'inc/header.php';
require_once('inc/db_config.php');
require('inc/essentials.php');
adminLogin();
   if (isset($_GET['delete_id'])) {
    $id = mysqli_real_escape_string($con, $_GET['delete_id']);

    $delete_query = "DELETE FROM feedbacks WHERE id = '$id'";

    if (mysqli_query($con, $delete_query)) {
        echo "<script>alert('Feedback Deleted Successfully.'); window.location.href='feedbacks.php';</script>";
    } else {
        echo "Error deleting feedback: " . mysqli_error($con);
    }
}
?>



<section class="feedback-management">

    <!-- HEADER -->
    <div class="feedback-header">
        <h2>Feedback Management</h2>
        <p>Read-only feedback submitted by students</p>
    </div>

    <!-- FEEDBACK TABLE -->
    <div class="feedback-table-wrapper">
        <table class="feedback-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Subject</th>
                    <th>Rating</th>
                    <th>Date</th>
                    <th>View</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $query = "SELECT * FROM feedbacks ORDER BY created_at DESC";
                $result = mysqli_query($con, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        $stars = str_repeat('★', $row['rating']) . str_repeat('☆', 5 - $row['rating']);
                        $subject = $row['subject'] ?: '—';

                        echo "
                        <tr>
                            <td>{$row['id']}</td>
                            <td>{$subject}</td>
                            <td><span class='stars'>{$stars}</span></td>
                            <td>" . date('Y-m-d', strtotime($row['created_at'])) . "</td>
                            <td>
                                <button class='view-btn'
                                    onclick=\"openFeedbackModal(
                                        '".htmlspecialchars($subject, ENT_QUOTES)."',
                                        '".htmlspecialchars($row['message'], ENT_QUOTES)."',
                                        '{$stars}',
                                        '".date('Y-m-d', strtotime($row['created_at']))."'
                                    )\">
                                    View
                                </button>
                                <a href='feedbacks.php?delete_id={$row['id']}' 
                       class='btn-delete' 
                       onclick=\"return confirm('Are you sure you want to delete this feedback?')\"
                       style='text-decoration: none;  padding: 6px 12px;
                        border-radius: 6px; background-color: #dc3545; color: white;  font-size: 14px; margin-left: 5px;'>
                       Delete
                    </a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' style='text-align:center;'>No feedback found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- VIEW FEEDBACK MODAL -->
    <div class="modal" id="feedbackModal">
        <div class="modal-content">
            <h3>Feedback Details</h3>

            <div class="detail"><strong>Subject:</strong> <span id="fSubject"></span></div>
            <div class="detail"><strong>Rating:</strong> <span id="fRating"></span></div>
            <div class="detail"><strong>Date:</strong> <span id="fDate"></span></div>

            <div class="detail">
                <strong>Message:</strong>
                <p id="fMessage"></p>
            </div>

            <div class="modal-actions">
                <button class="cancel-btn" onclick="closeFeedbackModal()">Close</button>
            </div>
        </div>
    </div>

</section>

<script>
function openFeedbackModal(subject, message, rating, date) {
    document.getElementById('fSubject').innerText = subject;
    document.getElementById('fMessage').innerText = message;
    document.getElementById('fRating').innerHTML = rating;
    document.getElementById('fDate').innerText = date;

    document.getElementById('feedbackModal').style.display = 'flex';
}

function closeFeedbackModal() {
    document.getElementById('feedbackModal').style.display = 'none';
}
</script>

<?php include 'inc/footer.php'; ?>
