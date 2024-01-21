<?php

namespace App\Http\Controllers;

use App\Models\Livedata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Mining_parameter_Controller extends Controller
{

public function data_collect() {

$response = Http::get('http://localhost:8000/api/last_id');
$data = $response->json();


$last_id_chart1=$data['last_id_chart1'];
$last_id_chart2=$data['last_id_chart2'];
$last_id_chart3=$data['last_id_chart3'];
$min_id=min($last_id_chart1,$last_id_chart2,$last_id_chart3);

$new_data=Livedata::where('id','>',$min_id)->limit(100)->get();
$data_log_count=count($new_data);
$data['data_log_count']=$data_log_count;


// chart 1 parameters
$id=$new_data->pluck('id');
$BLKPOSCOMP=$new_data->pluck('BLKPOSCOMP ');
$HKLD=$new_data->pluck('HKLD');
$WOB=$new_data->pluck('WOB');
$TORQ=$new_data->pluck('TORQ');
$SURFRPM=$new_data->pluck('SURFRPM');
$BITRPM=$new_data->pluck('BITRPM');

$chart1_data=['id'=>$id,'BLKPOSCOMP'=>$BLKPOSCOMP,'HKLD'=>$HKLD,'WOB'=>$WOB,'TORQ'=>$TORQ,
      'SURFRPM'=>$SURFRPM,'BITRPM'=>$BITRPM];


// chart 2 parameters
$id=$new_data->pluck('id');
$SPP=$new_data->pluck('SPP ');
$CSGP=$new_data->pluck('CSGP');
$SPM01=$new_data->pluck('SPM01');
$SPM02=$new_data->pluck('SPM02');
$SPM03=$new_data->pluck('SPM03');
$FLOWIN=$new_data->pluck('FLOWIN');

$chart2_data=['id'=>$id,'SPP'=>$SPP,'CSGP'=>$CSGP,'SPM01'=>$SPM01,'SPM02'=>$SPM02,
'SPM03'=>$SPM03,'FLOWIN'=>$FLOWIN];


// chart 3 parameters
$id=$new_data->pluck('id');
$PITACTIVE=$new_data->pluck('PITACTIVE ');
$FLOWOUTP=$new_data->pluck('FLOWOUTP');
$TGAS=$new_data->pluck('TGAS');

$chart3_data=['id'=>$id,'PITACTIVE'=>$PITACTIVE,'FLOWOUTP'=>$FLOWOUTP,'TGAS'=>$TGAS];





$res = Http::post('http://localhost:8000/api/save_data', ['chart1_data' => $chart1_data,'chart2_data' => $chart2_data,'chart3_data' => $chart3_data]);
$res=$res->json();
$data['status']=$res['status'];





return  view('page1',['data'=> $data]);




    }
}

















