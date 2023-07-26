<?php
// Assuming your database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "suraj";

// Create a connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the selected Aadhaar number from the HTML form
    $aadhaar_no = $_POST["aadhaar_no"];

    // SQL query to retrieve the respective Aadhaar number from the database
    $sql = "SELECT aadhaar_no FROM voters WHERE aadhaar_no = '$aadhaar_no'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Aadhaar number exists in the database, redirect to the casting page
        header("Location: newcasting1.html");
        exit;
    } else {
        // Aadhaar number not found in the database, display an error message or take appropriate action
        echo "Invalid Aadhaar number";
    }
}

$conn->close();
?>
