<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $request->session()->forget('calculatedPLung');
        $request->session()->forget('calculatedLung');

        return view('home');
    }

    public function psv(Request $request)
    {
        $lung = array(
            'gender'            => 'male',
            'age'               => 30,
            'height'            => 1.8,
            'ibm'               => 70,

            'rva'               => 25,
            'cst'               => 70,
            'weight'            => 65,

            'pmus'              => 7,
            'rrBpm'             => 30,
            'duration'          => 1,

            'ps'                => 15,
            'riseTime'          => 0.1,
            'cycleOff'          => 45,
            'peep'              => 5,
            'fio'               => 21,
            'trigger'           => 'flow',
            'senstivity'        => 2,
        );
        if ($request->session()->has('calculatedPLung')) {
            $request->session()->forget('calculatedPLung');
        }
        $this->calculatePLung($request, $lung);

        $lung = $request->session()->get('calculatedPLung');

        return view('lungs.psv', compact('lung'));
    }
    public function psvPost(Request $request){
        $psv_data = array(
            'gender'            => $request->input('gender'),
            'age'               => $request->input('age'),
            'height'            => $request->input('height'),
            'weight'            => $request->input('weight'),
            'ibm'               => $request->input('ibm'),
            'rva'               => $request->input('rva'),
            'cst'               => $request->input('cst'),
            'fio'               => $request->input('fio'),
            'pmus'              => $request->input('pmus'),
            'rrBpm'             => $request->input('rrBpm'),
            'duration'          => $request->input('duration'),
            'ps'                => $request->input('ps'),
            'cycleOff'          => $request->input('cycleOff'),
            'copd'              => $request->input('copd'),
            'riseTime'          => $request->input('riseTime'),
            'peep'              => $request->input('peep'),
            'trigger'           => $request->input('trigger'),
            'senstivity'        => $request->input('senstivity')
        );
        if ($request->session()->has('calculatedPLung')) {
            $request->session()->forget('calculatedPLung');
            $this->calculatePLung($request, $psv_data);
        }

        $lung = $request->session()->get('calculatedPLung');

        return view('ajax.psv', compact('lung'));
    }
    public function calculatePLung($request, $pLung)
    {
        $vt = $pLung['ps'] < 15 ? (558 - 50 * (15 - $pLung['ps']) - (10 * ($pLung['cycleOff'] - 25))) : (558 - 20 * (15 - $pLung['ps']) - (10 * ($pLung['cycleOff'] - 25)));
        $vti = $vt;
        $vte = $vt - 10;

        $vtkg = $vti / $pLung['weight'];
        $vtekg = $vte / $pLung['weight'];
        $rrbpm = $pLung['rrBpm'];
        $vepermint = ($vti * $rrbpm / 1000);

        $totalTime = 60;
        $inspTime = (0.92 + ($pLung['ps'] - 15) * 0.04);
        $exptime = $totalTime - $inspTime;
        $ratio = round(($exptime / $inspTime), 3);
        $ieRatio = "1:{$ratio}";

        $calculator = array(
            'inspTime'   =>  round($inspTime, 2),
            'vtiml'     =>  round($vti, 2),
            'vtkg'      =>  round($vtkg, 2),
            'vtekg'     =>  round($vtekg, 2),
            'vteml'     =>  round($vte, 2),
            'expTime'    =>  round($exptime, 2),
            'ieratio'   =>  $ieRatio,
            'totalTime' =>  round($totalTime, 2),
            'vePerMint' =>  round($vepermint, 2),
        );
        $newLungData = array_merge($pLung, $calculator);
        $request->session()->put('calculatedPLung', $newLungData);
        return $newLungData;
    }

    public function xLungPcv(Request $request){

        $lung = $this->lungArray();
        $this->calculateXLung($request, $lung);

        $xlung = $request->session()->get('calculatedLung');

        return view('lungs.xlung-pcv', compact('xlung'));
    }
    public function xLungVcv(Request $request){
        $xLung = $this->lungArray();
        $this->calculateXLung($request, $xLung);

        $xlung = $request->session()->get('calculatedLung');

        return view('lungs.xlung-vcv', compact('xlung'));
    }
    public function xLungPost(Request $request){
        $form_data = array(
            'gender'            => $request->input('gender'),
            'age'               => $request->input('age'),
            'height'            => $request->input('height'),
            'weight'            => $request->input('weight'),
            'ibm'               => $request->input('ibm'),
            'pmus'              => $request->input('pmus'),
            'rrBpm'             => $request->input('rrBpm'),
            'duration'          => $request->input('duration'),
            'rva'               => $request->input('rva'),
            'cst'               => $request->input('cst'),
            'vdvt'              => $request->input('vdvt'),
            'volume'            => $request->input('vlume'),
            'rpm'               => $request->input('rpm'),
            'flow'              => $request->input('flow'),
            'pattern'           => $request->input('pattern'),
            'inspTime'          => (($request->input('vlume')*60)/($request->input('flow')*1000)),
            'peep'              => $request->input('peep'),
            'inspPause'         => $request->input('inspPause'),
            'expPause'          => $request->input('expPause'),
            'velmi'             => $request->input('velmi'),
            'exTime'            => $request->input('exTime'),
            'deltaP'            => $request->input('deltaP'),
            'totalTime'         => $request->input('totalTime'),
            'shunt'             => $request->input('shunt'),
            'fio'               => $request->input('fio'),
            'be'                => $request->input('be')
        );

        $this->calculateXLung($request, $form_data);

        $xlung = $request->session()->get('calculatedLung');

        return view('ajax.xlung', compact('xlung'));
    }
    public function calculateXLung($request, $xLung){
        $insTime    = (($xLung['volume'] * 60) / ($xLung['flow'] * 1000));
        $vtiml      = $xLung['pattern'] === 2 ? ($xLung['volume'] - 5) : ($xLung['volume']);
        $vtkg       = ($vtiml / $xLung['ibm']);
        $exTime     = ((60 / $xLung['rpm']) - $xLung['inspTime']);
        $totalTime  = ($insTime + $exTime);

        $ration     =  round(($exTime / $insTime), 2);
        $ieratio    = "1:{$ration}";
        $vteml      = (($vtiml / 1000) * $xLung['rpm']);
        $pickUp     = $xLung['pattern'] > 1 ? (($xLung['rva'] * $vtiml * $xLung['rpm']) / (60000)) + ($vtiml / $xLung['cst']) + ($xLung['peep'] + ($xLung['inspPause'] * 0.2)) + (($vtiml / 1000) * ($xLung['rpm'] / 60) * ($xLung['rva'])) :
            (($xLung['rva']) * ($xLung['flow'] / 60) + ($xLung['volume'] / $xLung['cst']) + (($xLung['peep'] + ($xLung['inspPause'] * 0.2)) + (($xLung['volume'] / 1000) * ($xLung['rpm'] / 60) * $xLung['rva']) +4 ));
        $peekP      = $pickUp;

        $calPlat    = $xLung['pattern'] == 2 ? ($pickUp - ($xLung['rva'] / 3.7)) : $pickUp - $xLung['rva'];
        $plateau    = $xLung['inspPause'] == 0 ? 0 : $calPlat;
        $pPlateau   = $plateau;
        $driver     = $plateau == 0 ? '' : $plateau - $xLung['peep'];
        $drivingP   = $driver;
        $pto        = $xLung['pattern']==1 ? (($peekP-($xLung['rva']*$xLung['flow']/60) - ($xLung['volume']/$xLung['cst']))) : ($peekP-($xLung['rva']*$xLung['flow']/60)-($xLung['volume']/$xLung['cst'])+6);
        $ptotl      = $xLung['expPause'] == 0 ? '' : $pto;
        $peepTot    = $ptotl;
        $p01        = $xLung['duration'] == 0 ? 0 : (($xLung['pmus'] * 0.315) / $xLung['duration']);
        $work       = ((($xLung['pmus'] * 0.0314) + ($xLung['duration'] * 0.0035)) * 2.5);
        $ptp        = (($xLung['pmus'] * $xLung['rrBpm'] * $xLung['duration']) / 1.45);
        $fvt        = (($xLung['rpm'] * 1000) / $vtiml);
        //(16*$xLung['vdvt'] symboleAdded ($xLung['vdvt'] - 0.26)*10)
        $pocco      = $xLung['vdvt'] === 0.26 && $xLung['rpm'] === 14 ? 40 : ((16*$xLung['vdvt'] * ($xLung['vdvt'] - 0.26)*10) + 40 - (($xLung['rpm'] - 14) * 0.35));
        $paco       = $pocco;

        $pao2       = ($xlung['vdvt'] = 0.26 && $xlung['shunt'] = 3 && $xlung['fio2'] = 21 && $xlung['rpm'] = 14) ? 85 : (($xlung['vdvt'] >= 0.26  && $xlung['vdvt'] <= 0.5) && (($xlung['fio2'] - 21) * 3.5 + 85 - ($xlung['shunt'] - 3) * 3 - (30 * ($xlung['vdvt'] - 0.26)) + ($xlung['rpm'] - 14)));
        $pow        = ($xLung['vdvt'] == 0.26 && $xLung['shunt'] == 3 && $xLung['fio'] == 21 && $xLung['rpm'] == 14) ? 85 : (($xLung['fio'] - 21) * 3 + 85 - ($xLung['shunt'] - 3) * 3 - (0.5 * ($xLung['vdvt'] - 0.26)) + ($xLung['rpm'] - 14));
        $hco        = $pow;
        $pao2       = (($pow - 85) * 0.35 + 96);
        $hocco      = $pao2 > 75 ? (($pao2 - 85) * 0.35 + 96) : (($pao2 - 85) * 0.6 + 96);
        $sao2       = $hocco;
        $paofio     = (100 * $pow / $xLung['fio']);
        $ph         = ((log10((($pow - 85) * 0.35 + 96)) - log10($hocco)) + 7.2);

        $calculator = array(
            'insTime'   =>  round($insTime, 2),
            'vtiml'     =>  round($vtiml, 2),
            'vtkg'      =>  round($vtkg, 2),
            'vteml'     =>  round($vteml, 2),
            'exTime'    =>  round($exTime, 2),
            'ieratio'   =>  $ieratio,
            'totalTime' =>  round($totalTime, 2),
            'peekP'     =>  round($peekP, 2),
            'pPlateau'  =>  round($pPlateau, 2),
            'drivingP'  =>  round($drivingP, 2),
            'peepTot'   =>  round($peepTot, 2),
            'p01'       =>  round($p01, 2),
            'work'      =>  round($work, 2),
            'ptp'       =>  round($ptp, 2),
            'fvt'       =>  round($fvt, 2),
            'paco'      =>  round($paco, 2),
            'hco'       =>  round($hco, 2),
            'pao2'      =>  round($pao2, 2),
            'sao2'      =>  round($sao2, 2),
            'paofio'    =>  round($paofio, 2),
            'ph'        =>  round($ph, 2),
        );
        $newLungData = array_merge($xLung, $calculator);
        $request->session()->put('calculatedLung', $newLungData);
        return $newLungData;
    }

    protected function lungArray(){
        return array(
            'gender'            => 'male',
            'age'               => 30,
            'height'            => 1.8,
            'weight'            => 80,
            'ibm'               => 70,
            'pmus'              => 0,
            'rrBpm'             => 0,
            'duration'          => 0,
            'rva'               => 10,
            'cst'               => 60,
            'vdvt'              => 0.26,
            'volume'            => 500,
            'rpm'               => 14,
            'flow'              => 60,
            'pattern'           => 1,
            'inspTime'          => 0.5,
            'peep'              => 5,
            'inspPause'         => 0,
            'expPause'          => 4,
            'velmi'             => 7,
            'exTime'            => 3.79,
            'totalTime'         => 4.29,
            'shunt'             => 3,
            'fio'               => 21,
            'be'                => 0
        );
    }
}
