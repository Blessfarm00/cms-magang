<?php

namespace App\Http\Controllers;

use App\Services\Gateway;
use Illuminate\Http\Request;
use \Yajra\DataTables\DataTables;
use Auth;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use Dompdf\Dompdf;
use Dompdf\Options;

class AbsensiController extends Controller
{

    public function index(){
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        // dd($gateway);

        $response = $gateway->get('https://kedairona.000webhostapp.com/api/cms/absensi');
        $body = $response->getData()->data;
        // dd($body);
        return view('pages.Administrator.Absensi.index',  ['absensis'=>$body]);
    }

    public function delete($id)
    {
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        $deleteAbsensi = $gateway->post('https://kedairona.000webhostapp.com/api/cms/absensi/delete/' . $id);

        return redirect('/absensi')->with('success', 'inventori Deleted');
    }

    public function cetak()
    {
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);

        // Ambil data dari API
        $data = $gateway->get('https://kedairona.000webhostapp.com/api/cms/absensi', [
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
        $html = view('Pages.Administrator.Absensi.Cetak')->with('absensis', $data);

        // Konversi view menjadi PDF
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Kirim PDF ke browser untuk di-download
        return $dompdf->stream('Absensi.pdf');
    }
}