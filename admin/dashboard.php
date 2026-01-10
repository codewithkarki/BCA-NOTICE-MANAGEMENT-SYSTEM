<?php 
require_once('inc/db_config.php');
require('inc/essentials.php');
adminLogin();

$notices_count = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as total FROM `notices`"))['total'];


$polls_count = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as total FROM `polls` WHERE `status`='Active'"))['total'];

$students_count = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as total FROM `users`"))['total'];

$recent_notices = mysqli_query($con, "SELECT * FROM `notices` ORDER BY `id` DESC LIMIT 4");

include 'inc/header.php'; 
?>

<section class="admin-dashboard">

    <div class="dashboard-header">
        <h2>Admin Dashboard <i class="fas fa-user-shield"></i></h2>
        <p>Welcome Admin! Overview of system activities and statistics...</p>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <h3>Total Notices</h3>
            <span class="stat-number"><?php echo $notices_count; ?></span>
        </div>

        <div class="stat-card">
            <h3>Registered Students</h3>
            <span class="stat-number"><?php echo $students_count; ?></span>
        </div>


        <div class="stat-card">
            <h3>Active Polls</h3>
            <span class="stat-number"><?php echo $polls_count; ?></span>
        </div>
    </div>

    <div class="recent-activity">
        <h3>Recent Notices Posted</h3>
        <ul class="activity-list">
            <?php while($activity = mysqli_fetch_assoc($recent_notices)): ?>
            <li>
                <span class="activity-time"><?php echo date('M d', strtotime($activity['date'])); ?></span>
                <p>Notice <strong>"<?php echo $activity['title']; ?>"</strong> is currently <strong><?php echo $activity['status']; ?></strong>.</p>
            </li>
            <?php endwhile; ?>
        </ul>
    </div>

</section>

<section class="admin-extra-info">
    <div class="info-card">
        <div class="info-icon"><i class="fas fa-user-shield"></i></div>
        <h3>Administrator</h3>
        <p>Logged in as system admin of MMC Dang. You have full control over the platform.</p>
    </div>

    <div class="info-card">
        <div class="info-icon"><i class="fas fa-university"></i></div>
        <h3>MMC Dang</h3>
        <p>Mahendra Multiple Campus BCA program management portal.</p>
    </div>

    <div class="info-card">
        <div class="info-icon"><i class="fas fa-desktop"></i></div>
        <h3>System Overview</h3>
        <p>Digitalizing communication via structured notice delivery and secure polling.</p>
    </div>
</section>

<?php include 'inc/footer.php'; ?>