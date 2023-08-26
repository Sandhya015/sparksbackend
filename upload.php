<?php
$servername = "localhost"; 
$username = "your_username"; 
$password = "your_password"; 
$dbname = "your_database";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $gender = $_POST["gender"];
    $interests = implode(", ", $_POST["interests"]); 
    $country = $_POST["country"];

    
    $sql = "INSERT INTO your_table_name (name, email, subject, message, gender, interests, country)
            VALUES ('$name', '$email', '$subject', '$message', '$gender', '$interests', '$country')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
