<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class PemasukanController extends Controller
{
    public function getPemasukan(){
        $client = new Client();
        $response = $client->request('GET','https://api-rona-coffe.000webhostapp.com/api/pemasukan');
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();
        $pemasukans = json_decode($body, true);
        // dd($pemasukans);

        return view('pages.Administrator.Pemasukan.index',  ['pemasukans'=>$pemasukans]);
    }

}