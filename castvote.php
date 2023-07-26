<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "suraj";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Check if form was submitted
    if(isset($_POST['submit'])) {
        $aadhaar_no = $_POST['aadhaar_no'];
        $votes = $_POST['votes'];

        $stmt = $conn->prepare("UPDATE UserInfo SET votes = :votes WHERE aadhaar_no = :aadhaar_no");
        $stmt->execute(['votes' => $votes, 'aadhaar_no' => $aadhaar_no]);

        // Redirect to the home page or a success page
        header("Location: http://localhost/2ndhtml/popup.html");
        exit();
    }
}
catch(PDOException $e) {
    // Handle errors
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
