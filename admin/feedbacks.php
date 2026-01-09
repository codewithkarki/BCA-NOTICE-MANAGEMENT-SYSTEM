<?php include 'inc/header.php'; ?>
<section class="feedback-management">

    <!-- HEADER -->
    <div class="feedback-header">
        <h2>Feedback Management</h2>
        <p>Read-only feedback submitted by students</p>
    </div>

    <!-- FEEDBACK TABLE -->
    <div class="feedback-table-wrapper">
        <table class="feedback-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Subject</th>
                    <th>Rating</th>
                    <th>Date</th>
                    <th>View</th>
                </tr>
            </thead>

            <tbody id="feedbackTableBody">
                <tr>
                    <td>1</td>
                    <td>Learning Experience</td>
                    <td>
                        <span class="stars">★★★★★</span>
                    </td>
                    <td>2026-01-06</td>
                    <td>
                        <button class="view-btn"
                            onclick="openFeedbackModal(
                                'Learning Experience',
                                'The system is very helpful and easy to use.',
                                5,
                                '2026-01-06'
                            )">
                            View
                        </button>
                    </td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>—</td>
                    <td>
                        <span class="stars">★★★☆☆</span>
                    </td>
                    <td>2026-01-04</td>
                    <td>
                        <button class="view-btn"
                            onclick="openFeedbackModal(
                                '—',
                                'Overall good, but UI can be improved slightly.',
                                3,
                                '2026-01-04'
                            )">
                            View
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- VIEW FEEDBACK MODAL -->
    <div class="modal" id="feedbackModal">
        <div class="modal-content">
            <h3>Feedback Details</h3>

            <div class="detail"><strong>Subject:</strong> <span id="fSubject"></span></div>
            <div class="detail"><strong>Rating:</strong> <span id="fRating"></span></div>
            <div class="detail"><strong>Date:</strong> <span id="fDate"></span></div>

            <div class="detail">
                <strong>Message:</strong>
                <p id="fMessage"></p>
            </div>

            <div class="modal-actions">
                <button class="cancel-btn" onclick="closeFeedbackModal()">Close</button>
            </div>
        </div>
    </div>

</section>

<?php include 'inc/footer.php'; ?>