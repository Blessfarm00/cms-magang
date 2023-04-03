<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Services\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Session;

class PengeluaranController extends InventoriController
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
        return view('pages.Administrator.Pengeluaran.index',  ['pengeluarans' => $body]);
    }

    public function edit($id)
    {
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        $pengeluaran = $gateway->get('https://kedairona.000webhostapp.com/api/cms/pengeluaran/' . $id)->getData();
        // dd($pengeluaran);
        return view('pages.Administrator.Pengeluaran.edit', compact('pengeluaran'));
    }

    public function update(Request $request, $id)
    {
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        $storePengeluaran = $gateway->post('https://kedairona.000webhostapp.com/api/cms/pengeluaran/update/' . $id, [
            "pengeluaran" => $request->get('pengeluaran'),
            "inventori_id" => $request->get('inventori_id'),
            "rincian" => $request->get('rincian'),
            "jumlah" => $request->get('jumlah'),
            "tanggal" => $request->get('tanggal'),
        ])->getData();
        // dd($storePengeluaran);
        return redirect('/pengeluaran')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function create()
    {
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);

        $data = $gateway->get('https://kedairona.000webhostapp.com/api/cms/inventory', [
            'page' => 1,
            'per_page' => 999,
            'limit' => 999,
        ])->getData();
        // dd($data);

        return view('pages.Administrator.Pengeluaran.create')->with('inventory', $data);
    }
    public function store(Request $request)
    {
        // dd($request->all());
        //     $validate = $request->validate([
        //         'inventori_id' => 'required|integer|exists:inventories,id',
        //         'jumlah' => 'required|integer|min:1',
        //         'keterangan' => 'nullable|string',
        //     ]);

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

        $gateway = new Gateway();
        // dd($gateway);
        $pengeluaran = $gateway->post('https://kedairona.000webhostapp.com/api/cms/pengeluaran', [

            "pengeluaran" => $request->get('pengeluaran'),
            "tanggal" => $request->get('tanggal'),
            "jumlah" => $request->get('jumlah'),
            "rincian" => $request->get('rincian'),
            "inventori_id" => $request->get('inventori_id'),


        ])->getData();
        // dd($pengeluaran);

        return redirect('/pengeluaran')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function delete($id)
    {
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        $deletePengeluaran = $gateway->post('https://kedairona.000webhostapp.com/api/cms/pengeluaran/delete/'. $id);

        return redirect('/pengeluaran')->with('success', 'inventori Deleted');

    }

}
