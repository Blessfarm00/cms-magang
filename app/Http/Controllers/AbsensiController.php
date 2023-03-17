<?php

namespace App\Http\Controllers;

use App\Services\Gateway;
use Illuminate\Http\Request;
use \Yajra\DataTables\DataTables;
use Auth;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class AbsensiController extends Controller
{

    public function index(){
        $client = new Client();
        $response = $client->request('GET','https://syafikmaulafaiz.000webhostapp.com/api/cms/absensi');
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();
        $absensis = json_decode($body, true);
        // dd($absensis);

        return view('pages.Administrator.Absensi.index',  ['absensis'=>$absensis]);
    }

}