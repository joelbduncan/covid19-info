<!DOCTYPE html>
<html lang="en">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>COVID-19 Tracker | Live Data</title>
  
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="//bootswatch.com/4/darkly/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
</head>
    
<body>

<?php include( 'navbar.php'); ?>

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
$apiBackup = "https://corona.lmao.ninja/countries/uk";
$apiBackupJson = json_decode(file_get_contents($apiBackup), true);

// Use self hosted API unless alternative has more cases
if ($apiMainJson["todayCases"] > $apiBackupJson["todayCases"]){
    $apiURL = "https://api.covid-19.uk.com";
    $currentAPI = "Main";
  }
  // Use self hosted API when numbers are equal
  elseif ($apiMainJson["todayCases"] == $apiBackupJson["todayCases"]){
      $apiURL = "https://api.covid-19.uk.com";
      $currentAPI = "Main";
    }
  else {
      // Use backend in other scenarios
      $apiURL = "https://corona.lmao.ninja";
      $currentAPI = "Backup";
  }

// Self hosted API for World COVID-19 data
$urlWorld = "https://api.covid-19.uk.com/all";
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
$totalTests = $json["totalTests"];

// World Calculated Percentages
$worldDeathsPercent = ($worldDeaths/$worldCases)*100; 
$worldRecoveredPercent = ($worldRecovered/$worldCases)*100;

// Local Calculated Percentages;
$activeCasesPercent = ($activeCases/$cases)*100;
$deathsPercent = ($deaths/$cases)*100;
$criticalPercent = ($critical/$cases)*100; 
$recoveredPercent = ($recovered/$cases)*100;
$positiveTestPercent = ($cases/$totalTests)*100;

// Replace underscores with spaces in Country name
$selectCountry = str_replace("_", " ", $selectCountry);

// Guardian source for UK county data
$guardianCounty = "https://interactive.guim.co.uk/2020/coronavirus-uk-local-data/ladata.json";
$guardianCountyJson = json_decode(file_get_contents($guardianCounty), true);

// Count array size to populate columns
$ukCountyCount = count($guardianCountyJson["ladata"]["features"]);
$scotCountyCount = count($guardianCountyJson["scotdata"]);
$walesCountyCount = count($guardianCountyJson["walesdata"]);

// API for US state data
$usaStates = "https://corona.lmao.ninja/states";
$usaStatesJson = json_decode(file_get_contents($usaStates), true);

// Count array size to populate columns
$usaStateCount = count($usaStatesJson);

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

<div class="modal fade" tabindex="-1" id="countiesModal" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Counties</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <ul class="nav nav-pills nav-fill">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#england">England</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#scotland">Scotland</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#wales">Wales</a>
                    </li>
                </ul>

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
                                        ' . $guardianCountyJson["ladata"]["features"][$var]["attributes"]["GSS_NM"] .'
                                    </td>
                                    <td class="bg-info">
                                        <b>' . $guardianCountyJson["ladata"]["features"][$var]["attributes"]["TotalCases"] .'</b>
                                    </td>
                                </tr>';
                                }
                                ?>
                            </tbody>
                            <div id="results"></div>
                        </table>
                    </div>
                    <div id="scotland" class="tab-pane fade">
                        <br>
                        <input type="text" class="form-control form-control" id="scotlandInput" onkeyup="scotlandSearch()" placeholder="Search">
                        <table id="scotlandTable" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">County</th>
                                    <th scope="col">Cases</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $var = -1;

                                foreach(range(--$scotCountyCount,$columns) as $index) {

                                ++$var;

                                echo '<tr>
                                    <td style="color: white" class="bg-primary">
                                        ' . $guardianCountyJson["scotdata"][$var]["board"] .'
                                    </td>
                                    <td class="bg-info">
                                        <b>' . $guardianCountyJson["scotdata"][$var]["cases"] .'</b>
                                    </td>
                                </tr>';
                                }
                                ?>
                            </tbody>
                            <div id="results"></div>
                        </table>
                    </div>
                    <div id="wales" class="tab-pane fade">
                        <br>
                        <input type="text" class="form-control form-control" id="walesInput" onkeyup="walesSearch()" placeholder="Search">
                        <table id="walesTable" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">County</th>
                                    <th scope="col">Cases</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $var = -1;

                                foreach(range(--$walesCountyCount,$columns) as $index) {

                                ++$var;

                                echo '<tr>
                                    <td style="color: white" class="bg-primary">
                                        ' . $guardianCountyJson["walesdata"][$var]["board"] .'
                                    </td>
                                    <td class="bg-info">
                                        <b>' . $guardianCountyJson["walesdata"][$var]["cases"] .'</b>
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
                                <b>' . $usaStatesJson[$var]["cases"] .'</b>
                            </td>
                            <td class="bg-danger">
                                <b>' . $usaStatesJson[$var]["deaths"] .'</b>
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
$day = date('D');
if($day == Thu){
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
?>

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

<h3 class="mt-5"><?php echo strtoupper($selectCountry); ?> Total Cases <!--<small class="text-muted"> First Case: <?php echo $firstCase ?></small>--></h3>
<table class="table">
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
				<?php echo number_format($activeCases); ?>
			</td>
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

<table class="table">
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
    Deaths <span class="badge badge-danger"><?php echo sprintf("%.1f", $deathsPercent); ?>%</span> 
    Critical <span class="badge badge-warning"><?php echo sprintf("%.1f", $criticalPercent); ?>%</span>  
    Recovered <span class="badge badge-success"><?php echo sprintf("%.1f", $recoveredPercent); ?>%</span>
    Active <span class="badge badge-info"><?php echo sprintf("%.1f", $activeCasesPercent); ?>%</span> 
</p>

<?php
if ($selectCountry == "uk")
    echo '<h4>Counties <small class="text-muted">Click below for County breakdown</small></h4>
    <div class="btn-group d-flex" role="group">
        <button type="button" class="btn-lg btn-primary w-100" data-toggle="modal" data-target="#countiesModal">Cases by County</button>
    </div>';

if ($selectCountry == "usa")
    echo '<h4>States <small class="text-muted">Click below for County breakdown</small></h4>
    <div class="btn-group d-flex" role="group">
        <button type="button" class="btn-lg btn-primary w-100" data-toggle="modal" data-target="#usCountiesModal">Cases by State</button>
    </div>';

?>

</div>

<br>

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

function scotlandSearch() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("scotlandInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("scotlandTable");
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

function walesSearch() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("walesInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("walesTable");
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

<?php include( 'footer.php'); ?>

</body>
</html>