<!-- US States Modal -->
<div class="modal fade" tabindex="-1" id="usCountiesModal" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">States</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control form-control" id="usaInput" onkeyup="usaSearch()" placeholder="Search">
                <table id="usaTable" class="table dataTable">
                    <thead>
                        <tr>
                            <th scope="col">County</th>
                            <th scope="col">Cases</th>
                            <th scope="col">Deaths</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $var = -1;
                
                        foreach(range(0,--$usaStateCount) as $index) {
                
                        ++$var;
                
                        echo '<tr>
                            <td style="color: white" class="bg-primary">
                                ' . $usaStatesJson[$var]["state"] .'
                            </td>
                            <td class="bg-info">
                                <b>' . number_format($usaStatesJson[$var]["cases"]) .'</b>
                            </td>
                            <td class="bg-danger">
                                <b>' . number_format($usaStatesJson[$var]["deaths"]) .'</b>
                            </td>
                        </tr>';
                        }
                        ?>
                    </tbody>
                    <div id="results"></div>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>