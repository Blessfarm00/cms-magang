<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Services\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Session;
use Dompdf\Dompdf;
use Dompdf\Options;

class PengambilanController extends InventoriController
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        $response = $gateway->get('https://apirona.cepatpilih.com/api/cms/pengambilan');
        $body = $response->getData()->data;

        if (is_array($body)) {
            $pengambilans = $body;
        } else {
            $pengambilans = isset($body->items) ? $body->items : [];
        }

        if ($search) {
            $filteredBody = [];
            foreach ($pengambilans as $inventori) {
                if (stripos($inventori-> inventori_id , $search) !== false) {
                    $filteredBody[] = $inventori;
                }
            }
            $pengambilans = $filteredBody;
        }

        return view('pages.Administrator.Pengambilan.index', compact('pengambilans', 'search'));
    }


    public function edit($id)
    {
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        // dd($gateway);
        $pengambilan = $gateway->get('https://apirona.cepatpilih.com/api/cms/pengambilan/' . $id)->getData();
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

        $storePengambilan = $gateway->post('https://apirona.cepatpilih.com/api/cms/pengambilan/update/' . $id, [
            "inventori_id" => $request->get('inventori_id'), 
            "jumlah" => $request->get('jumlah'),
            "keterangan" => $request->get('keterangan'),
            "tanggal" => $request->get('tanggal'),
        ])->getData();
        // dd($storePengambilan);
        return redirect('/pengambilan')->with('pesan_edit', 'Data Berhasil Di Ubah');
    }

    public function cetak()
    {
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);

        // Ambil data dari API
        $data = $gateway->get('https://apirona.cepatpilih.com/api/cms/pengambilan', [
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
        $html = view('Pages.Administrator.Pengambilan.Cetak')->with('pengambilan_barangs', $data);

        // Konversi view menjadi PDF
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Kirim PDF ke browser untuk di-download
        return $dompdf->stream('Pengambilan.pdf');
    }

    public function create()
    {
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);

        $data = $gateway->get('https://apirona.cepatpilih.com/api/cms/inventory', [
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
        $pengambilan = $gateway->post('https://apirona.cepatpilih.com/api/cms/pengambilan', [
            
            "inventori_id" => $request->get('inventori_id'), 
            "jumlah" => $request->get('jumlah'),
            "keterangan" => $request->get('keterangan'),
            "tanggal" => $request->get('tanggal'),
            
        ])->getData();

        return redirect('/pengambilan')->with('pesan_tambah', 'Data Berhasil Di Tambahkan');
    }

    public function delete($id)
    {
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        $deletePengambilan = $gateway->post('https://apirona.cepatpilih.com/api/cms/pengambilan/delete/' . $id);

        return redirect('/pengambilan')->with('pesan_hapus', 'Data Berhasil Di Hapus');

        // dd($deletePengambilan);
    }

}




