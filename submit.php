<?php
// define variables and set to empty values
$name = $email = $phonenumber = $instagram = $twitter = $category = $idea = $delicious = "";



function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }




if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $phonenumber = test_input($_POST["phonenumber"]);
  $instagram = test_input($_POST["instagram"]);
  $twitter = test_input($_POST["twitter"]);
}




$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stew";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};

$sql = "CREATE TABLE IF NOT EXISTS SUBM (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    uname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    phonenumber BIGINT,
    instagram VARCHAR(60),
    twitter VARCHAR(60),
    category VARCHAR(60),
    idea TEXT,
    delicious VARCHAR(60),
    )";


$sql = "INSERT INTO subm (uname,email,phonenumber,instagram,twitter)
VALUES ('$name','$email','$phonenumber','$instagram','$twitter')";


if ($conn->query($sql) === TRUE) {
    // echo "Table created successfully";
    header("Location: stew.php");
    die();
} else {
    echo "Error creating table: " . $conn->error;
}



$conn->close();

?>