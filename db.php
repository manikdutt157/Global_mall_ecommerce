<?php
// Database connection details
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$database = "your_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch product data from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

$products = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $products[] = array(
            "id" => $row["id"],
            "name" => $row["name"],
            "price" => $row["price"],
            "old_price" => $row["old_price"],
            "image" => $row["image"]
        );
    }
}

// Close the database connection
$conn->close();

// Output the product data in JSON format
echo json_encode($products);
?>