<?php

namespace App\Http\Controllers;

use App\Services\Gateway;
use Illuminate\Http\Request;
use \Yajra\DataTables\DataTables;

class UserController extends Controller
{

    public function index()
    {
        return view('pages.Administrator.User.index');
    }

    public function create(Request $request)
    {
        $gateway = new Gateway();
        $data = $gateway->get('/api/user', [
            'page' => 1,
            'per_page' => 999,
            'limit' => 999,
        ])->getData()->data;
        return view('pages.Administrator.User.create')->with('users', $data);
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
            'nama_user' => 'max:50',
            'email' => ' email|unique:users',
            'no_hp' => 'numeric',
            'password' => 'min:6',
            'password_confirmation' => 'same:password|min:6',
            'role' => 'max:50',
            'posisi' => 'max:50',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        // $path =$request->file('avatar')->store('public/images');
        $file = $request->file('avatar');
        //mengambil nama file
        $nama_file = asset('images/avatars') . '/' . $file->getClientOriginalName();

        //memindahkan file ke folder tujuan
        $file->move('images/avatars', $file->getClientOriginalName());
        // $user = new User;
        // $user->save();

        $gateway = new Gateway();
        $storeRole = $gateway->post('/api/cms/manage/user', [
            'nama_user' => 'max:50',
            'email' => ' email|unique:users',
            'no_hp' => 'numeric',
            'password' => 'min:6',
            'password_confirmation' => 'same:password|min:6',
            'role' => 'max:50',
            'posisi' => 'max:50',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ])->getData();
        dd($storeRole);
        return redirect('/admin')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function edit($id)
    {

        $gateway = new Gateway();
        $user = $gateway->get('/api/cms/manage/user/' . $id)->getData()->data(
         [
            'page' => 1,
            'per_page' => 999,
            'limit' => 999,
        ])->getData()->data;
        return view('pages.Administrator.User.edit', compact('user'));

    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $nama_file = '';
        if ($request->file('avatar')) {
            $file = $request->file('avatar');
            //mengambil nama file
            $nama_file = asset('images/avatars') . '/' . $file->getClientOriginalName();

            //memindahkan file ke folder tujuan
            $file->move('images/avatars', $file->getClientOriginalName());
        }

        $password = '';
        if ($request->password != null) {
            $password = $request->password;
        }

        $gateway = new Gateway();
        $storeRole = $gateway->put('/api/cms/manage/user/' . $id, [
            "nama_user" => $request->get('nama_user'),
            "email" => $request->get('email'),
            "no_hp" => $request->get('no_hp'),
            "password" => $request->get('password'),
            "password_confirmation" => $request->get('password_confirmation'),
            "role" => $request->get('role'),
            "posisi" => $request->get('posisi'),
            "avatar" => $nama_file,
        ])->getData();
            dd($storeRole);
        if ($storeRole->success) {
            return redirect('/admin')->with('success', 'Data Berhasil Di Tambahkan');
        } else {
            return redirect('/admin')->with('error', 'Data Gagal Di Tambahkan');
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
