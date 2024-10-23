
<?php
include 'db.php';

// Fetch all hamsters
$query = "SELECT * FROM hamsters";
$result = mysqli_query($conn, $query);
$hamsters = [];
while ($row = mysqli_fetch_assoc($result)) {
    $hamsters[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamster Kombat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to Hamster Kombat!</h1>
        
        <h2>Create a New Hamster:</h2>
        <form id="hamsterForm" action="create_hamster.php" method="POST">
            <input type="text" name="hamsterName" placeholder="Hamster Name" required>
            <input type="number" name="strength" placeholder="Strength (1-100)" min="1" max="100" required>
            <input type="number" name="speed" placeholder="Speed (1-100)" min="1" max="100" required>
            <input type="number" name="intelligence" placeholder="Intelligence (1-100)" min="1" max="100" required>
            <button type="submit">Create Hamster</button>
        </form>

        <h2>Available Hamsters:</h2>
        <ul id="hamsterList">
            <?php foreach ($hamsters as $hamster): ?>
                <li>
                    <?php echo htmlspecialchars($hamster['name']); ?> 
                    - Strength: <?php echo htmlspecialchars($hamster['strength']); ?>, 
                    Speed: <?php echo htmlspecialchars($hamster['speed']); ?>, 
                    Intelligence: <?php echo htmlspecialchars($hamster['intelligence']); ?> 
                    <button class="battleButton" data-id="<?php echo $hamster['id']; ?>">Battle</button>
                </li>
            <?php endforeach; ?>
        </ul>

        <h2>Battle a Hamster!</h2>
        <form id="battleForm" action="battle.php" method="POST">
            <input type="number" name="hamster1" placeholder="Your Hamster ID" required>
            <input type="number" name="hamster2" placeholder="Opponent Hamster ID" required>
            <button type="submit">Fight!</button>
        </form>

        <h2>Leaderboard:</h2>
        <button onclick="window.location.href='leaderboard.php'">View Leaderboard</button>
    </div>
    <script src="script.js"></script>
</body>
</html>
