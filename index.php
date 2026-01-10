<?php 
session_start();
if (!isset($_SESSION['user_id'])) {
   header("Location: login.php");
    exit();
}
include 'inc\header.php';?>


<!-- HERO / SYSTEM IDENTITY -->

<section class="hero">
    <div class="hero-content">
        <h1>
            <span class="typing" data-text="BCA Notice Management System"></span>
        </h1>
        <p>
            A centralized digital platform developed for BCA students to
            manage academic communication, notices, feedback, complaints,
            and decision-support features efficiently.
        </p>
    </div>
</section>

<!-- CORE MODULES OVERVIEW -->
<section class="modules">
    <div class="module-card">
        <h3>📢 Notice Management</h3>
        <p>
            Provides instant access to official academic notices,
            exam schedules, events, and departmental announcements.
        </p>
    </div>

    <div class="module-card">
        <h3>📝 Complaint System</h3>
        <p>
            Allows students to submit academic or administrative complaints
            securely, including anonymous reporting for sensitive issues.
        </p>
    </div>

    <div class="module-card">
        <h3>💬 Feedback System</h3>
        <p>
            Enables students to share structured feedback to improve
            teaching quality, facilities, and academic services.
        </p>
    </div>

    <div class="module-card">
        <h3>🗳️ Polls & Voting</h3>
        <p>
            A decision-support feature where students will be able to
            participate in polls related to academic activities,
            events, and departmental decisions.
        </p>
    </div>
</section>

<!-- SYSTEM VALUE -->
<section class="value-section">
    <div class="value-box">
        <h3>Digital Transparency</h3>
        <p>
            BCANMS ensures transparent communication between students
            and the department by maintaining a centralized digital record.
        </p>
    </div>

    <div class="value-box">
        <h3>Student-Centric Design</h3>
        <p>
            Designed with simplicity and accessibility in mind,
            the system works seamlessly across devices.
        </p>
    </div>

    <div class="value-box">
        <h3>Secure & Controlled Access</h3>
        <p>
            Role-based access ensures that only authorized users can
            publish notices or review submissions.
        </p>
    </div>
</section>

<!-- ACADEMIC LIFE -->
<section class="academic-life">
    <h2>BCA Academic Environment</h2>

    <div class="academic-grid">
        <img src="images\events\1.png" alt="Presentation">
        <img src="images/events/5.png" alt="Workshop">
        <img src="images/events/3.png" alt="Group Study">
        <img src="images/events/5.png" alt="Tech Event">
    </div>
</section>

<!-- FUTURE SCOPE -->
<section class="future-scope">
    <h3>Future Enhancements</h3>
    <ul>
        <li>Automated notice notifications</li>
        <li>Poll result visualization</li>
        <li>Complaint tracking and resolution status</li>
        <li>Department analytics dashboard</li>
    </ul>
</section>

<?php
include 'inc/footer.php';
?>