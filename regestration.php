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
        $stmt = $conn->prepare("INSERT INTO UserInfo2 (name,date_of_birth,mobile_no,address,gold, silver, gems,reference)
                                VALUES (:name, :date_of_birth, :mobile_no, :address, :gold, :silver, :gems,:reference)");

        // Bind the form data to the SQL statement parameters
        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':date_of_birth', $_POST['date_of_birth']);
        $stmt->bindParam(':mobile_no', $_POST['mobile_no']);
        $stmt->bindParam(':address', $_POST['address']);
   $stmt->bindParam(':gold', $_POST['gold']);
$stmt->bindParam(':silver', $_POST['silver']);
$stmt->bindParam(':gems', $_POST['gems']);
$stmt->bindParam(':reference', $_POST['reference']);
 

        // Execute the SQL statement
        $stmt->execute();
        
        // Redirect to the home page or a success page
        header("Location: file:///C:/xampp/htdocs/BSC/home.html");
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
	<title>Add Event</title>
<style>
img
{
width=5cm;
height=6cm;
align-left;
}
 body

 {
        background: linear-gradient(to bottom, #FFD700, aqua);
        animation: background-animation 10s ease infinite;
        background-size: 400% 400%;
      } 
      
      @keyframes background-animation {
        0% {
          background-position: 0% 0%;
        }
        50% {
          background-position: 50% 100%;
        }
        100% {
          background-position: 100% 0%;
        }
      }
      
      h1 {
        text-align: center;
        font-family: Arial, sans-serif;
        font-size: 3rem;
        margin-top: 2rem;
        animation: title-animation 1s ease-in-out;
      }
      
      @keyframes title-animation {
        0% {
          transform: scale(0);
          opacity: 0;
        }
        50% {
          transform: scale(1.1);
        }
        100% {
          transform: scale(1);
          opacity: 1;
        }
      }
      
      form {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-top: 2rem;
        animation: form-animation 1s ease-in-out;
      }
      
      @keyframes form-animation {
        0% {
          transform: scale(0);
          opacity: 0;
        }
        100% {
          transform: scale(1);
          opacity: 1;
        }
      }
        
      input[type="text"],
      input[type="tel"],
      input[type="date"],
      select {
        display: block;
        width: 40%;
        padding: 1rem;
        margin-bottom: 2rem;
        border-radius: 5px;
        border: none;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        animation: field-animation 0.5s ease-in-out forwards;
        opacity: 0;
      }
      
      @keyframes field-animation {
        0% {
          transform: translateY(100%);
        }
        100% {
          transform: translateY(0);
          opacity: 1;
        }
      }
      
      input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 1rem 2rem;
        border-radius: 5px;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
        animation: submit-animation 1s ease-in-out;
      }
      
      @keyframes submit-animation {
        0% {
          transform: scale(0);
          opacity: 0;
        }
        100% {
          transform: scale(1);
          opacity: 1;
        }
      }
      
      input[type="submit"]:hover {
        background-color: #3e8e41;
      }
      .nav-container {
      position: relative;
      border: 1px solid rgb(0, 0, 0);
      border-style:linear;
      padding: 10px;
      margin-bottom: 30px;
      background-color:;
    }
.SUBMIT {
    position: relative;
    overflow: hidden;
    display: inline-block;
    padding: 0;
    margin: 20px;
    width: 220px;
    height: 60px;
    font-size: 20px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: black;
    border: none;
    cursor: pointer;
    background: none;
  }

  .SUBMIT:hover {
    color: #FFFFFF;
  }

  .SUBMIT {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 2;
    transition: color 0.3s ease;
  }

  .SUBMIT svg {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 1;
    transition: transform 0.5s ease;
  }

  .SUBMIT:hover svg {
    transform: translateX(110%);
  }

  .SUBMIT:active rect {
    stroke-dasharray: 0 500;
    stroke-width: 2;
    stroke-linecap: round;
    animation: animate 2s linear forwards;
  }

  @keyframes animate {
    to {
      stroke-dasharray: 500 0;
    }
  }

</style>
</head>
<body bgcolor="white">
<div class="msk-logo">
      <a href="home.html"> <img src="MSKLOGO.png"></a>
     </div>
	<h1>Registration Page</h1>




	<form method="POST" enctype="multipart/form-data">
		
		<input type="text" name="name" placeholder="Name" required>
		

		
		<input type="date" name="date_of_birth" placeholder="Date of birth" required>
		

		
		<input type="tel" name="mobile_no" placeholder="Mobile No." required>
		

		
		<input type="text" name="address" placeholder="Address:" required>
		

		

  <select id="Gold" name="gold">
    <option value="GOLD">GOLD</option>
    <option value="chain">Chain</option>
    <option value="Rings">Rings</option>
    <option value="Bracelets">Bracelets</option>
    <option value="Kadas">Kadas</option>
    <option value="Bangels">Bangels</option>
    <option value="others">Others</option>
  </select>



  <select id="Silver" name="silver">
    <option value="SILVER">SILVER</option>
    <option value="chain">Chain</option>
    <option value="Rings">Rings</option>
    <option value="Bracelets">Bracelets</option>
    <option value="Kadas">Kadas</option>
    <option value="Bangels">Bangels</option>
    <option value="others">Others</option>
  </select>



  <select id="GEMS" name="gems">
    <option value="Navratna's">GEMS</option>
    <option value="Gomedagam">Gomedagam</option>
    <option value="Emerald">Emerald</option>
    <option value="Diamond">Diamond</option>
    <option value="Coral">Coral</option>
    <option value="Yellow sapphire">Yellow sapphire</option>
    <option value="Ruby">Ruby</option>
    <option value="Cat's eye">Cat's eye</option>
  </select>


		
		<input type="text" name="reference" placeholder="Reference">
		<input type="submit" name="submit" value="SUBMIT"><br><br>
	</form>

<center><footer class="ff">
 


  <p>Copyright © 2023www.mskgoldandsilver.com. All rights reserved.</p>
    
</footer></center>
</body>
</html>
