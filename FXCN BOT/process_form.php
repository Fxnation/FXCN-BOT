<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $uidNumber = $_POST['uidNumber'];
    $walletAddress = $_POST['walletAddress'];
    $exchange = $_POST['exchange'];

    // Simple validation
    if (!empty($uidNumber) && !empty($walletAddress) && !empty($exchange)) {
        // Display user information
        echo "<h2>User Details</h2>";
        echo "UID Number: " . htmlspecialchars($uidNumber) . "<br>";
        echo "Wallet Address: " . htmlspecialchars($walletAddress) . "<br>";
        echo "Selected Exchange: " . htmlspecialchars($exchange) . "<br>";
        
        // In a real scenario, you could now store this data in a database
    } else {
        echo "All fields are required!";
    }
}
?>