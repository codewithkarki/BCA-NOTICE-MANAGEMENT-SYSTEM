<?php
include 'inc/header.php';
require_once('inc/db_config.php');
require('inc/essentials.php');
adminLogin();

if (isset($_GET['delete_id'])) {
    $id = mysqli_real_escape_string($con, $_GET['delete_id']);

    $delete_query = "DELETE FROM complaints WHERE id = '$id'";

    if (mysqli_query($con, $delete_query)) {
        echo "<script>alert('Complaint Delete Successfully.'); window.location.href='complaints.php';</script>";
    } else {
        echo "Error deleting complaints: " . mysqli_error($con);
    }
}
?>

<section class="complaint-management">

    <!-- HEADER -->
    <div class="complaint-header">
        <h2>Complaint Management</h2>
        <p>Read-only complaints submitted by students</p>
    </div>

    <!-- COMPLAINT TABLE -->
    <div class="complaint-table-wrapper">
        <table class="complaint-table">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Type</th>
                    <th>Name</th>
                    <th>Semester</th>
                    <th>Anonymous</th>
                    <th>Date</th>
                    <th>View</th>
                </tr>
            </thead>

           <tbody>
    <?php
    $sql = "SELECT * FROM complaints ORDER BY created_at DESC";
    $res = mysqli_query($con, $sql);

    if ($res && mysqli_num_rows($res) > 0) {
        $sn = 1; // Initialize Serial Number
        while ($row = mysqli_fetch_assoc($res)) {

            // Anonymous handling
            if ($row['is_anonymous'] == 1) {
                $name = 'Anonymous';
                $semester = '—';
                $anonymous = 'Yes';
            } else {
                $name = $row['student_name'];
                $semester = $row['semester'];
                $anonymous = 'No';
            }

            echo "
            <tr>
                <td>{$sn}</td> <td>{$row['complaint_type']}</td>
                <td>{$name}</td>
                <td>{$semester}</td>
                <td>{$anonymous}</td>
                <td>".date('Y-m-d', strtotime($row['created_at']))."</td>
                <td>
                    <button class='view-btn'
                        onclick=\"openComplaintModal(
                            '".htmlspecialchars($row['complaint_type'], ENT_QUOTES)."',
                            '".htmlspecialchars($name, ENT_QUOTES)."',
                            '".htmlspecialchars($semester, ENT_QUOTES)."',
                            '{$anonymous}',
                            '".htmlspecialchars($row['description'], ENT_QUOTES)."',
                            '".date('Y-m-d', strtotime($row['created_at']))."'
                        )\">
                        View
                    </button>
                    
                    <a href='complaints.php?delete_id={$row['id']}' 
                       class='btn-delete' 
                       onclick=\"return confirm('Are you sure you want to delete this complaint?')\"
                       style='text-decoration: none;  padding: 6px 12px;
                        border-radius: 6px; background-color: #dc3545; color: white;  font-size: 14px; margin-left: 5px;'>
                       Delete
                    </a>
                </td>
            </tr>";
            
            $sn++; // Increment Serial Number for the next row
        }
    } else {
        echo "<tr><td colspan='7' style='text-align:center;'>No complaints found</td></tr>";
    }
    ?>
</tbody>
        </table>
    </div>

    <!-- VIEW COMPLAINT MODAL -->
    <div class="modal" id="complaintModal">
        <div class="modal-content">
            <h3>Complaint Details</h3>

            <div class="detail"><strong>Complaint Type:</strong> <span id="cType"></span></div>
            <div class="detail"><strong>Name:</strong> <span id="cName"></span></div>
            <div class="detail"><strong>Semester:</strong> <span id="cSemester"></span></div>
            <div class="detail"><strong>Anonymous:</strong> <span id="cAnonymous"></span></div>
            <div class="detail"><strong>Date:</strong> <span id="cDate"></span></div>

            <div class="detail">
                <strong>Description:</strong>
                <p id="cDescription"></p>
            </div>

            <div class="modal-actions">
                <button class="cancel-btn" onclick="closeComplaintModal()">Close</button>
            </div>
        </div>
    </div>

</section>

<?php include 'inc/footer.php'; ?>