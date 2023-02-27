<?php

namespace App\Http\Controllers;

use App\Services\Gateway;
use Illuminate\Http\Request;
use \Yajra\DataTables\DataTables;

class UserController extends Controller
{

    public function index()
    {
        return view('pages.Administrator.pemasukan.index');
    }

    public function create(Request $request)
    {
        $gateway = new Gateway();
        $data = $gateway->get('/api/cms/manage', [
            'page' => 1,
            'per_page' => 999,
            'limit' => 999,
        ])->getData()->data;
        return view('pages.Administrator.pemasukan.create')->with('roles', $data);
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
            'pemasukan' => 'numeric|min:6|max:30',

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
        return redirect('/pemasukan')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function edit($id)
    {

        $gateway = new Gateway();
        $user = $gateway->get('/api/cms/manage/pemasukan/' . $id)->getData()->data;
        $roles = $gateway->get('/api/cms/manage/role', [
            'page' => 1,
            'per_page' => 999,
            'limit' => 999,
        ])->getData()->data;
        return view('pages.Administrator.User.edit', compact('roles', 'user'));

    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $gateway = new Gateway();
        $storeRole = $gateway->put('/api/cms/manage/pemasukan/' . $id, [
            "pemasukan" => $request->get('pemasukan'),
        ])->getData();
            dd($storeRole);
        if ($storeRole->success) {
            return redirect('/pemasukan')->with('success', 'Data Berhasil Di Tambahkan');
        } else {
            return redirect('/pemasukan')->with('error', 'Data Gagal Di Tambahkan');
        }

    }

    public function delete($id)
    {
        $gateway = new Gateway();

        $deleteRole = $gateway->delete('/api/cms/manage/pemasukan/' . $id);
        if (!$deleteRole->getData()->success) {
            return redirect('/pemasukan')->with('error', $deleteRole->getData()->message);
        }
        return redirect('/pemasukan')->with('success', 'Admin Deleted');
    }

    public function fnGetData(Request $request)
    {
        $gateway = new Gateway();

        $page = $request->input('start') / $request->input('length') + 1;
        $data = $gateway->get('/api/cms/manage/pemasukan', [
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
