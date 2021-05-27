<!DOCTYPE html>
<html lang="en">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>COVID-19 Tracker | API</title>
  
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
.jumbotron h1 {
    -webkit-text-stroke-width: 1.5px;
    -webkit-text-stroke-color: #2a2a2a;
}
</style>

<!-- Jumbotron Header -->
<div class="jumbotron jumbotron-fluid">
  <div class="container">
      <h1 class="display-4">COVID-19 API</h1>
  <h5><i class="fab fa-github" aria-hidden="true"></i> <a style="color: #fff" href="https://github.com/Slethen/covid19-info"><b><u>Open Source</u></b></a> COVID-19 Data Tracker focused on providing accurate and up to date information that's easy to understand in a clean layout.</h5>
  </div>
</div>

<div class="container">

<p>API for the latest information regarding COVID-19 daily and total cases, recoveries & deaths worldwide.</p>

<h3>API Endpoints</h3>

<h4>World Infomation</h4>
<div class="alert alert-primary" role="alert">
  <strong>GET</strong> <a href="https://api.covid-19.uk.com/all" target="_blank" style="color: #7FFF00">https://api.covid-19.uk.com/all</a>
</div>

<h4>Global Infomation</h4>
<div class="alert alert-primary" role="alert">
  <strong>GET</strong> <a href="https://api.covid-19.uk.com/countries" target="_blank" style="color: #7FFF00">https://api.covid-19.uk.com/countries</a>
</div>

<h4>Country Specific Infomation <small class="muted">e.g {countryName} = uk</small></h4>
<div class="alert alert-primary" role="alert">
  <strong>GET</strong> <a href="https://api.covid-19.uk.com/countries/uk" target="_blank" style="color: #7FFF00">https://api.covid-19.uk.com/countries/{countryName}</a>
</div>

<h3>Yesterday Endpoint</h3>

<h4>Global Infomation</h4>
<div class="alert alert-primary" role="alert">
  <strong>GET</strong> <a href="https://api.covid-19.uk.com/yesterday" target="_blank" style="color: #7FFF00">https://api.covid-19.uk.com/yesterday</a>
</div>

<h4>Country Specific Infomation <small class="muted">e.g {countryName} = uk</small></h4>
<div class="alert alert-primary" role="alert">
  <strong>GET</strong> <a href="https://api.covid-19.uk.com/yesterday/uk" target="_blank" style="color: #7FFF00">https://api.covid-19.uk.com/yesterday/{countryName}</a>
</div>

<h3>Two Day Endpoint</h3>

<h4>Global Infomation</h4>
<div class="alert alert-primary" role="alert">
  <strong>GET</strong> <a href="https://api.covid-19.uk.com/twoDay" target="_blank" style="color: #7FFF00">https://api.covid-19.uk.com/twoDay</a>
</div>

<h4>Country Specific Infomation <small class="muted">e.g {countryName} = uk</small></h4>
<div class="alert alert-primary" role="alert">
  <strong>GET</strong> <a href="https://api.covid-19.uk.com/twoDay/uk" target="_blank" style="color: #7FFF00">https://api.covid-19.uk.com/twoDay/{countryName}</a>
</div>

</div>

<?php include( 'parts/footer.php'); ?>

</body>
</html>