<?php include 'inc/header.php'; 
require_once('inc/db_config.php');
require('inc/essentials.php');
  adminLogin();
  ?>
<!-- ADMIN DASHBOARD -->
<section class="admin-dashboard">

    <!-- Page Header -->
    <div class="dashboard-header">
        <h2>Admin Dashboard <i class="fas fa-user-shield"></i></h2>
        <p>Welcome Admin &nbsp;<i class="fas fa-user-shield"></i> <br> Overview of system activities and statistics...</p>
    </div>

    <!-- STATS CARDS -->
    <div class="stats-grid">
        <div class="stat-card">
            <h3>Total Notices</h3>
            <span class="stat-number">128</span>
        </div>

        <div class="stat-card">
            <h3>Complaints</h3>
            <span class="stat-number">36</span>
        </div>

        <div class="stat-card">
            <h3>Feedbacks</h3>
            <span class="stat-number">92</span>
        </div>

        <div class="stat-card">
            <h3>Active Polls</h3>
            <span class="stat-number">5</span>
        </div>
    </div>

    <!-- RECENT ACTIVITY -->
    <div class="recent-activity">
        <h3>Recent Activity</h3>

        <ul class="activity-list">
            <li>
                <span class="activity-time">Today</span>
                <p>New notice <strong>"BCA Exam Schedule"</strong> added.</p>
            </li>

            <li>
                <span class="activity-time">Yesterday</span>
                <p>Complaint submitted regarding <strong>Library Timing</strong>.</p>
            </li>

            <li>
                <span class="activity-time">2 days ago</span>
                <p>New poll <strong>"Internal Exam Mode"</strong> created.</p>
            </li>

            <li>
                <span class="activity-time">3 days ago</span>
                <p>Feedback received from <strong>BCA 4th Semester</strong>.</p>
            </li>
        </ul>
    </div>

</section>
<!-- EXTRA INFORMATION SECTION (SAFE ADDITION) -->
<section class="admin-extra-info">

    <!-- ADMIN INFO -->
    <div class="info-card">
        <div class="info-icon">
            <i class="fas fa-user-shield"></i>
        </div>
        <h3>Administrator</h3>
        <p>
            You are logged in as the system administrator of the
            <strong>BCA Notice Management System</strong>.
            You have full control over notices, complaints, feedback,
            polls, and student verification.
        </p>
    </div>

    <!-- COLLEGE INFO -->
    <div class="info-card">
        <div class="info-icon">
            <i class="fas fa-university"></i>
        </div>
        <h3>Mahendra Multiple Campus Dang (MMC)</h3>
        <p>
            The BCA program at NMS focuses on academic excellence,
            practical learning, and modern IT skills aligned with
            Tribhuvan University curriculum.
        </p>
    </div>

    <!-- SYSTEM INFO -->
    <div class="info-card">
        <div class="info-icon">
            <i class="fas fa-desktop"></i>
        </div>
        <h3>System Overview</h3>
        <p>
            This platform digitalizes communication between students
            and administration by providing structured notice delivery,
            secure feedback, complaint handling, and future poll-based decisions.
        </p>
    </div>

</section>

<?php include 'inc/footer.php'; ?>