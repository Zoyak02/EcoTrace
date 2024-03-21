<?php
// Include the file containing database connection code

include("carbon_calc.php");

// Function to check if the user is logged in
function isLoggedIn()
{
    if (isset($_SESSION['userID'])) {
        return true;
    } else {
        return false;
    }
}

// Check for and display any errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Fetch data from the database
$sql = "SELECT
            MONTH(date) AS month,
            SUM(carbonFootprintTransport) AS totalTransport,
            SUM(carbonFootprintFood) AS totalFood,
            SUM(carbonFootprintEnergy) AS totalEnergy
        FROM weeklyLog
        GROUP BY MONTH(date)";
$result = mysqli_query($con, $sql);

// Initialize arrays to store data for the chart
$months = [];
$transportData = [];
$foodData = [];
$energyData = [];

// Fetch and format data
while ($row = mysqli_fetch_assoc($result)) {
    $months[] = $row['month'];
    $transportData[] = $row['carbonFootprintTransport'];
    $foodData[] = $row['carbonFootprintFood'];
    $energyData[] = $row['carbonFootprintEnergy'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/EcoTrace Logo.png" style="width: 50px;">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
    <meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge" />
    <meta name="viewport" content="user-scalable=yes, initial-scale=1.0, width=320" />
    <title>Historical Tracking</title> 
    <link href='https://fonts.googleapis.com/css?family=Anton&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.8.13/tailwind.min.css" rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link
    href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"
    rel="stylesheet"/>


    <!-- CSS FILES START -->
    <link href="css/custom3.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <link href="css/notificationBell.css" rel="stylesheet">
    <link href="css/color.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/all.min.css" rel="stylesheet"> 
    <!-- CSS FILES End -->

    <style>
        #lineChart{
        min-width: 400px;  /* Set the maximum width as needed */
        min-height: 300px; /* Set the maximum height as needed */
        margin:20px;
        }
    </style>
</head>
<body>
    <div class="wrapper home2">

        <!--Inner Header Start-->
        <section class="wf100 inner-header">
            <div class="container">
               <h1>Historical Tracking</h1>
            </div>
         </section>
         <!--Inner Header End--> 

    </div>
    <div class="container mt-9">
        <div class="row">
            <!-- Line Chart Card -->
            <div class="col-md-12 col-lg-8">
                <div class="card custom-box-shadow">
                    <div class="card-body">
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        const config = {
        type: 'line',
        data: {
            labels: <?php echo json_encode($months); ?>,
            datasets: [{
                    label: 'Transport',
                    data: <?php echo json_encode($transportData); ?>,
                    borderColor: 'rgb(255, 99, 132)',
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                },
                {
                    label: 'Food',
                    data: <?php echo json_encode($foodData); ?>,
                    borderColor: 'rgb(54, 162, 235)',
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                },
                {
                    label: 'Energy',
                    data: <?php echo json_encode($energyData); ?>,
                    borderColor: 'rgb(75, 192, 192)',
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Carbon Footprint Tracking'
            }
            },
            scales: {
            x: {
                title: {
                display: true,
                text: 'Month'
                }
            },
            y: {
                title: {
                display: true,
                text: 'kgCO2e'
                }
            }
            }
        },
        };

        const myChart = new Chart(
        document.getElementById('lineChart'),
        config
        );

    </script>
</body>
</html>