<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\Gateway;
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
    public function create()
    {
        $client = new Client();
        $data = $client->post('https://api-rona-coffe.000webhostapp.com/api/pengeluaran', [
            'page' => 1,
            'per_page' => 999,
            'limit' => 999,
        ])->getBody()->data;
        return view('pages.Administrator.Pengeluaran.create')->with('pengeluaran', $data);
    }
    public function store(Request $request)
    {

        $this->validate($request, [
            'pengeluaran' => 'required|max:255|min:3',
            'rincian' => 'required|numeric|max:255',
        ]);


        $gateway = new Gateway();
        // dd($gateway);
        $store = $gateway->post('https://api-rona-coffe.000webhostapp.com/api/pengeluaran', [
            "pengeluaran" => $request->get('pengeluaran'),
            'rincian' => $request->get('rincian'),
        ])->getData();
            dd($store);
        return redirect('/pengeluaran')->with('success', 'Data Berhasil Di Tambahkan');
    }

}