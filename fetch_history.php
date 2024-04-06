<?php
// fetch_data.php
session_start();
require("connection.php");
$userID = $_SESSION['userID'] ;
// Assuming your database connection code is included here or already exists

// Get the selected month from the request
$selectedMonth = $_GET['month'];

// Initialize response data array
$responseData = array();

// Query to calculate cumulative total for food
$foodQuery = "SELECT SUM(carbonFootprintFood) AS totalFood FROM weeklylog WHERE userID = '$userID' AND month = '$selectedMonth'";
$foodResult = mysqli_query($con, $foodQuery);
$totalFood = 0;

if ($foodResult && mysqli_num_rows($foodResult) > 0) {
    $totalFoodRow = mysqli_fetch_assoc($foodResult);
    $totalFood = $totalFoodRow['totalFood'];
}

// Query to calculate cumulative total for transport
$transportQuery = "SELECT SUM(carbonFootprintTransport) AS totalTransport FROM weeklylog WHERE userID = '$userID' AND month = '$selectedMonth'";
$transportResult = mysqli_query($con, $transportQuery);
$totalTransport = 0;

if ($transportResult && mysqli_num_rows($transportResult) > 0) {
    $totalTransportRow = mysqli_fetch_assoc($transportResult);
    $totalTransport = $totalTransportRow['totalTransport'];
}

// Query to calculate cumulative total for energy
$energyQuery = "SELECT SUM(carbonFootprintEnergy) AS totalEnergy FROM weeklylog WHERE userID = '$userID' AND month = '$selectedMonth'";
$energyResult = mysqli_query($con, $energyQuery);
$totalEnergy = 0;

if ($energyResult && mysqli_num_rows($energyResult) > 0) {
    $totalEnergyRow = mysqli_fetch_assoc($energyResult);
    $totalEnergy = $totalEnergyRow['totalEnergy'];
}

$overallQuery = "SELECT SUM(totalCarbonFootprint) AS totalOverall FROM weeklylog WHERE userID = '$userID' AND month = '$selectedMonth'";
$overallResult = mysqli_query($con, $overallQuery);
$totalOverall = 0;

if ($overallResult && mysqli_num_rows($overallResult) > 0) {
    $totalOverallRow = mysqli_fetch_assoc($overallResult);
    $totalOverall = $totalOverallRow['totalOverall'];
}

// Fetching historical data for line chart
$historicalDataQuery = "SELECT weekNo, carbonFootprintTransport, carbonFootprintFood, carbonFootprintEnergy, totalCarbonFootprint FROM weeklylog WHERE userID = '$userID' AND month = '$selectedMonth' ORDER BY weekNo";
$historicalResult = mysqli_query($con, $historicalDataQuery);

$weeklyLabels = [];
$totalFootprintData = [];

if ($historicalResult && mysqli_num_rows($historicalResult) > 0) {
    while ($row = mysqli_fetch_assoc($historicalResult)) {
        $weeklyLabels[] = "Week " . $row['weekNo'];
        $totalFootprintData[] = $row['totalCarbonFootprint'];
    }
}

// Construct the response data
$responseData['totalFood'] = $totalFood;
$responseData['totalEnergy'] = $totalEnergy;
$responseData['totalTransport'] = $totalTransport;
$responseData['totalOverall'] = $totalOverall;
$responseData['weeklyLabels'] = $weeklyLabels;
$responseData['totalFootprintData'] = $totalFootprintData;

// Send the response as JSON
header('Content-Type: application/json');
echo json_encode($responseData);
?>
