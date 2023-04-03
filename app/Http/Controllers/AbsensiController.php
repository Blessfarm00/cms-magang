<?php

namespace App\Http\Controllers;

use App\Services\Gateway;
use Illuminate\Http\Request;
use \Yajra\DataTables\DataTables;
use Auth;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

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
}