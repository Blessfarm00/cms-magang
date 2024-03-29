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

    public function index(Request $request)
    {
        $search = $request->query('search');

        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        $response = $gateway->get('https://apirona.cepatpilih.com/api/cms/absensi');
        $body = $response->getData()->data;

        if (is_array($body)) {
            $absensis = $body;
        } else {
            $absensis = isset($body->items) ? $body->items : [];
        }

        if ($search) {
            $filteredBody = [];
            foreach ($absensis as $absensi) {
                if (stripos($absensi->user_id, $search) !== false) {
                    $filteredBody[] = $absensi;
                }
            }
            $absensis = $filteredBody;
        }

        return view('pages.Administrator.absensi.index', compact('absensis', 'search'));
    }

    public function cetak()
    {
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);

        // Ambil data dari API
        $data = $gateway->get('https://apirona.cepatpilih.com/api/cms/absensi', [
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

    public function delete($id)
    {
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        $deleteInventori = $gateway->post('https://apirona.cepatpilih.com/api/cms/absensi/delete/' . $id);

        return redirect('/absensi')->with('pesan_hapus', 'absensi Deleted');
    }
}