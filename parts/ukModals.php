<!-- UK Counties Modal -->
<div class="modal fade" tabindex="-1" id="countiesModal" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cumulative: Counties & Regions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <ul class="nav nav-pills nav-fill">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#england">Counties</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#regions">Regions</a>
                    </li>
                </ul>

                <!-- England Section -->
                <div class="tab-content">
                    <div id="england" class="tab-pane active">
                        <br>
                        <input type="text" class="form-control form-control" id="englandInput" onkeyup="englandSearch()" placeholder="Search">
                        <table id="englandTable" class="table dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">County</th>
                                    <th scope="col">Total Cases</th>
                                    <th scope="col">Mortality</th>
                                    <th scope="col">Total Deaths</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $var = -1;

                                foreach(range(0,--$ukCountyCount) as $index) {

                                ++$var;

                                echo '<tr>
                                    <td style="color: white" class="bg-primary">
                                        ' . $publicHeathEnglandCountyJson["data"][$var]["areaName"] .'
                                    </td>
                                    <td class="bg-info">
                                        <b>' . number_format($publicHeathEnglandCountyJson["data"][$var]["cumCasesByPublishDate"]) .'</b>
                                    </td>
                                    <td class="bg-warning">
                                        <b>' . sprintf("%.1f", ($publicHeathEnglandCountyJson["data"][$var]["cumDeaths28DaysByPublishDate"]/$publicHeathEnglandCountyJson["data"][$var]["cumCasesByPublishDate"])*100) .'%</b>
                                    </td>
                                    <td class="bg-danger">
                                        <b>' . number_format($publicHeathEnglandCountyJson["data"][$var]["cumDeaths28DaysByPublishDate"]) .'</b>
                                    </td>
                                </tr>';
                                }
                                ?>
                            </tbody>
                            <div id="results"></div>
                        </table>
                    </div>

                    <!-- Regions Section -->
                    <div id="regions" class="tab-pane fade">
                        <br>
                        <input type="text" class="form-control form-control" id="regionsInput" onkeyup="regionsSearch()" placeholder="Search">
                        <table id="regionsTable" class="table dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">Region</th>
                                    <th scope="col">Total Cases</th>
                                    <th scope="col">Mortality</th>
                                    <th scope="col">Total Deaths</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $var = -1;

                                foreach(range(0,--$ukRegionCount) as $index) {

                                ++$var;

                                echo '<tr>
                                    <td style="color: white" class="bg-primary">
                                        ' . $publicHeathEnglandRegionJson["data"][$var]["areaName"] .'
                                    </td>
                                    <td class="bg-info">
                                        <b>' . number_format($publicHeathEnglandRegionJson["data"][$var]["cumCasesByPublishDate"]) .'</b>
                                    </td>
                                    <td class="bg-warning">
                                        <b>' . sprintf("%.1f", ($publicHeathEnglandRegionJson["data"][$var]["cumDeaths28DaysByPublishDate"]/$publicHeathEnglandRegionJson["data"][$var]["cumCasesByPublishDate"])*100) .'%</b>
                                    </td>
                                    <td class="bg-danger">
                                        <b>' . number_format($publicHeathEnglandRegionJson["data"][$var]["cumDeaths28DaysByPublishDate"]) .'</b>
                                    </td>
                                </tr>';
                                }
                                ?>
                            </tbody>
                            <div id="results"></div>
                        </table>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- UK Today Counties Modal -->
<div class="modal fade" tabindex="-1" id="todayCountiesModal" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo $dataAge ?>: Counties & Regions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <ul class="nav nav-pills nav-fill">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#englandToday">Counties</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#regionsToday">Regions</a>
                    </li>
                </ul>

                <!-- England Section -->
                <div class="tab-content">
                    <div id="englandToday" class="tab-pane active">
                        <br>
                        <input type="text" class="form-control form-control" id="englandTodayInput" onkeyup="englandTodaySearch()" placeholder="Search">
                        <table id="englandTodayTable" class="table dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">County</th>
                                    <th scope="col">Total Cases</th>
                                    <th scope="col">Total Deaths</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $var = -1;

                                foreach(range(0,--$ukCountyCount) as $index) {

                                ++$var;

                                echo '<tr>
                                    <td style="color: white" class="bg-primary">
                                        ' . $publicHeathEnglandTodayCountyJson["data"][$var]["areaName"] .'
                                    </td>
                                    <td class="bg-info">
                                        <b>' . number_format($publicHeathEnglandTodayCountyJson["data"][$var]["newCasesByPublishDate"]) .'</b>
                                    </td>
                                    <td class="bg-danger">
                                        <b>' . number_format($publicHeathEnglandTodayCountyJson["data"][$var]["newDeaths28DaysByPublishDate"]) .'</b>
                                    </td>
                                </tr>';
                                }
                                ?>
                            </tbody>
                            <div id="results"></div>
                        </table>
                    </div>

                    <!-- Regions Section -->
                    <div id="regionsToday" class="tab-pane fade">
                        <br>
                        <input type="text" class="form-control form-control" id="regionsTodayInput" onkeyup="regionsTodaySearch()" placeholder="Search">
                        <table id="regionsTodayTable" class="table dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">Region</th>
                                    <th scope="col">Total Cases</th>
                                    <th scope="col">Total Deaths</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $var = -1;

                                foreach(range(0,--$ukRegionCount) as $index) {

                                ++$var;

                                echo '<tr>
                                    <td style="color: white" class="bg-primary">
                                        ' . $publicHeathEnglandTodayRegionJson["data"][$var]["areaName"] .'
                                    </td>
                                    <td class="bg-info">
                                        <b>' . number_format($publicHeathEnglandTodayRegionJson["data"][$var]["newCasesByPublishDate"]) .'</b>
                                    </td>
                                    <td class="bg-danger">
                                        <b>' . number_format($publicHeathEnglandTodayRegionJson["data"][$var]["newDeaths28DaysByPublishDate"]) .'</b>
                                    </td>
                                </tr>';
                                }
                                ?>
                            </tbody>
                            <div id="results"></div>
                        </table>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <small class="text-left text-muted font-weight-bold">Updated: <?php echo $publicHeathEnglandTodayRegionJson["data"][0]["date"]; ?></small>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- UK Vaccine Daily Modal -->
<div class="modal fade" tabindex="-1" id="vacModal" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">UK Daily Vaccine Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="ukVacTable" class="table ukVacTable">
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">1st Dose</th>
                            <th scope="col">2nd Dose</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $var = -1;
                
                        foreach(range(0,--$ukVacDailyCount) as $index) {
                
                        ++$var;
                
                        echo '<tr>
                            <td>
                                ' . $govVaccineDailyDataJson["data"][$var]["date"] .'
                            </td>
                            <td style="color: white" class="bg-primary">
                                <b>' . number_format($govVaccineDailyDataJson["data"][$var]["newPeopleVaccinatedFirstDoseByPublishDate"]) .'</b>
                            </td>
                            <td>
                                <b>' . number_format($govVaccineDailyDataJson["data"][$var]["newPeopleVaccinatedSecondDoseByPublishDate"]) .'</b>
                            </td>
                            <td class="bg-success">
                                <b>' . number_format($govVaccineDailyDataJson["data"][$var]["newPeopleVaccinatedFirstDoseByPublishDate"] + $govVaccineDailyDataJson["data"][$var]["newPeopleVaccinatedSecondDoseByPublishDate"]) .'</b>
                            </td>
                        </tr>';
                        }
                        ?>
                    </tbody>
                    <div id="results"></div>
                </table>
            </div>
            <div class="modal-footer">
                <small class="text-left text-muted font-weight-bold">Updated: <?php echo $govVaccineDailyDataJson["data"][0]["date"]; ?></small>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>