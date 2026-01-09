<?php include 'inc/header.php'; ?>
<!-- ADMIN DASHBOARD -->
<section class="admin-dashboard">

    <!-- Page Header -->
    <div class="dashboard-header">
        <h2>Admin Dashboard</h2>
        <p>Overview of system activities and statistics</p>
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
<?php include 'inc/footer.php'; ?>