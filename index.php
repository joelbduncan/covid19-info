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
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
</head>
    
<body>

<?php include( 'parts/navbar.php'); ?>

<style>
.jumbotron {
  background-image: url(https://joelduncan.io/content/images/size/w2000/2020/03/coronavirus-header.jpg);
  background-attachment: fixed;
  background-position: center;
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
    $selectCountry = uk;
}

// Set API URL to most up to date source
// Check UK Today cases on self hosted API
$apiMain = "https://api.covid-19.uk.com/countries/uk";
$apiMainJson = json_decode(file_get_contents($apiMain), true);

// Check UK Today cases on alternative API
$apiBackup = "https://corona.lmao.ninja/v2/countries/uk";
$apiBackupJson = json_decode(file_get_contents($apiBackup), true);

// Use self hosted API unless alternative has more cases
if ($apiMainJson["todayCases"] > $apiBackupJson["todayCases"]){
    $apiURL = "https://api.covid-19.uk.com";
    $yesterdayApiURL = "https://api.covid-19.uk.com/yesterday/$selectCountry";
    $currentAPI = "Main";
  }
  // Use self hosted API when numbers are equal
  elseif ($apiMainJson["todayCases"] == $apiBackupJson["todayCases"]){
      $apiURL = "https://api.covid-19.uk.com";
      $yesterdayApiURL = "https://api.covid-19.uk.com/yesterday/$selectCountry";
      $currentAPI = "Main";
    }
  else {
      // Use backend in other scenarios
      $apiURL = "https://corona.lmao.ninja/v2";
      $yesterdayApiURL = "https://corona.lmao.ninja/v2/countries/$selectCountry?yesterday=true";
      $currentAPI = "Backup";
  }

// Self hosted API for World COVID-19 data
$urlWorld = "$apiURL/all";
$jsonWorld = json_decode(file_get_contents($urlWorld), true);

$worldCases = $jsonWorld["cases"];
$worldDeaths = $jsonWorld["deaths"];
$worldRecovered = $jsonWorld["recovered"];

// Self hosted API for Country specific data
$url = "$apiURL/countries/$selectCountry";
$json = json_decode(file_get_contents($url), true);

$country = $json["country"];
$cases = $json["cases"];
$activeCases = $json["active"];
$todayCases = $json["todayCases"];
$deaths = $json["deaths"];
$todayDeaths = $json["todayDeaths"];
$recovered = $json["recovered"];
$critical = $json["critical"];
$casesPerOneMillion = $json["casesPerOneMillion"];
$deathsPerOneMillion = $json["deathsPerOneMillion"];
$testsPerOneMillion = $json["testsPerOneMillion"];
$totalTests = $json["tests"];

// World Calculated Percentages
$worldDeathsPercent = ($worldDeaths/$worldCases)*100; 
$worldRecoveredPercent = ($worldRecovered/$worldCases)*100;

// Calculate Recovered Data for UK only
if ($selectCountry == "uk") {
    if ($recovered == "") {
        //$recoveredCalc = $cases - ($activeCases + $deaths);
        $recoveredCalc = $recovered;
    }
} else {
    $recoveredCalc = $recovered;
}

// Local Calculated Percentages;
$activeCasesPercent = ($activeCases/$cases)*100;
$deathsPercent = ($deaths/$cases)*100;
$criticalPercent = ($critical/$cases)*100; 
$recoveredPercent = ($recoveredCalc/$cases)*100;
$positiveTestPercent = ($cases/$totalTests)*100;

// Calculated Values
$calRecovery = $cases - ($activeCases + $deaths);

// Replace underscores with spaces in Country name
$selectCountry = str_replace("_", " ", $selectCountry);

// Public Heath England source for UK county data
$publicHeathEnglandCounty = "https://c19downloads.azureedge.net/downloads/json/coronavirus-cases_latest.json";
$publicHeathEnglandCountyJson = json_decode(file_get_contents($publicHeathEnglandCounty), true);

// Count array size to populate columns
$ukCountyCount = "150";
$regionsCountyCount = "9";

// API for US state data
$usaStates = "https://corona.lmao.ninja/v2/states";
$usaStatesJson = json_decode(file_get_contents($usaStates), true);

// Count array size to populate columns
$usaStateCount = count($usaStatesJson);

// API for yesterday data
$yesterday = $yesterdayApiURL;
$yesterdayJson = json_decode(file_get_contents($yesterday), true);

?>
	
<!-- Jumbotron Header -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">COVID-19  <?php echo strtoupper($selectCountry); ?> </h1>
        <h5>Coronavirus (COVID-19) is a new illness that can affect your lungs and airways. It’s caused by a virus called coronavirus.</h5>
        <?php include( 'country-dropdown.php'); ?>
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
                <h5 class="modal-title">Counties & Regions</h5>
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
                        <table id="englandTable" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">County</th>
                                    <th scope="col">Cases</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $var = -1;

                                foreach(range(--$ukCountyCount,$columns) as $index) {

                                ++$var;

                                echo '<tr>
                                    <td style="color: white" class="bg-primary">
                                        ' . $publicHeathEnglandCountyJson["utlas"][$var]["areaName"] .'
                                    </td>
                                    <td class="bg-info">
                                        <b>' . number_format($publicHeathEnglandCountyJson["utlas"][$var]["totalLabConfirmedCases"]) .'</b>
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
                        <table id="regionsTable" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">County</th>
                                    <th scope="col">Cases</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $var = -1;

                                foreach(range(--$regionsCountyCount,$columns) as $index) {

                                ++$var;

                                echo '<tr>
                                    <td style="color: white" class="bg-primary">
                                        ' . $publicHeathEnglandCountyJson["regions"][$var]["areaName"] .'
                                    </td>
                                    <td class="bg-info">
                                        <b>' . number_format($publicHeathEnglandCountyJson["regions"][$var]["totalLabConfirmedCases"]) .'</b>
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
                <table id="usaTable" class="table">
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
                
                        foreach(range(--$usaStateCount,$columns) as $index) {
                
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

<?php
// Clap for NHS Alert
// Set up time/date vars
$day = date('D');
$hour = date('H');

// Until 8 on Thursday show clap for NHS message
if($day == Thu){
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
    </ul>
</div>

<!-- Selected Country Todal Stats -->
<div class="tab-content">
    <div id="today" class="tab-pane active">

        <!-- Cases/Deaths Today -->
        <div class="container">
            <div class="card-deck">
                <div class="card text-white bg-primary text-center">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo strtoupper($selectCountry); ?> Cases Today</h5>
                        <h1>+<?php echo number_format($todayCases); ?></h1>
                    </div>
                </div>
                <div class="card text-white bg-danger text-center">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo strtoupper($selectCountry); ?> Deaths Today</h5>
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
                        <h5 class="card-title"><?php echo strtoupper($selectCountry); ?> Cases Today</h5>
                        <h1>+<?php echo number_format($yesterdayJson["todayCases"]); ?></h1>
                    </div>
                </div>
                <div class="card text-white bg-danger text-center">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo strtoupper($selectCountry); ?> Deaths Today</h5>
                        <h1>+<?php echo number_format($yesterdayJson["todayDeaths"]); ?></h1>
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

    <!-- Selected Country Totals -->
    <div class="container">
        <h3 class="mt-5"><?php echo strtoupper($selectCountry); ?> Total Cases <!--<small class="text-muted"> First Case: <?php echo $firstCase ?></small>--></h3>
        <table class="table table-curved">
            <thead>
                <tr>
                    <th scope="col">Total</th>
                    <th scope="col">Active</th>
                    <th scope="col">Deaths</th>
                    <th scope="col">Critical</th>
                    <th scope="col">Recovered</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="bg-secondary">
                        <?php echo number_format($cases); ?>
                    </td>
                    <td class="bg-info">
                        <?php
                            if ($selectCountry == "uk") {
                                if ($recovered == "") {
                                    echo '<u><span rel="tooltip" title="Public Health England no longer provide this data.">N/A</span></u>';
                                }
                            } else {
                                echo number_format($activeCases);
                            }
                        ?>
                    </td>
                    <td class="bg-danger">
                        <?php echo number_format($deaths); ?>
                    </td>
                    <td class="bg-warning">
                        <?php echo number_format($critical); ?>
                    </td>
                    <td class="bg-success">
                        <?php
                            if ($selectCountry == "uk") {
                                if ($recovered == "") {
                                    //echo '<u><span rel="tooltip" title="Calculated value, Public Health England no longer provide this data.">' . number_format($recoveredCalc) . ' </span></u>';
                                    echo '<u><span rel="tooltip" title="Public Health England no longer provide this data.">N/A</span></u>';
                                }
                            } else {
                                echo number_format($recoveredCalc);
                            }
                        ?>
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
                    <?php echo ($recoveredCalc/$cases)*100; ?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
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
            if ($selectCountry == "uk")
                echo '<h4>Counties <small class="text-muted">Click below for County breakdown</small></h4>
                <div class="btn-group d-flex" role="group">
                    <button type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#countiesModal">Cases by County or Region</button>
                </div>';

            // If USA Selected show States modal button
            if ($selectCountry == "usa")
                echo '<h4>States <small class="text-muted">Click below for County breakdown</small></h4>
                <div class="btn-group d-flex" role="group">
                    <button type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#usCountiesModal">Cases by State</button>
                </div>';
        ?>

</div>

<br>

<!-- World Total -->
<h3 class="text-center">Coronavirus Worldwide</h3>
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

<!-- Enable tooltip -->
<script>
$(document).ready(function() {
    $("[rel='tooltip'], .tooltip").tooltip();
});
</script>

<?php include( 'parts/footer.php'); ?>

</body>
</html>