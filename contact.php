<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include 'inc/header.php'; ?>

<div class="contact-container">

    <div class="department-header">
    <h1>Mahendra Multiple Campus Dang</h1>
    <h2>BCA Department</h2>

    <div class="header-line"></div>

    <p class="page-title">Contact Directory</p>
</div>

    <div class="staff-grid">

        <!-- BCA Coordinator -->
        <div class="staff-card">
            <img src="images/person/sudarshan rijal.jpg" alt="BCA Coordinator">
            <div class="staff-info">
                <span class="staff-role">
                    <i class="fas fa-chalkboard-teacher"></i>
                    BCA Program Coordinator
                </span>
                <h3>Mr Sudarshan Rijal</h3>
                <p>📞 +977 9857830105</p>
            </div>
        </div>

        <!-- Campus Chief -->
        <div class="staff-card">
            <img src="images/person/campus chief.jpg" alt="Campus Chief">
            <div class="staff-info">
                <span class="staff-role"> <i class="fas fa-user-tie"></i> Campus Chief</span>
                <h3>Dr. Narayan Panthi</h3>
                <p>📞 +977-9850XXXXXX</p>
            </div>
        </div>

        <!-- Lecturers -->
        <div class="staff-card">
            <img src="images/person/malati dashuti.jpg" alt="Lecturer">
            <div class="staff-info">
                <span class="staff-role"> <i class="fas fa-book-open"></i>BCA Lecturer</span>
                <h3>Er Malati Dashuti</h3>
                <p>📞 +977-9812XXXXXX</p>
            </div>
        </div>

        <div class="staff-card">
            <img src="images/person/amrit sharma.jpg" alt="Lecturer">
            <div class="staff-info">
                <span class="staff-role"><i class="fas fa-book-open"></i>BCA Lecturer</span>
                <h3>Mr Amrit Sharma</h3>
                <p>📞 +977-9803XXXXXX</p>
            </div>
        </div>

        <div class="staff-card">
            <img src="images/person/krishna dev.jpg" alt="Lecturer">
            <div class="staff-info">
                <span class="staff-role"><i class="fas fa-book-open"></i>BCA Lecturer</span>
                <h3>Mr Krishna Dev Thapa</h3>
                <p>📞 +977-9866XXXXXX</p>
            </div>
        </div>

        <div class="staff-card">
            <img src="images/person/dinesh bhattarai.jpg" alt="Lecturer">
            <div class="staff-info">
                <span class="staff-role"><i class="fas fa-book-open"></i>BCA Lecturer</span>
                <h3>Mr Dinesh Bhattarai</h3>
                <p>📞 +977 9857830626</p>
            </div>
        </div>

        <div class="staff-card">
            <img src="images/person/shishir paudel.jpg" alt="Lecturer">
            <div class="staff-info">
                <span class="staff-role"> <i class="fas fa-book-open"></i>BCA Lecturer</span>
                <h3>Mr Shishir Paudel</h3>
                <p>📞 +977-9849XXXXXX</p>
            </div>
        </div>

        <div class="staff-card">
            <img src="" alt="Lecturer">
            <div class="staff-info">
                <span class="staff-role"><i class="fas fa-book-open"></i>BCA Lecturer</span>
                <h3>Ms. Ritu Pandey</h3>
                <p>📞 +977-9818XXXXXX</p>
            </div>
        </div>

        <div class="staff-card">
            <img src="" alt="Lecturer">
            <div class="staff-info">
                <span class="staff-role"><i class="fas fa-book-open"></i>BCA Lecturer</span>
                <h3>Mr. Prakash Bhandari</h3>
                <p>📞 +977-9861XXXXXX</p>
            </div>
        </div>

        <div class="staff-card">
            <img src="" alt="Lecturer">
            <div class="staff-info">
                <span class="staff-role"><i class="fas fa-book-open"></i>BCA Lecturer</span>
                <h3>Ms. Alisha Gurung</h3>
                <p>📞 +977-9807XXXXXX</p>
            </div>
        </div>

    </div>
</div>


<?php include 'inc/footer.php'; ?>