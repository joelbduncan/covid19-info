<?php

// Set API URL to most up to date source
// Check UK Today cases on self hosted API
$apiMain = "https://api.covid-19.UK.com/countries/UK";
$apiMainJson = json_decode(file_get_contents($apiMain), true);

// Check UK Today cases on alternative API
$apiBackup = "https://disease.sh/v3/covid-19/countries/UK";
$apiBackupJson = json_decode(file_get_contents($apiBackup), true);

// Use self hosted API unless alternative has more cases
if ($apiMainJson["todayCases"] > $apiBackupJson["todayCases"]){
    $apiURL = "https://api.covid-19.UK.com";
    $yesterdayApiURL = "https://api.covid-19.UK.com/yesterday/$selectCountry";
    $twoDayApiURL = "https://api.covid-19.UK.com/twoDay/$selectCountry";
    $currentAPI = '<a href="https://api.covid-19.uk.com/">Main</a>';
  }
  // Use self hosted API when numbers are equal
  elseif ($apiMainJson["todayCases"] == $apiBackupJson["todayCases"]){
      $apiURL = "https://api.covid-19.UK.com";
      $yesterdayApiURL = "https://api.covid-19.UK.com/yesterday/$selectCountry";
      $twoDayApiURL = "https://api.covid-19.UK.com/twoDay/$selectCountry";
      $currentAPI = '<a href="https://api.covid-19.uk.com/">Main</a>';
    }
  else {
      // Use backend in other scenarios
      $apiURL = "https://disease.sh/v3/covid-19";
      $yesterdayApiURL = "https://disease.sh/v3/covid-19/countries/$selectCountry?yesterday=true";
      $twoDayApiURL = "https://disease.sh/v3/covid-19/countries/$selectCountry?twoDaysAgo=true";
      $currentAPI = '<a href="https://disease.sh/">disease.sh</a>';
  }

?>