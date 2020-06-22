<?php

// Compare Local/Backup endpoint & set API URL
include 'api-check.php';

// Self hosted API for World COVID-19 data
$urlWorld = "$apiURL/countries";
$jsonWorld = json_decode(file_get_contents($urlWorld), true);

$countryCount = count($jsonWorld);

$var = -1;

echo '
<div class="dropdown">
    <select class="selectpicker" onchange="location = this.value;" data-size="8" data-show-subtext="true" data-live-search="true">
        <option>Select Country</option>';

foreach (range(0,--$countryCount) as $index) {
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