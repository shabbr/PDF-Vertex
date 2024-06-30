<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "";

$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";


$std_name= $_POST['fname'];
$std_rollno= $_POST['rollno'];
$gender= $_POST['gender'];
$std_email= $_POST['email'];



$sql = "INSERT INTO students_records(Name,Roll_No,Gender,Email,Password,Catagree,Team,Picture,skill)
VALUES('$std_name','$std_rollno','$gender','$std_email','$std_pasw','$std_catagre','$std_team','$file_name','$a')";
if($conn->query($sql)===TRUE){
    header("location: http://localhost/web_project/student_register.html");
}
else{

echo "Error".$conn->error;
}




?>