<?php include 'inc/header.php';
require_once('inc/db_config.php');
require('inc/essentials.php');
  adminLogin(); ?>
<section class="poll-view">

    <div class="poll-header">
        <h2>Poll Management</h2>
        <p>View created polls and their status</p>
    </div>

    <div class="poll-table-wrapper">
        <table class="poll-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>View</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1</td>
                    <td>BCA Tour Destination</td>
                    <td>Tour</td>
                    <td>2026-01-10</td>
                    <td><span class="status active">Active</span></td>
                    <td>
                        <button class="view-btn" onclick="openPollResult()">View</button>
                    </td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>Class Start Time</td>
                    <td>Academic</td>
                    <td>2026-01-08</td>
                    <td><span class="status closed">Closed</span></td>
                    <td>
                        <button class="view-btn" onclick="openPollResult()">View</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- POLL RESULT MODAL -->
    <div class="modal" id="pollResultModal">
        <div class="modal-content">
            <h3>Poll Results</h3>

            <ul class="result-list">
                <li>Pokhara — 45%</li>
                <li>Chitwan — 25%</li>
                <li>Ilam — 20%</li>
                <li>Mustang — 10%</li>
            </ul>

            <button class="cancel-btn" onclick="closePollResult()">Close</button>
        </div>
    </div>

</section>
<?php include 'inc/footer.php'; ?>