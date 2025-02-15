<?php
session_start();
require 'connection.php'; // Database connection file

if (!isset($_SESSION['user_name'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

// Fetch user progress
$username = $_SESSION['user_name'];
$query = $conn->prepare("SELECT level, points FROM users WHERE user_name = ?");
$query->bind_param("s", $username);
$query->execute();
$result = $query->get_result();
$user = $result->fetch_assoc();
$currentLevel = $user['level'];
$score = $user['points'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emoji Math Game</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            background: #f0f9ff;
            text-align: center;
        }
        .game-area {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .btn {
            padding: 15px 25px;
            margin: 10px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 20px;
            transition: all 0.3s;
            background: #4CAF50;
            color: white;
        }
        .btn:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .option-btn {
            font-size: 30px;
            min-width: 100px;
            background: #2196F3;
        }
        .quit-btn {
            background: #f44336;
        }
        .completed {
            background: gray !important;
        }
        .question {
            font-size: 35px;
            margin: 30px 0;
            padding: 20px;
            background: #f5f5f5;
            border-radius: 15px;
        }
        .score {
            font-size: 20px;
            color: #4CAF50;
            margin: 15px 0;
        }
        .hidden {
            display: none;
        }
        .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
            z-index: 100;
            animation: popup 0.5s ease-out;
        }
    </style>
</head>
<body>
    <div class="game-area">
        <h1>Fun Math with Emojis! 🎮</h1>
        
        <div id="levelSelect">
            <h2>Choose a Level:</h2>
            <div id="levelButtons"></div>
        </div>

        <div id="gameArea" class="hidden">
            <div class="score" id="scoreDisplay">Score: <?= $score; ?></div>
            <h2 id="levelDisplay"></h2>
            <div class="question" id="questionDisplay"></div>
            <div id="options"></div>
            <button class="btn quit-btn" onclick="goHome()">❌ Quit</button>
        </div>
    </div>

    <script>
        const maxLevel = 10;
        let currentLevel = <?= $currentLevel; ?>;
        let score = <?= $score; ?>;
        let currentQuestion = {};

        window.onload = function () {
            loadCompletedLevels();
            createLevelButtons();
        };

        function loadCompletedLevels() {
            return JSON.parse(localStorage.getItem("completedLevels")) || [];
        }

        function saveCompletedLevel(level) {
            let completedLevels = loadCompletedLevels();
            if (!completedLevels.includes(level)) {
                completedLevels.push(level);
                localStorage.setItem("completedLevels", JSON.stringify(completedLevels));

                // Send progress to server
                updateProgress(level, score);
            }
        }

        function createLevelButtons() {
            const levelButtons = document.getElementById("levelButtons");
            levelButtons.innerHTML = "";
            let completedLevels = loadCompletedLevels();

            for (let i = 1; i <= maxLevel; i++) {
                const button = document.createElement("button");
                button.className = "btn";
                button.textContent = `Level ${i}`;
                if (completedLevels.includes(i)) {
                    button.classList.add("completed");
                    button.textContent += " ✅";
                }
                button.onclick = () => startLevel(i);
                levelButtons.appendChild(button);
            }
        }

        function startLevel(level) {
            currentLevel = level;
            document.getElementById("levelSelect").classList.add("hidden");
            document.getElementById("gameArea").classList.remove("hidden");
            updateLevelDisplay();
            score = 0;
            updateScore();
            generateQuestion();
        }

        function updateLevelDisplay() {
            document.getElementById("levelDisplay").textContent = `Level ${currentLevel}`;
        }

        function generateQuestion() {
            let num1 = Math.floor(Math.random() * 3) + 1;
            let num2 = Math.floor(Math.random() * 3) + 1;

            currentQuestion = {
                question: `${num1} + ${num2} = ?`,
                answer: num1 + num2,
                options: generateOptions(num1 + num2, 8)
            };

            displayQuestion();
        }

        function generateOptions(answer, max) {
            let options = [answer];
            while (options.length < 4) {
                let option = Math.floor(Math.random() * max) + 1;
                if (!options.includes(option)) {
                    options.push(option);
                }
            }
            return options.sort(() => Math.random() - 0.5);
        }

        function displayQuestion() {
            document.getElementById("questionDisplay").innerHTML = currentQuestion.question;
            const optionsDiv = document.getElementById("options");
            optionsDiv.innerHTML = "";
            currentQuestion.options.forEach(option => {
                const button = document.createElement("button");
                button.className = "btn option-btn";
                button.textContent = option;
                button.onclick = () => checkAnswer(option);
                optionsDiv.appendChild(button);
            });
        }

        function checkAnswer(selected) {
            if (Number(selected) === currentQuestion.answer) {
                score += 10;
                updateScore();
                saveCompletedLevel(currentLevel);
                updateProgress(currentLevel, score);
                showPopup("🎉 Correct! Next Level?", true);
            } else {
                showPopup("❌ Try Again!", false);
            }
        }

        function updateProgress(level, points) {
            fetch('update_progress.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `level=${level}&points=${points}`
            });
        }

        function updateScore() {
            document.getElementById("scoreDisplay").textContent = `Score: ${score}`;
        }

        function goHome() {
            document.getElementById("gameArea").classList.add("hidden");
            document.getElementById("levelSelect").classList.remove("hidden");
        }
    </script>
</body>
</html>
