<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bookingcar;
class bookingcarController extends Controller
{
    public function index(){
        $book = bookingcar::all();
        return view('page.admin.booking',compact('book'));
    }
}

