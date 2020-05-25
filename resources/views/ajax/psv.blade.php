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
                        <td id="vtiml" class="text-right"><span class="badge badge-success">{{ $lung['vtiml'] ?? '0' }}</span></td>
                    </tr>
                    <tr>
                        <td>VTe(ml)</td>
                        <td id="vteml" class="text-right"><span class="badge badge-success">{{ $lung['vtiml'] ?? '0' }}</span></td>
                    </tr>
                    <tr>
                        <td>VTi(ml/Kg)</td>
                        <td id="vtkg" class="text-right"><span class="badge badge-success">{{ $lung['vtkg'] ?? '0' }}</span></td>
                    </tr>
                    <tr>
                        <td>VTe(ml)</td>
                        <td id="vtkg" class="text-right"><span class="badge badge-success">{{ $lung['vtekg'] ?? '0' }}</span></td>
                    </tr>
                    <tr>
                        <td>RR(bpm)</td>
                        <td id="rrBpm" class="text-right"><span class="badge badge-success">{{ $lung['rrBpm'] ?? '0' }}</span></td>
                    </tr>
                    <tr>
                        <td>VE(l/min)</td>
                        <td id="vteml" class="text-right"><span class="badge badge-success">{{ $lung['vePerMint'] ?? '0' }}</span></td>
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
                        <td id="inspTime" class="fs15 fw700 text-right"><span class="badge badge-success">{{  $lung['inspTime'] ?? '0' }}</span></td>
                    </tr>
                    <tr>
                        <td>Exp.Time</td>
                        <td id="exTime" class="fs15 fw700 text-right"><span class="badge badge-success">{{  $lung['expTime'] ?? '0' }}</span></td>
                    </tr>
                    <tr>
                        <td>Total Time(s)</td>
                        <td id="totalTime" class="fs15 fw700 text-right"><span class="badge badge-success">{{  $lung['totalTime'] ?? '0' }}</span></td>
                    </tr>
                    <tr>
                        <td>I:E</td>
                        <td id="ieratio" class="fs15 fw700 text-right"><span class="badge badge-success">{{  $lung['ieratio'] ?? '0' }}</span></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
