<?php

namespace App\Http\Controllers;

use App\Services\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class pengeluaranController extends Controller
{
    public function index()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://api-rona-coffe.000webhostapp.com/api/pengeluaran');
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();
        $pengeluarans = json_decode($body, true);
        // dd($pengeluarans);

        return view('pages.Administrator.Pengeluaran.index',  ['pengeluarans' => $pengeluarans]);
    }
    public function create()
    {
        $client = new Client();
        $data = $client->post('https://api-rona-coffe.000webhostapp.com/api/pengeluaran', [
            'page' => 1,
            'per_page' => 999,
            'limit' => 999,
        ])->getBody();
        return view('pages.Administrator.Pengeluaran.create')->with('pengeluaran', $data);
    }

    public function edit($id)
    {
        $gateway = new Gateway();
        $pengeluaran = $gateway->get('https://api-rona-coffe.000webhostapp.com/api/pengeluaran' . $id)->getData();
        // dd($pengeluaran);
        return view('pages.Administrator.Pengeluaran.edit')->with('pengeluaran', $pengeluaran);
    }

    public function store(Request $request)
    {
        // $validate = $request->validate([
        //     'pengeluaran' => 'required|max:255|min:3',
        // ]);

        // $this->validate($request, [
        //     'pengeluaran' => 'required|numeric|max:255',
        // ]);

        $this->validate($request, [
            'pengeluaran' => 'required|numeric',
            'rincian' => 'required|max:255|min:3'
        ]);


        $gateway = new Gateway();
        // dd($gateway);
        $pengeluaran = $gateway->post('https://api-rona-coffe.000webhostapp.com/api/pengeluaran', [
            "pengeluaran" => $request->get('pengeluaran'),
            "rincian" => $request->get('rincian'),
        ])->getData();

        return redirect('/pengeluaran')->with('success', 'Data Berhasil Di Tambahkan');
    }
}
