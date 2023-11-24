<!DOCTYPE html>
<html>
<head>
    <title>Patient Records Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row["average_behaviour"];
            }
        }
        ?>

        <div class="graph-container">
            <canvas id="myChart"></canvas>
        </div>
    </div>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',  
            data: {
                labels: <?php echo json_encode(range(1, count($data))); ?>,
                datasets: [{
                    label: 'Zig Zag Data',
                    data: <?php echo json_encode($data); ?>,
                    backgroundColor: function(context) {
                        return context.dataIndex % 2 === 0 ? 'rgba(54, 162, 235, 0.7)' : 'rgba(255, 99, 132, 0.7)';
                    },
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
