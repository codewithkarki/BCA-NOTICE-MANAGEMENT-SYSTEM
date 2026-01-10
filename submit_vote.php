<?php
require_once('admin/inc/db_config.php');

if(isset($_POST['submit_vote'])) {
    $poll_id = mysqli_real_escape_string($con, $_POST['poll_id']);
    $option_id = mysqli_real_escape_string($con, $_POST['option_id']);
    
  
    if(isset($_COOKIE['voted_poll_'.$poll_id])) {
        echo "<script>alert('You already voted!'); window.location.href='polls.php?results=$poll_id';</script>";
        exit;
    }

    $query = "UPDATE `poll_options` SET `votes` = `votes` + 1 WHERE `id` = '$option_id'";

    if(mysqli_query($con, $query)) {
        
        setcookie('voted_poll_'.$poll_id, 'yes', time() + (86400 * 30), "/");
        
        header("Location: polls.php?results=$poll_id");
    }
}
?>