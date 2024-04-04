<?php
session_start();
require("connection.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $carKilometers = floatval($_POST["car_kilometers"]) ?? 0;
    $carpoolInstances = floatval($_POST["carpool_instances"]) ?? 0;
    $publicTransportationTimes = floatval($_POST["public_transportation_times"]) ?? 0;
    $activeCommuterDays = floatval($_POST["active_commuter_days"]) ?? 0;
    $bicycleTimes = floatval($_POST["bicycle_times"]) ?? 0;
    $electricScooterDays = floatval($_POST["electric_scooter_days"]) ?? 0;

    $redMeatServings = floatval($_POST["red_meat_servings"]) ?? 0;
    $poultryServings = floatval($_POST["poultry_servings"]) ?? 0;
    $fishServings = floatval($_POST["fish_servings"]) ?? 0;
    $plantBasedMeals = floatval($_POST["plant_based_meals"]) ?? 0;
    $plantProteinServings = floatval($_POST["plant_protein_servings"]) ?? 0;
    $mixedDietMeals = floatval($_POST["mixed_diet_meals"]) ?? 0;

    $heatingHours = floatval($_POST["heating_hours"]) ?? 0;
    $acHours = floatval($_POST["ac_hours"]) ?? 0;
    $laundryLoads = floatval($_POST["laundry_loads"]) ?? 0;
    $dryerHours = floatval( $_POST["dryer_hours"]) ?? 0;
    $dishwasherLoads = floatval($_POST["dishwasher_loads"]) ?? 0;
    $electronicHours = floatval($_POST["electronic_hours"]) ?? 0;
    $errors = array();
   
    //External data to store
    $userID = $_SESSION['userID'] ;
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $date = new DateTime('now');

    // Calculate carbon footprint for each category
    $carbonFootprintTransport = calculateTransportCarbonFootprint($carKilometers, $carpoolInstances, $publicTransportationTimes, $activeCommuterDays,$bicycleTimes, $electricScooterDays);
    $carbonFootprintFood = calculateFoodCarbonFootprint($redMeatServings, $poultryServings, $fishServings, $plantBasedMeals, $plantProteinServings, $mixedDietMeals);
    $carbonFootprintEnergy = calculateEnergyCarbonFootprint($heatingHours, $acHours, $laundryLoads, $dryerHours, $dishwasherLoads, $electronicHours);

    // Calculate the total carbon footprint
    $totalCarbonFootprint = $carbonFootprintTransport + $carbonFootprintFood + $carbonFootprintEnergy;

    // Store the calculated carbon footprint data in the session
    $_SESSION["carbonFootprintData"] = [
        "total" => $totalCarbonFootprint,
        "transport" => $carbonFootprintTransport,
        "food" => $carbonFootprintFood,
        "energy" => $carbonFootprintEnergy
    ];


    // Get the current week number
    $today = new DateTime('now');
    $firstDayOfMonth = new DateTime('first day of this month');

    $daysDiff = $today->diff($firstDayOfMonth)->days;

    $weekNumber = ceil(($daysDiff + 1) / 7);

    // Get the month name
    $month = $date->format('F');  
    $_SESSION['month']= $month;


    $insertQuery = "INSERT INTO weeklylog (userID, date, weekNo, month, carbonFootprintTransport, carbonFootprintFood, carbonFootprintEnergy, totalCarbonFootprint)
                    VALUES ('$userID', '" . $date->format('Y-m-d H:i:s') . "','$weekNumber','$month','$carbonFootprintTransport','$carbonFootprintFood', '$carbonFootprintEnergy', '$totalCarbonFootprint')";

    // Execute the query
    $result = mysqli_query($con, $insertQuery);

        if ($result) {
            header("Location: activity_log.php?success=updated");
            exit(); 
        } else {
            header("Location: activity_log.php?alert=storing");
            exit(); 
        }
        
 }
 
 
    function calculateTransportCarbonFootprint($carKilometers, $carpoolInstances, $publicTransportationTimes, $activeCommuterDays, $bicycleTimes,$electricScooterDays) {
        // Assume some emission factors 
        $carEmissionFactor = 2.0; // kgCO2e per kilometer for a typical car
        $carpoolEmissionFactor = 1.5; // kgCO2e per kilometer for carpooling
        $publicTransportEmissionFactor = 0.5; // kgCO2e per trip for public transportation
        $activeCommuterEmissionFactor = 0.1; // kgCO2e per day for active commuting (walking or cycling)
        $electricScooterEmissionFactor = 0.2;
        $bicycleTimesEmissionFactor = 0.1;
    
        // Calculate carbon footprint for each mode of transportation
        $carCarbonFootprint = $carKilometers * $carEmissionFactor;
        $carpoolCarbonFootprint = $carpoolInstances * $carpoolEmissionFactor;
        $publicTransportCarbonFootprint = $publicTransportationTimes * $publicTransportEmissionFactor;
        $activeCommuterCarbonFootprint = $activeCommuterDays * $activeCommuterEmissionFactor;
        $electricScooterCarbonFootprint = $electricScooterDay * $electricScooterEmissionFactor;
        $bicycleTimesCarbonFootprint = $bicycleTimes * $bicycleTimesEmissionFactor;
    
        // Sum up the carbon footprints for all transportation activities
        $totalTransportCarbonFootprint = $carCarbonFootprint + $carpoolCarbonFootprint + $publicTransportCarbonFootprint + 
                                         $activeCommuterCarbonFootprint + $electricScooterCarbonFootprint + $bicycleTimesCarbonFootprint;
    
        return $totalTransportCarbonFootprint;
    }

    function calculateFoodCarbonFootprint($redMeatServings, $poultryServings, $fishServings, $plantBasedMeals, $plantProteinServings, $mixedDietMeals) {
        // Assume some emission factors 
        $redMeatEmissionFactor = 5.0; // kgCO2e per serving of red meat
        $poultryEmissionFactor = 3.0; // kgCO2e per serving of poultry
        $fishEmissionFactor = 2.0; // kgCO2e per serving of fish
        $plantBasedMealEmissionFactor = 1.0; // kgCO2e per plant-based meal
        $plantProteinEmissionFactor = 0.5; // kgCO2e per serving of plant-based protein
        $mixedDietEmissionFactor = 2.0; // kgCO2e per dairy 
    
        // Calculate carbon footprint for each food category
        $redMeatCarbonFootprint = $redMeatServings * $redMeatEmissionFactor;
        $poultryCarbonFootprint = $poultryServings * $poultryEmissionFactor;
        $fishCarbonFootprint = $fishServings * $fishEmissionFactor;
        $plantBasedMealCarbonFootprint = $plantBasedMeals * $plantBasedMealEmissionFactor;
        $plantProteinCarbonFootprint = $plantProteinServings * $plantProteinEmissionFactor;
        $mixedDietCarbonFootprint = $mixedDietMeals * $mixedDietEmissionFactor;
    
        // Sum up the carbon footprints for all food activities
        $totalFoodCarbonFootprint = $redMeatCarbonFootprint + $poultryCarbonFootprint + $fishCarbonFootprint +
                                    $plantBasedMealCarbonFootprint + $plantProteinCarbonFootprint + $mixedDietCarbonFootprint;
    
        return $totalFoodCarbonFootprint;
    }

    function calculateEnergyCarbonFootprint($heatingHours, $acHours, $laundryLoads, $dryerHours, $dishwasherLoads,$electronicHours) {
        // Assume some emission factors
        $heatingEmissionFactor = 0.2; // kgCO2e per hour of heating
        $acEmissionFactor = 0.3; // kgCO2e per hour of air conditioning
        $laundryEmissionFactor = 1.0; // kgCO2e per load of laundry
        $dryerEmissionFactor = 1.5; // kgCO2e per hour of dryer use
        $dishwasherEmissionFactor = 0.15; // kgCO2e per load in the dishwasher
        $electronicEmissionFactor = 0.1; // kgCO2e per per hour for a mix of electronic devices

    
        // Calculate carbon footprint for each energy-related activity
        $heatingCarbonFootprint = $heatingHours * $heatingEmissionFactor;
        $acCarbonFootprint = $acHours * $acEmissionFactor;
        $laundryCarbonFootprint = $laundryLoads * $laundryEmissionFactor;
        $dryerCarbonFootprint = $dryerHours * $dryerEmissionFactor;
        $dishwasherCarbonFootprint = $dishwasherLoads * $dishwasherEmissionFactor;
        $electronicCarbonFootprint = $electronicEmissionFactor * $electronicHours;
    
        // Sum up the carbon footprints for all energy-related activities
        $totalEnergyCarbonFootprint = $heatingCarbonFootprint + $acCarbonFootprint + $laundryCarbonFootprint +
                                     $dryerCarbonFootprint + $dishwasherCarbonFootprint +  $electronicCarbonFootprint;
    
        return $totalEnergyCarbonFootprint;
    }

    function weeklyLogUpToDate($con) {
        // Get the current week number
        $today = new DateTime('now');
        $firstDayOfMonth = new DateTime('first day of this month');
        $daysDiff = $today->diff($firstDayOfMonth)->days;
        $weekNumber = ceil(($daysDiff + 1) / 7);
    
        // Get the month name
        $month = $today->format('F');
    
        // Get the userID from the session
        $userID = $_SESSION['userID'];
    
        // Check if there is an entry for the current week in the current month
        $checkQuery = "SELECT * FROM weeklylog WHERE userID = '$userID' AND weekNo = '$weekNumber' AND month = '$month'";
        $result = mysqli_query($con, $checkQuery);
    
        if ($result && mysqli_num_rows($result) > 0) {
            // User has already entered the weekly log for the current week in the current month
            return true;
        } else {
            // User has not entered the weekly log for the current week in the current month
            return false;
        }
    }

    function fetchWeekCarbonFootprint($userID, $con, $weekNumber, $currentMonth) {
        $userID = $_SESSION['userID'];
    
        // Query to fetch the total carbon footprint for the given week
        $query = "SELECT totalCarbonFootprint
            FROM weeklylog 
            WHERE userID = ? 
            AND MONTH(date) = ?
            AND weekNo = ?";
            $stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($stmt, "iii", $userID, $currentMonth, $weekNumber);
            mysqli_stmt_execute($stmt);
            
            mysqli_stmt_bind_result($stmt, $carbonFootprint);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);
            
            // Return the fetched carbon footprint for the given week
            return $carbonFootprint;
        }
    
    

    function evaluateCarbonReductionRookieBadge($userID, $con) {
        // Get the current month name and week number
        $currentMonth = date('n'); // Numeric representation of the current month
        $currentWeek = ceil(date('d') / 7); // Calculate the week number within the current month
    
        // Check if the month has all 4 weeks
        if ($currentWeek < 4) {
            return; // Exit if the month doesn't have all 4 weeks
        }
    
        // Fetch carbon footprint for each week of the month
        $carbonFootprints = [];
        for ($week = 1; $week <= 4; $week++) {
            // Fetch carbon footprint for the current week
            $weekCarbonFootprint = fetchWeekCarbonFootprint($userID, $con, $week, $currentMonth);
            
            // If there's no data for any week, exit
            if ($weekCarbonFootprint === null) {
                return;
            }
            
            // Store the carbon footprint for each week
            $carbonFootprints[$week] = $weekCarbonFootprint;
        }

        // Check if the carbon footprint decreases week by week throughout the month
        for ($week = 2; $week <= 4; $week++) {
            // Check if the current week's carbon footprint is less than the previous week's
            if ($carbonFootprints[$week] >= $carbonFootprints[$week - 1]) {
                return; // Exit if the current week's carbon footprint is not less than the previous week's
            }
        }

        // If the carbon footprint decreases week by week throughout the month, update user's badge status to "achieved" for Carbon Reduction Rookie badge
        $updateQuery = "UPDATE user_badges SET carbon_reduction_rookie = 1 WHERE userID = ?";
        $stmt = mysqli_prepare($con, $updateQuery);
        mysqli_stmt_bind_param($stmt, "i", $userID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    
    


    /*
    function evaluateCarbonReductionRookieBadge($userID, $con) {
        // Get the current month name and week number
    $currentMonth = date('n'); // Numeric representation of the current month
    $currentWeek = ceil(date('d') / 7); // Calculate the week number within the current month

    // Fetch carbon footprint for the current week and the previous week
    $currentWeekCarbonFootprint = fetchWeekCarbonFootprint($userID, $con, $currentWeek, $currentMonth);
    $previousWeekCarbonFootprint = fetchWeekCarbonFootprint($userID, $con, $currentWeek - 1, $currentMonth);

    // If there's no data for the current or previous week, exit
    if ($currentWeekCarbonFootprint === null || $previousWeekCarbonFootprint === null) {
        return;
    }

    // Check if the carbon footprint for the current week is less than the previous week
    if ($currentWeekCarbonFootprint < $previousWeekCarbonFootprint) {
        // Update user's badge status to "achieved" for Carbon Reduction Rookie badge
        $updateQuery = "UPDATE user_badges SET carbon_reduction_rookie = 1 WHERE userID = ?";
        $stmt = mysqli_prepare($con, $updateQuery);
        mysqli_stmt_bind_param($stmt, "i", $userID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}*/

    

   
    function evaluateCertifiedEcoHeroBadge($userID, $con) {
        // Check if the user has achieved the Carbon Reduction Rookie badge
        $query = "SELECT carbon_reduction_rookie FROM user_badges WHERE userID = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "i", $userID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $carbonReductionRookie);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
    
        // If the user has not achieved the Carbon Reduction Rookie badge, return
        if ($carbonReductionRookie != 1) {
            return;
        }
    
        // Get the current month and year
        $currentMonth = date('n'); 
        $currentYear = date('Y'); 
    
        // Initialize variables to track if carbon footprint remains below the threshold for three months
        $monthsBelowThreshold = 0;
    
        // Loop through the past three months
        for ($i = 0; $i < 3; $i++) {
            // Calculate the month and year for the current iteration
            $month = $currentMonth - $i;
            $year = $currentYear;
    
            // Adjust the year if the month is less than 1 (i.e., go back to the previous year)
            if ($month < 1) {
                $month += 12; // Add 12 months to get the correct month number
                $year--; // Decrement the year
            }
    
            // Initialize variable to track if all weeks in the month remain below the threshold
            $weeksBelowThreshold = true;
    
            // Iterate through all weeks (1 to 4) in the current month
            for ($week = 1; $week <= 4; $week++) {
                // Query to fetch the total carbon footprint for the current week
                $query = "SELECT SUM(totalCarbonFootprint) AS CarbonTotal
                            FROM weeklylog 
                            WHERE userID = ? 
                            AND DATE_FORMAT(date, '%m') = ?  -- Extract the month from the date
                            AND DATE_FORMAT(date, '%Y') = ?  -- Extract the year from the date
                            AND weekNo = ?";
                $stmt = mysqli_prepare($con, $query);
                mysqli_stmt_bind_param($stmt, "iiii", $userID, $month, $year, $week);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $weeklyCarbonFootprint);
                mysqli_stmt_fetch($stmt);
                mysqli_stmt_close($stmt);
    
                // Check if the weekly carbon footprint exceeds the threshold
                if ($weeklyCarbonFootprint > 10) {
                    // If any week exceeds the threshold, break the loop and move to the next month
                    $weeksBelowThreshold = false;
                    break;
                }
            }
    
            // If all weeks in the month remained below the threshold, increment the count
            if ($weeksBelowThreshold) {
                $monthsBelowThreshold++;
            }
        }
    
        // If the user's carbon footprint remained below the threshold for three months, update badge status
        if ($monthsBelowThreshold === 3) {
            // Update user's badge status to "achieved" for Certified Eco Hero badge
            $updateQuery = "UPDATE user_badges SET certified_eco_hero = 1 AND displayed = 0 WHERE userID = ?";
            $stmt = mysqli_prepare($con, $updateQuery);
            mysqli_stmt_bind_param($stmt, "i", $userID);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
    }
    
   
function  evaluateCertifiedEcoWarriorBadge($userID, $con) {
    // Check if the user has already achieved the Eco Warrior badge
    $query = "SELECT certified_eco_hero FROM user_badges WHERE userID = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "i", $userID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $ecoHeroBadge);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

      // If the user has not achieved the Carbon Reduction Rookie badge, return
      if ($ecoHeroBadge != 1) {
        return;
    }


    // Get the current month and year
    $currentMonth = date('n'); // Numeric representation of the current month (1 for January, 2 for February, etc.)
    $currentYear = date('Y'); // Four-digit representation of the current year

    // Iterate over the past six months
    for ($i = 0; $i < 6; $i++) {
        // Calculate the month and year for the current iteration
        $month = $currentMonth - $i;
        $year = $currentYear;

        // Adjust the year if the month is less than 1 (i.e., go back to the previous year)
        if ($month < 1) {
            $month += 12; // Add 12 months to get the correct month number
            $year--; // Decrement the year
        }

        // Iterate over the weeks (1 to 4) for the current month
        for ($week = 1; $week <= 4; $week++) {
            // Fetch the carbon footprint data for the current week in the current month
            $query = "SELECT totalCarbonFootprint FROM weeklylog 
                      WHERE userID = ? AND MONTH(date) = ? AND YEAR(date) = ? AND weekNo = ?";
            $stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($stmt, "iiii", $userID, $month, $year, $week);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $currentCarbonFootprint);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);

            // Calculate the week number and year for six months ago
            $sixMonthsAgoWeek = $week;
            $sixMonthsAgoYear = $year - ($i === 0 ? 1 : 0); // Adjust year if the current iteration is in the same year as the current month

            // Fetch the carbon footprint data for the corresponding week six months ago
            $query = "SELECT totalCarbonFootprint FROM weeklylog 
                      WHERE userID = ? AND MONTH(date) = ? AND YEAR(date) = ? AND weekNo = ?";
            $stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($stmt, "iiii", $userID, $sixMonthsAgoMonth, $sixMonthsAgoYear, $sixMonthsAgoWeek);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $sixMonthsAgoCarbonFootprint);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);

            // Compare the current carbon footprint with the footprint from six months ago
            if ($currentCarbonFootprint > $sixMonthsAgoCarbonFootprint) {
                // Carbon footprint increased, break the loop and move to the next month
                break;
            }
        }
    }

    // If the loop completes without any increase in carbon footprint, update badge status
    if ($i === 6) {
        $updateQuery = "UPDATE user_badges SET certified_eco_warrior = 1 AND displayed = 0 WHERE userID = ?";
        $stmt = mysqli_prepare($con, $updateQuery);
        mysqli_stmt_bind_param($stmt, "i", $userID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}
  
    
?>

