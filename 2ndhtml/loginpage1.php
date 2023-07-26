<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST["aadhaar_no"]) && isset($_POST["passwords"])) {
    $aadhaar_no = $_POST["aadhaar_no"];
    $passwords = $_POST["passwords"];

    $db_hostname = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_database = "suraj";

    $dsn = "mysql:host=$db_hostname;dbname=$db_database";
    $pdo = new PDO($dsn, $db_username, $db_password);

    $sql = "SELECT * FROM `UserInfo` WHERE `aadhaar_no` = :aadhaar_no AND `passwords` = :passwords";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'aadhaar_no' => $aadhaar_no,
        'passwords' => $passwords,
    ]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION["user"] = $user;
        header("Location: newcasting1.html");
        exit();
    } else {
        $error_message = "Invalid Aadhaar number or password";
    }
}
?>

<html>
<head>
    <title>Login Form</title>
<style>

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
margin-top: 10px ;
display: flex ;
align-item: center;
}
ul{ 
flex: 1px;
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
label
{
margin-top:140px;

color:black;
font-weight:bold;
font-size:30px;

}
span{
color: #f14a60;
}
input[type="submit"] {
  background-color:red;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 25px;
  cursor: pointer;
  font-size: 20px;
}
.navbar a.active3{
    color: #f14a60;
}

input[type="submit"]:hover {
  background-color: #45a049;
}

</style>
</head><br>
<body bgcolor="white">
<div class="hero">
<div class="navbar">
<img src="https://i.pinimg.com/564x/8b/38/32/8b3832d145f8e8c8b6bab8d966fc5a77.jpg">
<ul>
<li><a href="index.html" class="active">Home</a></li>
<li><a href="about.html">About</a></li>
<li><a href="newcontact.html">Contact</a></li>
<li><a href="loginpage1.php" class="active3">login</a></li>
<li><a href="add_events2.php">Sign Up</a></li>
</ul>

</div>

    <center><font size="50" id="typewriter">Login Below</font></center><br><br><br>
    <?php if (isset($error_message)) { ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php } ?>
    <center><form method="POST">
        <label >Aadhaar No:</label><br>
        <input type="text" name="aadhaar_no" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="passwords" required><br><br>

        <input type="submit"  value="Login">
    </form></center>


<script>
var text = document.getElementById('typewriter').innerHTML;
document.getElementById('typewriter').innerHTML = "";

var i = 0;
setTimeout(function() {
  var timer = setInterval(function() {
    if (i < text.length) {
      document.getElementById('typewriter').innerHTML += text.charAt(i);
      i++;
    } else {
      clearInterval(timer);
    }
  }, 100);
}, 1000);
</script>

</body>
</html>
