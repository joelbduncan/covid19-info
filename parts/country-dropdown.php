<?php
// Set API URL to most up to date source
// Check UK Today cases on self hosted API
$apiMain = "https://api.covid-19.uk.com/countries/uk";
$apiMainJson = json_decode(file_get_contents($apiMain), true);

// Check UK Today cases on alternative API
$apiBackup = "https://disease.sh/v2/countries/uk";
$apiBackupJson = json_decode(file_get_contents($apiBackup), true);

// Use self hosted API unless alternative has more cases
if ($apiMainJson["todayCases"] > $apiBackupJson["todayCases"]) {
    $apiURL = "https://api.covid-19.uk.com";
}
// Use self hosted API when numbers are equal
elseif ($apiMainJson["todayCases"] == $apiBackupJson["todayCases"]) {
    $apiURL = "https://api.covid-19.uk.com";
} else {
    // Use backend in other scenarios
    $apiURL = "https://disease.sh/v2";
}

// Self hosted API for World COVID-19 data
$urlWorld = "$apiURL/countries";
$jsonWorld = json_decode(file_get_contents($urlWorld), true);

$countryCount = count($jsonWorld);

$var = -1;

echo '
<div class="dropdown">
    <select class="selectpicker" onchange="location = this.value;" data-size="8" data-show-subtext="true" data-live-search="true">
        <option>Select Country</option>';

foreach (range(--$countryCount, $columns) as $index) {
    ++$var;

    // Replace "_" in Titles with spaces
    $name = $jsonWorld[$var]["country"];
    $name = str_replace("_", " ", $name);

    echo '<h3><a href="' . $jsonWorld[$var]["country"] . '"> <i class="fa fa-link text-muted small"></i></a></h3>';
    echo $jsonWorld[$var]["country"];
    echo '<option value="https://covid-19.uk.com/?country=' . $jsonWorld[$var]["country"] . '">' . $name . '</option>';
}

echo '</select>
<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#importantModal">Report Issue</button>
</div>';
?>