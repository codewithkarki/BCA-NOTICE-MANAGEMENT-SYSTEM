<?php 
session_start();
include 'inc/header.php'; 
require_once('admin/inc/db_config.php');

if (!isset($_SESSION['user_id'])) {
   header("Location: login.php");
   exit();
}

$query = "SELECT * FROM `notices` WHERE `status` = 'Active' ORDER BY `date` DESC";
$result = mysqli_query($con, $query);
?>

<style>
    /* Essential CSS for the modal to work */
    .notice-modal {
        display: none;
        position: fixed;
        z-index: 9999;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background: rgba(0,0,0,0.85);
        justify-content: center;
        align-items: center;
    }
    .notice-modal.active { display: flex; }
    .notice-modal img { max-width: 90%; max-height: 80%; border: 4px solid #fff; }
    .close-modal { position: absolute; top: 20px; right: 30px; color: white; font-size: 50px; cursor: pointer; }
</style>

<section class="notice-page">
    <h2 class="page-title">📢 Notices</h2>
    <div class="notice-list">
        <?php if(mysqli_num_rows($result) > 0): ?>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                
                <div class="notice-card" <?php echo $row['image'] ? 'data-image="admin/images/notices/'.$row['image'].'"' : ''; ?>>
                    <div class="notice-info">
                        <h3 class="notice-title"><?php echo $row['title']; ?></h3>
                        <p class="notice-meta">
                            <span>📅 <?php echo $row['date']; ?></span>
                            <span>📌 Official Notice</span>
                        </p>
                    </div>

                    <?php if($row['image']): ?>
                        <button class="view-btn">View</button>
                    <?php else: ?>
                        <button class="view-btn disabled" disabled>No Image</button>
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

    closeBtn.onclick = () => { modal.classList.remove('active'); };
    
    window.onclick = (event) => {
        if (event.target == modal) { modal.classList.remove('active'); }
    };
</script>

<?php include 'inc/footer.php'; ?>