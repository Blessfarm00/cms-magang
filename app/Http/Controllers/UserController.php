<?php

namespace App\Http\Controllers;

use App\Services\Gateway;
use Illuminate\Http\Request;
use \Yajra\DataTables\DataTables;
use Auth;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class UserController extends Controller
{

    public function index(){
        $client = new Client();
        $response = $client->request('GET','https://api-rona-coffe.000webhostapp.com/api/inventory');
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();
        $inventoris = json_decode($body, true);
        // dd($inventoris);

        return view('pages.Administrator.Inventori.index',  ['inventoris'=>$inventoris]);
    }

}
