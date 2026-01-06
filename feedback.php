<?php include 'inc/header.php'; ?>

    <div class="page-container">
    <div class="feedback-card">
        <h2>⭐ Student Feedback</h2>
        <p>Your feedback helps us improve the system.</p>

        <form method="POST">
            <label>Subject (Optional)</label>
            <input type="text" name="subject" placeholder="Eg: Fun, Games, Learning" />

            <label>Feedback Message</label>
            <textarea name="message" rows="5" placeholder="Write your feedback here..." required></textarea>

            <label>Rating</label>
            <select name="rating">
                <option value="5">★★★★★ Excellent</option>
                <option value="4">★★★★ Good</option>
                <option value="3">★★★ Average</option>
                <option value="2">★★ Poor</option>
                <option value="1">★ Very Poor</option>
            </select>

            <button type="submit">Submit Feedback</button>
        </form>
    </div>
</div>

<?php include 'inc/footer.php'; ?>