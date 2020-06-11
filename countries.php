<!DOCTYPE html>
<html lang="en">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>COVID-19 Tracker | Countries</title>
  
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
  <script src="js/floatThead.js"></script>
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


.nav-pills .nav-link:not(.active) {
    color: #00bc8c;
}

table.floatThead-table {
    border-top: none;
    border-bottom: none;
    background-color: #556d86;
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
$apiBackup = "https://disease.sh/v2/countries/uk";
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
      $twoDayApiURL = "https://api.covid-19.uk.com/twoDay/$selectCountry";
      $currentAPI = "Main";
    }
  else {
      // Use backend in other scenarios
      $apiURL = "https://disease.sh/v2";
      $yesterdayApiURL = "https://disease.sh/v2/countries/$selectCountry?yesterday=true";
      $currentAPI = "Backup";
  }

// Self hosted API for Country specific data
$url = "$apiURL/countries/$selectCountry";
$json = json_decode(file_get_contents($url), true);

// Replace underscores with spaces in Country name
$selectCountry = str_replace("_", " ", $selectCountry);

?>

<!-- Jumbotron Header -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Countries </h1>
        <h5>Coronavirus (COVID-19) is a new illness that can affect your lungs and airways. It’s caused by a virus called coronavirus.</h5>
    </div>
</div>

<div class="container">

  <!-- Table search doesn't play well with floatThead --> 
  <!-- <input type="text" class="form-control form-control" id="countryInput" onkeyup="countrySearch()" placeholder="Search"> -->
  <!-- <br> -->

<div class="table-responsive">

<?php
// Self hosted API for World COVID-19 data
$urlWorld = "$apiURL/countries";
$jsonWorld = json_decode(file_get_contents($urlWorld), true);

$countryCount = count($jsonWorld);

$var = -1;

echo '
<table id="countryTable" class="table table-striped table-bordered with-responsive-wrapper table-striped table-bordered">
  <thead class="sticky-header">
    <tr>
      <th scope="col">Country</th>
      <th scope="col">Total Cases</th>
      <th scope="col">New Cases</th>
      <th scope="col">Total Deaths</th>
      <th scope="col">New Deaths</th>
      <th scope="col">Total Recovered</th>
      <th scope="col">Active Cases</th>
      <th scope="col">Critical</th>
      <th scope="col">Cases/1M pop</th>
      <th scope="col">Deaths/1M pop</th>
      <th scope="col">Total Tests</th>
      <th scope="col">Test/1M pop</th>
    </tr>
  </thead>
  <tbody>';

foreach (range(--$countryCount, $columns) as $index) {
    ++$var;

    // Replace "_" in Titles with spaces
    $name = $jsonWorld[$var]["country"];
    $name = str_replace("_", " ", $name);

    if ($jsonWorld[$var]["recovered"] == "") {
        $recovered = "N/A";
    }
    else {
        $recovered = number_format($jsonWorld[$var]["recovered"]);
    }

    if ($jsonWorld[$var]["active"] == "") {
        $active = "N/A";
    }
    else {
        $active = number_format($jsonWorld[$var]["active"]);
    }

    if ($jsonWorld[$var]["todayDeaths"] > "0") {
        $todayDeathsBG = 'class="bg-danger"';
        $newDeaths = '+';
    }
    else {
        $todayDeathsBG = '';
        $newDeaths = '';
    }

    if ($jsonWorld[$var]["todayCases"] > "0") {
        $todayCasesBG = 'class="bg-info"';
        $newCases = '+';
    }
    else {
        $todayCasesBG = '';
        $newCases = '';
    }

    if ($jsonWorld[$var]["cases"] == $jsonWorld[$var]["recovered"]) {
        $recoveredBG = 'class="bg-success"';
    }
    else {
        $recoveredBG = "";
    }

    echo "<tr ' . $recoveredBG . '>";
    echo '<td style="word-wrap: break-word;min-width: 120px;max-width: 120px;"><a style="color:#32ecb6" href="/?country=' . $name . '"><b><u>' . $name . '</a></u></b></td>';
    echo '<td>' . number_format($jsonWorld[$var]["cases"]) . '</td>';
    echo '<td ' . $todayCasesBG . '>' . $newCases . number_format($jsonWorld[$var]["todayCases"]) . '</td>';
    echo '<td>' . number_format($jsonWorld[$var]["deaths"]) . '</td>';
    echo '<td ' . $todayDeathsBG . '>' . $newDeaths . number_format($jsonWorld[$var]["todayDeaths"]) . '</td>';
    echo '<td>' . $recovered . '</td>';
    echo '<td>' . $active . '</td>';
    echo '<td>' . number_format($jsonWorld[$var]["critical"]) . '</td>';
    echo '<td>' . number_format($jsonWorld[$var]["casesPerOneMillion"]) . '</td>';
    echo '<td>' . number_format($jsonWorld[$var]["deathsPerOneMillion"]) . '</td>';
    echo '<td>' . number_format($jsonWorld[$var]["tests"]) . '</td>';
    echo '<td>' . number_format($jsonWorld[$var]["testsPerOneMillion"]) . '</td>';
    echo "</tr>";
}
?>

    </tr>
  </tbody>
</table>

</div>
</div>

<script>
function countrySearch() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("countryInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("countryTable");
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

<script type="text/javascript">
    $(function(){
        $(".table.with-responsive-wrapper").floatThead({
            responsiveContainer: function($table){
                return $table.closest(".table-responsive");
            }
        });
        $(".table.without-responsive-wrapper").floatThead();
    });
</script>

<?php include( 'parts/footer.php'); ?>

</body>
</html>