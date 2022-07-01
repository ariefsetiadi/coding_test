<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $data['title']  =   'Home';

        return view('admin.home', $data);
    }
}
