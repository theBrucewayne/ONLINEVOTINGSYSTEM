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
        
        // Prepare the SQL statement to insert data into the events table
        $stmt = $conn->prepare("INSERT INTO UserInfo (name,date_of_birth,mobile_no,address,aadhaar_no,aadhaar_file,passwords)
                                VALUES (:name, :date_of_birth, :mobile_no, :address, :aadhaar_no, :aadhaar_file, :passwords)");

        // Bind the form data to the SQL statement parameters
        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':date_of_birth', $_POST['date_of_birth']);
        $stmt->bindParam(':mobile_no', $_POST['mobile_no']);
        $stmt->bindParam(':address', $_POST['address']);
        $stmt->bindParam(':aadhaar_no', $_POST['aadhaar_no']);
        $stmt->bindParam(':aadhaar_file', $_FILES['aadhaar_file']['name']);
        $stmt->bindParam(':passwords', $_POST['passwords']);
        
        // Upload file to server
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["aadhaar_file"]["name"]);
        move_uploaded_file($_FILES["aadhaar_file"]["tmp_name"], $target_file);

        // Execute the SQL statement
        $stmt->execute();
        
        // Redirect to the home page or a success page
        header("Location:http://localhost/2ndhtml/loginpage1.php");
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
	<title>Home</title>
<style>
/* Form styling */
h1 {

}

*{
margin: 0;
padding: 0;
font-family: 'Dosis', sans-serif;
} 
.hero{
width: 80%;
margin:  auto;
}
.navbar{
margin: 30px auto;
display: flex ;
align-item: center;
}
ul{ 
flex: 1;
text-align: right;
 }
ul li{
display: inline-block;
list-style: none;
margin: 0 20px;
}
ul li a{
text-decoration: none;
color: #000;
padding: 0 10px;
position: relative;
}
ul li a::after{
content: '';
width: 0;
height: 10px;
background: #f14a60;
position: absolute;
left: 50%;
transform: translateX(-50%);
top: -35px;
transition: 0.5s;
}
ul li a:hover::after{
width: 100%;
}
.navbar-icons img{
height: 25px;
margin-left:40px;
cursor: pointer;
}
.navbar-icons img:hover {
transform: scale(1.3);
filter: grayscale(0%);
}

form {
  background-color: #f14a60 ;
  padding: 40px; 
  max-width: 500px;
  margin: 30px auto;
  
}

label {
  font-size: 1.2rem;
  font-weight: bold;
  display: block;
  margin-bottom: 10px;
}

input[type="text"],
input[type="date"],
input[type="time"],
textarea {
  padding: 10px;
  border-radius: 5px;
  border: none;
  margin-bottom: 20px;
  width: 100%;
  font-size: 1.1rem;
}

textarea {
  height: 150px;
}

input[type="submit"] {
  background-color: green;
  color: white;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  font-size: 1.2rem;
  text-transform: uppercase;
  box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
  transition: all 0.3s ease-in-out;
}
.navbar a.active4{
    color: #f14a60;

input[type="submit"]:hover {
  background-color: darkgreen;
  transform: translateY(-2px);
}

/* Heading styling */



}

</style>
</head>
<body bgcolor="white">

<div class="hero">
<div class="navbar">
<img src="https://i.pinimg.com/564x/8b/38/32/8b3832d145f8e8c8b6bab8d966fc5a77.jpg">
<ul>
<li><a href="index.html" class="active">Home</a></li>
<li><a href="about.html">About</a></li>
<li><a href="newcontact.html">Contact</a></li>
<li><a href="http://localhost/2ndhtml/loginpage1.php">login</a></li>
<li><a href="add_events2.php" class="active4">Sign Up</a></li>
</ul>

</div>
<div>
<h1 align="center"> <font size="40"> Register Here </font></h1>
</div>


	<form method="POST" enctype="multipart/form-data">
		<label>Full Name:</label>
		<input type="text" name="name" required>
		<br><br>

		<label>Date Of Birth:</label>
		<input type="date" name="date_of_birth" required>
		<br><br>

		<label>Mobile No:</label>
		<input type="tel" name="mobile_no" required>
		<br><br>

		<label>Address:</label>
		<input type="text" name="address" required>
		<br><br>

		<label>Aadhaar No:</label>
		<input type="number" name="aadhaar_no" required>
		<br><br>

		<label>Aadhaar File:</label>
		<input type="file" name="aadhaar_file" required>
		<br><br>

		<label>Password:</label>
		<input type="password" name="passwords" required><br>
    <small>*Password should be only in Number format.</small>
		<br><br>

		<input type="submit" name="submit" value="Register"><br><br>

    Already registered ? <a href="http://localhost/2ndhtml/loginpage1.php">Click Here</a>	
  </form>
</body>
</html>
