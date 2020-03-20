<!DOCTYPE html>
<html lang="en">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>COVID-19 UK | Live Data</title>
  
<head>
  <meta charset="utf-8">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="//bootswatch.com/4/flatly/bootstrap.min.css">
</head>
    
<body>

<?php include( 'navbar.php'); ?>

<style>
  .jumbotron {
  background-image: url(https://www.charlescountymd.gov/Home/ShowPublishedImage/4496/637195158875230000);
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  color: white;
  text-shadow: 2px 4px 3px rgba(0, 0, 0, 0.3);
  }
</style>

<?php

if (isset($_GET['country'])) {
    $selectCountry = $_GET['country'];
} else {
    $selectCountry = uk;
}

$url = "https://corona.lmao.ninja/countries/$selectCountry";
$json = json_decode(file_get_contents($url), true);

$country = $json["country"];
$cases = $json["cases"];
$todayCases = $json["todayCases"];
$deaths = $json["deaths"];
$todayDeaths = $json["todayDeaths"];
$recovered = $json["recovered"];
$critical = $json["critical"];

?>

<!-- Jumbotron Header -->
<div class="jumbotron jumbotron-fluid">
  <div class="container">
      <h1 class="display-4">Data Source</h1>
  <h5>Coronavirus (COVID-19) is a new illness that can affect your lungs and airways. It’s caused by a virus called coronavirus.</h5>
  </div>
</div>

<div class="container">

<h3>Why this data is reliable</h3>

<p>Our data comes from <a href="https://worldometers.info">Worldometer</a> there sources include the <b>United Nations Population Division</b>, <b>World Health Organization (WHO)</b>, Food and Agriculture Organization (FAO), International Monetary Fund (IMF), and <b>World Bank.</b></p>

<h3>How accurate is Worldometer?</h3>
<p>We try to be as accurate as possible. For each set of statistics we perform extensive research and data mining in order to bring the most authoritative, comprehensive, and timely information to be displayed on the live counters.</p>

<p>As with any statistic, the numbers are not expected to be exact to the single digit, but to provide a fairly accurate and informative description of a phenomenon. This inherited limitation must be taken into account for the correct interpretation of the information.</p>

<p>Worldometer is cited as a source in over 10,000 published books, in more than 6,000 professional journal articles, and in over 1000 Wikipedia pages.</p>

<p>Worldometer was voted as one of the best free reference websites by the American Library Association (ALA), the oldest and largest library association in the world.</p>


</div>

<?php include( 'footer.php'); ?>

</body>
</html>