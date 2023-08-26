<!DOCTYPE html>
<html>
<head>
    <title>Patient Records Dashboard</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
    }

    .dashboard {
        width: 80%;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ccc;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .record {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 20px;
        background-color: #f9f9f9;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    h1 {
        margin-top: 0;
        color: #333;
    }

    h2 {
        margin-top: 0;
        color: #555;
    }

    p {
        margin: 5px 0;
    }

    strong {
        color: #333;
    }
</style>


</head>
<body>
    <div class="dashboard">
        <h1>Patient Records Dashboard</h1>

        <?php
        include("./config.php");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM PatientRecords";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="record">';
                echo '<h2>Record ID: ' . $row["id"] . '</h2>';
                echo '<p><strong>Name:</strong> ' . $row["name"] . '</p>';
                echo '<p><strong>Gender:</strong> ' . $row["gender"] . '</p>';
                echo '<p><strong>Disease:</strong> ' . $row["disease"] . '</p>';
                echo '<p><strong>Date:</strong> ' . $row["date"] . '</p>';
                echo '<p><strong>Doctor:</strong> ' . $row["doctor"] . '</p>';
                echo '<p><strong>Treatment:</strong> ' . $row["treatment"] . '</p>';
                echo '<p><strong>Average Behaviour:</strong> ' . $row["average_behaviour"] . '</p>';
                echo '<p><strong>Response:</strong> ' . $row["response"] . '</p>';
                echo '<p><strong>Feedback:</strong> ' . $row["feedback"] . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>No records found</p>';
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
