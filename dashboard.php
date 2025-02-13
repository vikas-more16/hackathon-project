<?php
session_start(); // Start session to track login status
?>
<!DOCTYPE html>
<html lang="en">
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
                    <li><a href="dashboard.php">Dashboard</a></li>
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
                <img src="Learning_Quest_Media/a2.png" alt="User Profile Picture">
            </div>
            <div class="profile-info">
                <h2>Welcome back, Emma!</h2>
                <p>Level: <span>5</span></p>
                <p>Points: <span>1200</span></p>
                <p>Badges: <span>5</span></p>
            </div>
        </div>
    </section>

    <section id="user-progress">
        <h2>Your Progress</h2>
        <div class="progress-bar">
            <p>Math Mastery: Level 4</p>
            <div class="bar">
                <div class="progress" style="width: 80%"></div>
            </div>
        </div>
        <div class="progress-bar">
            <p>Grammar Wizard: Level 3</p>
            <div class="bar">
                <div class="progress" style="width: 60%"></div>
            </div>
        </div>
        <div class="progress-bar">
            <p>Science Explorer: Level 2</p>
            <div class="bar">
                <div class="progress" style="width: 40%"></div>
            </div>
        </div>
    </section>

    <section id="completed-quests">
        <h2>Completed Quests</h2>
        <div class="quests-list">
            <div class="quest-card">
                <h3>Math Marvels - Completed</h3>
                <p>Points Earned: 200</p>
                <p>Reward: Golden Star Badge</p>
            </div>
            <div class="quest-card">
                <h3>Grammar Galaxy - Completed</h3>
                <p>Points Earned: 150</p>
                <p>Reward: Silver Star Badge</p>
            </div>
        </div>
    </section>

    <section id="leaderboard">
        <h2>Your Rank</h2>
        <div class="leaderboard-info">
            <p>Current Rank: <span>45</span></p>
            <p>Top Players:</p>
            <ol>
                <li>1. Liam - 2000 points</li>
                <li>2. Ava - 1900 points</li>
                <li>3. Emma - 1200 points</li>
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
