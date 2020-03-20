<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\crud;
use Redirect;

class layoutController extends Controller
{
    public function index()
    {
        return view("layout.frontlayout");

    }
}