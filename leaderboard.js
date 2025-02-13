const leaderboardData = [
    { rank: 1, name: "Liam", points: 2000 },
    { rank: 2, name: "Ava", points: 1900 },
    { rank: 3, name: "Emma", points: 1200 },
    { rank: 4, name: "Olivia", points: 1100 },
    { rank: 5, name: "Noah", points: 1000 },
    // Add more players as needed
];

const leaderboardTable = document.querySelector('.leaderboard-table');

function displayLeaderboard() {
    leaderboardData.forEach(player => {
        const playerRow = document.createElement('div');
        playerRow.classList.add('leaderboard-row');

        playerRow.innerHTML = `
            <div class="leaderboard-item rank">${player.rank}</div>
            <div class="leaderboard-item name">${player.name}</div>
            <div class="leaderboard-item points">${player.points}</div>
        `;

        // Highlight the user's rank (assuming "Emma" is the logged-in user)
        if (player.name === "Emma") {
            playerRow.classList.add('user-rank');
        }

        leaderboardTable.appendChild(playerRow);
    });
}

displayLeaderboard();
