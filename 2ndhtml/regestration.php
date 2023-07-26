
<?php
if(isset($_POST['b1']))
{

$name=$_POST['t1'];
$date_of_birth=$_POST['t2'];
$mobile_no=$_POST['t3'];
$address=$_POST['t4'];
$aadhaar_no=$_POST['t5'];
$aadhaar_file=$_POST['t6'];
$password=$_POST['t7'];
$sql1=$dbh -> prepare("INSERT INTO UserInfo(name,date_of_birth,mobile_no,address,aadhaar_no,aadhaar_file,password)

values(:a1,:a2,:a3,:a4,:a5,:a6,:a7)");
$query1 = $dbh -> prepare($sql1);
$query1-> bindParam(':a1', $name, PDO::PARAM_STR);
$query1-> bindParam(':a2', $date_of_birth, PDO::PARAM_STR);
$query1-> bindParam(':a3', $mobile_no, PDO::PARAM_STR);
$query1-> bindParam(':a4', $address, PDO::PARAM_STR);
$query1-> bindParam(':a5', $aadhaar_no, PDO::PARAM_STR);
$query1-> bindParam(':a6', $aadhaar_file, PDO::PARAM_STR);
$query1-> bindParam(':a7', $password, PDO::PARAM_STR);
$query1->execute();

}
?>

<html>
<head>
    <title>Registration Form</title>
<style>
body {
  font-family: 'Dosis', sans-serif;
}

h1 {
color:white;
  text-align: center;
  font-size: 36px;
  margin-top: 50px;
}
nav {
  width: 100%;
  background-color: #555;
  overflow: auto;
}

nav a{
  float: left;
  padding: 12px;
  color: white;
  text-decoration: none;
  font-size: 17px;
  width: 20%; /* Four equal-width links. If you have two links, use 50%, and 33.33% for three links, etc.. */
  text-align: center; /* If you want the text to be centered */
}

/* Add a background color on mouse-over */
nav a:hover {
  background-color: red;
}

/* Style the current/active link */
nav a.active {
  background-color: #04AA6D;
}
a{
text-decoration:none;
color:white;
font-size:20px;
}
nav{


align-items:center;
margin-bottom:40px;
}
form {
  max-width: 500px;
  margin: 0 auto;
  text-align: left;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 10px;
}

label {
  display: block;
  margin-bottom: 10px;
  font-size: 20px;
}

input[type="text"],
input[type="date"],
input[type="tel"],
input[type="password"],
textarea {

  width: 100%;
  padding: 10px;
  font-size: 18px;
  border: 1px solid #ccc;
  border-radius: 5px;
  margin-bottom: 20px;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 18px;
}

input[type="submit"]:hover {
  background-color: #45a049;
}

button {
  background-color: #008CBA;
  color: white;
  border: none;
  padding: 12px 20px;
  border-radius: 5px;
  cursor: pointer;
  font-size: 18px;
  margin-top: 20px;
}

button:hover {
  background-color: #006CBA;
}

</style>
</head>
<body bgcolor="orange">
    <h1>Registration Form</h1>
<nav>
  <a href="voting.html">Home</a>
  <a href="https://thebrucewayne.github.io/onlinevoting-website/">Description</a>
  <a href="contactpage.html">Contact</a>
  <a href="http://localhost/registrationfile.php">CAST VOTE</a>
</nav>

    <form id="registration-form" method="POST">
        <label style="color:white;">Full Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label style="color:white;">Date of Birth:</label><br>
        <input type="date" name="date_of_birth" required><br><br>

        <label style="color:white;">Mobile No.:</label><br>
        <input type="tel" name="mobile_no" required><br><br>

        <label style="color:white;">Address:</label><br>
        <textarea name="address" required></textarea><br><br>

        <label style="color:white;">Aadhaar No.:</label><br>
        <input type="text" name="aadhaar_no" required><br><br>

        <label style="color:white;">Aadhaar File:</label><br>
        <input type="file" name="aadhaar_file" required><br><br>


        <label style="color:white;">Password:</label><br>
        <input type="password" name="password" required><br><br>

        <input type="submit" name="b1" value="Register" >
</form>
 <button id="login-button">Click here If already registered</button>

<script>
        const registrationForm = document.getElementById("registration-form");
        registrationForm.addEventListener("submit", function(event) {
            event.preventDefault();

            const name = registrationForm.elements["name"].value;
            const dateOfBirth = registrationForm.elements["date_of_birth"].value;
            const mobileNo = registrationForm.elements["mobile_no"].value;
            const address = registrationForm.elements["address"].value;
            const aadhaarNo = registrationForm.elements["aadhaar_no"].value;
const aadhaarFile = registrationForm.elements["aadhaar_file"].value;
            const password = registrationForm.elements["password"].value;

            if (calculateAge(dateOfBirth) < 18) {
                alert("You are not eligible to register as your age is less than 18 .");
            } else if (mobileNo.length !== 10) {
                alert("Please enter a valid 10-digit mobile number.");
            } else if (aadhaarNo.length !== 12) {
                alert("Please enter a valid 12-digit Aadhaar number.");
            } else {
                alert("Registration successful. You can now login to cast your vote.");
                window.location.href = "loginpage.php";
            }
        });

        function calculateAge(dateOfBirth) {
            const today = new Date();
            const birthDate = new Date(dateOfBirth);
            let age = today.getFullYear() - birthDate.getFullYear();
            const month = today.getMonth() - birthDate.getMonth();
            if (month < 0 || (month === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            return age;
        }

        const loginButton = document.getElementById("login-button");
        loginButton.addEventListener("click", function() {
            window.location.href = "loginpage.php";
        });
    </script>
</body>
</html>