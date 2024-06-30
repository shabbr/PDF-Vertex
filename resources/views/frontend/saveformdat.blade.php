<?php
// Allow requests from any origin
header("Access-Control-Allow-Origin: *");
// Allow POST method
header("Access-Control-Allow-Methods: POST");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test6";

$conn = mysqli_connect($servername, $username, $password,$dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if projectName parameter is set
        $currentprojectID = $_POST["currentprojectID"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        echo $currentprojectID;
        echo $email;
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement to insert project details into the database
        $sql = "INSERT INTO formrecord (name,email,address,projectID) VALUES ( '$name','$email','$address','$currentprojectID' )";
        if ($conn->query($sql) === TRUE) {
            echo "Project details saved successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close connection
        $conn->close();
} else {
    echo "Error: Only POST requests are allowed.";
}
?>
