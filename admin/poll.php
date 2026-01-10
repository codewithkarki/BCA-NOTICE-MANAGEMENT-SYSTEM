<?php 
require_once('inc/db_config.php');
require('inc/essentials.php');
adminLogin();

if(isset($_POST['create_poll'])) {
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $cat = mysqli_real_escape_string($con, $_POST['category']);
    $ques = mysqli_real_escape_string($con, $_POST['question']);
    $date = $_POST['date'];
    $options = $_POST['options'];
    $q1 = "INSERT INTO `polls`(`title`, `category`, `question`, `poll_date`) VALUES ('$title','$cat','$ques','$date')";
    
    if(mysqli_query($con, $q1)) {
        $poll_id = mysqli_insert_id($con); 
        foreach($options as $opt) {
            if(!empty($opt)) {
                $opt = mysqli_real_escape_string($con, $opt);
                mysqli_query($con, "INSERT INTO `poll_options`(`poll_id`, `option_text`) VALUES ('$poll_id','$opt')");
            }
        }
        echo "<script>alert('Poll Created Successfully!'); window.location.href='view_polls.php';</script>";
    }
}
include 'inc/header.php'; 
?>

<section class="poll-create">
    <h2>Create Poll</h2>
    <form class="poll-form" method="POST">
        <div class="form-group">
            <label>Poll Title</label>
            <input type="text" name="title" placeholder="Eg: BCA Tour" required>
        </div>
        <div class="form-group">
            <label>Category</label>
            <input type="text" name="category" placeholder="Eg: Tour" required>
        </div>
        <div class="form-group">
            <label>Question</label>
            <textarea name="question" required></textarea>
        </div>
        <div class="form-group">
            <label>Poll Options</label>
            <div id="optionsContainer">
                <input type="text" name="options[]" placeholder="Option 1" required style="margin-bottom:10px; display:block; width:100%;">
                <input type="text" name="options[]" placeholder="Option 2" required style="margin-bottom:10px; display:block; width:100%;">
            </div>
            <button type="button" onclick="addOption()">+ Add Option</button>
        </div>
        <div class="form-group">
            <label>Poll Date</label>
            <input type="date" name="date" required>
        </div>
        <button type="submit" name="create_poll" class="submit-btn">Create Poll</button>
    </form>
</section>

<script>
function addOption() {
    const container = document.getElementById('optionsContainer');
    const input = document.createElement('input');
    input.type = 'text';
    input.name = 'options[]';
    input.placeholder = 'New Option';
    input.style = "margin-bottom:10px; display:block; width:100%;";
    container.appendChild(input);
}
</script>