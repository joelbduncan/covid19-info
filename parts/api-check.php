<?php

// Set API URL to most up to date source
// Check UK Today cases on self hosted API
$apiMain = "https://api.covid-19.UK.com/countries/UK";
$apiMainJson = json_decode(file_get_contents($apiMain), true);

// Check UK Today cases on alternative API
$apiBackup = "https://corona.lmao.ninja/v2/countries/UK";
$apiBackupJson = json_decode(file_get_contents($apiBackup), true);

// Use self hosted API unless alternative has more cases
if ($apiMainJson["todayCases"] > $apiBackupJson["todayCases"]){
    $apiURL = "https://api.covid-19.UK.com";
    $yesterdayApiURL = "https://api.covid-19.UK.com/yesterday/$selectCountry";
    $currentAPI = "Main";
  }
  // Use self hosted API when numbers are equal
  elseif ($apiMainJson["todayCases"] == $apiBackupJson["todayCases"]){
      $apiURL = "https://api.covid-19.UK.com";
      $yesterdayApiURL = "https://api.covid-19.UK.com/yesterday/$selectCountry";
      $twoDayApiURL = "https://api.covid-19.UK.com/twoDay/$selectCountry";
      $currentAPI = "Main";
    }
  else {
      // Use backend in other scenarios
      $apiURL = "https://corona.lmao.ninja/v2";
      $yesterdayApiURL = "https://corona.lmao.ninja/v2/countries/$selectCountry?yesterday=true";
      $currentAPI = "Backup";
  }

?>