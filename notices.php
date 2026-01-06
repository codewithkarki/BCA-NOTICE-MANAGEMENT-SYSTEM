<?php include 'inc/header.php'; ?>

<section class="notice-page">
    <h2 class="page-title">📢 Notices</h2>

    <div class="notice-list">

        <!-- NOTICE WITH IMAGE -->
        <div class="notice-card" data-image="images/notices/2.png">
            <div class="notice-info">
                <h3 class="notice-title">BCA 4th Semester Exam Schedule</h3>
                <p class="notice-meta">
                    <span>📅 2026-01-05</span>
                    <span>📌 Examination</span>
                </p>
            </div>
            <button class="view-btn">View</button>
        </div>

        <!-- NOTICE WITHOUT IMAGE -->
        <div class="notice-card">
            <div class="notice-info">
                <h3 class="notice-title">Holiday on Maghe Sankranti</h3>
                <p class="notice-meta">
                    <span>📅 2026-01-01</span>
                    <span>📌 General</span>
                </p>
            </div>
            <button class="view-btn disabled">No Image</button>
        </div>

        <!-- MORE DUMMY NOTICES -->
        <div class="notice-card" data-image="images/notices/1.png">
            <div class="notice-info">
                <h3 class="notice-title">Workshop on Web Development</h3>
                <p class="notice-meta">
                    <span>📅 2025-12-28</span>
                    <span>📌 Event</span>
                </p>
            </div>
            <button class="view-btn">View</button>
        </div>

    </div>
</section>

<!-- IMAGE MODAL -->
<div class="notice-modal" id="noticeModal">
    <span class="close-modal">&times;</span>
    <img id="modalImage" src="" alt="Notice Image">
</div>

<?php include 'inc/footer.php'; ?>
