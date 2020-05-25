@extends('layouts.app')

@section('title', $title ?? 'Xlung')

@section('content')
    <div class="container-fluid" id="xLungFormData">
        <form method="post" action="{{ route('xlung-vcv') }}" class="row" id="xLungForm">
            @csrf
            <div class="col-md-8 col-12 mb-1">
                <div class="card">
                    <div class="card-body" id="ajaxDataUpdate">
                        <div class="row justify-content-center" id="xLung">
                            <div class="col-md-4 col-sm-12">
                                <p class="card-title text-center">Demographic Data</p>
                                <div class="d-flex">
                                    <div class="row">
                                        <div class="col-md-12 input-group input-group-sm mb-2">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="gender">Gender</label>
                                            </div>
                                            <select class="custom-select" name="gender" id="gender">
                                                <option>Choose...</option>
                                                <option value="male" @if($xlung['gender']=='male') selected='selected' @endif>Male</option>
                                                <option value="female" @if($xlung['gender']=='female') selected='selected' @endif>Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 input-group input-group-sm mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-black-50" id="age">Age</span>
                                            </div>
                                            <input type="number" id="age" name="age" class="form-control form-control-sm" min="1" max="100" step="1" value="{{ $xlung['age'] ?? old('age') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                        <div class="col-md-12 input-group input-group-sm mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-black-50" id="height">Height</span>
                                            </div>
                                            <input type="number" id="height" name="height" class="form-control form-control-sm" min="0.2" max="2" step="0.1" value="{{ $xlung['height'] ?? old('height') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                        <div class="col-md-6 input-group input-group-sm mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-black-50" id="weight">Weight</span>
                                            </div>
                                            <input type="number" id="weight" name="weight" class="form-control form-control-sm" min="1" max="200" step="1" value="{{ $xlung['weight'] ?? old('weight') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                        <div class="col-md-6 input-group input-group-sm mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-black-50" id="ibm">IBW</span>
                                            </div>
                                            <input type="number" id="ibm" name="ibm" class="form-control form-control-sm" min="1" max="175" step="0.1" value="{{ $xlung['ibm'] ?? old('ibm') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <p class="card-title text-center">Pulmonary Physiology</p>
                                <div class="d-flex">
                                    <div class="row">
                                        <div class="col-md-12 input-group input-group-sm mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-black-50" id="rva">Rva(cmH2O/l/s)</span>
                                            </div>
                                            <input type="number" id="rva" name="rva" class="form-control form-control-sm" min="0" max="105" step="0.1" value="{{ $xlung['rva'] ?? old('rva') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                        <div class="col-md-12 input-group input-group-sm mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-black-50" id="cst">Cst(ml/cmH2O)</span>
                                            </div>
                                            <input type="number" id="cst" name="cst" class="form-control form-control-sm" min="0" max="100" step="0.1" value="{{ $xlung['cst'] ?? old('cst') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                        <div class="col-md-12 input-group input-group-sm mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-black-50" id="vdvt">VD/VT</span>
                                            </div>
                                            <input type="number" id="vdvt" name="vdvt" class="form-control form-control-sm" min="0.2" max="0.8" step="0.01" value="{{ $xlung['vdvt'] ?? old('vdvt') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                        <div class="col-md-6 input-group input-group-sm mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-black-50" id="shunt">Shunt(%)</span>
                                            </div>
                                            <input type="number" id="shunt" name="shunt" class="form-control form-control-sm" min="0" max="100" step="0.1" value="{{ $xlung['shunt'] ?? old('shunt') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                        <div class="col-md-6 input-group input-group-sm mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-black-50" id="fio">FiO2(%)</span>
                                            </div>
                                            <input type="number" id="fio" name="fio" class="form-control form-control-sm" min="0" max="100" step="0.1" value="{{ $xlung['fio'] ?? old('fio') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <p class="card-title text-center">Muscle Effort</p>
                                <div class="d-flex">
                                    <div class="row">
                                        <div class="col-md-12 input-group input-group-sm mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-black-50" id="pmus">Pmus(cmH20)</span>
                                            </div>
                                            <input type="number" id="pmus" name="pmus" class="form-control" min="0" max="200" step="0.1" value="{{ $xlung['pmus'] ?? old('pmus') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                        <div class="col-md-12 input-group input-group-sm mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-black-50" id="rrBpm">RR(bpm)</span>
                                            </div>
                                            <input type="number" id="rrBpm" name="rrBpm" class="form-control" min="0" max="150" step="0.1" value="{{ $xlung['rrBpm'] ?? old('rrBpm') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                        <div class="col-md-12 input-group input-group-sm mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-black-50" id="duration">Duration(s)</span>
                                            </div>
                                            <input type="number" id="duration" name="duration" class="form-control" min="0" max="175" step="0.1" value="{{ $xlung['duration'] ?? old('duration') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-2 text-center">
                                    <div class="btn-group btn-group-sm">
                                        <button id="stp_btn" onclick="pause();" class="btn btn-sm btn-outline-info">Pause</button>
                                        <button id="btn" onclick="updateArrayVcv();" class="btn btn-sm btn-outline-success">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12 mb-1">
                <div class="card">
                    <div class="card-body" id="xLung">
                        <div class="d-flex mb-1 justify-content-between">
                            <p class="card-title">Ventilator <small>VCV/PCV</small></p>
                        </div>
                        <div class="row">
                            <div class="col-md-6 input-group input-group-sm mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-black-50" id="vlume">Volume</span>
                                </div>
                                <input type="number" id="vlume" name="vlume" class="form-control" min="1" max="999" step="1" value="{{ $xlung['volume'] ?? old('vlume') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
                            <div class="col-md-6 input-group input-group-sm mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-black-50" id="rpm">F(rpm)</span>
                                </div>
                                <input type="number" id="rpm" name="rpm" class="form-control" min="1" max="200" step="0.1" value="{{ $xlung['rpm'] ?? old('rpm') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
                            <div class="col-md-6 input-group input-group-sm mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-black-50" id="flow">Flow(l/min)</span>
                                </div>
                                <input type="number" id="flow" name="flow" class="form-control" min="0" max="100" step="0.1" value="{{ $xlung['flow'] ?? old('flow') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
                            <div class="col-md-6 input-group input-group-sm mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-black-50" id="pattern">Pattern</span>
                                </div>
                                <input type="number" id="pattern" name="pattern" class="form-control" min="1" max="2" step="1"  value="{{ $xlung['pattern'] ?? old('pattern') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
                            <div class="col-md-6 input-group input-group-sm mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-black-50" id="inspTime">Insp. Time(s)</span>
                                </div>
                                <input type="number" id="inspTime" name="inspTime" class="form-control" min="0" max="5" step="0.1"  value="{{ $xlung['inspTime'] ?? old('inspTime') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
                            <div class="col-md-6 input-group input-group-sm mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-black-50" id="inspPause">Insp. Pause(s)</span>
                                </div>
                                <input type="number" id="inspPause" name="inspPause" class="form-control" min="0" max="0.5" step="0.1"  value="{{ $xlung['inspPause'] ?? old('inspPause') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
                            <div class="col-md-6 input-group input-group-sm mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-black-50" id="peep">Peep(cmH2O)</span>
                                </div>
                                <input type="number" id="peep" name="peep" class="form-control" min="0" max="99" step="0.1"  value="{{ $xlung['peep'] ?? old('peep') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
                            <div class="col-md-6 input-group input-group-sm mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-black-50" id="expPause">Expiratory Pause(s)</span>
                                </div>
                                <input type="number" id="expPause" name="expPause" class="form-control" min="0" max="5" step="0.1"   value="{{ $xlung['expPause'] ?? old('expPause') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="row justify-content-center">
            <div class="col-md-12 mb-1">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title"><i class="fa fa-bars"></i> Patient <small>PSV</small></p>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="char-container" style="height:100px;width: 100%;">
                                    <canvas id="line-chart"></canvas>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="char-container" style="height:100px;width: 100%;">
                                    <canvas id="line-chart1"></canvas>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="char-container" style="height:100px;width: 100%;">
                                    <canvas id="line-chart2"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="xLungOutput">
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
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/vcv.js') }}"></script>
    <script type="text/javascript">
        $("form#xLungForm").submit(function (e) {
            e.preventDefault();
            let xLungFormData = $(this).serialize();
            $.ajax({
                url: "{{ route('xlung-vcv') }}",
                data: xLungFormData,
                type: "POST",
                async: true,
                dataType: "html",
                success: function (data) {
                    if(data){
                        $("#xLungOutput").html(data);
                    }
                }
            });
        });
    </script>
    <script type="text/javascript">
        $('a#vcv-tab').on('shown.bs.tab', function (e) {
            $('#flow').prop('disabled', function(i, v) { return !v; });
            $('#inspTime').prop('disabled', function(i, v) { return !v; });
        });
        $('a#pcv-tab').on('shown.bs.tab', function (e) {
            $('#inspTime').prop('disabled', function(i, v) { return !v; });
            $('#flow').prop('disabled', function(i, v) { return !v; });
        });
    </script>
@endsection
