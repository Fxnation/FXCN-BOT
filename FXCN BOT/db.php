<?php
// Database connection settings
$host = 'localhost';
$dbname = 'fxcn';  // The database name you just created
$username = 'root';          // Your MySQL username
$password = '';              // Your MySQL password (if any)

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $uidNumber = $_POST['uidNumber'];
    $walletAddress = $_POST['walletAddress'];
    $exchange = $_POST['exchange'];

    // Simple validation
    if (!empty($uidNumber) && !empty($walletAddress) && !empty($exchange)) {
        try {
            // Prepare SQL and bind parameters
            $stmt = $pdo->prepare("INSERT INTO users (uidNumber, walletAddress, exchange) VALUES (:uidNumber, :walletAddress, :exchange)");
            $stmt->bindParam(':uidNumber', $uidNumber);
            $stmt->bindParam(':walletAddress', $walletAddress);
            $stmt->bindParam(':exchange', $exchange);

            // Execute the prepared statement
            $stmt->execute();

            // Success message
            echo "User details have been saved successfully!<br>";
            echo "<h2>User Details</h2>";
            echo "UID Number: " . htmlspecialchars($uidNumber) . "<br>";
            echo "Wallet Address: " . htmlspecialchars($walletAddress) . "<br>";
            echo "Selected Exchange: " . htmlspecialchars($exchange) . "<br>";

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "All fields are required!";
    }
}
?>