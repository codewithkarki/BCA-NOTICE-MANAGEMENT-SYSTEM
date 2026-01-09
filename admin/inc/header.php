
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="css\header.css">
    <link rel="stylesheet" href="css\dashboard.css">
    <link rel="stylesheet" href="css\notice.css">
    <link rel="stylesheet" href="css\complaints.css">
    <link rel="stylesheet" href="css\feedbacks.css">
    <link rel="stylesheet" href="css\poll.css">
    <link rel="stylesheet" href="css\view_polls.css">
    <link rel="stylesheet" href="css\verification.css">

  
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <header class="main-header">
    <div class="logo-area">
        <img src="images\logo\logo.png" alt="NMS Logo">
        <span>BCA NMS</span>
    </div>

    <nav class="nav-links" id="navLinks">

    <a href="dashboard.php">Dashboard</a>
    <a href="notice.php">Notice</a>
    <a href="complaints.php">Complaints</a>
    <a href="feedbacks.php">Feedbacks</a>

    <!-- POLL DROPDOWN -->
    <div class="nav-dropdown">
        <button class="dropdown-toggle">
            Polls <i class="fas fa-chevron-down"></i>
        </button>

        <div class="dropdown-menu">
            <a href="poll.php">Create Poll</a>
            <a href="view_polls.php">View Polls</a>
        </div>
    </div>

    <a href="verification.php">Users</a>
    <a href="logout.php" class="logout-btn">Logout</a>

</nav>

    <div class="menu-icon" id="menuIcon">
        <i class="fas fa-bars"></i>
    </div>
</header>
    <script src="script\header.js"></script>
</body>
</html>