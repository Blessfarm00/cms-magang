<?php

namespace App\Http\Controllers;
use App\Services\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class PemasukanController extends Controller
{
    public function index(){
        $client = new Client();
        $response = $client->request('GET','https://api-rona-coffe.000webhostapp.com/api/pemasukan');
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();
        $pemasukans = json_decode($body, true);
        // dd($pemasukans);

        return view('pages.Administrator.Pemasukan.index',  ['pemasukans'=>$pemasukans]);
    }
    public function create()
    {
        $client = new Client();
        $data = $client->post('https://api-rona-coffe.000webhostapp.com/api/pemasukan', [
            'page' => 1,
            'per_page' => 999,
            'limit' => 999,
        ])->getBody();
        return view('pages.Administrator.Pemasukan.create')->with('pemasukan', $data);
    }

    public function store(Request $request)
    {
        // $validate = $request->validate([
        //     'pemasukan' => 'required|max:255|min:3',
        // ]);

        // $this->validate($request, [
        //     'pemasukan' => 'required|numeric|max:255',
        // ]);

        $this->validate($request, [
            'pemasukan' => 'required|max:255|min:3',
        ]);


        $gateway = new Gateway();
        // dd($gateway);
        $pemasukan = $gateway->post('https://api-rona-coffe.000webhostapp.com/api/pemasukan', [
            "pemasukan" => $request->get('pemasukan'),
        ])->getData();

        return redirect('/pemasukan')->with('success', 'Data Berhasil Di Tambahkan');
    }

}