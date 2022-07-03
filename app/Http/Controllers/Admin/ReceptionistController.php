<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Hash;
use Validator;

use App\Models\User;

class ReceptionistController extends Controller
{
    public function index()
    {
        $data['title']  =   'Data Resepsionis';

        if(request()->ajax()) {
            return datatables()->of(User::where('id', '!=', Auth::user()->id)->orderBy('created_at', 'desc')->get())
                ->addColumn('action', function($data) {
                    $button =   '<button type="button" id="'.$data->id.'" class="btnEdit btn btn-success" title="Edit Resepsionis"><i class="fas fa-pencil-alt"></i></button>';
                    $button .=  '<button type="button" id="'.$data->id.'" class="btnReset btn btn-warning mx-2" title="Reset Password"><i class="fas fa-undo"></i></button>';
                    $button .=  '<button type="button" id="'.$data->id.'" class="btnDelete btn btn-danger" title="Hapus Resepsionis"><i class="fas fa-trash"></i></button>';

                    return $button;
                })->editColumn('status', function($user) {
                    return $user->status == TRUE ? '<label class="font-weight-bold text-primary">AKTIF</label>' : '<label class="font-weight-bold text-danger">NONAKTIF</label>';
                })->editColumn('gender', function($user) {
                    return $user->gender == 'L' ? 'Laki-Laki' : 'Perempuan';
                })
                ->rawColumns(['action', 'status', 'gender'])->addIndexColumn()->make(true);
        }

        return view('admin.resepsionis.index', $data);
    }

    public function store(Request $request)
    {
        $fullname   =   ucwords(strtolower($request->fullname));
        $username   =   strtolower($request->username);

        $validate   =   Validator::make($request->all(), [
                            'fullname'  =>  'required|max:255|regex:/^[a-zA-Z ]*$/',
                            'gender'    =>  'required|in:L,P',
                            'username'  =>  'required|min:5|max:10|regex:/^[a-zA-Z0-9]*$/|unique:users,username',
                            'status'    =>  'required|in:0,1',
                        ],
                        [
                            'fullname.required' =>  'Nama Lengkap wajib diisi',
                            'fullname.max'      =>  'Nama Lengkap maksimal 255 karakter',
                            'fullname.regex'    =>  'Nama Lengkap hanya boleh huruf dan spasi',
                            'gender.required'   =>  'Jenis Kelamin wajib dipilih',
                            'gender.in'         =>  'Jenis Kelamin tidak valid',
                            'username.required' =>  'Username wajib diisi',
                            'username.min'      =>  'Username minimal 5 karakter',
                            'username.max'      =>  'Username maksimal 10 karakter',
                            'username.regex'    =>  'Username hanya boleh huruf dan angka',
                            'username.unique'   =>  'Username sudah digunakan',
                            'status.required'   =>  'Status wajib dipilih',
                            'status.in'         =>  'Status tidak valid',
                        ]);

        if($validate->fails()) {
            return response()->json(['errors' => $validate->errors()]);
        }

        $receptionist           =   new User;
        $receptionist->fullname =   $fullname;
        $receptionist->gender   =   $request->gender;
        $receptionist->username =   $username;
        $receptionist->password =   Hash::make($username);
        $receptionist->status   =   $request->status;
        $receptionist->save();

        return response()->json(['success' => 'Resepsionis Berhasil Disimpan']);
    }

    public function edit($id)
    {
        $receptionist   =   User::findOrFail($id);

        return response()->json(['data' => $receptionist]);
    }

    public function update(Request $request)
    {
        $fullname   =   ucwords(strtolower($request->fullname));
        $username   =   strtolower($request->username);

        $validate   =   Validator::make($request->all(), [
                            'fullname'  =>  'required|max:255|regex:/^[a-zA-Z ]*$/',
                            'gender'    =>  'required|in:L,P',
                            'username'  =>  'required|min:5|max:10|regex:/^[a-zA-Z0-9]*$/|unique:users,username,' . $request->receptionist_id,
                            'status'    =>  'required|in:0,1',
                        ],
                        [
                            'fullname.required' =>  'Nama Lengkap wajib diisi',
                            'fullname.max'      =>  'Nama Lengkap maksimal 255 karakter',
                            'fullname.regex'    =>  'Nama Lengkap hanya boleh huruf dan spasi',
                            'gender.required'   =>  'Jenis Kelamin wajib dipilih',
                            'gender.in'         =>  'Jenis Kelamin tidak valid',
                            'username.required' =>  'Username wajib diisi',
                            'username.min'      =>  'Username minimal 5 karakter',
                            'username.max'      =>  'Username maksimal 10 karakter',
                            'username.regex'    =>  'Username hanya boleh huruf dan angka',
                            'username.unique'   =>  'Username sudah digunakan',
                            'status.required'   =>  'Status wajib dipilih',
                            'status.in'         =>  'Status tidak valid',
                        ]);

        if($validate->fails()) {
            return response()->json(['errors' => $validate->errors()]);
        }

        $receptionist   =   array(
                                'fullname'  =>  $fullname,
                                'gender'    =>  $request->gender,
                                'username'  =>  $username,
                                'status'    =>  $request->status,
                            );

        User::whereId($request->receptionist_id)->update($receptionist);

        return response()->json(['success' => 'Resepsionis Berhasil Diupdate']);
    }

    public function destroy($id)
    {
        $receptionist   =   User::where('id', '!=', Auth::user()->id)->findOrFail($id);
        $receptionist->delete();

        return response()->json(['success' => 'Resepsionis Berhasil Dihapus']);
    }

    public function reset($id)
    {
        $receptionist   =   User::findOrFail($id);
        $data           =   array(
                                'password'  =>  Hash::make($receptionist->username)
                            );

        User::whereId($id)->update($data);

        return response()->json(['success' => 'Password Berhasil Direset']);
    }
}
