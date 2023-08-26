<?php
$servername = "localhost"; 
$username = "root"; 
$Email = ""; 
$dbname = "sparks";


$conn = new mysqli($servername, $username, $Email, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $Email = $_POST["Email"];

    
    $hashedemail= Email_hash($Email, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username,email) VALUES ('$username', '$hashedemail')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
