<?php

namespace App\Http\Controllers;

use App\Services\Gateway;
use Illuminate\Http\Request;
use \Yajra\DataTables\DataTables;

class UserController extends Controller
{

    public function index()
    {
        return view('pages.Administrator.Absensi.index');
    }

    public function create(Request $request)
    {
        $gateway = new Gateway();
        $data = $gateway->get('/api/cms/manage', [
            'page' => 1,
            'per_page' => 999,
            'limit' => 999,
        ])->getData()->data;
        return view('pages.Administrator.Absensi.create')->with('absen', $data);
    }

    public function store(request $request)
    {
        // dd($request->all());horihjdfiolkgkdflhjdk;ohj
        // $data = user::create ($request->all());
        // if($request->hasFile('avatar')){
        //     $request->file('avatar')->move('img/', $request-> file('foto')->getClientOriginalName());
        //     $data->foto = $request->file('avatar')->getClientOriginalName();
        //     $data->save();
        // }
        $this->validate($request, [ 
            'id_user' => 'required|unique:absensies|max:255|min:3',
            'tanggal' => 'date',
            'keterangan' => 'required',
        ]);

        // $path =$request->file('avatar')->store('public/images');
        // $file = $request->file('avatar');
        // //mengambil nama file
        // $nama_file = asset('img/avatars') . '/' . $file->getClientOriginalName();

        // //memindahkan file ke folder tujuan
        // $file->move('img/avatars', $file->getClientOriginalName());
        // // $user = new User;
        // // $user->save();

        $gateway = new Gateway();
        $storeRole = $gateway->post('/api/cms/manage/absensi', [
            "id_user" => $request->get('id_user'),
            "tanggal" => $request->get('tanggal'),
            "keterangan" => $request->get('keterangan'),
        ])->getData();
        dd($storeRole);
        return redirect('/admin')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function edit($id)
    {

        $gateway = new Gateway();
        $user = $gateway->get('/api/cms/manage/absensi/' . $id)->getData()->data;
        $absen = $gateway->get('/api/cms/manage/absensi', [
            'page' => 1,
            'per_page' => 999,
            'limit' => 999,
        ])->getData()->data;
        return view('pages.Administrator.Absensi.edit', compact('absen', 'absensi'));

    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        // $nama_file = '';
        // if ($request->file('avatar')) {
        //     $file = $request->file('avatar');
        //     //mengambil nama file
        //     $nama_file = asset('img/avatars') . '/' . $file->getClientOriginalName();

        //     //memindahkan file ke folder tujuan
        //     $file->move('img/avatars', $file->getClientOriginalName());
        // }

        // $password = '';
        // if ($request->password != null) {
        //     $password = $request->password;
        // }

        $gateway = new Gateway();
        $storeRole = $gateway->put('/api/cms/manage/absensi/' . $id, [
            "id_user" => $request->get('id_user'),
            "tanggal" => $request->get('tanggal'),
            "keterangan" => $request->get('keterangan'),
            // "avatar" => $nama_file,
            // "birthDate" => $request->get('birthdate'),
            // "password" => $password,
            // "roleId" => $request->get('roleId'),
        ])->getData();
            dd($storeRole);
        if ($storeRole->success) {
            return redirect('/goldlne')->with('success', 'Data Berhasil Di Tambahkan');
        } else {
            return redirect('/midlane')->with('error', 'Data Gagal Di Tambahkan');
        }

    }

    public function delete($id)
    {
        $gateway = new Gateway();

        $deleteRole = $gateway->delete('/api/cms/manage/user/' . $id);
        if (!$deleteRole->getData()->success) {
            return redirect('/role')->with('error', $deleteRole->getData()->message);
        }
        return redirect('/admin')->with('success', 'Admin Deleted');
    }

    public function fnGetData(Request $request)
    {
        $gateway = new Gateway();

        $page = $request->input('start') / $request->input('length') + 1;
        $data = $gateway->get('/api/cms/manage/user', [
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
            })
            ->rawColumns(['avatar', 'action'])
            ->make(true);
    }
}
