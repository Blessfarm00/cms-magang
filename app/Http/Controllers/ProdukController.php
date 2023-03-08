<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\Gateway;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class ProdukController extends Controller
{
    public function index()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://api-rona-coffe.000webhostapp.com/api/produk');
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();
        $produks = json_decode($body, true);
        // dd($pengambilans);

        return view('pages.Administrator.Produk.index',  ['produks' => $produks]);
    }
    public function create()
    {
        $client = new Client();
        $data = $client->post('https://api-rona-coffe.000webhostapp.com/api/produk', [
            'page' => 1,
            'per_page' => 999,
            'limit' => 999,
        ])->getBody();
        return view('pages.Administrator.Produk.create')->with('produk', $data);
    }

    public function edit($id)
    {
        $gateway = new Gateway();
        $produk = $gateway->get('https://api-rona-coffe.000webhostapp.com/api/produk' . $id)->getData();
        // dd($produk);
        return view('pages.Administrator.Produk.edit', compact('produk'));
    }
    
    public function store(Request $request)
    {
        // dd($request->all());

        // $this->validate($request, [
        //     'nama_produk' => 'required|max:255|min:3',
        //     'harga' => 'required|max:255|min:3',
        //     'gambar' => 'required|max:255',
        //     'deskripsi' => 'required|min:3',
        // ]);


        $gateway = new Gateway();
        // dd($gateway);
        $store = $gateway->post('https://api-rona-coffe.000webhostapp.com/api/produk', [
            
            "nama_produk" => $request->get('nama_produk'),
            "harga" => $request->get('harga'),
            "gambar" => $request->get('gambar'),
            "deskripsi" => $request->get('deskripsi'),
        ])->getData(); 
        // dd($store);

        return redirect('/produk')->with('success', 'Data Berhasil Di Tambahkan');
    }

    
}
