<?php
    
    $insert = false;
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
// Retrieve form data

$Fullname = $_POST['Fullname'];
$date_of_birth= $_POST['date_of_birth'];
$mobile_no = $_POST['mobile_no'];
$address = $_POST['address'];
$aadhar_no = $_POST['aadhar_no'];
$aadhar_file = $_POST['aadhar_file'];
$passwords = $_POST['passwords'];




 
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "voting";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to insert data into the table


$sql = "INSERT INTO voting ( `Fullname`, `date_of_birth`, `mobile_no`, `address`,`aadhar_no`,`aadhar_file`,`passwords`) VALUES ('$Fullname', '$date_of_birth', '$mobile_no', '$address', '$aadhar_no', '$aadhar_file', '$passwords');";
if ($conn->query($sql) === TRUE){
  ///echo "Registration Successful";
  $insert = true;
} else {
   echo "Error: " . $sql . "<br>" . $conn->error;


// Close the database connection
$conn->close();
 }
}
?>