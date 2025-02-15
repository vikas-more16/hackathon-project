<?php
session_start(); // Start session to track login status
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Math Marvels Quest - Learning Quest</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chewy&family=Roboto:ital,wght@0,100..900;1,100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="math-marvels-quest.css">
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

    <section id="math-marvels-quest">
        <div class="quest-header">
            <h1>Math Marvels Quest</h1>
        </div>

        <div class="quest-info">
            <h3>Progress</h3>
            <div class="progress-bar-container">
                <div class="progress-bar" style="width: 40%"></div>
            </div>
            <p>40% Completed</p>

            <h3>levels</h3>
            <ul class="challenges-list">
                <li class="challenge-item">

                <div class="quest-cards">
                    <h4>Challenge 1: Addition problem</h4>
                    <img src="https://via.placeholder.com/300" alt="Card Image">
                                      <div class="container"> 

                    <a href="maths_challenge-1.php"><button class="start-challenge">Start Challenge</button></a>
                </div>
             </li>
                
                <li class="challenge-item">
                    <h4>Challenge 2: Subtraction Mastery</h4>
                    <button class="start-challenge">Start Challenge</button>
                </li>
                <li class="challenge-item">
                    <h4>Challenge 3: Multiplication Wizard</h4>
                    <button class="start-challenge">Start Challenge</button>
                </li>
                <li class="challenge-item">
                    <h4>Challenge 4: Division Champion</h4>
                    <button class="start-challenge">Start Challenge</button>
                </li>
            </ul>

            <h3>Rewards</h3>
            <ul class="rewards-list">
                <li>Earn 100 Points for Completing one Challenge</li>
                <li>Unlock the "Addition problem" Badge <img class="img" src="b1.png" alt="badge"></li>
                <li>Unlock the "Subtraction Mastery" Badge <img class="img" src="b2.png" alt="badge"></li>
                <li>Unlock the "Multiplication Wizard" Badge <img class="img" src="b3.png" alt="badge"></li>
                <li>Unlock the "Division Champion" Badge <img class="img" src="b4.png" alt="badge"></li>
            </ul>
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
