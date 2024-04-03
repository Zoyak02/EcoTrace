<?php
require("connection.php");

// Check if selected month is set and not empty
if(isset($_POST['selectedMonth']) && !empty($_POST['selectedMonth'])) {

    // Sanitize and prepare the selected month value
    $selectedMonth = mysqli_real_escape_string($con, $_POST['selectedMonth']); // Assuming $con is your database connection

    // Fetch weeks for the selected month from the database
    $sql = "SELECT DISTINCT weekNo FROM weeklyLog WHERE MONTHNAME(date) = '$selectedMonth'";
    $result = mysqli_query($con, $sql);

    if($result) {
        // Initialize an array to store the weeks
        $weeks = array();

        // Fetch and store the weeks in the array
        while($row = mysqli_fetch_assoc($result)) {
            $weeks[] = 'Week ' . $row['weekNo'];
        }

        // Prepare JSON response
        $response = array(
            'success' => true,
            'weeks' => $weeks
        );

        // Output JSON response
        echo json_encode($response);
    } else {
        // Error handling if query fails
        $response = array(
            'success' => false,
            'message' => 'Failed to fetch weeks from the database: ' . mysqli_error($con)
        );
        echo json_encode($response);
    }
} else if(isset($_POST['selectedMonth']) && !empty($_POST['selectedMonth']) && isset($_POST['selectedWeek']) && !empty($_POST['selectedWeek'])) {
    // Sanitize and prepare the selected month and week values
    $selectedMonth = mysqli_real_escape_string($con, $_POST['selectedMonth']); // Assuming $con is your database connection
    $selectedWeek = mysqli_real_escape_string($con, $_POST['selectedWeek']);

    // Fetch relevant data from the database based on selected month and week
    $sql = "SELECT * FROM weeklyLog WHERE MONTHNAME(date) = '$selectedMonth' AND weekNo = '$selectedWeek'";
    $result = mysqli_query($con, $sql);

    if($result) {
        // Fetch the first row (assuming there's only one entry for each week)
        $row = mysqli_fetch_assoc($result);

        // Prepare data for dashboard cards and doughnut chart
        $dashboardData = array(
            'totalFood' => $row['carbonFootprintFood'],
            'totalEnergy' => $row['carbonFootprintEnergy'],
            'totalTransport' => $row['carbonFootprintTransport'],
            'totalOverall' => $row['totalCarbonFootprint']
        );

        // Prepare data for line chart (fetch all weeks' data for the selected month)
        $sqlLineChart = "SELECT weekNo, totalCarbonFootprint FROM weeklyLog WHERE MONTHNAME(date) = '$selectedMonth'";
        $resultLineChart = mysqli_query($con, $sqlLineChart);

        $lineChartData = array();
        $weekLabels = array();
        while ($lineRow = mysqli_fetch_assoc($resultLineChart)) {
            $lineChartData[] = $lineRow['totalCarbonFootprint'];
            $weekLabels[] = 'Week ' . $lineRow['weekNo'];
        }

        // Prepare data for doughnut chart
        $donutChartData = array(
            $row['carbonFootprintFood'],
            $row['carbonFootprintEnergy'],
            $row['carbonFootprintTransport'],
        );

        // Prepare newData object to hold all the data
        $newData = array(
            'dashboardData' => $dashboardData,
            'donutChartData' => $donutChartData,
            'lineChartData' => array(
                'weekLabels' => $weekLabels,
                'totalFootprintData' => $lineChartData
            )
        );

        // Output JSON response
        echo json_encode($newData);
    } else {
        // Error handling if query fails
        $response = array(
            'success' => false,
            'message' => 'Failed to fetch data from the database: ' . mysqli_error($con)
        );
        echo json_encode($response);
    }
} else {
    // Error handling if selected month or week is missing or empty
    $response = array(
        'success' => false,
        'message' => 'Selected month or week is missing or empty.'
    );
    echo json_encode($response);
}
?>
