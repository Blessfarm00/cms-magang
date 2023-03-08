<?php

namespace App\Http\Controllers;
use App\Services\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class PengambilanController extends Controller
{
    public function index()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://api-rona-coffe.000webhostapp.com/api/pengambilan');
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();
        $pengambilan_barangs = json_decode($body, true);
        // dd($pengambilans);

        return view('pages.Administrator.Pengambilan.index',  ['pengambilan_barangs' => $pengambilan_barangs]);
    }

    public function edit($id)
    {
        $gateway = new Gateway();
        $pengambilan = $gateway->get('https://api-rona-coffe.000webhostapp.com/api/pengambilan' . $id)->getData();
        // dd($pengambilan);
        return view('pages.Administrator.Pengambilan.edit', compact('pengambilan'));
    }

    public function create()
    {
        $client = new Client();
        $data = $client->post('https://api-rona-coffe.000webhostapp.com/api/pengambilan', [
            'page' => 1,
            'per_page' => 999,
            'limit' => 999,
        ])->getBody();

        $client = new Client();
        $response = $client->request('GET', 'https://api-rona-coffe.000webhostapp.com/api/pengambilan');
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();
        $pengambilan = json_decode($body, true);

        // dd($pengambilan);



        return view('pages.Administrator.Pengambilan.create')->with('pengambilan', $data, 'pengambilans', $pengambilan);
    }
    public function store(Request $request)
    {
    //     $validate = $request->validate([
    //         'inventori_id' => 'required|integer|exists:inventories,id',
    //         'jumlah' => 'required|integer|min:1',
    //         'keterangan' => 'nullable|string',
    //     ]);

        $this->validate($request, [
            'inventori_id' => 'required|integer',
            'jumlah' => 'required|integer|min:1',
            'keterangan' => 'nullable|string',
        ]);


        $gateway = new Gateway();
        // dd($gateway);
        $pengambilan = $gateway->post('https://api-rona-coffe.000webhostapp.com/api/pengambilan ', [
            "inventori_id" => $request->get('inventori_id'), 
            "jumlah" => $request->get('jumlah'),
            "keterangan" => $request->get('keterangan'),
        ])->getData();

        return redirect('/pengambilan')->with('success', 'Data Berhasil Di Tambahkan');
    }

}
