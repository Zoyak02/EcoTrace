<?php
// Include the file containing database connection code
include("carbon_calc.php");

// Check if the user is logged in
if (isLoggedIn()) {
    // Check if the required parameters (month and week) are set
    if (isset($_POST['selectedMonth']) && isset($_POST['selectedWeek'])) {
        // Retrieve user ID from session
        $userID = $_SESSION['userID'];
        
        // Sanitize and validate input month and week
        $selectedMonth = mysqli_real_escape_string($con, $_POST['selectedMonth']);
        $selectedWeek = mysqli_real_escape_string($con, $_POST['selectedWeek']);

        // Query to fetch historical data based on the selected month and week
        $sql = "SELECT
                    carbonFootprintTransport,
                    carbonFootprintFood,
                    carbonFootprintEnergy,
                    totalCarbonFootprint
                FROM weeklyLog
                WHERE userID = $userID
                AND MONTH(date) = $selectedMonth
                AND WeekNo = $selectedWeek";

        $result = mysqli_query($con, $sql);

        // Initialize array to store fetched data
        $historyData = array();

        // Fetch data and store in array
        if ($row = mysqli_fetch_assoc($result)) {
            $historyData = array(
                'carbonFootprintTransport' => $row['carbonFootprintTransport'],
                'carbonFootprintFood' => $row['carbonFootprintFood'],
                'carbonFootprintEnergy' => $row['carbonFootprintEnergy'],
                'totalCarbonFootprint' => $row['totalCarbonFootprint']
            );
        } else {
            // No data found for the selected week
            $historyData['error'] = 'No data found for the selected week.';
        }

        // Return fetched data in JSON format
        echo json_encode($historyData);
    } else {
        // Required parameters not set
        echo json_encode(array('error' => 'Please select both month and week.'));
    }
} else {
    // User not logged in
    echo json_encode(array('error' => 'User not logged in.'));
}
?>
