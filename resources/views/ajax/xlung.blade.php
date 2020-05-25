<div class="col-md-6 col-lg-3 col-xs-12">
    <div class="card">
        <div class="card-body" id="dataSet">
            <p class="card-title">ABG Chart</p>
            <div class="col-md-12 col-sm-12 table-responsive">
                <table class="table table-borderless">
                    <tbody>
                    <tr>
                        <td colspan="2">pH</td>
                        <td colspan="2" id="ph" class="fs15 fw700 text-right"><span class="badge badge-success">{{ $xlung['ph'] ?? '' }}</span></td>
                    </tr>
                    <tr>
                        <td colspan="2">PaCO2</td>
                        <td colspan="2" id="pao2" class="fs15 fw700 text-right"><span class="badge badge-success">{{ $xlung['pao2'] ?? '' }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">HCO3</td>
                        <td colspan="2" id="hco" class="fs15 fw700 text-right"><span class="badge badge-success">{{ $xlung['hco'] ?? '' }}</span></td>
                    </tr>
                    <tr>
                        <td colspan="2">BE</td>
                        <td colspan="2" id="be" class="fs15 fw700 text-right"><span class="badge badge-success">{{ $xlung['be'] ?? '' }}</span></td>
                    </tr>
                    <tr>
                        <td>PaO2</td>
                        <td id="pao2" class="fs15 fw700 text-right"><span class="badge badge-success">{{ $xlung['pao2'] ?? '' }}</span>
                        </td>
                        <td>SaO2</td>
                        <td id="sao2" class="fs15 fw700 text-right"><span class="badge badge-success">{{ $xlung['sao2'] ?? '' }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">PaO2/FiO2</td>
                        <td colspan="2" id="paofio" class="fs15 fw700 text-right"><span class="badge badge-success">{{ $xlung['paofio'] ?? '' }}</span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6 col-lg-9 col-xs-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-lg-3 col-12 table-responsive">
                    <p class="card-title">Ventilometry</p>
                    <table class="table table-borderless">
                        <tbody>
                        <tr>
                            <td>VTi(ml)</td>
                            <td id="vtiml" class="text-right"><span class="badge badge-success">{{ $xlung['vtiml'] ?? '' }}</span></td>
                        </tr>
                        <tr>
                            <td>VTe(ml)</td>
                            <td id="vteml" class="text-right"><span class="badge badge-success">{{ $xlung['vtiml'] ?? '' }}</span></td>
                        </tr>
                        <tr>
                            <td>VTi(ml/Kg)</td>
                            <td id="vtkg" class="text-right"><span class="badge badge-success">{{ $xlung['vtkg'] ?? '' }}</span></td>
                        </tr>
                        <tr>
                            <td>VTe(ml)</td>
                            <td id="vtkg" class="text-right"><span class="badge badge-success">{{ $xlung['vtkg'] ?? '' }}</span></td>
                        </tr>
                        <tr>
                            <td>RR(bpm)</td>
                            <td id="rpm" class="text-right"><span class="badge badge-success">{{ $xlung['rpm'] ?? '' }}</span></td>
                        </tr>
                        <tr>
                            <td>VE(l/min)</td>
                            <td id="vteml" class="text-right"><span class="badge badge-success">{{ $xlung['vteml'] ?? '' }}</span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6 col-lg-3 col-12 table-responsive">
                    <p class="card-title">Synchrony</p>
                    <table class="table table-borderless">
                        <tbody>
                        <tr>
                            <td>Insp.Time(s)</td>
                            <td id="inspTime" class="fs15 fw700 text-right"><span class="badge badge-success">{{ $xlung['inspTime'] ?? '' }}</span></td>
                        </tr>
                        <tr>
                            <td>Exp.Time</td>
                            <td id="exTime" class="fs15 fw700 text-right"><span class="badge badge-success">{{ $xlung['exTime'] ?? '' }}</span></td>
                        </tr>
                        <tr>
                            <td>Total Time(s)</td>
                            <td id="totalTime" class="fs15 fw700 text-right"><span class="badge badge-success">{{ $xlung['totalTime'] ?? '' }}</span></td>
                        </tr>
                        <tr>
                            <td>I:E</td>
                            <td id="ieratio" class="fs15 fw700 text-right"><span class="badge badge-success">{{ $xlung['ieratio'] ?? '' }}</span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6 col-lg-3 col-12 table-responsive">
                    <p class="card-title">Respiratory Mechanics</p>
                    <table class="table table-borderless">
                        <tbody>
                        <tr>
                            <td>Peak P(cmH2O)</td>
                            <td id="peekP" class="fs15 fw700 text-right"><span class="badge badge-success">{{ $xlung['peekP'] ?? '' }}</span></td>
                        </tr>
                        <tr>
                            <td>P(Plateau)(cmH2O)</td>
                            <td id="pPlateau" class="fs15 fw700 text-right"><span class="badge badge-success">{{ $xlung['pPlateau'] ?? '' }}</span></td>
                        </tr>
                        <tr>
                            <td>Driving P(cmH20)</td>
                            <td id="drivingP" class="fs15 fw700 text-right"><span class="badge badge-success">{{ $xlung['drivingP'] ?? '' }}</span></td>
                        </tr>
                        <tr>
                            <td>PEEP TOT (cmH2O)</td>
                            <td id="peepTot" class="fs15 fw700 text-right"><span class="badge badge-success">{{ $xlung['peepTot'] ?? '' }}</span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6 col-lg-3 col-12 table-responsive">
                    <p class="card-title">Respiratory Work/Weaning</p>
                    <table class="table table-borderless">
                        <tbody>
                        <tr>
                            <td>P0.1(cmH2O)</td>
                            <td id="p01" class="fs15 fw700 text-right"><span class="badge badge-success">{{ $xlung['p01'] ?? '' }}</span></td>
                        </tr>
                        <tr>
                            <td>Work(Joules/L)</td>
                            <td id="work" class="fs15 fw700 text-right"><span class="badge badge-success">{{ $xlung['work'] ?? '' }}</span></td>
                        </tr>
                        <tr>
                            <td>PTP(cmH2O.s/m)</td>
                            <td id="ptp" class="fs15 fw700 text-right"><span class="badge badge-success">{{ $xlung['ptp'] ?? '' }}</span></td>
                        </tr>
                        <tr>
                            <td>f/VT(bpm/L)</td>
                            <td id="fvt" class="fs15 fw700 text-right"><span class="badge badge-success">{{ $xlung['fvt'] ?? '' }}</span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
