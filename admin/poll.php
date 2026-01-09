<?php include 'inc/header.php';
require_once('inc/db_config.php');
require('inc/essentials.php');
  adminLogin(); ?>

   <section class="poll-create">

    <div class="poll-header">
        <h2>Create Poll</h2>
        <p>Create a new poll for students</p>
    </div>

    <form class="poll-form" id="createPollForm">

        <div class="form-group">
            <label for="pollTitle">Poll Title</label>
            <input type="text" id="pollTitle" placeholder="Eg: BCA Tour Destination" required>
        </div>

        <div class="form-group">
            <label for="pollCategory">Poll Category</label>
            <input type="text" id="pollCategory" placeholder="Eg: Academic, Tour, General" required>
        </div>

        <div class="form-group">
            <label for="pollQuestion">Poll Question</label>
            <textarea id="pollQuestion" placeholder="Enter poll question" required></textarea>
        </div>

        <div class="form-group">
            <label>Poll Options</label>
            <div id="optionsContainer">
                <input type="text" placeholder="Option 1" required>
                <input type="text" placeholder="Option 2" required>
            </div>
            <button type="button" class="add-option-btn" onclick="addOption()">+ Add Option</button>
        </div>

        <div class="form-group">
            <label for="pollDate">Poll Date</label>
            <input type="date" id="pollDate" required>
        </div>

        <button type="submit" class="submit-btn">Create Poll</button>

    </form>

</section>

<?php include 'inc/footer.php'; ?>
