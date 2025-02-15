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
$query = $conn->prepare("SELECT user_name, full_name, email,points,level FROM users WHERE id = ?");
$query->bind_param("i", $user_id);
$query->execute();
$result = $query->get_result();
$user = $result->fetch_assoc();

$query->close();
$conn->close();
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Dashboard - Learning Quest</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chewy&family=Roboto:ital,wght@0,100..900;1,100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="dashboard.css">
</head>
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
                    <a class="nav-link dropdown-toggle" href="quests.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      games
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="math-marvels-quest.php">Math Marvels</a></li>
                      <li><a class="dropdown-item" href="grammar-galaxy-quest.php">Grammar Galaxy</a></li>
                      <li><a class="dropdown-item" href="science-island-quest.php">Science Island</a></li>
                    </ul>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="quests.html" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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

    <section id="user-profile">
        <div class="profile-container">
            <div class="profile-pic">
                <img src="a2.png" alt="User Profile Picture">
            </div>
            <div class="profile-info">
                <h2>Welcome back, <?php echo htmlspecialchars($user["full_name"]); ?></h2>
                <p>Level: <span><?php echo htmlspecialchars($user["level"]); ?></span></p>
                <p>Points: <span><?php echo htmlspecialchars($user["points"]); ?></span></p>
                <p>Badges 🏆: <span>5</span></p>
            </div>
        </div>
    </section>

    <?php
    require "connection.php"; 

    $query = $conn->query("SELECT user_name, points FROM users WHERE user_type = 'student' ORDER BY points DESC");

// Initialize rank and user data array
$users = [];
$rank = 1;
$currentUserRank = null;
$currentUsername = $_SESSION['user_name'] ?? 'Guest';

// Fetch all users and check current user's rank
while ($row = $query->fetch_assoc()) {
    $users[] = [
        'rank' => $rank,
        'name' => $row['user_name'],
        'points' => $row['points']
    ];

    // Check if this is the current user's rank
    if ($row['user_name'] == $currentUsername) {
        $currentUserRank = $rank;
    }

    $rank++;
}
?>

    <section id="leaderboard">
        <h2>Your Rank</h2>
        <div class="leaderboard-info">
            <p>Current Rank: <span><?= $currentUserRank ?? 'N/A'; ?></span></p>
            <p>Top Players:</p>
            <ol>
                <?php foreach ($users as $user): ?>
                    <li><?= $user['rank']; ?>. <?= htmlspecialchars($user['name']); ?> - <?= $user['points']; ?> points</li>
                <?php endforeach; ?>
            </ol>
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
