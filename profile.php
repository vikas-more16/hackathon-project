<?php
require "connection.php"; 
session_start();

if (!isset($_SESSION["user_id"])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Fetch user details from the database
$user_id = $_SESSION["user_id"];
$query = $conn->prepare("SELECT user_name, full_name, email,points ,level  FROM users WHERE id = ?");
$query->bind_param("i", $user_id);
$query->execute();
$result = $query->get_result();
$user = $result->fetch_assoc();

$query->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile - Learning Quest</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Chewy&family=Roboto:ital,wght@0,100..900;1,100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="profile.css">
</head>

<body>
    <header>
        <div class="logo">
            <img src="logopng.png" alt="Learning Quest Logo">
            <div class="web_name">
                <p>Learning Quest<br><span id="slowgun">Play and learn</span></p>
            </div>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="quests.php" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        games
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="math-marvels-quest.php">Math Marvels</a></li>
                        <li><a class="dropdown-item" href="grammar-galaxy-quest.php">Grammar Galaxy</a></li>
                        <li><a class="dropdown-item" href="science-island-quest.php">Science Island</a></li>
                    </ul>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="quests.php" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Quests
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="math-marvels-quest.php">Math Marvels</a></li>
                        <li><a class="dropdown-item" href="grammar-galaxy-quest.php">Grammar Galaxy</a></li>
                        <li><a class="dropdown-item" href="science-island-quest.php">Science Island</a></li>
                        <li><a class="dropdown-item" href="interactive-games.php">Interactive Games</a></li>
                    </ul>
                </li>
                <?php if (isset($_SESSION["user_id"])): ?>
                    <!-- Show Profile & Dashboard when user is logged in -->
                    <li><a href="dashboard.php">Leaderboard</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li class="button"><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <!-- Show Login & Register when user is NOT logged in -->
                    <li class="button"><a href="login.html">Login</a></li>
                    <li class="button"><a href="register.html">Register</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <section id="profile-page">
        <div class="profile-container">
            <div class="profile-header">
                <h1>Welcome, <?php echo htmlspecialchars($user["full_name"]); ?>
                </h1>
                <p>Your learning adventure continues here</p>
            </div>

            <div class="profile-info">
                <div class="profile-avatar">
                    <img src="a5.png" alt="User Avatar">
                </div>
                <div class="profile-details">
                    <h2><?php echo htmlspecialchars($user["full_name"]); ?></h2>
                    <p>Username: <?php echo htmlspecialchars($user["user_name"]); ?></p>
                    <p>Email: <?php echo htmlspecialchars($user["email"]); ?></p>
                    <p>Level: <?php echo htmlspecialchars($user["level"]); ?></p>
                    <p>Total Points: <?php echo htmlspecialchars($user["points"]); ?></p>
                    <div class="badge-container">
                        <span class="badge">🏆 Achivements</span>
                    </div>
                </div>
            </div>
        </div>

       
        <div class="edit-profile">
            <a href="edit-profile.html" class="cta-button">Edit Profile</a>
        </div>
    </section>
    <footer>
        <div class="footer-content">
            <p>&copy; 2025 Learning Quest. All rights reserved.</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>