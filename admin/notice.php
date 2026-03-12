<?php
require_once('inc/db_config.php');
require('inc/essentials.php');
adminLogin();

// --- LOGIC SECTION ---
if (isset($_GET['del'])) {
    $id = mysqli_real_escape_string($con, $_GET['del']);
    $res = mysqli_query($con, "SELECT `image` FROM `notices` WHERE `id`='$id'");
    $fetch = mysqli_fetch_assoc($res);
    if ($fetch['image'] != '') {
        unlink("images/notices/" . $fetch['image']);
    }
    $q = "DELETE FROM `notices` WHERE `id`='$id'";
    if (mysqli_query($con, $q)) {
        echo "<script>alert('Notice Deleted!'); window.location.href='notice.php';</script>";
    }
}

if (isset($_POST['save_notice'])) {
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $date = $_POST['date'];
    $status = $_POST['status'];
    $id = $_POST['notice_id'];

    if ($id == "") {
        $img = $_FILES['image']['name'];
        if ($img != "") {
            $img_ext = pathinfo($img, PATHINFO_EXTENSION);
            $new_name = time() . '.' . $img_ext;
            move_uploaded_file($_FILES['image']['tmp_name'], "images/notices/" . $new_name);
        } else { $new_name = ""; }
        $q = "INSERT INTO `notices` (`title`, `date`, `image`, `status`) VALUES ('$title', '$date', '$new_name', '$status')";
    } else {
        $img = $_FILES['image']['name'];
        if ($img != "") {
            $img_ext = pathinfo($img, PATHINFO_EXTENSION);
            $new_name = time() . '.' . $img_ext;
            move_uploaded_file($_FILES['image']['tmp_name'], "images/notices/" . $new_name);
            $q = "UPDATE `notices` SET `title`='$title', `date`='$date', `image`='$new_name', `status`='$status' WHERE `id`='$id'";
        } else {
            $q = "UPDATE `notices` SET `title`='$title', `date`='$date', `status`='$status' WHERE `id`='$id'";
        }
    }

    if (mysqli_query($con, $q)) {
        echo "<script>alert('Success!'); window.location.href='notice.php';</script>";
    }
}

$notices_res = mysqli_query($con, "SELECT * FROM `notices` ORDER BY `id` DESC");
include 'inc/header.php';
?>

<style>
    /* Keeps the table tidy while showing the image */
    .notice-thumbnail {
        width: 80px;
        height: 50px;
        object-fit: cover;
        border-radius: 4px;
        border: 1px solid #ddd;
        cursor: pointer;
        transition: transform 0.2s;
    }
    .notice-thumbnail:hover {
        transform: scale(1.1);
    }
</style>

<section class="notice-management">
    <div class="notice-header">
        <h2>Notice Management</h2>
        <button class="add-btn" onclick="openNoticeModal()">+ Add Notice</button>
    </div>

    <div class="notice-table-wrapper">
        <table class="notice-table">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Image</th> <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sn = 1;
                while ($row = mysqli_fetch_assoc($notices_res)):
                ?>
                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td>
                            <?php if ($row['image'] != ''): ?>
                                <img src="images/notices/<?php echo $row['image']; ?>" 
                                     class="notice-thumbnail" 
                                     onclick="viewImage('images/notices/<?php echo $row['image']; ?>')"
                                     alt="Notice">
                            <?php else: ?> 
                                <span style="color: #ccc;">No Image</span> 
                            <?php endif; ?>
                        </td>
                        <td><span class="status <?php echo strtolower($row['status']); ?>"><?php echo $row['status']; ?></span></td>
                        <td>
                            <button class="edit-btn" onclick='editNotice(<?php echo json_encode($row); ?>)'>Edit</button>
                            <button class="delete-btn" onclick="if(confirm('Delete?')) window.location.href='notice.php?del=<?php echo $row['id']; ?>'">Delete</button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <div class="modal" id="noticeModal">
        <div class="modal-content">
            <h3 id="modalTitle">Add Notice</h3>
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="notice_id" id="noticeId">
                <div class="form-group">
                    <label>Notice Title</label>
                    <input type="text" name="title" id="noticeTitle" required>
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="date" id="noticeDate" required>
                </div>
                <div class="form-group">
                    <label>Notice Image</label>
                    <input type="file" name="image" accept="image/*">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" id="noticeStatus">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
                <div class="modal-actions">
                    <button type="submit" name="save_notice" class="save-btn">Save</button>
                    <button type="button" class="cancel-btn" onclick="closeNoticeModal()">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal" id="imagePreviewModal" style="display:none; position:fixed; z-index:2000; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.8); justify-content:center; align-items:center;">
        <div style="position:relative; max-width:80%; max-height:80%;">
            <span onclick="closeImageModal()" style="position:absolute; top:-40px; right:0; color:white; font-size:40px; cursor:pointer;">&times;</span>
            <img id="modalImg" src="" style="width:100%; border:5px solid white; border-radius:5px;">
        </div>
    </div>
</section>

<script>
    function openNoticeModal() {
        document.getElementById('modalTitle').innerText = "Add Notice";
        document.getElementById('noticeId').value = "";
        document.getElementById('noticeModal').style.display = "flex";
    }

    function editNotice(data) {
        document.getElementById('modalTitle').innerText = "Edit Notice";
        document.getElementById('noticeId').value = data.id;
        document.getElementById('noticeTitle').value = data.title;
        document.getElementById('noticeDate').value = data.date;
        document.getElementById('noticeStatus').value = data.status;
        document.getElementById('noticeModal').style.display = "flex";
    }

    function closeNoticeModal() { document.getElementById('noticeModal').style.display = "none"; }

    function viewImage(path) {
        const modal = document.getElementById('imagePreviewModal');
        const img = document.getElementById('modalImg');
        img.src = path;
        modal.style.display = "flex";
    }

    function closeImageModal() { document.getElementById('imagePreviewModal').style.display = "none"; }

    window.onclick = function(event) {
        if (event.target == document.getElementById('noticeModal')) closeNoticeModal();
        if (event.target == document.getElementById('imagePreviewModal')) closeImageModal();
    }
</script>

<?php include 'inc/footer.php'; ?>