<?php include 'inc/header.php'; ?>
<header class="admin-header">
    <h2>User Verification</h2>
    <p>Approve or reject student registrations</p>
</header>

<!-- MAIN -->
<section class="verification-wrapper">

    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Semester</th>
                    <th>Reg. No</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody id="userTable">
                <!-- Sample Row -->
                <tr>
                    <td>1</td>
                    <td>Sanjay KC Karki</td>
                    <td>sanjay@gmail.com</td>
                    <td>4th Semester</td>
                    <td>123456</td>
                    <td><span class="badge pending">Pending</span></td>
                    <td>
                        <button class="btn view" onclick="openModal()">View</button>
                        <button class="btn approve">Approve</button>
                        <button class="btn reject">Reject</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</section>

<!-- MODAL -->
<div class="modal" id="viewModal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>

        <h3>Student Details</h3>

        <div class="detail-grid">
            <p><strong>Full Name:</strong> Sanjay KC Karki</p>
            <p><strong>Email:</strong> sanjay@gmail.com</p>
            <p><strong>Phone:</strong> 98XXXXXXXX</p>
            <p><strong>Address:</strong> Dang, Nepal</p>
            <p><strong>Semester:</strong> 4th Semester</p>
            <p><strong>Registration No:</strong> 123456</p>
        </div>

        <div class="modal-actions">
            <button class="btn approve">Approve</button>
            <button class="btn reject">Reject</button>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
