<!DOCTYPE html>
<html lang="en">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>COVID-19 Tracker | Data Source</title>
  
<head>
  <meta charset="utf-8">
  <?php include( 'parts/head.php'); ?>
  <link rel="stylesheet" type="text/css" href="//bootswatch.com/4/darkly/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
    
<body>

<?php include( 'parts/navbar.php'); ?>

<style>
.jumbotron {
  background-image: url(https://atlasbiomed.com/blog/content/images/size/w2000/2020/03/2020-03-19-Coronavirus-transmission.png);
  background-repeat: no-repeat;
  background-size: cover;
  }
.jumbotron h1, h5 {
  color: white;
  text-shadow: 2px 4px 3px rgba(0, 0, 0, 0.3);
}
</style>

<!-- Jumbotron Header -->
<div class="jumbotron jumbotron-fluid">
  <div class="container">
      <h1 class="display-4">Data Source</h1>
  <h5><i class="fab fa-github" aria-hidden="true"></i> <a style="color: #fff" href="https://github.com/Slethen/covid19-info"><b><u>Open Source</u></b></a> COVID-19 Data Tracker focused on providing accurate and up to date information that's easy to understand in a clean layout.</h5>
  </div>
</div>

<div class="container">

<h3>Why this data is reliable</h3>

<p>Our data comes from <a href="https://worldometers.info">Worldometer</a> their sources include the <b>United Nations Population Division</b>, <b>World Health Organization (WHO)</b>, Food and Agriculture Organization (FAO), International Monetary Fund (IMF), and <b>World Bank.</b></p>

<h3>How accurate is Worldometer?</h3>
<p>We try to be as accurate as possible. For each set of statistics we perform extensive research and data mining in order to bring the most authoritative, comprehensive, and timely information to be displayed on the live counters.</p>

<p>As with any statistic, the numbers are not expected to be exact to the single digit, but to provide a fairly accurate and informative description of a phenomenon. This inherited limitation must be taken into account for the correct interpretation of the information.</p>

<p>Worldometer is cited as a source in over 10,000 published books, in more than 6,000 professional journal articles, and in over 1000 Wikipedia pages.</p>

<p>Worldometer was voted as one of the best free reference websites by the American Library Association (ALA), the oldest and largest library association in the world.</p>

<h3>UK County Data</h3>
<p>County-specific data is provided by Public Health England.</p>

<h3>US State Data</h3>
<p>State-specific data is provided by Johns Hopkins University.</p>

</div>

<?php include( 'parts/footer.php'); ?>

</body>
</html>