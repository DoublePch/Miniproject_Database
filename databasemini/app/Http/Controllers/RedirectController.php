<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\car;
use Carbon\Carbon;

class RedirectController extends Controller
{
    //
    public function index(){
        $car = car::all();
        $role = Auth::user()->role;
       
        if($role == '1'){
            return view('page.admin.redirect',compact('car'));
        }
        else{
            return view('page.user.redirect');
        }
    }



}
