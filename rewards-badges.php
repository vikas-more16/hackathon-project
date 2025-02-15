<?php
session_start(); // Start session to track login status
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rewards & Badges - Learning Quest</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chewy&family=Roboto:ital,wght@0,100..900;1,100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="rewards-badges.css">
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

    <section id="rewards-page">
        <div class="rewards-header">
            <h1>Your Rewards & Badges</h1>
            <p>View the badges you've earned and the rewards you can unlock!</p>
        </div>

        <div class="rewards-content">
            <div class="badges">
                <h2>Badges Earned</h2>
                <div class="badge-gallery">
                    <div class="badge">
                        <img src="https://via.placeholder.com/100?text=Math" alt="Math Badge">
                        <p>Math Master</p>
                    </div>
                    <div class="badge">
                        <img src="https://via.placeholder.com/100?text=Science" alt="Science Badge">
                        <p>Science Explorer</p>
                    </div>
                    <div class="badge">
                        <img src="https://via.placeholder.com/100?text=Grammar" alt="Grammar Badge">
                        <p>Grammar Guru</p>
                    </div>
                    <div class="badge">
                        <img src="https://via.placeholder.com/100?text=Quest" alt="Quest Badge">
                        <p>First Quest Completed</p>
                    </div>
                </div>
            </div>

            <div class="available-rewards">
                <h2>Available Rewards</h2>
                <div class="reward">
                    <img src="https://via.placeholder.com/100?text=Gift+Card" alt="Gift Card">
                    <p>Gift Card: 2000 Points</p>
                    <p>Redeemable for a $10 gift card after earning 2000 points.</p>
                </div>
                <div class="reward">
                    <img src="https://via.placeholder.com/100?text=Extra+Game" alt="Extra Game">
                    <p>Unlock Extra Game: 3000 Points</p>
                    <p>Get access to an additional game after reaching 3000 points.</p>
                </div>
                <div class="reward">
                    <img src="https://via.placeholder.com/100?text=Stickers" alt="Stickers">
                    <p>Stickers Pack: 1500 Points</p>
                    <p>Get a pack of learning-themed stickers once you reach 1500 points!</p>
                </div>
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
