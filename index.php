<!DOCTYPE html>
<html lang="en">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>COVID-19 UK | Live Data</title>
  
<head>
  <meta charset="utf-8">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
  <link rel="stylesheet" type="text/css" href="//bootswatch.com/4/flatly/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
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

$urlWorld = "https://coronavirus-19-api.herokuapp.com/all";
$jsonWorld = json_decode(file_get_contents($urlWorld), true);

$worldCases = $jsonWorld["cases"];
$worldDeaths = $jsonWorld["deaths"];
$worldRecovered = $jsonWorld["recovered"];

$url = "https://coronavirus-19-api.herokuapp.com/countries/$selectCountry";
$json = json_decode(file_get_contents($url), true);

$country = $json["country"];
$cases = $json["cases"];
$todayCases = $json["todayCases"];
$deaths = $json["deaths"];
$todayDeaths = $json["todayDeaths"];
$recovered = $json["recovered"];
$critical = $json["critical"];

// World Calculated Percentages
$worldDeathsPercent = ($worldDeaths/$worldCases)*100; 
$worldRecoveredPercent = ($worldRecovered/$worldCases)*100;

// Local Calculated Percentages;
$deathsPercent = ($deaths/$cases)*100;
$criticalPercent = ($critical/$cases)*100; 
$recoveredPercent = ($recovered/$cases)*100;

?>
	
<!-- Jumbotron Header -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">COVID-19  <?php echo strtoupper($selectCountry); ?> </h1>
        <h5>Coronavirus (COVID-19) is a new illness that can affect your lungs and airways. It’s caused by a virus called coronavirus.</h5>

        <div class="dropdown">
            <select class="selectpicker" onchange="location = this.value;" data-size="8" data-show-subtext="true" data-live-search="true">
                <option>Select Country</option>
                <option value="https://covid19-info.uk/?country=afghanistan">Afghanistan</option>
                <option value="https://covid19-info.uk/?country=albania">Albania</option>
                <option value="https://covid19-info.uk/?country=algeria">Algeria</option>
                <option value="https://covid19-info.uk/?country=andorra">Andorra</option>
                <option value="https://covid19-info.uk/?country=antigua and barbuda">Antigua and Barbuda</option>
                <option value="https://covid19-info.uk/?country=argentina">Argentina</option>
                <option value="https://covid19-info.uk/?country=armenia">Armenia</option>
                <option value="https://covid19-info.uk/?country=aruba">Aruba</option>
                <option value="https://covid19-info.uk/?country=australia">Australia</option>
                <option value="https://covid19-info.uk/?country=austria">Austria</option>
                <option value="https://covid19-info.uk/?country=azerbaijan">Azerbaijan</option>
                <option value="https://covid19-info.uk/?country=bahamas">Bahamas</option>
                <option value="https://covid19-info.uk/?country=bahrain">Bahrain</option>
                <option value="https://covid19-info.uk/?country=bangladesh">Bangladesh</option>
                <option value="https://covid19-info.uk/?country=barbados">Barbados</option>
                <option value="https://covid19-info.uk/?country=belarus">Belarus</option>
                <option value="https://covid19-info.uk/?country=belgium">Belgium</option>
                <option value="https://covid19-info.uk/?country=benin">Benin</option>
                <option value="https://covid19-info.uk/?country=bhutan">Bhutan</option>
                <option value="https://covid19-info.uk/?country=bolivia">Bolivia</option>
                <option value="https://covid19-info.uk/?country=bosnia and herzegovina">Bosnia and Herzegovina</option>
                <option value="https://covid19-info.uk/?country=brazil">Brazil</option>
                <option value="https://covid19-info.uk/?country=brunei">Brunei</option>
                <option value="https://covid19-info.uk/?country=bulgaria">Bulgaria</option>
                <option value="https://covid19-info.uk/?country=burkina faso">Burkina Faso</option>
                <option value="https://covid19-info.uk/?country=cambodia">Cambodia</option>
                <option value="https://covid19-info.uk/?country=cameroon">Cameroon</option>
                <option value="https://covid19-info.uk/?country=canada">Canada</option>
                <option value="https://covid19-info.uk/?country=car">CAR</option>
                <option value="https://covid19-info.uk/?country=cayman islands">Cayman Islands</option>
                <option value="https://covid19-info.uk/?country=cayman islands">Cayman Islands</option>
                <option value="https://covid19-info.uk/?country=channel islands">Channel Islands</option>
                <option value="https://covid19-info.uk/?country=chile">Chile</option>
                <option value="https://covid19-info.uk/?country=china">China</option>
                <option value="https://covid19-info.uk/?country=colombia">Colombia</option>
                <option value="https://covid19-info.uk/?country=congo">Congo</option>
                <option value="https://covid19-info.uk/?country=costa rica">Costa Rica</option>
                <option value="https://covid19-info.uk/?country=croatia">Croatia</option>
                <option value="https://covid19-info.uk/?country=cuba">Cuba</option>
                <option value="https://covid19-info.uk/?country=curaçao">Curaçao</option>
                <option value="https://covid19-info.uk/?country=cyprus">Cyprus</option>
                <option value="https://covid19-info.uk/?country=czechia">Czechia</option>
                <option value="https://covid19-info.uk/?country=denmark">Denmark</option>
                <option value="https://covid19-info.uk/?country=diamond princess">Diamond Princess</option>
                <option value="https://covid19-info.uk/?country=djibouti">Djibouti</option>
                <option value="https://covid19-info.uk/?country=dominican republic">Dominican Republic</option>
                <option value="https://covid19-info.uk/?country=drc">DRC</option>
                <option value="https://covid19-info.uk/?country=ecuador">Ecuador</option>
                <option value="https://covid19-info.uk/?country=egypt">Egypt</option>
                <option value="https://covid19-info.uk/?country=equatorial guinea">Equatorial Guinea</option>
                <option value="https://covid19-info.uk/?country=estonia">Estonia</option>
                <option value="https://covid19-info.uk/?country=eswatini">Eswatini</option>
                <option value="https://covid19-info.uk/?country=ethiopia">Ethiopia</option>
                <option value="https://covid19-info.uk/?country=faeroe islands">Faeroe Islands</option>
                <option value="https://covid19-info.uk/?country=finland">Finland</option>
                <option value="https://covid19-info.uk/?country=france">France</option>
                <option value="https://covid19-info.uk/?country=french guiana">French Guiana</option>
                <option value="https://covid19-info.uk/?country=french polynesia">French Polynesia</option>
                <option value="https://covid19-info.uk/?country=gabon">Gabon</option>
                <option value="https://covid19-info.uk/?country=gambia">Gambia</option>
                <option value="https://covid19-info.uk/?country=georgia">Georgia</option>
                <option value="https://covid19-info.uk/?country=germany">Germany</option>
                <option value="https://covid19-info.uk/?country=ghana">Ghana</option>
                <option value="https://covid19-info.uk/?country=gibraltar">Gibraltar</option>
                <option value="https://covid19-info.uk/?country=greece">Greece</option>
                <option value="https://covid19-info.uk/?country=greenland">Greenland</option>
                <option value="https://covid19-info.uk/?country=guadeloupe">Guadeloupe</option>
                <option value="https://covid19-info.uk/?country=guam">Guam</option>
                <option value="https://covid19-info.uk/?country=guatemala">Guatemala</option>
                <option value="https://covid19-info.uk/?country=guinea">Guinea</option>
                <option value="https://covid19-info.uk/?country=guyana">Guyana</option>
                <option value="https://covid19-info.uk/?country=honduras">Honduras</option>
                <option value="https://covid19-info.uk/?country=hong kong">Hong Kong</option>
                <option value="https://covid19-info.uk/?country=hungary">Hungary</option>
                <option value="https://covid19-info.uk/?country=iceland">Iceland</option>
                <option value="https://covid19-info.uk/?country=india">India</option>
                <option value="https://covid19-info.uk/?country=indonesia">Indonesia</option>
                <option value="https://covid19-info.uk/?country=iran">Iran</option>
                <option value="https://covid19-info.uk/?country=iraq">Iraq</option>
                <option value="https://covid19-info.uk/?country=ireland">Ireland</option>
                <option value="https://covid19-info.uk/?country=israel">Israel</option>
                <option value="https://covid19-info.uk/?country=italy">Italy</option>
                <option value="https://covid19-info.uk/?country=ivory coast">Ivory Coast</option>
                <option value="https://covid19-info.uk/?country=jamaica">Jamaica</option>
                <option value="https://covid19-info.uk/?country=japan">Japan</option>
                <option value="https://covid19-info.uk/?country=jordan">Jordan</option>
                <option value="https://covid19-info.uk/?country=kazakhstan">Kazakhstan</option>
                <option value="https://covid19-info.uk/?country=kenya">Kenya</option>
                <option value="https://covid19-info.uk/?country=kuwait">Kuwait</option>
                <option value="https://covid19-info.uk/?country=kyrgyzstan">Kyrgyzstan</option>
                <option value="https://covid19-info.uk/?country=latvia">Latvia</option>
                <option value="https://covid19-info.uk/?country=lebanon">Lebanon</option>
                <option value="https://covid19-info.uk/?country=liberia">Liberia</option>
                <option value="https://covid19-info.uk/?country=liechtenstein">Liechtenstein</option>
                <option value="https://covid19-info.uk/?country=lithuania">Lithuania</option>
                <option value="https://covid19-info.uk/?country=luxembourg">Luxembourg</option>
                <option value="https://covid19-info.uk/?country=macao">Macao</option>
                <option value="https://covid19-info.uk/?country=malaysia">Malaysia</option>
                <option value="https://covid19-info.uk/?country=maldives">Maldives</option>
                <option value="https://covid19-info.uk/?country=malta">Malta</option>
                <option value="https://covid19-info.uk/?country=martinique">Martinique</option>
                <option value="https://covid19-info.uk/?country=mauritania">Mauritania</option>
                <option value="https://covid19-info.uk/?country=mayotte">Mayotte</option>
                <option value="https://covid19-info.uk/?country=mexico">Mexico</option>
                <option value="https://covid19-info.uk/?country=moldova">Moldova</option>
                <option value="https://covid19-info.uk/?country=monaco">Monaco</option>
                <option value="https://covid19-info.uk/?country=mongolia">Mongolia</option>
                <option value="https://covid19-info.uk/?country=montenegro">Montenegro</option>
                <option value="https://covid19-info.uk/?country=montserrat">Montserrat</option>
                <option value="https://covid19-info.uk/?country=morocco">Morocco</option>
                <option value="https://covid19-info.uk/?country=namibia">Namibia</option>
                <option value="https://covid19-info.uk/?country=nepal">Nepal</option>
                <option value="https://covid19-info.uk/?country=netherlands">Netherlands</option>
                <option value="https://covid19-info.uk/?country=new caledonia">New Caledonia</option>
                <option value="https://covid19-info.uk/?country=new zealand">New Zealand</option>
                <option value="https://covid19-info.uk/?country=nigeria">Nigeria</option>
                <option value="https://covid19-info.uk/?country=north macedonia">North Macedonia</option>
                <option value="https://covid19-info.uk/?country=norway">Norway</option>
                <option value="https://covid19-info.uk/?country=oman">Oman</option>
                <option value="https://covid19-info.uk/?country=pakistan">Pakistan</option>
                <option value="https://covid19-info.uk/?country=palestine">Palestine</option>
                <option value="https://covid19-info.uk/?country=panama">Panama</option>
                <option value="https://covid19-info.uk/?country=paraguay">Paraguay</option>
                <option value="https://covid19-info.uk/?country=peru">Peru</option>
                <option value="https://covid19-info.uk/?country=philippines">Philippines</option>
                <option value="https://covid19-info.uk/?country=poland">Poland</option>
                <option value="https://covid19-info.uk/?country=portugal">Portugal</option>
                <option value="https://covid19-info.uk/?country=puerto rico">Puerto Rico</option>
                <option value="https://covid19-info.uk/?country=qatar">Qatar</option>
                <option value="https://covid19-info.uk/?country=romania">Romania</option>
                <option value="https://covid19-info.uk/?country=russia">Russia</option>
                <option value="https://covid19-info.uk/?country=rwanda">Rwanda</option>
                <option value="https://covid19-info.uk/?country=réunion">Réunion</option>
                <option value="https://covid19-info.uk/?country=s. korea">S. Korea</option>
                <option value="https://covid19-info.uk/?country=saint lucia">Saint Lucia</option>
                <option value="https://covid19-info.uk/?country=saint martin">Saint Martin</option>
                <option value="https://covid19-info.uk/?country=san marino">San Marino</option>
                <option value="https://covid19-info.uk/?country=saudi arabia">Saudi Arabia</option>
                <option value="https://covid19-info.uk/?country=senegal">Senegal</option>
                <option value="https://covid19-info.uk/?country=serbia">Serbia</option>
                <option value="https://covid19-info.uk/?country=seychelles">Seychelles</option>
                <option value="https://covid19-info.uk/?country=singapore">Singapore</option>
                <option value="https://covid19-info.uk/?country=slovakia">Slovakia</option>
                <option value="https://covid19-info.uk/?country=slovenia">Slovenia</option>
                <option value="https://covid19-info.uk/?country=somalia">Somalia</option>
                <option value="https://covid19-info.uk/?country=south africa">South Africa</option>
                <option value="https://covid19-info.uk/?country=spain">Spain</option>
                <option value="https://covid19-info.uk/?country=sri lanka">Sri Lanka</option>
                <option value="https://covid19-info.uk/?country=st. barth">St. Barth</option>
                <option value="https://covid19-info.uk/?country=st. vincent grenadines">St. Vincent Grenadines</option>
                <option value="https://covid19-info.uk/?country=sudan">Sudan</option>
                <option value="https://covid19-info.uk/?country=suriname">Suriname</option>
                <option value="https://covid19-info.uk/?country=sweden">Sweden</option>
                <option value="https://covid19-info.uk/?country=switzerland">Switzerland</option>
                <option value="https://covid19-info.uk/?country=taiwan">Taiwan</option>
                <option value="https://covid19-info.uk/?country=tanzania">Tanzania</option>
                <option value="https://covid19-info.uk/?country=thailand">Thailand</option>
                <option value="https://covid19-info.uk/?country=togo">Togo</option>
                <option value="https://covid19-info.uk/?country=trinidad and tobago">Trinidad and Tobago</option>
                <option value="https://covid19-info.uk/?country=tunisia">Tunisia</option>
                <option value="https://covid19-info.uk/?country=turkey">Turkey</option>
                <option value="https://covid19-info.uk/?country=u.s. virgin islands">U.S. Virgin Islands</option>
                <option value="https://covid19-info.uk/?country=uae">UAE</option>
                <option value="https://covid19-info.uk/?country=uk">UK</option>
                <option value="https://covid19-info.uk/?country=ukraine">Ukraine</option>
                <option value="https://covid19-info.uk/?country=uruguay">Uruguay</option>
                <option value="https://covid19-info.uk/?country=usa">USA</option>
                <option value="https://covid19-info.uk/?country=uzbekistan">Uzbekistan</option>
                <option value="https://covid19-info.uk/?country=vatican city">Vatican City</option>
                <option value="https://covid19-info.uk/?country=venezuela">Venezuela</option>
                <option value="https://covid19-info.uk/?country=vietnam">Vietnam</option>
                <option value="https://covid19-info.uk/?country=zambi">Zambi</option>
            </select>
        </div>
    </div>

</div>

</div>

<script>
    $('.select2').select2();
</script>

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

    <h3>Live Data <small class="text-muted">Updated <?php echo date("Y-m-d h:i") ?></small></h3>

    <br>

    <h3 class="text-center">Coronavirus Worldwide</h3>
    <div class="container">
        <div class="card-deck">
        <div class="card text-white bg-primary">
            <div class="card-body">
            <h5 class="card-title">Total Cases</h5>
            <h1><?php echo number_format($worldCases); ?></h1>
            </div>
        </div>
        <div class="card text-white bg-danger">
            <div class="card-body">
            <h5 class="card-title">Total Deaths</h5>
            <h1><?php echo number_format($worldDeaths); ?></h1>
            </div>
        </div>
        <div class="card text-white bg-success">
            <div class="card-body">
            <h5 class="card-title">Total Recovered</h5>
            <h1><?php echo number_format($worldRecovered); ?></h1>
            </div>
        </div>    
    </div>
</div>

<div class="container">
    <h4 class="mt-3">Percentage <small class="text-muted">Based on all cases</small></h4>
    <div class="progress" style="height: 45px;">
        <div class="progress-bar bg-danger" role="progressbar" style="width: 
            <?php echo $worldDeathsPercent; ?>%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
        </div>
        <div class="progress-bar bg-success" role="progressbar" style="width: 
            <?php echo $worldRecoveredPercent; ?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
        </div>
        <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">All Cases</div>
    </div>

    <p class="text-muted">
        Deaths <span class="badge badge-danger"><?php echo sprintf("%.1f", $worldDeathsPercent); ?>%</span> 
        Recovered <span class="badge badge-success"><?php echo sprintf("%.1f", $worldRecoveredPercent); ?>%</span>
    </p>
</div>

<br>

<h3 class="text-center">Coronavirus <?php echo strtoupper($selectCountry); ?></h3>
<div class="container">
	<div class="card-deck">
	<div class="card text-white bg-primary">
		<div class="card-body">
		<h5 class="card-title"><?php echo strtoupper($selectCountry); ?> Cases Today</h5>
        <h1><?php echo number_format($todayCases); ?></h1>
		</div>
	</div>
	<div class="card text-white bg-danger">
		<div class="card-body">
		<h5 class="card-title"><?php echo strtoupper($selectCountry); ?> Deaths Today</h5>
        <h1><?php echo number_format($todayDeaths); ?></h1>
		</div>
	</div>
</div>

<h3 class="mt-5"><?php echo strtoupper($selectCountry); ?> Total Cases</h3>
<table class="table">
	<thead>
		<tr>
			<th scope="col">Total Cases</th>
			<th scope="col">Total Deaths</th>
			<th scope="col">Critical</th>
			<th scope="col">Recovered</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="bg-info">
				<?php echo number_format($cases); ?>
			</td>
			<td class="bg-danger">
				<?php echo number_format($deaths); ?>
			</td>
			<td class="bg-warning">
				<?php echo number_format($critical); ?>
			</td>
			<td class="bg-success">
				<?php echo number_format($recovered); ?>
			</td>
		</tr>
	</tbody>
</table>

<h4>Percentage <small class="text-muted">Based on all cases</small></h4>
<div class="progress" style="height: 45px;">
	<div class="progress-bar bg-danger" role="progressbar" style="width: 
		<?php echo ($deaths/$cases)*100; ?>%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
	</div>
	<div class="progress-bar bg-warning" role="progressbar" style="width: 
		<?php echo ($critical/$cases)*100; ?>" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
	</div>
	<div class="progress-bar bg-success" role="progressbar" style="width: 
		<?php echo ($recovered/$cases)*100; ?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
	</div>
	<div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">All Cases</div>
</div>

<p class="text-muted">
    Deaths <span class="badge badge-danger"><?php echo sprintf("%.1f", $deathsPercent); ?>%</span> 
    Critical <span class="badge badge-warning"><?php echo sprintf("%.1f", $criticalPercent); ?>%</span>  
    Recovered <span class="badge badge-success"><?php echo sprintf("%.1f", $recoveredPercent); ?>%</span>
</p>

<p><b>Recovered numbers may appear low as these mostly come from cases where people were hospitalised.</b></p>

</div>

<?php include( 'footer.php'); ?>

</body>
</html>