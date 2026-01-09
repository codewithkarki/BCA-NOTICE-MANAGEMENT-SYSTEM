<?php include 'inc/header.php'; 
require_once('inc/db_config.php');
require('inc/essentials.php');
  adminLogin();?>

<section class="notice-management">

    <!-- HEADER -->
    <div class="notice-header">
        <h2>Notice Management</h2>
        <button class="add-btn" onclick="openNoticeModal()">+ Add Notice</button>
    </div>

    <!-- NOTICE TABLE -->
    <div class="notice-table-wrapper">
        <table class="notice-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody id="noticeTableBody">
                <tr>
                    <td>1</td>
                    <td>BCA Exam Schedule</td>
                    <td>2026-01-05</td>
                    <td>
                        <button class="view-btn"
                            onclick="viewImage('assets/notices/exam.jpg')">
                            View
                        </button>
                    </td>
                    <td><span class="status active">Active</span></td>
                    <td>
                        <button class="edit-btn" onclick="openNoticeModal(true)">Edit</button>
                        <button class="delete-btn" onclick="deleteNotice()">Delete</button>
                    </td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>Holiday Notice</td>
                    <td>2026-01-02</td>
                    <td>—</td>
                    <td><span class="status inactive">Inactive</span></td>
                    <td>
                        <button class="edit-btn" onclick="openNoticeModal(true)">Edit</button>
                        <button class="delete-btn" onclick="deleteNotice()">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- ADD / EDIT NOTICE MODAL -->
    <div class="modal" id="noticeModal">
        <div class="modal-content">
            <h3 id="modalTitle">Add Notice</h3>

            <form id="noticeForm">
                <input type="hidden" id="noticeId">

                <div class="form-group">
                    <label>Notice Title</label>
                    <input type="text" id="noticeTitle" required>
                </div>

                <div class="form-group">
                    <label>Date</label>
                    <input type="date" id="noticeDate" required>
                </div>

                <div class="form-group">
                    <label>Image (optional)</label>
                    <input type="file" id="noticeImage" accept="image/*">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select id="noticeStatus">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>

                <div class="modal-actions">
                    <button type="submit" class="save-btn">Save</button>
                    <button type="button" class="cancel-btn" onclick="closeNoticeModal()">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <!-- IMAGE PREVIEW MODAL -->
    <div class="modal" id="imageModal">
        <div class="modal-content image-preview">
            <span class="close-preview" onclick="closeImageModal()">×</span>
            <img id="previewImage" src="" alt="Notice Image">
        </div>
    </div>

</section>

<?php include 'inc/footer.php'; ?>