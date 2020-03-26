<!DOCTYPE html>
<html lang="en">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>COVID-19 Tracker | Countries</title>
  
<head>
  <meta charset="utf-8">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
  <link rel="stylesheet" type="text/css" href="//bootswatch.com/4/darkly/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.php">
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

  <div class="dropdown">
            <select class="selectpicker" onchange="location = this.value;" data-size="8" data-show-subtext="true" data-live-search="true">
            <option>Select Country</option>
                <option value="https://covid-19.uk.com/?country=afghanistan">Afghanistan</option>
                <option value="https://covid-19.uk.com/?country=albania">Albania</option>
                <option value="https://covid-19.uk.com/?country=algeria">Algeria</option>
                <option value="https://covid-19.uk.com/?country=andorra">Andorra</option>
                <option value="https://covid-19.uk.com/?country=antigua_and_barbuda">Antigua and Barbuda</option>
                <option value="https://covid-19.uk.com/?country=argentina">Argentina</option>
                <option value="https://covid-19.uk.com/?country=armenia">Armenia</option>
                <option value="https://covid-19.uk.com/?country=aruba">Aruba</option>
                <option value="https://covid-19.uk.com/?country=australia">Australia</option>
                <option value="https://covid-19.uk.com/?country=austria">Austria</option>
                <option value="https://covid-19.uk.com/?country=azerbaijan">Azerbaijan</option>
                <option value="https://covid-19.uk.com/?country=bahamas">Bahamas</option>
                <option value="https://covid-19.uk.com/?country=bahrain">Bahrain</option>
                <option value="https://covid-19.uk.com/?country=bangladesh">Bangladesh</option>
                <option value="https://covid-19.uk.com/?country=barbados">Barbados</option>
                <option value="https://covid-19.uk.com/?country=belarus">Belarus</option>
                <option value="https://covid-19.uk.com/?country=belgium">Belgium</option>
                <option value="https://covid-19.uk.com/?country=benin">Benin</option>
                <option value="https://covid-19.uk.com/?country=bhutan">Bhutan</option>
                <option value="https://covid-19.uk.com/?country=bolivia">Bolivia</option>
                <option value="https://covid-19.uk.com/?country=bosnia_and_herzegovina">Bosnia and Herzegovina</option>
                <option value="https://covid-19.uk.com/?country=brazil">Brazil</option>
                <option value="https://covid-19.uk.com/?country=brunei">Brunei</option>
                <option value="https://covid-19.uk.com/?country=bulgaria">Bulgaria</option>
                <option value="https://covid-19.uk.com/?country=burkina faso">Burkina Faso</option>
                <option value="https://covid-19.uk.com/?country=cambodia">Cambodia</option>
                <option value="https://covid-19.uk.com/?country=cameroon">Cameroon</option>
                <option value="https://covid-19.uk.com/?country=canada">Canada</option>
                <option value="https://covid-19.uk.com/?country=car">CAR</option>
                <option value="https://covid-19.uk.com/?country=cayman_islands">Cayman Islands</option>
                <option value="https://covid-19.uk.com/?country=cayman_islands">Cayman Islands</option>
                <option value="https://covid-19.uk.com/?country=channel_islands">Channel Islands</option>
                <option value="https://covid-19.uk.com/?country=chile">Chile</option>
                <option value="https://covid-19.uk.com/?country=china">China</option>
                <option value="https://covid-19.uk.com/?country=colombia">Colombia</option>
                <option value="https://covid-19.uk.com/?country=congo">Congo</option>
                <option value="https://covid-19.uk.com/?country=costa_rica">Costa Rica</option>
                <option value="https://covid-19.uk.com/?country=croatia">Croatia</option>
                <option value="https://covid-19.uk.com/?country=cuba">Cuba</option>
                <option value="https://covid-19.uk.com/?country=curaçao">Curaçao</option>
                <option value="https://covid-19.uk.com/?country=cyprus">Cyprus</option>
                <option value="https://covid-19.uk.com/?country=czechia">Czechia</option>
                <option value="https://covid-19.uk.com/?country=denmark">Denmark</option>
                <option value="https://covid-19.uk.com/?country=diamond_princess">Diamond Princess</option>
                <option value="https://covid-19.uk.com/?country=djibouti">Djibouti</option>
                <option value="https://covid-19.uk.com/?country=dominican_republic">Dominican Republic</option>
                <option value="https://covid-19.uk.com/?country=drc">DRC</option>
                <option value="https://covid-19.uk.com/?country=ecuador">Ecuador</option>
                <option value="https://covid-19.uk.com/?country=egypt">Egypt</option>
                <option value="https://covid-19.uk.com/?country=equatorial_guinea">Equatorial Guinea</option>
                <option value="https://covid-19.uk.com/?country=estonia">Estonia</option>
                <option value="https://covid-19.uk.com/?country=eswatini">Eswatini</option>
                <option value="https://covid-19.uk.com/?country=ethiopia">Ethiopia</option>
                <option value="https://covid-19.uk.com/?country=faeroe_islands">Faeroe Islands</option>
                <option value="https://covid-19.uk.com/?country=finland">Finland</option>
                <option value="https://covid-19.uk.com/?country=france">France</option>
                <option value="https://covid-19.uk.com/?country=french_guiana">French Guiana</option>
                <option value="https://covid-19.uk.com/?country=french_polynesia">French Polynesia</option>
                <option value="https://covid-19.uk.com/?country=gabon">Gabon</option>
                <option value="https://covid-19.uk.com/?country=gambia">Gambia</option>
                <option value="https://covid-19.uk.com/?country=georgia">Georgia</option>
                <option value="https://covid-19.uk.com/?country=germany">Germany</option>
                <option value="https://covid-19.uk.com/?country=ghana">Ghana</option>
                <option value="https://covid-19.uk.com/?country=gibraltar">Gibraltar</option>
                <option value="https://covid-19.uk.com/?country=greece">Greece</option>
                <option value="https://covid-19.uk.com/?country=greenland">Greenland</option>
                <option value="https://covid-19.uk.com/?country=guadeloupe">Guadeloupe</option>
                <option value="https://covid-19.uk.com/?country=guam">Guam</option>
                <option value="https://covid-19.uk.com/?country=guatemala">Guatemala</option>
                <option value="https://covid-19.uk.com/?country=guinea">Guinea</option>
                <option value="https://covid-19.uk.com/?country=guyana">Guyana</option>
                <option value="https://covid-19.uk.com/?country=honduras">Honduras</option>
                <option value="https://covid-19.uk.com/?country=hong_kong">Hong Kong</option>
                <option value="https://covid-19.uk.com/?country=hungary">Hungary</option>
                <option value="https://covid-19.uk.com/?country=iceland">Iceland</option>
                <option value="https://covid-19.uk.com/?country=india">India</option>
                <option value="https://covid-19.uk.com/?country=indonesia">Indonesia</option>
                <option value="https://covid-19.uk.com/?country=iran">Iran</option>
                <option value="https://covid-19.uk.com/?country=iraq">Iraq</option>
                <option value="https://covid-19.uk.com/?country=ireland">Ireland</option>
                <option value="https://covid-19.uk.com/?country=israel">Israel</option>
                <option value="https://covid-19.uk.com/?country=italy">Italy</option>
                <option value="https://covid-19.uk.com/?country=ivory_coast">Ivory Coast</option>
                <option value="https://covid-19.uk.com/?country=jamaica">Jamaica</option>
                <option value="https://covid-19.uk.com/?country=japan">Japan</option>
                <option value="https://covid-19.uk.com/?country=jordan">Jordan</option>
                <option value="https://covid-19.uk.com/?country=kazakhstan">Kazakhstan</option>
                <option value="https://covid-19.uk.com/?country=kenya">Kenya</option>
                <option value="https://covid-19.uk.com/?country=kuwait">Kuwait</option>
                <option value="https://covid-19.uk.com/?country=kyrgyzstan">Kyrgyzstan</option>
                <option value="https://covid-19.uk.com/?country=latvia">Latvia</option>
                <option value="https://covid-19.uk.com/?country=lebanon">Lebanon</option>
                <option value="https://covid-19.uk.com/?country=liberia">Liberia</option>
                <option value="https://covid-19.uk.com/?country=liechtenstein">Liechtenstein</option>
                <option value="https://covid-19.uk.com/?country=lithuania">Lithuania</option>
                <option value="https://covid-19.uk.com/?country=luxembourg">Luxembourg</option>
                <option value="https://covid-19.uk.com/?country=macao">Macao</option>
                <option value="https://covid-19.uk.com/?country=malaysia">Malaysia</option>
                <option value="https://covid-19.uk.com/?country=maldives">Maldives</option>
                <option value="https://covid-19.uk.com/?country=malta">Malta</option>
                <option value="https://covid-19.uk.com/?country=martinique">Martinique</option>
                <option value="https://covid-19.uk.com/?country=mauritania">Mauritania</option>
                <option value="https://covid-19.uk.com/?country=mayotte">Mayotte</option>
                <option value="https://covid-19.uk.com/?country=mexico">Mexico</option>
                <option value="https://covid-19.uk.com/?country=moldova">Moldova</option>
                <option value="https://covid-19.uk.com/?country=monaco">Monaco</option>
                <option value="https://covid-19.uk.com/?country=mongolia">Mongolia</option>
                <option value="https://covid-19.uk.com/?country=montenegro">Montenegro</option>
                <option value="https://covid-19.uk.com/?country=montserrat">Montserrat</option>
                <option value="https://covid-19.uk.com/?country=morocco">Morocco</option>
                <option value="https://covid-19.uk.com/?country=namibia">Namibia</option>
                <option value="https://covid-19.uk.com/?country=nepal">Nepal</option>
                <option value="https://covid-19.uk.com/?country=netherlands">Netherlands</option>
                <option value="https://covid-19.uk.com/?country=new_caledonia">New Caledonia</option>
                <option value="https://covid-19.uk.com/?country=new_zealand">New Zealand</option>
                <option value="https://covid-19.uk.com/?country=nigeria">Nigeria</option>
                <option value="https://covid-19.uk.com/?country=north_macedonia">North Macedonia</option>
                <option value="https://covid-19.uk.com/?country=norway">Norway</option>
                <option value="https://covid-19.uk.com/?country=oman">Oman</option>
                <option value="https://covid-19.uk.com/?country=pakistan">Pakistan</option>
                <option value="https://covid-19.uk.com/?country=palestine">Palestine</option>
                <option value="https://covid-19.uk.com/?country=panama">Panama</option>
                <option value="https://covid-19.uk.com/?country=paraguay">Paraguay</option>
                <option value="https://covid-19.uk.com/?country=peru">Peru</option>
                <option value="https://covid-19.uk.com/?country=philippines">Philippines</option>
                <option value="https://covid-19.uk.com/?country=poland">Poland</option>
                <option value="https://covid-19.uk.com/?country=portugal">Portugal</option>
                <option value="https://covid-19.uk.com/?country=puerto rico">Puerto Rico</option>
                <option value="https://covid-19.uk.com/?country=qatar">Qatar</option>
                <option value="https://covid-19.uk.com/?country=romania">Romania</option>
                <option value="https://covid-19.uk.com/?country=russia">Russia</option>
                <option value="https://covid-19.uk.com/?country=rwanda">Rwanda</option>
                <option value="https://covid-19.uk.com/?country=réunion">Réunion</option>
                <option value="https://covid-19.uk.com/?country=s._korea">S. Korea</option>
                <option value="https://covid-19.uk.com/?country=saint_lucia">Saint Lucia</option>
                <option value="https://covid-19.uk.com/?country=saint_martin">Saint Martin</option>
                <option value="https://covid-19.uk.com/?country=san_marino">San Marino</option>
                <option value="https://covid-19.uk.com/?country=saudi_arabia">Saudi Arabia</option>
                <option value="https://covid-19.uk.com/?country=senegal">Senegal</option>
                <option value="https://covid-19.uk.com/?country=serbia">Serbia</option>
                <option value="https://covid-19.uk.com/?country=seychelles">Seychelles</option>
                <option value="https://covid-19.uk.com/?country=singapore">Singapore</option>
                <option value="https://covid-19.uk.com/?country=slovakia">Slovakia</option>
                <option value="https://covid-19.uk.com/?country=slovenia">Slovenia</option>
                <option value="https://covid-19.uk.com/?country=somalia">Somalia</option>
                <option value="https://covid-19.uk.com/?country=south africa">South Africa</option>
                <option value="https://covid-19.uk.com/?country=spain">Spain</option>
                <option value="https://covid-19.uk.com/?country=sri_lanka">Sri Lanka</option>
                <option value="https://covid-19.uk.com/?country=st._barth">St. Barth</option>
                <option value="https://covid-19.uk.com/?country=st._vincent_grenadines">St. Vincent Grenadines</option>
                <option value="https://covid-19.uk.com/?country=sudan">Sudan</option>
                <option value="https://covid-19.uk.com/?country=suriname">Suriname</option>
                <option value="https://covid-19.uk.com/?country=sweden">Sweden</option>
                <option value="https://covid-19.uk.com/?country=switzerland">Switzerland</option>
                <option value="https://covid-19.uk.com/?country=taiwan">Taiwan</option>
                <option value="https://covid-19.uk.com/?country=tanzania">Tanzania</option>
                <option value="https://covid-19.uk.com/?country=thailand">Thailand</option>
                <option value="https://covid-19.uk.com/?country=togo">Togo</option>
                <option value="https://covid-19.uk.com/?country=trinidad_and_tobago">Trinidad and Tobago</option>
                <option value="https://covid-19.uk.com/?country=tunisia">Tunisia</option>
                <option value="https://covid-19.uk.com/?country=turkey">Turkey</option>
                <option value="https://covid-19.uk.com/?country=u.s._virgin_islands">U.S. Virgin Islands</option>
                <option value="https://covid-19.uk.com/?country=uae">UAE</option>
                <option value="https://covid-19.uk.com/?country=uk">UK</option>
                <option value="https://covid-19.uk.com/?country=ukraine">Ukraine</option>
                <option value="https://covid-19.uk.com/?country=uruguay">Uruguay</option>
                <option value="https://covid-19.uk.com/?country=usa">USA</option>
                <option value="https://covid-19.uk.com/?country=uzbekistan">Uzbekistan</option>
                <option value="https://covid-19.uk.com/?country=vatican_city">Vatican City</option>
                <option value="https://covid-19.uk.com/?country=venezuela">Venezuela</option>
                <option value="https://covid-19.uk.com/?country=vietnam">Vietnam</option>
                <option value="https://covid-19.uk.com/?country=zambi">Zambi</option>
            </select>
        </div>
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

<div class="table-responsive">
<table class="table table-striped table-bordered">
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
    <td class="tg-0lax"><a href="https://covid-19.uk.com/?country=S._Korea">S. Korea</td>
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

<?php include( 'footer.php'); ?>

</body>
</html>