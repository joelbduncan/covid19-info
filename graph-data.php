<!DOCTYPE html>
<html lang="en">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>COVID-19 Tracker | Global Graph</title>
  
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="//bootswatch.com/4/darkly/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <!-- Chart Resources -->
  <script src="js/chart/core.js"></script>
  <script src="js/chart/charts.js"></script>
  <script src="js/chart/maps.js"></script>
  <script src="js/chart/worldLow.js"></script>
  <script src="https://covid.amCharts.com/data/js/world_timeline.js"></script>
  <script src="https://covid.amCharts.com/data/js/total_timeline.js"></script>
  <script src="js/chart/animated.js"></script>
  <script src="js/chart/chart.js"></script>
</head>
    
<body>

<?php include( 'parts/navbar.php'); ?>

<style>
  #chartdiv {
    max-width: 100%;
    height: 800px;
  }
</style>

<div id="chartdiv"></div>


<?php include( 'parts/footer.php'); ?>

</body>
</html>