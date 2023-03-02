<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class PengeluaranController extends Controller
{
    public function getPengeluaran(){
        $client = new Client();
        $response = $client->request('GET','https://api-rona-coffe.000webhostapp.com/api/pengeluaran');
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();
        $pengeluarans = json_decode($body, true);
        // dd($pengeluarans);

        return view('pages.Administrator.Pengeluaran.index',  ['pengeluarans'=>$pengeluarans]);
    }

}