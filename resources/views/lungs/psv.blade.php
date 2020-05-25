@extends('layouts.app')

@section('title', $title ?? 'Psv')

@section('content')
    <div class="container-fluid" id="xLungFormData">
        <form class="row mb-1" method="post" id="psvForm">
            @csrf
            <div class="col-md-8 col-12">
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
                                                <option value="">Choose...</option>
                                                <option value="male" @if($lung['gender']=='male') selected='selected' @endif>Male</option>
                                                <option value="female" @if($lung['gender']=='female') selected='selected' @endif>Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 input-group input-group-sm mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-black-50" id="age">Age</span>
                                            </div>
                                            <input type="number" id="age" name="age" class="form-control form-control-sm" min="1" max="100" step="1" value="{{ $lung['age'] ?? old('age') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                        <div class="col-md-6 input-group input-group-sm mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-black-50" id="height">Height</span>
                                            </div>
                                            <input type="number" id="height" name="height" class="form-control form-control-sm" min="0.2" max="2" step="0.1" value="{{ $lung['height'] ?? old('height') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                        <div class="col-md-6 input-group input-group-sm mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-black-50" id="weight">Weight</span>
                                            </div>
                                            <input type="number" id="weight" name="weight" class="form-control form-control-sm" min="20" max="150" step="1" value="{{ $lung['weight'] ?? old('weight') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                        <div class="col-md-6 input-group input-group-sm mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-black-50" id="ibm">IBW</span>
                                            </div>
                                            <input type="number" id="ibm" name="ibm" class="form-control form-control-sm" min="1" max="175" step="0.1" value="{{ $lung['ibm'] ?? old('ibm') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
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
                                            <input type="number" id="rva" name="rva" class="form-control form-control-sm" min="0" max="105" step="0.1" value="{{ $lung['rva'] ?? old('rva') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                        <div class="col-md-12 input-group input-group-sm mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-black-50" id="cst">Cst(ml/cmH2O)</span>
                                            </div>
                                            <input type="number" id="cst" name="cst" class="form-control form-control-sm" min="0" max="100" step="0.1" value="{{ $lung['cst'] ?? old('cst') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                        <div class="col-md-12 input-group input-group-sm mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-black-50" id="fio">FiO2(%)</span>
                                            </div>
                                            <input type="number" id="fio" name="fio" class="form-control form-control-sm" min="0" max="100" step="0.1" value="{{ $lung['fio'] ?? old('fio') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-2 text-center">
                                    <div class="btn-group btn-group-sm">
                                        <a id="stp_btn" onclick="pause();" class="btn btn-sm btn-outline-info">Pause</a>
                                        <button id="btn" onclick="updatearrayspsv();" class="btn btn-sm btn-outline-success">Submit</button>
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
                                            <input type="number" id="pmus" name="pmus" class="form-control" min="0" max="200" step="0.1" value="{{ $lung['pmus'] ?? old('pmus') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                        <div class="col-md-12 input-group input-group-sm mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-black-50" id="rrBpm">RR(bpm)</span>
                                            </div>
                                            <input type="number" id="rrBpm" name="rrBpm" class="form-control" min="0" max="150" step="0.1" value="{{ $lung['rrBpm'] ?? old('rrBpm') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                        <div class="col-md-12 input-group input-group-sm mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-black-50" id="duration">Duration(s)</span>
                                            </div>
                                            <input type="number" id="duration" name="duration" class="form-control" min="0" max="150" step="0.1" value="{{ $lung['duration'] ?? old('duration') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-center">Ventilator <small>AC/VSV</small></p>
                        <div class="row">
                            <div class="col-md-6 input-group input-group-sm mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-black-50" id="Ps">PS (cmH2O)</span>
                                </div>
                                <input type="number" id="Ps" name="ps" class="form-control" min="1" max="999" step="1" value="{{ $lung['ps'] ?? old('ps') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
                            <div class="col-md-6 input-group input-group-sm mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-black-50" id="riseTime">Rise Time (s)</span>
                                </div>
                                <input type="number" id="riseTime" name="riseTime" class="form-control" min="0" max="200" step="0.1" value="{{ $lung['riseTime'] ?? old('riseTime') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
                            <div class="col-md-6 input-group input-group-sm mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-black-50" id="cycleOff">Cycling-off (%)</span>
                                </div>
                                <input type="number" id="cycleOff" name="cycleOff" class="form-control" min="0" max="100" step="0.1" value="{{ $lung['cycleOff'] ?? old('cycleOff') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
                            <div class="col-md-6 input-group input-group-sm mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-black-50" id="copd">COPD</span>
                                </div>
                                <input type="number" id="copd" name="copd" class="form-control" min="0" max="1" step="1" value="{{ $lung['copd'] ?? old('copd') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
                            <div class="col-md-12 input-group input-group-sm mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-black-50" id="peep">PEEP (cmH2O)</span>
                                </div>
                                <input type="number" id="peep" name="peep" class="form-control" min="1" max="10" step="1"  value="{{ $lung['peep'] ?? old('peep') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>

                            <div class="col-md-6 input-group input-group-sm mb-2">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="trigger">Trigger</label>
                                </div>
                                <select id="trigger" class="custom-select custom-select-sm" name="trigger">
                                    <option>Choose</option>
                                    <option value="flow" @if($lung['trigger']==="flow") selected='selected' @endif>Flow</option>
                                    <option value="pressure" @if($lung['trigger']==="pressure") selected='selected' @endif>Pressure</option>
                                </select>
                            </div>
                            <div class="col-md-6 input-group input-group-sm mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-black-50" id="senstivity">senstivity</span>
                                </div>
                                <input type="number" id="senstivity" name="senstivity" class="form-control" min="-3" max="3" step="1"   value="{{ $lung['senstivity'] ?? old('senstivity') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title"><i class="fa fa-bars"></i> Patient <small>PSV</small></p>
                        <div class="row">
                            <div class="col-md-12" style="height:100px;width:100%;">
                                <canvas id="line-chart"></canvas>
                            </div>
                            <div class="col-md-12" style="height:100px;width:100%;">
                                <canvas id="line-chart1"></canvas>
                            </div>
                            <div class="col-md-12" style="height:100px;width:100%;">
                                <canvas id="line-chart2"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12" id="psvFormOutput">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-center">ABG Chart</p>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <p class="card-title">Ventilometry</p>
                                <table class="table table-borderless">
                                    <tbody>
                                    <tr>
                                        <td>VTi(ml)</td>
                                        <td id="vtiml" class="text-right"><span class="badge badge-success">{{ Session::has('calculatedPLung') ? Session::get('calculatedPLung')['vtiml'] : '0' }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>VTe(ml)</td>
                                        <td id="vteml" class="text-right"><span class="badge badge-success">{{ Session::has('calculatedPLung') ? Session::get('calculatedPLung')['vtiml'] : '0' }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>VTi(ml/Kg)</td>
                                        <td id="vtkg" class="text-right"><span class="badge badge-success">{{ Session::has('calculatedPLung') ? Session::get('calculatedPLung')['vtkg'] : '0' }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>VTe(ml)</td>
                                        <td id="vtkg" class="text-right"><span class="badge badge-success">{{ Session::has('calculatedPLung') ? Session::get('calculatedPLung')['vtekg'] : '0' }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>RR(bpm)</td>
                                        <td id="rrBpm" class="text-right"><span class="badge badge-success">{{ Session::has('calculatedPLung') ? Session::get('calculatedPLung')['rrBpm'] : '0' }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>VE(l/min)</td>
                                        <td id="vteml" class="text-right"><span class="badge badge-success">{{ Session::has('calculatedPLung') ? Session::get('calculatedPLung')['vePerMint'] : '0' }}</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <p class="card-title">Synchrony</p>
                                <table class="table table-borderless">
                                    <tbody>
                                    <tr>
                                        <td>Insp.Time(s)</td>
                                        <td id="inspTime" class="fs15 fw700 text-right"><span class="badge badge-success">{{  Session::has('calculatedPLung') ? Session::get('calculatedPLung')['inspTime'] : '0' }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Exp.Time</td>
                                        <td id="exTime" class="fs15 fw700 text-right"><span class="badge badge-success">{{  Session::has('calculatedPLung') ? Session::get('calculatedPLung')['expTime'] : '0' }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Total Time(s)</td>
                                        <td id="totalTime" class="fs15 fw700 text-right"><span class="badge badge-success">{{  Session::has('calculatedPLung') ? Session::get('calculatedPLung')['totalTime'] : '0' }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>I:E</td>
                                        <td id="ieratio" class="fs15 fw700 text-right"><span class="badge badge-success">{{  Session::has('calculatedPLung') ? Session::get('calculatedPLung')['ieratio'] : '0' }}</span></td>
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
    <script>
        $("form#psvForm").submit(function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let xLungFormData = $(this).serialize();
            $.ajax({
                url: "{{ route('psv') }}",
                data: xLungFormData,
                type: "POST",
                async: true,
                dataType: "html",
                success: function (response) {
                    $('#psvFormOutput').html(response);
                }
            });
        });
    </script>
    <script src="{{ asset("js/psv.js") }}"></script>
@endsection
