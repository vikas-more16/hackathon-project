<?php
session_start(); // Start session to track login status
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quests - Learning Quest</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chewy&family=Roboto:ital,wght@0,100..900;1,100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="quests.css">
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

    <section id="quests-page">
        <div class="quests-header">
            <h1>Available Quests</h1>
            <p>Choose a quest to embark on your learning adventure!</p>
        </div>

        <div class="quest-filters">
            <label for="subject">Filter by Subject:</label>
            <select id="subject">
                <option value="all">All</option>
                <option value="math">Math</option>
                <option value="grammar">Grammar</option>
                <option value="science">Science</option>
            </select>

            <label for="difficulty">Difficulty:</label>
            <select id="difficulty">
                <option value="all">All</option>
                <option value="easy">Easy</option>
                <option value="medium">Medium</option>
                <option value="hard">Hard</option>
            </select>
        </div>

        <div class="quest-cards">
            <a href="math-marvels-quest.html">            <div class="quest-card" data-category="math" data-difficulty="medium">
                <h3>Math Marvels</h3>
                <p><strong>Difficulty:</strong> Medium</p>
                <p><strong>Category:</strong> Math</p>
                <p>Join the adventure and master math through fun challenges and puzzles!</p>
                <a href="quest-details.html" class="cta-button">Start Quest</a>
            </div></a>

            <div class="quest-card" data-category="grammar" data-difficulty="easy">
                <h3>Grammar Galaxy</h3>
                <p><strong>Difficulty:</strong> Easy</p>
                <p><strong>Category:</strong> Grammar</p>
                <p>Explore the galaxy of grammar rules and improve your writing skills!</p>
                <a href="quest-details.html" class="cta-button">Start Quest</a>
            </div>

            <div class="quest-card" data-category="science" data-difficulty="hard">
                <h3>Science Island</h3>
                <p><strong>Difficulty:</strong> Hard</p>
                <p><strong>Category:</strong> Science</p>
                <p>Discover amazing science facts and experiments in a thrilling island adventure!</p>
                <a href="quest-details.html" class="cta-button">Start Quest</a>
            </div>

            <div class="quest-card" data-category="math" data-difficulty="easy">
                <h3>Math Magic</h3>
                <p><strong>Difficulty:</strong> Easy</p>
                <p><strong>Category:</strong> Math</p>
                <p>Solve magical math puzzles and learn through fun interactions!</p>
                <a href="quest-details.html" class="cta-button">Start Quest</a>
            </div>

            <div class="quest-card" data-category="grammar" data-difficulty="medium">
                <h3>Grammar Quest</h3>
                <p><strong>Difficulty:</strong> Medium</p>
                <p><strong>Category:</strong> Grammar</p>
                <p>Master grammar through fun challenges and quizzes!</p>
                <a href="quest-details.html" class="cta-button">Start Quest</a>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <p>&copy; 2025 Learning Quest. All rights reserved.</p>
        </div>
    </footer>

    <script src="quests.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
