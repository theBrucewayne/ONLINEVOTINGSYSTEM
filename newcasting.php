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
        header("Location:http://localhost/2ndhtml/popup.html");
        exit();
    }
}
catch(PDOException $e) {
    // Handle errors
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>







<!DOCTYPE html>

<html>
<head>
    <title>e-Voting System</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body background="https://assets.thehansindia.com/h-upload/feeds/2019/04/02/159676-vote.jpg" style='background-size:100%'>

    <div class="hero">
        <div class="navbar">
        <img src="https://i.pinimg.com/564x/8b/38/32/8b3832d145f8e8c8b6bab8d966fc5a77.jpg">
        <ul>
        
        </div>


<font size="30"><u><h1>Cast Your Vote</u>:-</font><br><br>
    
<form method="POST" enctype="multipart/form-data">
		

		<label>FOR MLA SEAT:</label><br>
		
  <label>
    <input type="radio" name="votes" value="candidate1">
    K T Rama Rao
  <a href="candidatepage.html">view profile</a>
  </label>
  <br>
  <label>
    <input type="radio" name="votes" value="candidate2">
    K Chandrashekar Rao
    <a href="candidatepage2.html">view profile</a>
  </label>
  <br>
  


		<input type="submit" name="submit" value="submit"><br><br>

    
  </form>
    
      
           
</body>
</html>