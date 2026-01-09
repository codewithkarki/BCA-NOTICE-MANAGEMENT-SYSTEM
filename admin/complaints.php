<?php include 'inc/header.php'; ?>

<section class="complaint-management">

    <!-- HEADER -->
    <div class="complaint-header">
        <h2>Complaint Management</h2>
        <p>Read-only complaints submitted by students</p>
    </div>

    <!-- COMPLAINT TABLE -->
    <div class="complaint-table-wrapper">
        <table class="complaint-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Name</th>
                    <th>Semester</th>
                    <th>Anonymous</th>
                    <th>Date</th>
                    <th>View</th>
                </tr>
            </thead>

            <tbody id="complaintTableBody">
                <tr>
                    <td>1</td>
                    <td>Infrastructure</td>
                    <td>Ramesh Thapa</td>
                    <td>4th Semester</td>
                    <td>No</td>
                    <td>2026-01-05</td>
                    <td>
                        <button class="view-btn"
                            onclick="openComplaintModal(
                                'Infrastructure',
                                'Ramesh Thapa',
                                '4th Semester',
                                'No',
                                'The classroom projector is not working properly.',
                                '2026-01-05'
                            )">
                            View
                        </button>
                    </td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>Harassment</td>
                    <td>Anonymous</td>
                    <td>—</td>
                    <td>Yes</td>
                    <td>2026-01-03</td>
                    <td>
                        <button class="view-btn"
                            onclick="openComplaintModal(
                                'Harassment',
                                'Anonymous',
                                '—',
                                'Yes',
                                'A student is being verbally harassed during practical sessions.',
                                '2026-01-03'
                            )">
                            View
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- VIEW COMPLAINT MODAL -->
    <div class="modal" id="complaintModal">
        <div class="modal-content">
            <h3>Complaint Details</h3>

            <div class="detail"><strong>Complaint Type:</strong> <span id="cType"></span></div>
            <div class="detail"><strong>Name:</strong> <span id="cName"></span></div>
            <div class="detail"><strong>Semester:</strong> <span id="cSemester"></span></div>
            <div class="detail"><strong>Anonymous:</strong> <span id="cAnonymous"></span></div>
            <div class="detail"><strong>Date:</strong> <span id="cDate"></span></div>

            <div class="detail">
                <strong>Description:</strong>
                <p id="cDescription"></p>
            </div>

            <div class="modal-actions">
                <button class="cancel-btn" onclick="closeComplaintModal()">Close</button>
            </div>
        </div>
    </div>

</section>

<?php include 'inc/footer.php'; ?>
