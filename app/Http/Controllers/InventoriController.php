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
        $response = $client->request('GET','https://syafikmaulafaiz.000webhostapp.com/api/cms/inventory');
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();
        $inventoris = json_decode($body, true);
        // dd($inventoris);

        return view('pages.Administrator.Inventori.index',  ['inventoris'=>$inventoris]);
    }

    public function create()
    {
        $gateway = new Gateway();
        $data = $gateway->post('https://syafikmaulafaiz.000webhostapp.com/api/cms/inventory', [
            'page' => 1,
            'per_page' => 999,
            'limit' => 999,
        ])->getData();
        return view('pages.Administrator.Inventori.create')->with('inventoris', $data);
    }

    public function edit($id)
    {
        $gateway = new Gateway();
        $inventori = $gateway->get('https://syafikmaulafaiz.000webhostapp.com/api/cms/inventory' . $id)->getData();
        // dd($inventori);
        return view('pages.Administrator.Inventori.edit', compact('inventori'));
    }
            
    public function update(Request $request, $id)
    {
        $gateway = new Gateway();
        $store = $gateway->put('https://syafikmaulafaiz.000webhostapp.com/api/cms/inventory' . $id, [
            "kd_barang" => $request->get('kd_barang'),
            "nama_barang" => $request->get('nama_barang'),
            "stok" => $request->get('stok'),
            "harga" => $request->get('harga'),
            "satuan" => $request->get('satuan'),
        ])->getData();
        dd($store);
        return redirect('/inventori')->with('success', 'Data Berhasil Di Tambahkan');
    }
    

    public function delete($id)
    {
        $client = new Client();

        $delete = $client->delete('https://syafikmaulafaiz.000webhostapp.com/api/cms/inventory' . $id);
        return redirect('/inventori')->with('success', 'Inventori Deleted');
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
        $store = $gateway->post('https://syafikmaulafaiz.000webhostapp.com/api/cms/inventory', [
            "kd_barang" => $request->get('kd_barang'),
            "nama_barang" => $request->get('nama_barang'),
            "stok" => $request->get('stok'),
            "harga" => $request->get('harga'),
            "satuan" => $request->get('satuan'),
        ])->getData();

        return redirect('/inventori')->with('success', 'Data Berhasil Di Tambahkan');
    }
}



