<?php include 'inc/header.php'; ?>

<section class="notice-page">
    <h2 class="page-title">🗳️ Polls</h2>

    <div class="notice-list">

        <!-- POLL CARD -->
        <div class="poll-card" 
             data-question="Where should our BCA tour go?"
             data-options='["Pokhara","Chitwan","Ilam","Mustang"]'>

            <div class="notice-info">
                <h3 class="notice-title">BCA Tour Destination</h3>
                <p class="notice-meta">
                    <span>📅 2026-01-10</span>
                    <span>📌 Tour Decision</span>
                </p>
            </div>
            <button class="view-btn">Vote</button>
        </div>

        <!-- POLL CARD -->
        <div class="poll-card" 
             data-question="When should morning class start?"
             data-options='["6:00 AM","7:00 AM","8:00 AM"]'>

            <div class="notice-info">
                <h3 class="notice-title">Class Start Time</h3>
                <p class="notice-meta">
                    <span>📅 2026-01-08</span>
                    <span>📌 Academic</span>
                </p>
            </div>
            <button class="view-btn">Vote</button>
        </div>

    </div>
</section>

<!-- POLL MODAL -->
<div class="poll-modal" id="pollModal">
    <div class="poll-box">
        <span class="close-modal">&times;</span>

        <h3 id="pollQuestion"></h3>

        <form id="pollForm">
            <div class="poll-options" id="pollOptions"></div>

            <button type="submit" class="submit-btn" disabled>
                Submit Vote
            </button>
        </form>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
