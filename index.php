<!DOCTYPE html>
<html lang="en">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>COVID-19 Tracker | Live Data</title>
  
<head>
  <meta charset="utf-8">
  <?php include( 'parts/head.php'); ?>
  <link rel="stylesheet" type="text/css" href="//bootswatch.com/4/darkly/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
</head>
    
<body>

<?php include( 'parts/navbar.php'); ?>

<style>
.jumbotron {
  background-image: url(/img/banner.png);
  background-repeat: no-repeat;
  background-size: cover;
  }
.jumbotron h1 {
  color: white;
  text-shadow: 2px 4px 3px rgba(0, 0, 0, 0.3);
}
.jumbotron h5 {
  color: white;
  text-shadow: 2px 4px 3px rgba(0, 0, 0, 0.3);
}
.jumbotron h1 {
    -webkit-text-stroke-width: 1.5px;
    -webkit-text-stroke-color: #2a2a2a;
}
.table {
    max-width: none;
    table-layout: fixed;
}

.nav-pills .nav-link:not(.active) {
    color: #00bc8c;
}
</style>

<?php

if (isset($_GET['country'])) {
    $selectCountry = $_GET['country'];
} else {
    $selectCountry = 'UK';
}

// Compare Local/Backup endpoint & set API URL
include 'parts/api-check.php';

// Self hosted API for World COVID-19 data
$urlWorld = "$apiURL/all";
$jsonWorld = json_decode(file_get_contents($urlWorld), true);

$worldCases = $jsonWorld["cases"];
$worldDeaths = $jsonWorld["deaths"];
$worldRecovered = $jsonWorld["recovered"];

// Self hosted API for Country specific data
$url = "$apiURL/countries/$selectCountry";
$json = json_decode(file_get_contents($url), true);

// World Calculated Percentages
$worldDeathsPercent = ($worldDeaths/$worldCases)*100; 
$worldRecoveredPercent = ($worldRecovered/$worldCases)*100;

// Calculated Values
$calRecovery = $cases - ($activeCases + $deaths);

// Replace underscores with spaces in Country name
$selectCountry = str_replace("_", " ", $selectCountry);

// Public Heath England source for UK county data
$publicHeathEnglandTodayCounty = "https://covid-19.uk.com/api/utlaToday.json";
$publicHeathEnglandTodayCountyJson = json_decode(file_get_contents($publicHeathEnglandTodayCounty), true);

$publicHeathEnglandCounty = "https://covid-19.uk.com/api/utla.json";
$publicHeathEnglandCountyJson = json_decode(file_get_contents($publicHeathEnglandCounty), true);

$publicHeathEnglandRegion = "https://covid-19.uk.com/api/region.json";
$publicHeathEnglandRegionJson = json_decode(file_get_contents($publicHeathEnglandRegion), true);

$publicHeathEnglandTodayRegion = "https://covid-19.uk.com/api/regionToday.json";
$publicHeathEnglandTodayRegionJson = json_decode(file_get_contents($publicHeathEnglandTodayRegion), true);

$govHospitalTotalData = "https://covid-19.uk.com/api/hospitalTotalData.json";
$govHospitalTotalDataJson = json_decode(file_get_contents($govHospitalTotalData), true);

$govVaccineData = "https://covid-19.uk.com/api/vaccineData.json";
$govVaccineDataJson = json_decode(file_get_contents($govVaccineData), true);

// Count array size to populate columns
$ukCountyCount = count($publicHeathEnglandCountyJson["data"]);
$ukRegionCount = count($publicHeathEnglandRegionJson["data"]);

// API for US state data
$usaStates = "https://disease.sh/v3/covid-19/states";
$usaStatesJson = json_decode(file_get_contents($usaStates), true);

// Count array size to populate columns
$usaStateCount = count($usaStatesJson);

// API for yesterday data
$yesterday = $yesterdayApiURL;
$yesterdayJson = json_decode(file_get_contents($yesterday), true);

// API for Two Day data
$twoDay = $twoDayApiURL;
$twoDayJson = json_decode(file_get_contents($twoDay), true);

// Compare Todays date with Data
$latestData = new DateTime($publicHeathEnglandTodayCountyJson["data"][0]["date"]);
$today = new DateTime(date("Y-m-d"));

$dataDiff = $today->diff($latestData)->format("%a");

$country = $json["country"];
$cases = $json["cases"];
$activeCases = $json["active"];
$todayCases = $json["todayCases"];
$yesterdayCases = $yesterdayJson["todayCases"];
$twoDayCases = $twoDayJson["todayCases"];
$deaths = $json["deaths"];
$todayDeaths = $json["todayDeaths"];
$yesterdayDeaths = $yesterdayJson["todayDeaths"];
$twoDayDeaths = $twoDayJson["todayDeaths"];
$recovered = $json["recovered"];
$critical = $json["critical"];
$casesPerOneMillion = $json["casesPerOneMillion"];
$deathsPerOneMillion = $json["deathsPerOneMillion"];
$testsPerOneMillion = $json["testsPerOneMillion"];
$totalTests = $json["tests"];
$yesterdayTests = $yesterdayJson["tests"];
$twoDayTests = $twoDayJson["tests"];

// Local Calculated Percentages;
$activeCasesPercent = ($activeCases/$cases)*100;
$deathsPercent = ($deaths/$cases)*100;
$criticalPercent = ($critical/$cases)*100; 
$recoveredPercent = ($recovered/$cases)*100;
$positiveTestPercent = ($cases/$totalTests)*100;

// Set Current Data Age
if ($dataDiff == 0) {
    $dataAge = "Today";
}
elseif ($dataDiff == 1) {
    $dataAge = "Yesterday";
}
else {
    $dataAge = $dataDiff . " Days ago";
}

// Store Today/Yesterday/twoDay vars in array
$todayArray = array($todayCases, $todayDeaths, $todayTests, $yesterdayCases, $yesterdayDeaths, $yesterdayTests);
$yesterdayArray = array($yesterdayCases, $yesterdayDeaths, $yesterdayDeaths, $twoDayCases, $twoDayDeaths, $twoDayTests);

// Badge Colour
$statsDiffBadge = array(
    "casesToday" => "",
    "deathsToday" => "",
    "testsToday" => "",
    "casesYesterday" => "",
    "deathsYesterday" => "",
    "testsYesterday" => ""
);

// Stats diff percentage
$statsDiff = array(
    "casesTodayDiff" => "",
    "deathsTodayDiff" => "",
    "testsTodayDiff" => "",
    "casesYesterdayDiff" => "",
    "deathsYesterdayDiff" => "",
    "testsYesterdayDiff" => ""
);

// Calculate Diff between todayArray & yesterdayArray as percentage 
$i = 0;
foreach($statsDiff as $key => &$value) {

    $d = $todayArray[$i] - $yesterdayArray[$i];
    $statsDiff[$key] = sprintf("%.1f", ($d/$todayArray[$i])*100);

    $i++;    
}

// Set badge colour based on diff percent
$q = 0;
foreach($statsDiffBadge as $key => &$value) {

    $values = array_values( $statsDiff);

    if ($values[$q] == 0) {
        $statsDiffBadge[$key] = "success";
    }

    elseif ($values[$q] < 0) {   
        $statsDiffBadge[$key] = "success";
    }
    else {
        if ($q == 4 or $q == 1) {
            $statsDiffBadge[$key] = "dark";
        }
        else {
            $statsDiffBadge[$key] = "danger";
        }
    }

    $q++;    
}

?>

<!-- Jumbotron Header -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">COVID-19  <?php echo strtoupper($selectCountry); ?> </h1>
        <h5><i class="fab fa-github" aria-hidden="true"></i> <a style="color: #fff" href="https://github.com/Slethen/covid19-info"><b><u>Open Source</u></b></a> COVID-19 Data Tracker focused on providing accurate and up to date information that's easy to understand in a clean layout.</h5>
        <?php include( 'parts/country-dropdown.php'); ?>
    </div>
</div>

<script>
    $('.select2').select2();
</script>

<!-- Report Issue Modal -->
<div class="modal fade" tabindex="-1" id="importantModal" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Report Issue</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>This website is developed by one person, I'm hosting this site as well as the software scraping the latest COVID-19 data on my server infastructure. This is at my expense intending to provide accurate information on COVID-19 from WHO, NHS & UK Government in one place.</p>
                <p>Unfortunately, the source this data is scraped from is constantly changing, meaning I need to update server-side components accordingly.</p>
                <p>To try improve this process I've created an email address for any reports of incorrect or outdated information.</p>
                <a href="mailto:joel@covid-19.uk.com?Subject=Website%20Issue" target="_top">joel@covid-19.uk.com</a>
            </div>
            <div class="modal-footer">
            <small class="text-muted font-weight-bold">Current API: <?php echo $currentAPI; ?></small>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- UK Counties Modal -->
<div class="modal fade" tabindex="-1" id="countiesModal" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cumulative: Counties & Regions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <ul class="nav nav-pills nav-fill">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#england">Counties</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#regions">Regions</a>
                    </li>
                </ul>

                <!-- England Section -->
                <div class="tab-content">
                    <div id="england" class="tab-pane active">
                        <br>
                        <input type="text" class="form-control form-control" id="englandInput" onkeyup="englandSearch()" placeholder="Search">
                        <table id="englandTable" class="table dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">County</th>
                                    <th scope="col">Total Cases</th>
                                    <th scope="col">Mortality</th>
                                    <th scope="col">Total Deaths</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $var = -1;

                                foreach(range(0,--$ukCountyCount) as $index) {

                                ++$var;

                                echo '<tr>
                                    <td style="color: white" class="bg-primary">
                                        ' . $publicHeathEnglandCountyJson["data"][$var]["areaName"] .'
                                    </td>
                                    <td class="bg-info">
                                        <b>' . number_format($publicHeathEnglandCountyJson["data"][$var]["cumCasesByPublishDate"]) .'</b>
                                    </td>
                                    <td class="bg-warning">
                                        <b>' . sprintf("%.1f", ($publicHeathEnglandCountyJson["data"][$var]["cumDeathsByPublishDate"]/$publicHeathEnglandCountyJson["data"][$var]["cumCasesByPublishDate"])*100) .'%</b>
                                    </td>
                                    <td class="bg-danger">
                                        <b>' . number_format($publicHeathEnglandCountyJson["data"][$var]["cumDeathsByPublishDate"]) .'</b>
                                    </td>
                                </tr>';
                                }
                                ?>
                            </tbody>
                            <div id="results"></div>
                        </table>
                    </div>

                    <!-- Regions Section -->
                    <div id="regions" class="tab-pane fade">
                        <br>
                        <input type="text" class="form-control form-control" id="regionsInput" onkeyup="regionsSearch()" placeholder="Search">
                        <table id="regionsTable" class="table dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">Region</th>
                                    <th scope="col">Total Cases</th>
                                    <th scope="col">Mortality</th>
                                    <th scope="col">Total Deaths</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $var = -1;

                                foreach(range(0,--$ukRegionCount) as $index) {

                                ++$var;

                                echo '<tr>
                                    <td style="color: white" class="bg-primary">
                                        ' . $publicHeathEnglandRegionJson["data"][$var]["areaName"] .'
                                    </td>
                                    <td class="bg-info">
                                        <b>' . number_format($publicHeathEnglandRegionJson["data"][$var]["cumCasesByPublishDate"]) .'</b>
                                    </td>
                                    <td class="bg-warning">
                                        <b>' . sprintf("%.1f", ($publicHeathEnglandRegionJson["data"][$var]["cumDeathsByPublishDate"]/$publicHeathEnglandRegionJson["data"][$var]["cumCasesByPublishDate"])*100) .'%</b>
                                    </td>
                                    <td class="bg-danger">
                                        <b>' . number_format($publicHeathEnglandRegionJson["data"][$var]["cumDeathsByPublishDate"]) .'</b>
                                    </td>
                                </tr>';
                                }
                                ?>
                            </tbody>
                            <div id="results"></div>
                        </table>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- UK Today Counties Modal -->
<div class="modal fade" tabindex="-1" id="todayCountiesModal" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo $dataAge ?>: Counties & Regions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <ul class="nav nav-pills nav-fill">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#englandToday">Counties</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#regionsToday">Regions</a>
                    </li>
                </ul>

                <!-- England Section -->
                <div class="tab-content">
                    <div id="englandToday" class="tab-pane active">
                        <br>
                        <input type="text" class="form-control form-control" id="englandTodayInput" onkeyup="englandTodaySearch()" placeholder="Search">
                        <table id="englandTodayTable" class="table dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">County</th>
                                    <th scope="col">Total Cases</th>
                                    <th scope="col">Total Deaths</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $var = -1;

                                foreach(range(0,--$ukCountyCount) as $index) {

                                ++$var;

                                echo '<tr>
                                    <td style="color: white" class="bg-primary">
                                        ' . $publicHeathEnglandTodayCountyJson["data"][$var]["areaName"] .'
                                    </td>
                                    <td class="bg-info">
                                        <b>' . number_format($publicHeathEnglandTodayCountyJson["data"][$var]["newCasesByPublishDate"]) .'</b>
                                    </td>
                                    <td class="bg-danger">
                                        <b>' . number_format($publicHeathEnglandTodayCountyJson["data"][$var]["newDeathsByPublishDate"]) .'</b>
                                    </td>
                                </tr>';
                                }
                                ?>
                            </tbody>
                            <div id="results"></div>
                        </table>
                    </div>

                    <!-- Regions Section -->
                    <div id="regionsToday" class="tab-pane fade">
                        <br>
                        <input type="text" class="form-control form-control" id="regionsTodayInput" onkeyup="regionsTodaySearch()" placeholder="Search">
                        <table id="regionsTodayTable" class="table dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">Region</th>
                                    <th scope="col">Total Cases</th>
                                    <th scope="col">Total Deaths</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $var = -1;

                                foreach(range(0,--$ukRegionCount) as $index) {

                                ++$var;

                                echo '<tr>
                                    <td style="color: white" class="bg-primary">
                                        ' . $publicHeathEnglandTodayRegionJson["data"][$var]["areaName"] .'
                                    </td>
                                    <td class="bg-info">
                                        <b>' . number_format($publicHeathEnglandTodayRegionJson["data"][$var]["newCasesByPublishDate"]) .'</b>
                                    </td>
                                    <td class="bg-danger">
                                        <b>' . number_format($publicHeathEnglandTodayRegionJson["data"][$var]["newDeathsByPublishDate"]) .'</b>
                                    </td>
                                </tr>';
                                }
                                ?>
                            </tbody>
                            <div id="results"></div>
                        </table>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <small class="text-left text-muted font-weight-bold">Updated: <?php echo $publicHeathEnglandTodayRegionJson["data"][0]["date"]; ?></small>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- US States Modal -->
<div class="modal fade" tabindex="-1" id="usCountiesModal" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">States</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control form-control" id="usaInput" onkeyup="usaSearch()" placeholder="Search">
                <table id="usaTable" class="table dataTable">
                    <thead>
                        <tr>
                            <th scope="col">County</th>
                            <th scope="col">Cases</th>
                            <th scope="col">Deaths</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $var = -1;
                
                        foreach(range(0,--$usaStateCount) as $index) {
                
                        ++$var;
                
                        echo '<tr>
                            <td style="color: white" class="bg-primary">
                                ' . $usaStatesJson[$var]["state"] .'
                            </td>
                            <td class="bg-info">
                                <b>' . number_format($usaStatesJson[$var]["cases"]) .'</b>
                            </td>
                            <td class="bg-danger">
                                <b>' . number_format($usaStatesJson[$var]["deaths"]) .'</b>
                            </td>
                        </tr>';
                        }
                        ?>
                    </tbody>
                    <div id="results"></div>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- UK Vaccine Daily Modal -->
<div class="modal fade" tabindex="-1" id="vacModal" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">UK Daily Vaccine Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="ukVacTable" class="table dataTable sorting1">
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">1st Dose</th>
                            <th scope="col">2nd Dose</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $var = -1;
                
                        foreach(range(0,--$ukVacDailyCount) as $index) {
                
                        ++$var;
                
                        echo '<tr>
                            <td style="color: white" class="bg-primary">
                                ' . $govVaccineDailyDataJson["data"][$var]["date"] .'
                            </td>
                            <td>
                                <b>' . number_format($govVaccineDailyDataJson["data"][$var]["newPeopleVaccinatedFirstDoseByPublishDate"]) .'</b>
                            </td>
                            <td class="bg-primary">
                                <b>' . number_format($govVaccineDailyDataJson["data"][$var]["newPeopleVaccinatedSecondDoseByPublishDate"]) .'</b>
                            </td>
                        </tr>';
                        }
                        ?>
                    </tbody>
                    <div id="results"></div>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php
/* Disable Clap for NHS
// Clap for NHS Alert
// Set up time/date vars
$day = date('D');
$hour = date('H');

// Until 8 on Thursday show clap for NHS message
if($day == 'Thu'){
    if ($hour < "20") {
        echo '
        <div class="container">
            <div class="alert alert-info alert-dismissible fade show text-center" role="alert">
                <strong>👏 Clap for our Carers</strong> at 8pm remember to clap for our NHS & Health Care workers on the frontline.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>';
    }
}
*/
?>

<!--
<div class="container">
    <div class="alert alert-info alert-dismissible fade show text-center" role="alert">
        <strong>🔥 Support the Developer</strong> <a href="https://game-changer.uk">Gift one of our Banksy Game Changer Canvases</a> 🎁
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
-->

<?php
// Show Gov update count down only if cases = 0 & time < 16

$hour = date('H');

if ($selectCountry == "UK"){
    if($todayCases == 0){
        if ($hour < "16") {
            echo '<div class="container text-center">
            <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                Next Gov Update: <strong><span id="time"></span></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        </div>';
        }
    }
}
?>

<?php
// Show Gov update count down only if cases = 0 & time < 16

$hour = date('H');
$minute = date('i');

//echo $minute;

if ($selectCountry == "UK"){
    if($todayCases == 0){
        if ($hour == "16") {
            if ($minute < 30){
                echo '<div class="container text-center">
                <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                    Data Updating... <br> <small>Can take up to 20 minutes, try again at 4:50pm</small>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            </div>';
            }
        }
    }
}
?>

<!-- Today/Yesterday Selection -->
<div class="container">
    <ul class="nav nav-pills mb-3 justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#today">Today</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#yesterday">Yesterday</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#twoDay">Two-Days</a>
        </li>
    </ul>
</div>

<div class="container">
    <div class="alert alert-dark text-center" role="alert">
        Patients on Mechanical Ventilators: <strong><?php echo number_format($govHospitalTotalDataJson["data"]["0"]["covidOccupiedMVBeds"]); ?></strong>
    </div>
</div>

<!-- Selected Country Todal Stats -->
<div class="tab-content">
    <div id="today" class="tab-pane active">

        <!-- Cases/Deaths Today -->
        <div class="container">
            <div class="card-deck">
                <div class="card text-white bg-primary text-center">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo strtoupper($selectCountry); ?> Cases Today <span class="badge badge-<?php echo $statsDiffBadge["casesToday"]; ?>"><?php echo sprintf("%+d",$statsDiff["casesTodayDiff"]); ?>% </span></h5>
                        <h1>+<?php echo number_format($todayCases); ?></h1>
                        
                    </div>
                </div>
                <div class="card text-white bg-danger text-center">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo strtoupper($selectCountry); ?> Deaths Today <span class="badge badge-<?php echo $statsDiffBadge["deathsToday"]; ?>"><?php echo sprintf("%+d",$statsDiff["deathsTodayDiff"]); ?>% </span></h5>
                        <h1>+<?php echo number_format($todayDeaths); ?></h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tested Today -->
        <div class="container mt-3">
            <div class="card-deck">
                <div class="card text-white bg-info text-center">
                    <div style="max-height: 140.1px" class="card-body">
                        <h5 class="card-title"><?php echo strtoupper($selectCountry); ?> Total Tested</h5>
                        <h3 class="font-weight-bold"><?php echo number_format($totalTests) ?></h3>
                        <h6><?php echo sprintf("%.1f", $positiveTestPercent); ?>% Test Positve</h6>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div id="yesterday" class="tab-pane fade">

        <!-- Cases/Deaths Yesterday -->
        <div class="container">
            <div class="card-deck">
                <div class="card text-white bg-primary text-center">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo strtoupper($selectCountry); ?> Cases Yesterday <span class="badge badge-<?php echo $statsDiffBadge["casesYesterday"]; ?>"><?php echo sprintf("%+d",$statsDiff["casesYesterdayDiff"]); ?>% </span></h5>
                        <h1>+<?php echo number_format($yesterdayCases); ?></h1>
                    </div>
                </div>
                <div class="card text-white bg-danger text-center">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo strtoupper($selectCountry); ?> Deaths Yesterday <span class="badge badge-<?php echo $statsDiffBadge["deathsYesterday"]; ?>"><?php echo sprintf("%+d",$statsDiff["deathsYesterdayDiff"]); ?>% </span></h5>
                        <h1>+<?php echo number_format($yesterdayDeaths); ?></h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tested Yesterday -->
        <div class="container mt-3">
            <div class="card-deck">
                <div class="card text-white bg-info text-center">
                    <div style="max-height: 140.1px" class="card-body">
                        <h5 class="card-title"><?php echo strtoupper($selectCountry); ?> Total Tested</h5>
                        <h3 class="font-weight-bold"><?php echo number_format($yesterdayJson["tests"]); ?></h3>
                        <h6><?php echo sprintf("%.1f", $yesterdayJson["cases"]/$yesterdayJson["tests"]*100); ?>% Test Positve</h6>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div id="twoDay" class="tab-pane fade">

        <!-- Cases/Deaths Yesterday -->
        <div class="container">
            <div class="card-deck">
                <div class="card text-white bg-primary text-center">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo strtoupper($selectCountry); ?> Cases Two Days Ago</h5>
                        <h1>+<?php echo number_format($twoDayJson["todayCases"]); ?></h1>
                    </div>
                </div>
                <div class="card text-white bg-danger text-center">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo strtoupper($selectCountry); ?> Deaths Two Days Ago</h5>
                        <h1>+<?php echo number_format($twoDayJson["todayDeaths"]); ?></h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tested Yesterday -->
        <div class="container mt-3">
            <div class="card-deck">
                <div class="card text-white bg-info text-center">
                    <div style="max-height: 140.1px" class="card-body">
                        <h5 class="card-title"><?php echo strtoupper($selectCountry); ?> Total Tested</h5>
                        <h3 class="font-weight-bold"><?php echo number_format($twoDayJson["tests"]); ?></h3>
                        <h6><?php echo sprintf("%.1f", $twoDayJson["cases"]/$twoDayJson["tests"]*100); ?>% Test Positve</h6>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php
        // If UK Show Gov Vaccine Data
        if ($selectCountry == "UK")
            echo '<div class="container">
            <h3 class="mt-5 text-center">💉 Vaccine Data</h3>
            <table class="table table-curved">
                <thead>
                    <tr>
                        <th scope="col">1st Dose</th>
                        <th scope="col">2nd Dose</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="bg-primary" style="color: white;">
                            ' . number_format($govVaccineDataJson["data"]["0"]["cumPeopleVaccinatedFirstDoseByPublishDate"]) . '
                        </td>
                        <td class="bg-secondary">
                            ' . number_format($govVaccineDataJson["data"]["0"]["cumPeopleVaccinatedSecondDoseByPublishDate"]) . '
                        </td>
                        <td class="bg-success">
                            ' . number_format($govVaccineDataJson["data"]["0"]["cumPeopleVaccinatedFirstDoseByPublishDate"] + $govVaccineDataJson["data"]["0"]["cumPeopleVaccinatedSecondDoseByPublishDate"]) . '
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>';
    ?>

    <!-- Selected Country Totals -->
    <div class="container">
        <h3 class="mt-5 text-center">🏥 <?php echo strtoupper($selectCountry); ?> Total Statistics</h3>
        <table class="table table-curved">
            <thead>
                <tr>
                    <th scope="col">Total</th>
                    <th scope="col">Active</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="bg-secondary">
                        <?php echo number_format($cases); ?>
                    </td>
                    <td class="bg-info">
                        <?php
                            echo number_format($activeCases);
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="table table-curved">
            <thead>
                <tr>
                    <th scope="col">Deaths</th>
                    <th scope="col">Critical</th>
                    <th scope="col">Recovered</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="bg-danger">
                        <?php echo number_format($deaths); ?>
                    </td>
                    <td class="bg-warning">
                        <?php echo number_format($critical); ?>
                    </td>
                    <td class="bg-success">
                        <?php echo number_format($recovered); ?>
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="table table-curved">
            <thead>
                <tr>
                    <th scope="col">Tests per Million</th>
                    <th scope="col">Cases per Million</th>
                    <th scope="col">Deaths per Million</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="bg-secondary">
                        <?php echo number_format($testsPerOneMillion); ?>
                    </td>
                    <td class="bg-info">
                        <?php echo number_format($casesPerOneMillion); ?>
                    </td>
                    <td class="bg-danger">
                        <?php echo number_format($deathsPerOneMillion); ?>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Calcuated percentages from selected country totals -->
        <h4>Percentage <small class="text-muted">Based on all cases</small></h4>
        <div class="progress" style="height: 45px;">
            <div class="progress-bar bg-danger" role="progressbar" style="width: 
                    <?php echo ($deaths/$cases)*100; ?>%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
            </div>
            <div class="progress-bar bg-warning" role="progressbar" style="width: 
                    <?php echo $criticalPercent; ?>%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
            </div>
            <div class="progress-bar bg-success" role="progressbar" style="width: 
                    <?php echo ($recovered/$cases)*100; ?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
            </div>
            <div class="progress-bar bg-info" role="progressbar" style="width: 
                    <?php echo ($activeCases/$cases)*100; ?>%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
            </div>
            <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <p class="text-muted">
            Deaths <span class="badge badge-danger"><?php echo sprintf("%.1f", $deathsPercent); ?>%</span> Critical <span class="badge badge-warning"><?php echo sprintf("%.1f", $criticalPercent); ?>%</span> Recovered <span class="badge badge-success"><?php echo sprintf("%.1f", $recoveredPercent); ?>%</span> Active <span class="badge badge-info"><?php echo sprintf("%.1f", $activeCasesPercent); ?>%</span>
        </p>

        <?php
            // If UK Selected show Countys modal button
            if ($selectCountry == "UK")
                echo '<h4>Counties <small class="text-muted">Click below for County & Region breakdown</small></h4>
                <div class="btn-group d-flex" role="group">
                    <button type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#todayCountiesModal">' . $dataAge . '</small></h4></button>
                    <button type="button" class="btn btn-info w-100" data-toggle="modal" data-target="#countiesModal">Cumulative</button>
                </div>';

            // If USA Selected show States modal button
            if ($selectCountry == "USA")
                echo '<h4>States <small class="text-muted">Click below for County breakdown</small></h4>
                <div class="btn-group d-flex" role="group">
                    <button type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#usCountiesModal">Cases by State</button>
                </div>';
        ?>

</div>

<br>

<!-- World Total -->
<h3 class="text-center">🌍 Coronavirus Worldwide</h3>
<div class="container">
    <div class="card-deck">
        <div class="card text-white bg-primary text-center">
            <div class="card-body">
                <h5 class="card-title">Total Cases</h5>
                <h1><?php echo number_format($worldCases); ?></h1>
            </div>
        </div>
        <div class="card text-white bg-danger text-center">
            <div class="card-body">
                <h5 class="card-title">Total Deaths</h5>
                <h1><?php echo number_format($worldDeaths); ?></h1>
            </div>
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="card-deck">
        <div class="card text-white bg-success text-center">
            <div class="card-body">
                <h5 class="card-title">Total Recovered</h5>
                <h1>🎉 <?php echo number_format($worldRecovered); ?></h1>
            </div>
        </div>
    </div>
</div>

<!-- Calcuated percentages from World Total -->
<div class="container">
    <h4 class="mt-3">Percentage <small class="text-muted">Based on all cases</small></h4>
    <div class="progress" style="height: 45px;">
        <div class="progress-bar bg-danger" role="progressbar" style="width: 
            <?php echo $worldDeathsPercent; ?>%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
        </div>
        <div class="progress-bar bg-success" role="progressbar" style="width: 
            <?php echo $worldRecoveredPercent; ?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
        </div>
        <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">All Cases</div>
    </div>

    <p class="text-muted">
        Deaths <span class="badge badge-danger"><?php echo sprintf("%.1f", $worldDeathsPercent); ?>%</span> Recovered <span class="badge badge-success"><?php echo sprintf("%.1f", $worldRecoveredPercent); ?>%</span>
    </p>

    <p><b>Recovered numbers may appear low as these mostly come from cases where people were hospitalised.</b></p>

</div>

</div>

<!-- Table search scripts -->
<script>
function englandSearch() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("englandInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("englandTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function englandTodaySearch() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("englandTodayInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("englandTodayTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function regionsTodaySearch() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("regionsTodayInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("regionsTodayTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function regionsSearch() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("regionsInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("regionsTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function usaSearch() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("usaInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("usaTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

<!-- Enable dataTables -->
<script>
$(document).ready(function() {
    $('.dataTable').DataTable({
    paging: false,
    searching: false,
    autoWidth: true,
    info: false
});
} );
</script>

<script>
(function() {
  var start = new Date;
  start.setHours(16, 45, 0); // 4pm

  function pad(num) {
    return ("0" + parseInt(num)).substr(-2);
  }

  function tick() {
    var now = new Date;
    if (now > start) {
      start.setDate(start.getDate() + 1);
    }
    var remain = ((start - now) / 1000);
    var hh = pad((remain / 60 / 60) % 60);
    var mm = pad((remain / 60) % 60);
    var ss = pad(remain % 60);
    document.getElementById('time').innerHTML =
      hh + ":" + mm + ":" + ss;
    setTimeout(tick, 1000);
    var d = new Date();
    var n = d.getHours();
    if (n == 16) {
        document.getElementById("time").innerHTML = '<a href="/">Refresh</a>';
    }
  }

  document.addEventListener('DOMContentLoaded', tick);
})();
</script>

<!-- Enable tooltip -->
<script>
$(document).ready(function() {
    $("[rel='tooltip'], .tooltip").tooltip();
});
</script>

<?php include( 'parts/footer.php'); ?>

</body>
</html>