<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\booking;
use Redirect;

class adminController extends Controller
{

    public function index()
    {
        return view("admin.admindashboard");
    }
}