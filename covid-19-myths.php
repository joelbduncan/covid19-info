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
  background-image: url(https://joelduncan.io/content/images/size/w2000/2020/03/coronavirus-header.jpg);
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
      <h1 class="display-4">COVID-19 Myths</h1>
  <h5>Coronavirus (COVID-19) is a new illness that can affect your lungs and airways. It’s caused by a virus called coronavirus.</h5>
  </div>
</div>

<div class="container ">
    <div class="panel-group" id="faqAccordion">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <b><span class="badge badge-success">Fact</span> COVID-19 virus can be transmitted in areas with hot and humid climates</b>
                </div>
                <div class="card-body">
                    <p class="card-text">From the evidence so far, the COVID-19 virus can be transmitted in ALL AREAS, including areas with hot and humid weather. Regardless of climate, adopt protective measures if you live in, or travel to an area reporting COVID-19. The best way to protect yourself against COVID-19 is by frequently cleaning your hands. By doing this you eliminate viruses that may be on your hands and avoid infection that could occur by then touching your eyes, mouth, and nose.</p>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <b><span class="badge badge-success">Fact</span> Cold weather and snow CANNOT kill the new coronavirus.</b>
                </div>
                <div class="card-body">
                    <p class="card-text">There is no reason to believe that cold weather can kill the new coronavirus or other diseases. The normal human body temperature remains around 36.5°C to 37°C, regardless of the external temperature or weather. The most effective way to protect yourself against the new coronavirus is by frequently cleaning your hands with alcohol-based hand rub or washing them with soap and water.</p>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <b><span class="badge badge-success">Fact</span> Taking a hot bath does not prevent the new coronavirus disease</b>
                </div>
                <div class="card-body">
                    <p class="card-text">Taking a hot bath will not prevent you from catching COVID-19. Your normal body temperature remains around 36.5°C to 37°C, regardless of the temperature of your bath or shower. Actually, taking a hot bath with extremely hot water can be harmful, as it can burn you. The best way to protect yourself against COVID-19 is by frequently cleaning your hands. By doing this you eliminate viruses that may be on your hands and avoid infection that coud occur by then touching your eyes, mouth, and nose.</p>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <b><span class="badge badge-success">Fact</span> The new coronavirus CANNOT be transmitted through mosquito bites.</b>
                </div>
                <div class="card-body">
                    <p class="card-text">To date there has been no information nor evidence to suggest that the new coronavirus could be transmitted by mosquitoes. The new coronavirus is a respiratory virus which spreads primarily through droplets generated when an infected person coughs or sneezes, or through droplets of saliva or discharge from the nose. To protect yourself, clean your hands frequently with an alcohol-based hand rub or wash them with soap and water. Also, avoid close contact with anyone who is coughing and sneezing.</p>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <b><span class="badge badge-danger">Myth</span> Are hand dryers effective in killing the new coronavirus?</b>
                </div>
                <div class="card-body">
                    <p class="card-text">No. Hand dryers are not effective in killing the 2019-nCoV. To protect yourself against the new coronavirus, you should frequently clean your hands with an alcohol-based hand rub or wash them with soap and water. Once your hands are cleaned, you should dry them thoroughly by using paper towels or a warm air dryer.</p>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <b><span class="badge badge-danger">Myth</span> Can an ultraviolet disinfection lamp kill the new coronavirus?</b>
                </div>
                <div class="card-body">
                    <p class="card-text">UV lamps should not be used to sterilize hands or other areas of skin as UV radiation can cause skin irritation.</p>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <b><span class="badge badge-success">Fact</span> How effective are thermal scanners in detecting people infected with the new coronavirus?</b>
                </div>
                <div class="card-body">
                    <p class="card-text">Thermal scanners are effective in detecting people who have developed a fever (i.e. have a higher than normal body temperature) because of infection with the new coronavirus.</p><p>However, they cannot detect people who are infected but are not yet sick with fever. This is because it takes between 2 and 10 days before people who are infected become sick and develop a fever.</p>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <b><span class="badge badge-danger">Myth</span> Can spraying alcohol or chlorine all over your body kill the new coronavirus?</b>
                </div>
                <div class="card-body">
                    <p class="card-text">No. Spraying alcohol or chlorine all over your body will not kill viruses that have already entered your body. Spraying such substances can be harmful to clothes or mucous membranes (i.e. eyes, mouth). Be aware that both alcohol and chlorine can be useful to disinfect surfaces, but they need to be used under appropriate recommendations.</p>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <b><span class="badge badge-danger">Myth</span> Do vaccines against pneumonia protect you against the new coronavirus?</b>
                </div>
                <div class="card-body">
                    <p class="card-text">No. Vaccines against pneumonia, such as pneumococcal vaccine and Haemophilus influenza type B (Hib) vaccine, do not provide protection against the new coronavirus.</p><p>The virus is so new and different that it needs its own vaccine. Researchers are trying to develop a vaccine against 2019-nCoV, and WHO is supporting their efforts.</p><p>Although these vaccines are not effective against 2019-nCoV, vaccination against respiratory illnesses is highly recommended to protect your health.</p>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <b><span class="badge badge-danger">Myth</span> Can regularly rinsing your nose with saline help prevent infection with the new coronavirus?</b>
                </div>
                <div class="card-body">
                    <p class="card-text">No. There is no evidence that regularly rinsing the nose with saline has protected people from infection with the new coronavirus.</p><p>There is some limited evidence that regularly rinsing nose with saline can help people recover more quickly from the common cold. However, regularly rinsing the nose has not been shown to prevent respiratory infections.</p>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <b><span class="badge badge-danger">Myth</span> Can eating garlic help prevent infection with the new coronavirus?</b>
                </div>
                <div class="card-body">
                    <p class="card-text">Garlic is a healthy food that may have some antimicrobial properties. However, there is no evidence from the current outbreak that eating garlic has protected people from the new coronavirus.</p>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <b><span class="badge badge-danger">Myth</span> Does the new coronavirus affect older people, or are younger people also susceptible?</b>
                </div>
                <div class="card-body">
                    <p class="card-text"></p>People of all ages can be infected by the new coronavirus (2019-nCoV). Older people, and people with pre-existing medical conditions (such as asthma, diabetes, heart disease) appear to be more vulnerable to becoming severely ill with the virus.<p>WHO advises people of all ages to take steps to protect themselves from the virus, for example by following good hand hygiene and good respiratory hygiene.</p>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <b><span class="badge badge-danger">Myth</span> Are antibiotics effective in preventing and treating the new coronavirus?</b>
                </div>
                <div class="card-body">
                    <p class="card-text">No, antibiotics do not work against viruses, only bacteria. </p><p>The new coronavirus (2019-nCoV) is a virus and, therefore, antibiotics should not be used as a means of prevention or treatment.</p><p>However, if you are hospitalized for the 2019-nCoV, you may receive antibiotics because bacterial co-infection is possible.</p>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <b><span class="badge badge-danger">Myth</span> Are there any specific medicines to prevent or treat the new coronavirus?</b>
                </div>
                <div class="card-body">
                    <p class="card-text"></p>To date, there is no specific medicine recommended to prevent or treat the new coronavirus (2019-nCoV).<p>However, those infected with the virus should receive appropriate care to relieve and treat symptoms, and those with severe illness should receive optimized supportive care. Some specific treatments are under investigation, and will be tested through clinical trials. WHO is helping to accelerate research and development efforts with a range or partners.</p>
                </div>
            </div>
        </div>
</div>
</div>

<?php include( 'footer.php'); ?>

</body>
</html>