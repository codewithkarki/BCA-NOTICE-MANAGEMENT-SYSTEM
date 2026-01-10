<?php 
require_once('inc/db_config.php');
require('inc/essentials.php');
adminLogin();

if (isset($_GET['del'])) {
    $id = mysqli_real_escape_string($con, $_GET['del']);

    // The 'ON DELETE CASCADE' in the database handles the poll_options and poll_votes
    $q = "DELETE FROM `polls` WHERE `id`='$id'";

    if (mysqli_query($con, $q)) {
        echo "<script>alert('Poll and all associated data deleted successfully!'); window.location.href='view_polls.php';</script>";
    } else {
        echo "<script>alert('Error: Could not delete poll.'); window.location.href='view_polls.php';</script>";
    }
}

$polls_res = mysqli_query($con, "SELECT * FROM `polls` ORDER BY `id` DESC");
$res = mysqli_query($con, "SELECT * FROM `polls` ORDER BY `id` DESC");

include 'inc/header.php'; 
?>

<section class="poll-view">
    <h2>Poll Management</h2>
    <table class="poll-table">
        <thead>
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Category</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $sn=1;
            while($row = mysqli_fetch_assoc($res)): ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['category']; ?></td>
                <td><?php echo $row['poll_date']; ?></td>
                <td><span class="status <?php echo strtolower($row['status']); ?>"><?php echo $row['status']; ?></span></td>
                <td>
                    <button class="view-btn" onclick="viewResults(<?php echo $row['id']; ?>)">View Results</button>
                    <button class="delete-btn" 
                onclick="if(confirm('Are you sure? This will delete all votes and options for this poll.')) window.location.href='view_polls.php?del=<?php echo $row['id']; ?>'"
                style="background: #ff4d4d; color: white; border: none; padding: 8px 16px;
    border-radius: 6px; cursor: pointer; margin-left: 5px;">
                 Delete
            </button>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</section>

<div id="resultModal" class="modal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.7); justify-content:center; align-items:center;">
    <div class="modal-content" style="background:white; padding:20px; width:400px; border-radius:8px;">
        <h3>Live Poll Results</h3>
        <div id="resultsArea">Loading...</div>
        <button onclick="closeModal()" style="margin-top:15px;">Close</button>
    </div>
</div>

<script>
function viewResults(pollId) {
    document.getElementById('resultModal').style.display = "flex";
    
    fetch('get_poll_results.php?id=' + pollId)
        .then(response => response.text())
        .then(data => {
            document.getElementById('resultsArea').innerHTML = data;
        });
}
function closeModal() { document.getElementById('resultModal').style.display = "none"; }
</script>