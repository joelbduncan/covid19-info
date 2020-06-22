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

// Compare Local/Backup endpoint & set API URL
include 'parts/api-check.php';

?>

<!-- Jumbotron Header -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Countries </h1>
        <h5><i class="fab fa-github" aria-hidden="true"></i> <a style="color: #fff" href="https://github.com/Slethen/covid19-info"><b><u>Open Source</u></b></a> COVID-19 Data Tracker focused on providing accurate and up to date information that's easy to understand in a clean layout.</h5>
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

foreach (range(0,--$countryCount) as $index) {
    ++$var;

    // Replace "_" in Titles with spaces
    $name = $jsonWorld[$var]["country"];
    $urlName = str_replace("_", " ", $name);

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
    echo '<td style="word-wrap: break-word;min-width: 120px;max-width: 120px;"><a style="color:#32ecb6" href="/?country=' . $name . '"><b><u>' . $urlName . '</a></u></b></td>';
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