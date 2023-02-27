<?php

namespace App\Http\Controllers;

use App\Services\Gateway;
use Illuminate\Http\Request;
use \Yajra\DataTables\DataTables;

class UserController extends Controller
{

    public function index()
    {
        return view('pages.Administrator.pengambilan.index');
    }

    public function create(Request $request)
    {
        $gateway = new Gateway();
        $data = $gateway->get('/api/cms/manage', [
            'page' => 1,
            'per_page' => 999,
            'limit' => 999,
        ])->getData()->data;
        return view('pages.Administrator.pengambilan.create')->with('roles', $data);
    }

    public function store(request $request)
    {
        // dd($request->all());
        // $data = user::create ($request->all());
        // if($request->hasFile('avatar')){
        //     $request->file('avatar')->move('img/', $request-> file('foto')->getClientOriginalName());
        //     $data->foto = $request->file('avatar')->getClientOriginalName();
        //     $data->save();
        // }
        $this->validate($request, [
            'id_inventori' => 'numeric|min:6|max:30',
            'jumlah' => '',
            'keterangan' => '',
        ]);

        // // $path =$request->file('avatar')->store('public/images');
        // $file = $request->file('avatar');
        // //mengambil nama file
        // $nama_file = asset('img/avatars') . '/' . $file->getClientOriginalName();

        // //memindahkan file ke folder tujuan
        // $file->move('img/avatars', $file->getClientOriginalName());
        // // $user = new User;
        // // $user->save();

        $gateway = new Gateway();
        return redirect('/pengambilan')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function edit($id)
    {

        $gateway = new Gateway();
        $user = $gateway->get('/api/cms/manage/pengambilan/' . $id)->getData()->data;
        $roles = $gateway->get('/api/cms/manage/role', [
            'page' => 1,
            'per_page' => 999,
            'limit' => 999,
        ])->getData()->data;
        return view('pages.Administrator.pengambilan.edit', compact('pengambilan', 'pengambilan'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $gateway = new Gateway();
        $storeRole = $gateway->put('/api/cms/manage/pengambilan/' . $id, [
            "pengambilan" => $request->get('pengambilan'),
        ])->getData();
        dd($storeRole);
        if ($storeRole->success) {
            return redirect('/pengambilan')->with('success', 'Data Berhasil Di Tambahkan');
        } else {
            return redirect('/pengambilan')->with('error', 'Data Gagal Di Tambahkan');
        }
    }

    public function delete($id)
    {
        $gateway = new Gateway();

        $deleteRole = $gateway->delete('/api/cms/manage/pengambilan/' . $id);
        if (!$deleteRole->getData()->success) {
            return redirect('/pengambilan')->with('error', $deleteRole->getData()->message);
        }
        return redirect('/pengambilan')->with('success', 'Admin Deleted');
    }

    public function fnGetData(Request $request)
    {
        $gateway = new Gateway();

        $page = $request->input('start') / $request->input('length') + 1;
        $data = $gateway->get('/api/cms/manage/pengambilan', [
            'page' => $page,
            'per_page' => $request->input('length'),
            'limit' => $request->input('length'),
            'keyword' => $request->input('search')['value'],
            'sort_by' => $request->input('columns')[$request->input('order')[0]['column']]['name'],
            'sort' => $request->input('order')[0]['dir'],
        ])->getData()->data;;

        return DataTables::of($data->items)
            ->skipPaging()
            ->setTotalRecords($data->total)
            ->setFilteredRecords($data->total)
            ->addColumn('avatar', function ($data) {
                return '<img src="' . $data->avatar . '" class="img-circle" alt="User Image" style="width:50px">';
            })
            ->addColumn('action', function ($data) {
                $btn = '<a class="btn btn-default" href="admin/' . $data->userId . '">Edit</a>';
                $btn .= ' <button class="btn btn-danger btn-xs btnDelete" style="padding: 5px 6px;" onclick="fnDelete(this,' . $data->userId . ')">Delete</button>';
                return $btn;
            });
    }
}
