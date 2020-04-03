<!DOCTYPE html>
<html lang="en">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>COVID-19 Tracker | Countries</title>
  
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="//bootswatch.com/4/darkly/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
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
      <h1 class="display-4">Countries</h1>
  <h5>Coronavirus (COVID-19) is a new illness that can affect your lungs and airways. It’s caused by a virus called coronavirus.</h5>
  <?php include( 'country-dropdown.php'); ?>
    </div>
</div>

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

<input type="text" class="form-control form-control" id="countryInput" onkeyup="countrySearch()" placeholder="Search">
<br>
<div class="table-responsive">
<table id="countryTable" class="table table-striped table-bordered">
  <tr>
    <th class="tg-0lax"><a href="https://covid-19.uk.com/?country=Afghanistan">Afghanistan</a></th>
    <th class="tg-0lax"><a href="https://covid-19.uk.com/?country=Albania">Albania</th>
    <th class="tg-0lax"><a href="https://covid-19.uk.com/?country=Algeria">Algeria</th>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Andorra">Andorra</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Antigua_and_Barbuda">Antigua and Barbuda</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Argentina">Argentina</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Armenia">Armenia</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Aruba">Aruba</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Australia">Australia</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Austria">Austria</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Azerbaijan">Azerbaijan</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Bahamas">Bahamas</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Bahrain">Bahrain</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Bangladesh">Bangladesh</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Barbados">Barbados</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Belarus">Belarus</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Belgium">Belgium</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Benin">Benin</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Bhutan">Bhutan</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Bolivia">Bolivia</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Bosnia_and_Herzegovina">Bosnia and Herzegovina</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Brazil">Brazil</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Brunei">Brunei</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Bulgaria">Bulgaria</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Burkina_Faso">Burkina Faso</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Cambodia">Cambodia</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Cameroon">Cameroon</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Canada">Canada</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=CAR">CAR</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Cayman_Islands">Cayman Islands</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Channel_Islands">Channel Islands</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Chile">Chile</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=China">China</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Colombia">Colombia</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Congo">Congo</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Costa_Rica">Costa Rica</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Croatia">Croatia</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Cuba">Cuba</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Curaçao">Curaçao</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Cyprus">Cyprus</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Czechia">Czechia</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Denmark">Denmark</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Diamond_Princess">Diamond Princess</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Djibouti">Djibouti</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Dominican_Republic">Dominican Republic</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=DRC">DRC</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Ecuador">Ecuador</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Egypt">Egypt</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Equatorial_Guinea">Equatorial Guinea</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Estonia">Estonia</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Eswatini">Eswatini</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Ethiopia">Ethiopia</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Faeroe_Islands">Faeroe Islands</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Finland">Finland</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=France">France</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=French_Guiana">French Guiana</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=French_Polynesia">French Polynesia</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Gabon">Gabon</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Gambia">Gambia</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Georgia">Georgia</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Germany">Germany</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Ghana">Ghana</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Gibraltar">Gibraltar</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Greece">Greece</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Greenland">Greenland</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Guadeloupe">Guadeloupe</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Guam">Guam</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Guatemala">Guatemala</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Guinea">Guinea</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Guyana">Guyana</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Honduras">Honduras</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Hong_Kong">Hong Kong</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Hungary">Hungary</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Iceland">Iceland</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=India">India</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Indonesia">Indonesia</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Iran">Iran</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Iraq">Iraq</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Ireland">Ireland</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Israel">Israel</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Italy">Italy</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Ivory_Coast">Ivory Coast</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Jamaica">Jamaica</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Japan">Japan</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Jordan">Jordan</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Kazakhstan">Kazakhstan</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Kenya">Kenya</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Kuwait">Kuwait</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Kyrgyzstan">Kyrgyzstan</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Latvia">Latvia</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Lebanon">Lebanon</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Liberia">Liberia</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Liechtenstein">Liechtenstein</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Lithuania">Lithuania</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Luxembourg">Luxembourg</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Macao">Macao</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Malaysia">Malaysia</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Maldives">Maldives</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Malta">Malta</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Martinique">Martinique</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Mauritania">Mauritania</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Mayotte">Mayotte</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Mexico">Mexico</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Moldova">Moldova</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Monaco">Monaco</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Mongolia">Mongolia</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Montenegro">Montenegro</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Montserrat">Montserrat</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Morocco">Morocco</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Namibia">Namibia</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Nepal">Nepal</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Netherlands">Netherlands</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=New_Caledonia">New Caledonia</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=New_Zealand">New Zealand</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Nigeria">Nigeria</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=North_Macedonia">North Macedonia</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Norway">Norway</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Oman">Oman</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Pakistan">Pakistan</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Palestine">Palestine</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Panama">Panama</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Paraguay">Paraguay</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Peru">Peru</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Philippines">Philippines</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Poland">Poland</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Portugal">Portugal</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Puerto_Rico">Puerto Rico</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Qatar">Qatar</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Romania">Romania</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Russia">Russia</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Rwanda">Rwanda</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Réunion">Réunion</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=S._Korea">South Korea</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Saint_Lucia">Saint Lucia</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Saint_Martin">Saint Martin</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=San_Marino">San Marino</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Saudi_Arabia">Saudi Arabia</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Senegal">Senegal</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Serbia">Serbia</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Seychelles">Seychelles</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Singapore">Singapore</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Slovakia">Slovakia</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Slovenia">Slovenia</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Somalia">Somalia</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=South_Africa">South Africa</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Spain">Spain</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Sri_Lanka">Sri Lanka</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=St._Barth">St. Barth</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=St._Vincent Grenadines">St. Vincent Grenadines</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Sudan">UkraiSudanne</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Suriname">Suriname</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Sweden">Sweden</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Switzerland">Switzerland</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Taiwan">Taiwan</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Tanzania">Tanzania</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Thailand">Thailand</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Togo">Togo</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Trinidad_and_Tobago">Trinidad and Tobago</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Tunisia">Uzbekistan</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Turkey">Turkey</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=U.S._Virgin_Islands">U.S. Virgin Islands</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=UAE">Vatican City</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=UK">UK</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Ukraine">Ukraine</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Uruguay">Uruguay</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=USA">USA</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Uzbekistan">Uzbekistan</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Vatican_City">Vatican City</td>
  </tr>
  <tr>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Venezuela">Venezuela</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Vietnam">Vietnam</td>
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=Zambia">Zambia</td>
  </tr>
</table>
</div>

</div>

<script>
function countrySearch() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("countryInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("countryTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

<?php include( 'footer.php'); ?>

</body>
</html>