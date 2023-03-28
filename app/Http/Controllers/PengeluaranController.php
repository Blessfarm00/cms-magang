<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Services\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PengeluaranController extends Controller
{
    public function index()
    {
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        // dd($gateway);

        $response = $gateway->get('https://kedairona.000webhostapp.com/api/cms/pengeluaran');
        $body = $response->getData()->data;
        // dd($body);
        // $inventoris = json_decode($body, true);
        // dd($inventoris);

        return view('pages.Administrator.Pengeluaran.index',  ['pengeluarans' => $body]);
    }

    public function create()
    {
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        $data = $gateway->get('https://kedairona.000webhostapp.com/api/cms/pengeluaran', [
            'page' => 1,
            'per_page' => 999,
            'limit' => 999,
        ])->getData();
        return view('pages.Administrator.Pengeluaran.create')->with('pengeluarans', $data);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'pengeluaran' => 'numeric',
            'tanggal' => 'date',
            'inventori_id' => '',
            'jumlah' => 'numeric',
            'rincian' => 'string'
        ]);


        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        $store = $gateway->post('https://kedairona.000webhostapp.com/api/cms/pengeluaran', [
            "pengeluaran" => $request->get('pengeluaran'),
            "tanggal" => $request->get('tanggal'),
            "jumlah" => $request->get('jumlah'),
            "rincian" => $request->get('rincian'),
        ])->getData();

        return redirect('/pengeluaran')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function edit($id)
    {
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        $inventori = $gateway->get('https://kedairona.000webhostapp.com/api/cms/pengeluaran/' . $id)->getData();
        // dd($inventori);
        return view('pages.Administrator.Inventori.edit', ['inventori' => $inventori]);
    }

    public function update(Request $request, $id)
    {
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        $store = $gateway->put('https://kedairona.000webhostapp.com/api/cms/pengeluaran' . $id, [
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

        $delete = $client->delete('https://syafikmaulafaiz.000webhostapp.com/api/cms/pengeluaran' . $id);
        return redirect('/inventori')->with('success', 'Pengeluaran Deleted');
    }
}
