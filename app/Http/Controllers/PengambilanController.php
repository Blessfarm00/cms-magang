<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Services\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Session;

class PengambilanController extends Controller
{
    public function index()
    {
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        // dd($gateway);

        $response = $gateway->get('https://kedairona.000webhostapp.com/api/cms/pengambilan');
        $body = $response->getData()->data;
        // dd($body);
        // $inventoris = json_decode($body, true);
        // dd($inventoris);
        return view('pages.Administrator.Pengambilan.index',  ['pengambilan_barangs' => $body]);
    }

    public function edit($id)
    {
        $gateway = new Gateway();
        $pengambilan = $gateway->get('https://kedairona.000webhostapp.com/api/cms/pengambilan' . $id)->getData();
        // dd($pengambilan);
        return view('pages.Administrator.Pengambilan.edit', compact('pengambilan'));
    }

    public function create()
    {
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);

        $data = $gateway->post('https://kedairona.000webhostapp.com/api/cms/pengambilan', [
            'page' => 1,
            'per_page' => 999,
            'limit' => 999,
        ])->getData();

        // $client = new Client();
        // $response = $client->request('GET', 'https://kedairona.000webhostapp.com/api/cms/pengambilan');
        // $statusCode = $response->getStatusCode();
        // $body = $response->getBody()->getContents();
        // $pengambilan = json_decode($body, true);

        // dd($pengambilan);

        return view('pages.Administrator.Pengambilan.create')->with('pengambilan_barangs', $data);
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
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);

        $gateway = new Gateway();
        // dd($gateway);
        $pengambilan = $gateway->post('https://kedairona.000webhostapp.com/api/cms/pengambilan', [
            "inventori_id" => $request->get('inventori_id'), 
            "jumlah" => $request->get('jumlah'),
            "keterangan" => $request->get('keterangan'),
        ])->getData();

        return redirect('/pengambilan')->with('success', 'Data Berhasil Di Tambahkan');
    }

}
