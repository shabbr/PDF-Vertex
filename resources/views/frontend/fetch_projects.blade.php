<?php
// Allow requests from any origin
header("Access-Control-Allow-Origin: *");
// Allow GET method
header("Access-Control-Allow-Methods: GET");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test6";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM projects";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $output = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row; // Append each row to the output array
    }
    echo json_encode($output); // Convert the output array to JSON and echo it
} else {
    echo "No projects found";
}

mysqli_close($conn);
?>
