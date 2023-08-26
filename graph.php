<!DOCTYPE html>
<html>
<head>
    <title>Patient Records Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        
    </style>
</head>
<body>
    <div class="dashboard">
        <h1>Patient Records Dashboard</h1>

        <?php
        include("config.php");
        
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
            type: 'line',  
            data: {
                labels: <?php echo json_encode(range(1, count($data))); ?>,
                datasets: [{
                    label: 'My Data',
                    data: <?php echo json_encode($data); ?>,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    fill: false
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
