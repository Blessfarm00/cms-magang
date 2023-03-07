<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\Gateway;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class InventoriController extends Controller
{
    public function index(){
        $client = new Client();
        $response = $client->request('GET','https://api-rona-coffe.000webhostapp.com/api/inventory');
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();
        $inventoris = json_decode($body, true);
        // dd($inventoris);

        return view('pages.Administrator.Inventori.index',  ['inventoris'=>$inventoris]);
    }

    public function create()
    {
        $client = new Client();
        $data = $client->post('https://api-rona-coffe.000webhostapp.com/api/inventory', [
            'page' => 1,
            'per_page' => 999,
            'limit' => 999,
        ])->getBody();
        return view('pages.Administrator.Inventori.create')->with('inventori', $data);
    }
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'kd_barang' => 'required|unique:inventories|max:255|min:3',
            'nama_barang' => 'required|max:255|min:3',
            'stok' => 'required|numeric|max:255',
            'harga' => 'required|numeric|min:3',
            'satuan' => 'required',
        ]);


        $gateway = new Gateway();
        // dd($gateway);
        $store = $gateway->post('https://api-rona-coffe.000webhostapp.com/api/inventory', [
            "kd_barang" => $request->get('kd_barang'),
            "nama_barang" => $request->get('nama_barang'),
            "stok" => $request->get('stok'),
            "harga" => $request->get('harga'),
            "satuan" => $request->get('satuan'),
        ])->getData();

        return redirect('/inventori')->with('success', 'Data Berhasil Di Tambahkan');
    }
}



