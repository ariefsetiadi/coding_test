<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use \Carbon\Carbon;

use App\Models\User;
use App\Models\Visitor;

class HomeController extends Controller
{
    public function index()
    {
        $data['title']  =   'Home';
        $data['total']  =   Visitor::count();
        $data['totalMonth'] =   Visitor::whereMonth('register_at', Carbon::now()->format('m'))->count();
        $data['totalDay']   =   Visitor::whereDay('register_at', Carbon::now()->format('d'))->count();

        return view('admin.home', $data);
    }
}
