<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Gateway;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class produkController extends Controller
{
    public function index()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://api-rona-coffe.000webhostapp.com/api/produk');
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();
        $produks = json_decode($body, true);
        // dd($produks);

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
        return view('pages.Administrator.Produk.create')->with('produks', $data);
    }

    public function edit($id)
    {
        $gateway = new Gateway();
        $produk = $gateway->get('https://api-rona-coffe.000webhostapp.com/api/produk' . $id)->getData();
        // dd($produk);
        return view('pages.Administrator.Produk.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $gateway = new Gateway();
        $store = $gateway->put('https://api-rona-coffe.000webhostapp.com/api/produk' . $id, [
            'nama_produk' => 'unique:produks|max:255|min:3|',
            'harga' => 'numeric',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'deskripsi' => 'max:255|min:3',
        ])->getData();
        return redirect('/produk')->with('success', 'Data Berhasil Di Tambahkan');
    }


    public function delete($id)
    {
        $gateway = new Gateway();

        $delete = $gateway->delete('https://api-rona-coffe.000webhostapp.com/api/produk' . $id);
        return redirect('/produk')->with('success', 'produk Deleted');
    }

    public function store(Request $request)
    {
        //  dd($request->all());

        $this->validate($request, [
            'nama_produk' => 'unique:produks|max:255|min:3|',
            'harga' => 'numeric',
            'deskripsi' => 'max:255|min:3',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',



        ]);
        // $path = $request->file('gambar_kuliner')->store('public/images');
        $file = $request->file('gambar');
        //mengambil nama file
        $nama_file = asset('img') . '/' . $file->getClientOriginalName();

        //memindahkan file ke folder tujuan
        $file->move('img', $file->getClientOriginalName());
        // dd($request);

        $gateway = new Gateway();
        // dd($gateway);
        $store = $gateway->post('https://api-rona-coffe.000webhostapp.com/api/produk', [
            "nama_produk" => $request->get('nama_produk'),
            "harga" => $request->get('harga'),
            "deskripsi" => $request->get('deskripsi'),
            "gambar" => $nama_file,
            
        ])->getData();

        return redirect('/produk')->with('success', 'Data Berhasil Di Tambahkan');
    }
}
