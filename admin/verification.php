<?php
require_once('inc/db_config.php');
require('inc/essentials.php');
  adminLogin();

if (isset($_GET['approve_id'])) {
    $id = $_GET['approve_id'];
    $update_query = "UPDATE users SET is_verified = 1 WHERE id = ?";
    $stmt = mysqli_prepare($con, $update_query);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('User Verified Successfully!'); window.location.href='verification.php';</script>";
    }
}
// Delete/Reject
if (isset($_GET['delete_id'])) {
    $id = mysqli_real_escape_string($con, $_GET['delete_id']);

    $delete_query = "DELETE FROM users WHERE id = '$id'";

    if (mysqli_query($con, $delete_query)) {
        echo "<script>alert('User registration rejected and deleted.'); window.location.href='verification.php';</script>";
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}

$query = "SELECT * FROM users  ORDER BY datentime DESC";
$result = mysqli_query($con, $query);
?>

<?php include 'inc/header.php'; ?>
<header class="admin-header">
    <h2>User Verification</h2>
    <p>Approve or reject student registrations</p>
</header>

<!-- MAIN -->
<section class="verification-wrapper">

    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Semester</th>
                    <th>Reg. No</th>
                    <th>Phone.NO</th>
                    <th>Adress</th>

                    <!-- <th>Status</th> -->
                    <th>Action</th>
                </tr>
            </thead>

            <tbody id="userTable">
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['full_name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['semester']; ?></td>
                        <td><?php echo $row['registration_number']; ?></td>
                        <td><?php echo $row['phone_number']; ?></td>
                        <td><?php echo $row['address']; ?></td>

                        <td style="padding: 12px; text-align: center;">
                            <?php if ($row['is_verified'] == 0): ?>
                                <div style="display: flex; gap: 10px; justify-content: center; align-items: center;">
                                    <a href="verification.php?approve_id=<?php echo $row['id']; ?>"
                                        style="background: #28a745; color: white; padding: 5px 10px; text-decoration: none; border-radius: 4px; font-size: 13px;">
                                        Approve
                                    </a>

                                    <a href="verification.php?delete_id=<?php echo $row['id']; ?>"
                                        onclick="return confirm('Are you sure you want to REJECT and DELETE this student?')"
                                        style="background: #dc3545; color: white; padding: 5px 10px; text-decoration: none; border-radius: 4px; font-size: 13px;">
                                        Delete
                                    </a>
                                </div>
                            <?php else: ?>
                                <span style="color: #155724; background-color: #d4edda; padding: 5px 15px; border-radius: 12px; font-weight: bold; border: 1px solid #c3e6cb; font-size: 13px;">
                                    Verified ✓
                                </span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>

                <?php if (mysqli_num_rows($result) == 0): ?>
                    <tr>
                        <td colspan="8" style="text-align:center; padding: 20px;">No student records found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</section>

<!-- MODAL -->
<div class="modal" id="viewModal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>

        <h3>Student Details</h3>

        <div class="detail-grid">
            <p><strong>Full Name:</strong> Sanjay KC Karki</p>
            <p><strong>Email:</strong> sanjay@gmail.com</p>
            <p><strong>Phone:</strong> 98XXXXXXXX</p>
            <p><strong>Address:</strong> Dang, Nepal</p>
            <p><strong>Semester:</strong> 4th Semester</p>
            <p><strong>Registration No:</strong> 123456</p>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>