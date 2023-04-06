<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Services\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Session;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;





class InventoriController extends Controller
{
        public function index()
    {
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        // dd($gateway);

        $response = $gateway->get('https://kedairona.000webhostapp.com/api/cms/inventory');
        $body = $response->getData()->data;
        // dd($body);
        // $inventoris = json_decode($body, true);
        // dd($inventoris);

        return view('pages.Administrator.Inventori.index',  ['inventoris' => $body]);
    }

    public function cetak()
    {
    $gateway = new Gateway();
    $gateway->setHeaders([
        'Authorization' => 'Bearer ' . Session::get('auth')->token,
        'Accept' => 'application/json',
    ]);

    // Ambil data dari API
    $data = $gateway->get('https://kedairona.000webhostapp.com/api/cms/inventory', [
        'page' => 1,
        'per_page' => 999,
        'limit' => 999,
    ])->getData()->data;

    // Buat objek options dan set default font
    $options = new Options();
    $options->set('defaultFont', 'Arial');

    // Buat objek dompdf dan set options
    $dompdf = new Dompdf($options);

    // Render view dengan data dan simpan dalam variabel html
    $html = view('Pages.Administrator.Inventori.Cetak')->with('inventoris', $data);

    // Konversi view menjadi PDF
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();

    // Kirim PDF ke browser untuk di-download
    return $dompdf->stream('Inventori.pdf');
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
        return view('pages.Administrator.Inventori.create')->with('inventoris', $data);
        
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
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        $store = $gateway->post('https://kedairona.000webhostapp.com/api/cms/inventory', [
            "kd_barang" => $request->get('kd_barang'),
            "nama_barang" => $request->get('nama_barang'),
            "stok" => $request->get('stok'),
            "harga" => $request->get('harga'),
            "satuan" => $request->get('satuan'),
        ])->getData();

        return redirect('/inventori')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function edit($id)
    {
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        $inventori = $gateway->get('https://kedairona.000webhostapp.com/api/cms/inventory/' . $id)->getData();
        // dd($inventori);
        return view('pages.Administrator.Inventori.edit', compact('inventori'));
    }

    public function update(Request $request, $id)
    {
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        $store = $gateway->post('https://kedairona.000webhostapp.com/api/cms/inventory/update/' . $id, [
            "kd_barang" => $request->get('kd_barang'),
            "nama_barang" => $request->get('nama_barang'),
            "stok" => $request->get('stok'),
            "harga" => $request->get('harga'),
            "satuan" => $request->get('satuan'),
        ])->getData();
        return redirect('/inventori')->with('success', 'Data Berhasil Di Tambahkan');
    }


    public function delete($id)
    {
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        $deleteInventori = $gateway->post('https://kedairona.000webhostapp.com/api/cms/inventory/delete/' . $id);
  
        return redirect('/inventori')->with('success', 'inventori Deleted');
    }
 
}
    
