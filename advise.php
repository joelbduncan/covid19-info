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
      <h1 class="display-4">NHS Advise</h1>
  <h5>Coronavirus (COVID-19) is a new illness that can affect your lungs and airways. It’s caused by a virus called coronavirus.</h5>
  </div>
</div>

<div class="modal fade" tabindex="-1" id="importantModal" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">How to avoid catching and spreading coronavirus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<p>Everyone should do what they can to stop coronavirus spreading. It is particularly important for people who:</p>
			    <ul><li>are 70 or over</li><li>have a long-term condition</li><li>are pregnant</li><li>have a weakened immune system</li></ul>
				<div class="alert alert-success" role="alert">
						<h4 class="alert-heading">Do</h4>
						<ul><b>
							<li>wash your hands with soap and water often – do this for at least 20 seconds</li>
							<li>always wash your hands when you get home or into work</li>
							<li>use hand sanitiser gel if soap and water are not available</li>
							<li>cover your mouth and nose with a tissue or your sleeve (not your hands) when you cough or sneeze</li>
							<li>put used tissues in the bin immediately and wash your hands afterwards</li>
							<li>avoid close contact with people who have symptoms of coronavirus</li>
							<li>only travel on public transport if you need to</li>
							<li>work from home, if you can</li>
							<li>avoid social activities, such as going to pubs, restaurants, theatres and cinemas</li>
							<li>avoid events with large groups of people</li>
							<li>use phone, online services, or apps to contact your GP surgery or other NHS services</li>
							</b>
						</ul> 
					</div>
				<div class="alert alert-danger" role="alert">
					<h4 class="alert-heading">Don't</h4>
					<ul><b>
							<li>do not touch your eyes, nose or mouth if your hands are not clean</li>
							<li>do not have visitors to your home, including friends and family</li>
						</b>
						</ul> 
				</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="container">

<h3>Stay at home if you have coronavirus symptoms</h3>

<p>Stay at home if you have either:</p>

<ul>
	<li>a high temperature – you feel hot to touch on your chest or back</li>
	<li>a new, continuous cough – this means you've started coughing repeatedly</li>
</ul> 

<p>Do not go to a GP surgery, pharmacy or hospital.</p>
<p>You do not need to contact 111 to tell them you're staying at home.</p>
<p>Testing for coronavirus is not needed if you're staying at home.</p>

<div class="alert alert-warning" role="alert">
  <h4 class="alert-heading">How long to stay at home</h4>
  <ul>
    <li>if you have symptoms, stay at home for 7 days</li>
    <li>if you live with other people, they should stay at home for 14 days from the day the first person got symptoms</li>
  </ul> 
  <p>If you live with someone who is 70 or over, has a long-term condition, is pregnant or has a weakened immune system, try to find somewhere else for them to stay for 14 days.</p>
  <p>If you have to stay at home together, try to keep away from each other as much as possible.</p>
  <p>Read our <a href="/conditions/coronavirus-covid-19/self-isolation-advice/">advice about staying at home</a>.</p>
</div>

<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading"><b>Urgent advice: Use the NHS 111 online coronavirus service if: </b></h4>
  <ul>
    <li>you feel you cannot cope with your symptoms at home</li>
    <li>your condition gets worse</li>
    <li>your symptoms do not get better after 7 days</li>
  </ul> 
  <h5><a href="https://www.gov.uk/guidance/travel-advice-novel-coronavirus">Use the 111 coronavirus service</a></h5>
  <p><b>Only call 111 if you cannot get help online.</b></p>
</div>

<h3>How to avoid catching and spreading coronavirus (social distancing)</h3>
<p>Everyone should do what they can to stop coronavirus spreading. It is particularly important for people who:</p>
<ul><li>are 70 or over</li><li>have a long-term condition</li><li>are pregnant</li><li>have a weakened immune system</li></ul>

<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Do</h4>
  <ul><b>
    <li>wash your hands with soap and water often – do this for at least 20 seconds</li>
    <li>always wash your hands when you get home or into work</li>
    <li>use hand sanitiser gel if soap and water are not available</li>
    <li>cover your mouth and nose with a tissue or your sleeve (not your hands) when you cough or sneeze</li>
    <li>put used tissues in the bin immediately and wash your hands afterwards</li>
    <li>avoid close contact with people who have symptoms of coronavirus</li>
    <li>only travel on public transport if you need to</li>
    <li>work from home, if you can</li>
    <li>avoid social activities, such as going to pubs, restaurants, theatres and cinemas</li>
    <li>avoid events with large groups of people</li>
    <li>use phone, online services, or apps to contact your GP surgery or other NHS services</li>
    </b>
  </ul> 
</div>

<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Don't</h4>
  <ul><b>
      <li>do not touch your eyes, nose or mouth if your hands are not clean</li>
      <li>do not have visitors to your home, including friends and family</li>
    </b>
    </ul> 
</div>

<p>The NHS will contact you from Monday 23 March 2020 if you are at particularly high risk of getting seriously ill with coronavirus. You'll be given specific advice about what to do.</p>
<p>Do not contact your GP or healthcare team at this stage – wait to be contacted.</p>

<h3>Who is at risk? </h3>
<p>You may be at a particularly high risk of getting seriously ill with coronavirus if you:</p>
<ul>
  <li>have had an organ transplant and are taking immunosuppressant medicine</li>
  <li>are having chemotherapy or radiotherapy</li>
  <li>have blood or bone marrow cancer, such as leukaemia</li>
  <li>have a severe chest condition, such as cystic fibrosis or severe asthma</li>
  <li>have another serious health condition</li>
</ul> 

<h3>How coronavirus is spread</h3>
<p>Because it's a new illness, we do not know exactly how coronavirus spreads from person to person.</p>
<p>Similar viruses are spread in cough droplets.</p>
<p>It's very unlikely it can be spread through things like packages or food.</p>

<h3>Travel advice</h3>
<p>There are some countries and areas where there's a higher chance of coming into contact with someone with coronavirus.</p>
<p>If you're planning to travel abroad and are concerned about coronavirus, see <a href="https://www.gov.uk/guidance/travel-advice-novel-coronavirus">advice for travellers on GOV.UK</a>.
</p>

<h3>Treatment for coronavirus</h3>
<p>There is currently no specific treatment for coronavirus.</p>
<p>Antibiotics do not help, as they do not work against viruses.</p>
<p>Treatment aims to relieve the symptoms while your body fights the illness.</p>
<p>You'll need to stay in isolation, away from other people, until you have recovered.</p>


</div>

<?php include( 'footer.php'); ?>

</body>
</html>