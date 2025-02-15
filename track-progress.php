<?php
session_start(); // Start session to track login status
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Track Your Progress - Learning Quest</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chewy&family=Roboto:ital,wght@0,100..900;1,100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="track-progress.css">
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
                    <a class="nav-link dropdown-toggle" href="quests.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      games
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="math-marvels-quest.php">Math Marvels</a></li>
                      <li><a class="dropdown-item" href="grammar-galaxy-quest.php">Grammar Galaxy</a></li>
                      <li><a class="dropdown-item" href="science-island-quest.php">Science Island</a></li>
                    </ul>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="quests.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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

    <section id="progress-page">
        <div class="progress-header">
            <h1>Track Your Progress</h1>
            <p>See how far you've come in your learning adventure!</p>
        </div>

        <div class="progress-cards">
            <div class="progress-card">
                <h3>Quest Progress</h3>
                <p>Current Quest: Math Mania</p>
                <div class="progress-bar-container">
                    <div class="progress-bar" style="width: 75%"></div>
                </div>
                <p>75% Completed</p>
            </div>

            <div class="progress-card">
                <h3>Points Earned</h3>
                <p>Total Points: 1500</p>
                <p>Points Needed for Next Level: 2000</p>
                <div class="progress-bar-container">
                    <div class="progress-bar" style="width: 75%"></div>
                </div>
            </div>

            <div class="progress-card">
                <h3>Achievements</h3>
                <ul>
                    <li>Math Magician Badge</li>
                    <li>Grammar Guru Badge</li>
                    <li>Science Explorer Badge</li>
                    <li>First Quest Completed Badge</li>
                </ul>
            </div>

            <div class="progress-card">
                <h3>Leaderboard</h3>
                <p>Your Rank: 4th</p>
                <p>Keep going to rise to the top!</p>
            </div>
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
