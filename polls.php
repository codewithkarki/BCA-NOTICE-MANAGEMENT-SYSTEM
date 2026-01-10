<?php 
session_start();
include 'inc/header.php'; 
require_once('admin/inc/db_config.php');
if (!isset($_SESSION['user_id'])) {
   header("Location: login.php");
    exit();
}


$polls_res = mysqli_query($con, "SELECT * FROM `polls` WHERE `status` = 'Active' ORDER BY `id` DESC");
?>

<section class="notice-page">
    <h2 class="page-title">🗳️ Active Polls</h2>

    <div class="notice-list">
        <?php if(mysqli_num_rows($polls_res) > 0): ?>
            <?php while($poll = mysqli_fetch_assoc($polls_res)): ?>
                
                <?php 
                    
                    $p_id = $poll['id'];
                    $opt_res = mysqli_query($con, "SELECT * FROM `poll_options` WHERE `poll_id` = '$p_id'");
                    $options = [];
                    while($opt = mysqli_fetch_assoc($opt_res)){
                        $options[] = $opt; 
                    }
                ?>

               <div class="poll-card">
    <div class="notice-info">
        <h3 class="notice-title"><?php echo $poll['title']; ?></h3>
        <p class="notice-meta">
            <span>📅 <?php echo $poll['poll_date']; ?></span>
        </p>
    </div>

        <button class="view-btn" onclick='openVoteModal(<?php echo json_encode($poll); ?>, <?php echo json_encode($options); ?>)'>
            Vote
        </button>
</div>

            <?php endwhile; ?>
        <?php else: ?>
            <p style="text-align:center; grid-column: 1/-1;">No active polls available right now.</p>
        <?php endif; ?>
    </div>
</section>

<div class="poll-modal" id="pollModal">
    <div class="poll-box">
        <span class="close-modal" onclick="closeModal()">&times;</span>

        <h3 id="pollQuestionDisplay"></h3>

        <form action="submit_vote.php" method="POST" id="pollForm">
            <input type="hidden" name="poll_id" id="modalPollId">
            
            <div class="poll-options" id="pollOptionsContainer">
                </div>

            <button type="submit" name="submit_vote" class="submit-btn" id="submitBtn" disabled>
                Submit Vote
            </button>
        </form>
    </div>
</div>

<script>
function openVoteModal(poll, options) {
    const modal = document.getElementById('pollModal');
    const questionText = document.getElementById('pollQuestionDisplay');
    const optionsContainer = document.getElementById('pollOptionsContainer');
    const pollIdInput = document.getElementById('modalPollId');
    const submitBtn = document.getElementById('submitBtn');

    // Calculate Total Votes first
    const totalVotes = options.reduce((sum, opt) => sum + parseInt(opt.votes), 0);

    questionText.innerText = poll.question;
    pollIdInput.value = poll.id;
    optionsContainer.innerHTML = "";
    submitBtn.disabled = true;
    submitBtn.style.display = "block"; // Ensure button is visible

    options.forEach(opt => {
        // Calculate percentage for this specific option
        const percent = (totalVotes > 0) ? Math.round((opt.votes / totalVotes) * 100) : 0;
        
        const div = document.createElement('div');
        div.style.marginBottom = "10px";
        div.innerHTML = `
            <label style="display: block; cursor: pointer; border: 2px solid #eee; padding: 12px; border-radius: 8px; position: relative; transition: 0.3s;">
                <input type="radio" name="option_id" value="${opt.id}" 
                    onclick="document.getElementById('submitBtn').disabled = false;" required> 
                
                <span style="margin-left: 10px; font-weight: 500;">${opt.option_text}</span>
                
                <span style="float: right; font-size: 0.85rem; color: #666;">
                    ${percent}% (${opt.votes} votes)
                </span>

                <div style="position: absolute; bottom: 0; left: 0; height: 3px; background: #4b6cb7; width: ${percent}%; border-radius: 0 0 0 8px;"></div>
            </label>
        `;
        optionsContainer.appendChild(div);
    });

    modal.style.display = "flex";
}

function closeModal() {
    document.getElementById('pollModal').style.display = "none";
}

// Close modal if user clicks outside the box
window.onclick = (event) => {
    if (event.target == document.getElementById('pollModal')) {
        closeModal();
    }
};

function showResults(pollId) {
    const modal = document.getElementById('pollModal');
    const optionsContainer = document.getElementById('pollOptionsContainer');
    const submitBtn = document.getElementById('submitBtn');
    
    
    submitBtn.style.display = "none";
    optionsContainer.innerHTML = "Fetching live results...";
    modal.style.display = "flex";

   
    fetch('get_poll_results.php?id=' + pollId)
        .then(response => response.text())
        .then(data => {
            optionsContainer.innerHTML = data;
        });
}
</script>

<?php include 'inc/footer.php'; ?>