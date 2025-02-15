<?php
session_start(); // Start session

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Learning Quest - Homepage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chewy&family=Roboto:ital,wght@0,100..900;1,100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
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
                  </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="quests.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Quests
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="math-marvels-quest.php">Fun with math</a></li>
                      <li><a class="dropdown-item" href="grammar-galaxy-quest.php">Language</a></li>
                      <li><a class="dropdown-item" href="interactive-games.php">logical quest</a></li>
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

    <section id="hero">
        <div class="hero-content">
            <h1 class="chewy-regular">Welcome to Learning Quest!</h1>
            <a href="#featured-quests" class="cta-button" >Start Your Adventure</a>
            <a href="#VirtualClass" class="cta-button" >Join Class</a>
        </div>
    </section>

    <section id="why-choose-us">
        <div class="reasons">
           <a href="interactive-games.php">
            <div class="reason-card">
                <img src="interactive_game_img.png" alt="Interactive Games">
                <h3>Interactive Games</h3>
            </div>
           </a>
           <a href="track-progress.php">
            <div class="reason-card">
                <img src="progress_img.png" alt="Progress Tracking">
                <h3>Your Progress</h3>
            </div>
           </a>
            <a href="rewards-badges.php">
                <div class="reason-card">
                    <img src="b9.png" alt="Rewards & Badges">
                    <h3>Rewards & Badges</h3>
                </div>
            </a>
        </div>
    </section>

    <section id="featured-quests">
        <div id="Math Marvels" class="quest-cards">
            <a href="math-marvels-quest.php">
                <div class="quest-card">
                    <img src="math_game_img.png" alt="Quest Image">
                    <h3>Math Marvels</h3>
                </div>
            </a>
            <a href="grammar-galaxy-quest.php">
                <div class="quest-card">
                    <img src="language_game_img.png" alt="Quest Image">
                    <h3>Language</h3>
                </div>
            </a>
           <a href="science-island-quest.php">
            <div class="quest-card">
                <img src="scienceisland_game_img.png" alt="Quest Image">
                <h3>Science Island</h3>
            </div>
           </a>
        </div>
        <div class="quest-cards">
            <a href="math-marvels-quest.php">
                <div class="quest-card">
                    <img src="math_game_img.png" alt="Quest Image">
                    <h3>Fun with math</h3>
                </div>
            </a>
            <a href="grammar-galaxy-quest.php">
                <div class="quest-card">
                    <img src="language_game_img.png" alt="Quest Image">
                    <h3>Language quest</h3>
                </div>
            </a>
           <a href="science-island-quest.php">
            <div class="quest-card">
                <img src="scienceisland_game_img.png" alt="Quest Image">
                <h3>logical quest</h3>
            </div>
           </a>
        </div>
    </section>

    <section id="VirtualClass">
        <div>
           <form action="jointform.html">
            <h2>Join a Virtual class</h2>
            <button>Join</button>
           </form>
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
