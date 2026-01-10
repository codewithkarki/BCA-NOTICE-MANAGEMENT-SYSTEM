<?php 
session_start();
include 'inc/header.php'; 
require_once('admin/inc/db_config.php');
if (!isset($_SESSION['user_id'])) {
   header("Location: login.php");
    exit();
}

// Fetch only Active notices from the database
$query = "SELECT * FROM `notices` WHERE `status` = 'Active' ORDER BY `date` DESC";
$result = mysqli_query($con, $query);
?>

<section class="notice-page">
    <h2 class="page-title">📢 Notices</h2>

    <div class="notice-list">

        <?php if(mysqli_num_rows($result) > 0): ?>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                
                <div class="notice-card" <?php echo $row['image'] ? 'data-image="admin/assets/notices/'.$row['image'].'"' : ''; ?>>
                    <div class="notice-info">
                        <h3 class="notice-title"><?php echo $row['title']; ?></h3>
                        <p class="notice-meta">
                            <span>📅 <?php echo $row['date']; ?></span>
                            <span>📌 BCA Notice</span>
                        </p>
                    </div>

                    <?php if($row['image']): ?>
                        <button class="view-btn">View</button>
                    <?php else: ?>
                        <button class="view-btn disabled">No Image</button>
                    <?php endif; ?>
                </div>

            <?php endwhile; ?>
        <?php else: ?>
            <p style="text-align:center;">No active notices at the moment.</p>
        <?php endif; ?>

    </div>
</section>

<div class="notice-modal" id="noticeModal">
    <span class="close-modal">&times;</span>
    <img id="modalImage" src="" alt="Notice Image">
</div>

<script>
    const noticeCards = document.querySelectorAll('.notice-card[data-image]');
    const modal = document.getElementById('noticeModal');
    const modalImg = document.getElementById('modalImage');
    const closeBtn = document.querySelector('.close-modal');

    noticeCards.forEach(card => {
        card.querySelector('.view-btn').addEventListener('click', () => {
            const imgSrc = card.getAttribute('data-image');
            modalImg.src = imgSrc;
            modal.classList.add('active');
        });
    });

    closeBtn.onclick = () => {
        modal.classList.remove('active');
    };

    // Close modal when clicking outside the image
    window.onclick = (event) => {
        if (event.target == modal) {
            modal.classList.remove('active');
        }
    };
</script>

<?php include 'inc/footer.php'; ?>