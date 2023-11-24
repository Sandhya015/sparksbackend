<?php


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputUsername = $_POST["username"];
    $inputPassword = $_POST["password"];

    // You should hash the password before storing it in the database and compare hashed passwords
    $query = "SELECT * FROM UserLogin WHERE username = '$inputUsername' AND password = '$inputPassword'";
    
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // User authenticated successfully
        echo "Login successful!";
        // You can redirect the user to a dashboard or another page here
    } else {
        echo "Login failed!";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
</head>
<body>
    <h2>Login</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Login">
    </form>
</body>
</html>
