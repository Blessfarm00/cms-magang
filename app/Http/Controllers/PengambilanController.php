<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Services\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Session;

class PengambilanController extends InventoriController
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
        return view('pages.Administrator.Pengambilan.index',  ['pengambilan_barangs' => $body]);
        
    }

    public function edit($id)
    {
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        // dd($gateway);
        $pengambilan = $gateway->get('https://kedairona.000webhostapp.com/api/cms/pengambilan/' . $id)->getData();
        //  dd($pengambilan);
        return view('pages.Administrator.Pengambilan.edit', compact('pengambilan'));
    }

    public function update(Request $request, $id)
    {
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        // dd($gateway);

        $storePengambilan = $gateway->post('https://kedairona.000webhostapp.com/api/cms/pengambilan/update/' . $id, [
            "inventori_id" => $request->get('inventori_id'), 
            "jumlah" => $request->get('jumlah'),
            "keterangan" => $request->get('keterangan'),
            "tanggal" => $request->get('tanggal'),
        ])->getData();
        // dd($storePengambilan);
        return redirect('/pengambilan')->with('success', 'Data Berhasil Di Tambahkan');
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

        return view('pages.Administrator.Pengambilan.create')->with('inventory', $data);
    }
    public function store(Request $request)
    {
    //     $validate = $request->validate([
    //         'inventori_id' => 'required|integer|exists:inventories,id',
    //         'jumlah' => 'required|integer|min:1',
    //         'keterangan' => 'nullable|string',
    //     ]);

        $this->validate($request, [
            'inventori_id' => '',
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
            "tanggal" => $request->get('tanggal'),
            
        ])->getData();

        return redirect('/pengambilan')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function delete($id)
    {
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        $deletePengambilan = $gateway->post('https://kedairona.000webhostapp.com/api/cms/pengambilan/delete/' . $id);

        return redirect('/pengambilan')->with('success', 'inventori Deleted');

        // dd($deletePengambilan);
    }

}




