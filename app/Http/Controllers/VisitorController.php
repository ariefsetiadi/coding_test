<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use File;
use Validator;

use App\Models\Visitor;

class VisitorController extends Controller
{
    public function index()
    {
        $data['title']  =   'Selamat Datang';

        return view('visitor.index', $data);
    }

    public function postCheckIn(Request $request)
    {
        $fullname   =   ucwords(strtolower($request->fullname));
        $email      =   strtolower($request->email);
        $meet       =   ucwords(strtolower($request->meet_with));

        $validate   =   Validator::make($request->all(), [
                            'id_card'       =>  'required|in:KTP,SIM',
                            'id_number'     =>  'required|digits_between:12,16',
                            'fullname'      =>  'required|max:255|regex:/^[a-zA-Z ]*$/',
                            'gender'        =>  'required|in:L,P',
                            'date_of_birth' =>  'required|date',
                            'email'         =>  'required|email',
                            'phone'         =>  'required|digits_between:10,13',
                            'address'       =>  'required',
                            'image'         =>  'required|max:10240',
                            'image.*'       =>  'mimes:jpg,jpeg,png',
                            'meet_with'     =>  'required|max:255|regex:/^[a-zA-Z ]*$/',
                            'concern'       =>  'required',
                        ],
                        [
                            'id_card.required'          =>  'Tanda Pengenal wajib dipilih',
                            'id_card.in'                =>  'Tanda Pengenal tidak valid',
                            'id_number.required'        =>  'Nomor Tanda Pengenal wajib diisi',
                            'id_number.digits_between'  =>  'Nomor Tanda Pengenal minimal 12 angka, maksimal 16 angka',
                            'fullname.required'         =>  'Nama Lengkap wajib diisi',
                            'fullname.max'              =>  'Nama Lengkap maksimal 255 karakter',
                            'fullname.regex'            =>  'Nama Lengkap hanya boleh huruf dan spasi',
                            'gender.required'           =>  'Jenis Kelamin wajib dipilih',
                            'gender.in'                 =>  'Jenis Kelamin tidak valid',
                            'date_of_birth.required'    =>  'Tanggal Lahir wajib diisi',
                            'date_of_birth.date'        =>  'Tanggal Lahir tidak valid',
                            'email.required'            =>  'Email wajib diisi',
                            'email.email'               =>  'Email tidak valid',
                            'phone.required'            =>  'Telepon wajib diisi',
                            'phone.digits_between'      =>  'Telepon minimal 10 angka, maksimal 13 angka',
                            'address.required'          =>  'Alamat Lengkap wajib diisi',
                            'image.required'            =>  'Foto wajib diupload',
                            'image.max'                 =>  'Foto maksimal 10 MB',
                            'image.mimes'               =>  'Foto wajib JPG, JPEG, atau PNG',
                            'meet_with.required'        =>  'Bertemu Dengan wajib diisi',
                            'meet_with.max'             =>  'Bertemu Dengan maksimal 255 karakter',
                            'meet_with.regex'           =>  'Bertemu Dengan hanya boleh huruf dan spasi',
                            'concern.required'          =>  'Perihal wajib diisi',
                        ]);

        if($validate->fails()) {
            return response()->json(['errors' => $validate->errors()]);
        }
    }
}
