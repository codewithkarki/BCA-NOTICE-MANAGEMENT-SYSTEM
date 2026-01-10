<?php
require_once('inc/db_config.php');

if(isset($_GET['id'])) {
    $poll_id = mysqli_real_escape_string($con, $_GET['id']);

    // 1. Get the total number of votes for this poll
    $total_q = "SELECT SUM(votes) AS total FROM `poll_options` WHERE `poll_id` = '$poll_id'";
    $total_res = mysqli_query($con, $total_q);
    $total_data = mysqli_fetch_assoc($total_res);
    $total_votes = $total_data['total'] ? $total_data['total'] : 0;

    // 2. Fetch all options for this poll
    $opt_q = "SELECT * FROM `poll_options` WHERE `poll_id` = '$poll_id'";
    $opt_res = mysqli_query($con, $opt_q);

    echo "<div class='poll-results-wrapper'>";
    while($opt = mysqli_fetch_assoc($opt_res)) {
        // Calculate percentage
        $percent = ($total_votes > 0) ? round(($opt['votes'] / $total_votes) * 100) : 0;
        
        // Output the result bar HTML
        echo "
        <div style='margin-bottom: 15px;'>
            <div style='display: flex; justify-content: space-between; font-size: 14px; margin-bottom: 5px;'>
                <span>{$opt['option_text']}</span>
                <span>$percent% ({$opt['votes']} votes)</span>
            </div>
            <div style='background: #eee; height: 12px; border-radius: 10px; width: 100%; overflow: hidden;'>
                <div style='background: #4b6cb7; width: $percent%; height: 100%; transition: width 0.5s;'></div>
            </div>
        </div>";
    }
    echo "</div>";
    echo "<p style='text-align: center; font-size: 12px; color: #666;'>Total Votes: $total_votes</p>";
}
?>