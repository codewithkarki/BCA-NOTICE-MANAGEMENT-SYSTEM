<!-- Icluding Header  -->
 <?php
include 'inc/header.php';
?>
    <div class="page-container">
    <div class="complaint-card">
        <h2>📝 Student Complaint Form</h2>
        <p>Your concerns will be handled confidentially.</p>

        <form method="POST" onsubmit="return validateComplaint()">

            <div class="field-group">
                <label>Complaint Type</label>
                <select name="complaint_type" id="complaintType" onchange="handleComplaintType()" required>
                    <option value="">-- Select Complaint Type --</option>
                    <option value="Study Related">Study Related</option>
                    <option value="Examination">Examination</option>
                    <option value="Faculty Issue">Faculty Issue</option>
                    <option value="Harassment">Harassment</option>
                    <option value="Infrastructure">Infrastructure</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <!-- Identity fields -->
            <div id="identityFields">
                <div class="field-group">
                    <label>Your Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter your full name" required>
                </div>

                <div class="field-group">
                    <label>Semester</label>
                    <input type="text" name="semester" id="semester" placeholder="Eg: 4th Semester" required>
                </div>
            </div>

            <!-- Anonymous option -->
            <div class="checkbox-area" id="anonymousBox">
                <label>
                    <input type="checkbox" id="anonymous" name="anonymous" onchange="toggleAnonymous()">
                    Submit Anonymously
                </label>
            </div>

            <div class="field-group">
                <label>Complaint Description</label>
                <textarea name="description" placeholder="Describe your concern..." required></textarea>
            </div>

            <button type="submit">Submit Complaint</button>
        </form>
    </div>
</div>
<!-- Icluding Footer  -->
<?php
include 'inc/footer.php';
?>