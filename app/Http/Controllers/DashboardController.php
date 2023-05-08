<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Services\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Session;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    
    public function index()
{
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);

        $inventory = $gateway->get('https://kedairona.000webhostapp.com/api/cms/inventory', [
            'page' => 1,
            'per_page' => 999,
            'limit' => 999,
        ])->getData();

        $pengambilan = $gateway->get('https://kedairona.000webhostapp.com/api/cms/pengambilan', [
            'page' => 1,
            'per_page' => 999,
            'limit' => 999,
        ])->getData()->data;

        
            // dd($pengambilan);
        $pengeluaran = $gateway->get('https://kedairona.000webhostapp.com/api/cms/pengeluaran', [
            'page' => 1,
            'per_page' => 999,
            'limit' => 999,
        ])->getData()->data;

        // dd($pengeluaran);
        
        $users = $gateway->get('https://kedairona.000webhostapp.com/api/cms/listUser');
        $body = $users->getData()->data;

        $pengambilan->items = DB::table('pengambilan_barangs')
        ->latest()
        ->take(5)
        ->get();

        $pengeluaran->items = DB::table('pengeluarans')
        ->latest()
        ->take(5)
        ->get();

        $inventories= DB::table('inventories')->count();
        $pengambilan_barangs= DB::table('pengambilan_barangs')->count();
        $pengeluarans = $this->getTotalPengeluaran();

        return view('pages.dashboard', compact('pengambilan_barangs', 'inventories', 'pengeluarans','users','pengambilan','pengeluaran'));
}

    public function getTotalPengeluaran()
    {
        $pengeluarans = DB::table('pengeluarans')->sum('pengeluaran');
        return $pengeluarans;
    }






}
