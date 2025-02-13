<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Leaderboard - Learning Quest</title>
    <link rel="stylesheet" href="leaderboard.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="https://via.placeholder.com/150x50?text=Learning+Quest" alt="Learning Quest Logo">
        </div>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="dashboard.html">Dashboard</a></li>
                <li><a href="quests.html">Quests</a></li>
                <li><a href="profile.html">Profile</a></li>
            </ul>
        </nav>
    </header>

    <section id="leaderboard-page">
        <div class="leaderboard-header">
            <h1>Leaderboard</h1>
            <p>See how you compare with others and aim for the top spot!</p>
        </div>

        <div class="leaderboard-table">
            <div class="leaderboard-header-row">
                <div class="leaderboard-header-item">Rank</div>
                <div class="leaderboard-header-item">Name</div>
                <div class="leaderboard-header-item">Points</div>
            </div>

            <!-- Top Players List -->
            <div class="leaderboard-row">
                <div class="leaderboard-item rank">1</div>
                <div class="leaderboard-item name">Liam</div>
                <div class="leaderboard-item points">2000</div>
            </div>
            <div class="leaderboard-row">
                <div class="leaderboard-item rank">2</div>
                <div class="leaderboard-item name">Ava</div>
                <div class="leaderboard-item points">1900</div>
            </div>
            <div class="leaderboard-row user-rank">
                <div class="leaderboard-item rank">3</div>
                <div class="leaderboard-item name">Emma</div>
                <div class="leaderboard-item points">1200</div>
            </div>
            <div class="leaderboard-row">
                <div class="leaderboard-item rank">4</div>
                <div class="leaderboard-item name">Olivia</div>
                <div class="leaderboard-item points">1100</div>
            </div>
            <div class="leaderboard-row">
                <div class="leaderboard-item rank">5</div>
                <div class="leaderboard-item name">Noah</div>
                <div class="leaderboard-item points">1000</div>
            </div>

            <!-- More players could be listed similarly -->
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <p>&copy; 2025 Learning Quest. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>

