<?php
// Step 1: Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Step 2: Retrieve the selected radio button value
    $selectedcandidate = $_POST['candidate'];


    // Step 3: Sanitize and validate the value if necessary

    // Step 4: Establish a connection to the MySQL server
    $connection = mysqli_connect("localhost", "root", "", "suraj");

    // Check if the connection was successful
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Step 5: Construct the SQL query
    $query = "INSERT INTO user1 (selected_candidate) VALUES ('$selectedcandidate')";

    // Step 6: Execute the query
    if (mysqli_query($connection, $query)) {
        echo "Data inserted successfully.";
    } else {
        echo "Error: " . mysqli_error($connection);
    }

    // Step 7: Close the database connection
    mysqli_close($connection);
}
?>

<html>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <!-- Radio buttons and other form elements -->
    <input type="radio" name="c1" value="Candidate 1">
    <font face="cambria" size="4">Candidate 1</font>
    <a href="candidatepage.html">
        <font face="monospace" size="3">view profile</font>
    </a><br>
    <br>
    <input type="radio" name="c2" value="Candidate 2">
    <font face="cambria" size="4">Candidate 2</font>
    <a href="candidatepage.html">
        <font face="monospace" size="3">view profile</font>
    </a><br>
    <br>
    <input type="submit" value="Submit">
</form>
</html>
