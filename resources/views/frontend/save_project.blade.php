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
echo $_POST["projectName"];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if projectName parameter is set
    if (isset($_POST["projectName"])) {
        $projectName = $_POST["projectName"];

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement to insert project details into the database
        $sql = "INSERT INTO projects (projectName) VALUES ('$projectName')";
        if ($conn->query($sql) === TRUE) {
            echo "Project details saved successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close connection
        $conn->close();
    } else {
        echo "Error: Required parameters are missing.";
    }
} else {
    echo "Error: Only POST requests are allowed.";
}
?>
