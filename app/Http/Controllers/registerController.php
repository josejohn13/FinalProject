<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\crud;
use App\member;
use Redirect;
use Crypt;
class registerController extends Controller
{
    protected $model;

    public function __construct(member $model)
    {
    	$this->model = $model;
    }
    public function index()
    {
        return view("member.register");
    }

    public function store(Request $request)
    {
        if($request->customer_password != $request->customer_password_repeat){
            $data["message"] = "Password did not match.";
            $data["status"] = 300;
        }else{
            $this->model = $this->model->create([
                'customer_name'         =>  $request->customer_name,
                'customer_username'     =>  $request->customer_username,
                'customer_password'     =>  Crypt::encrypt($request->customer_password),
                'customer_no'           =>  $request->customer_no,
                'customer_address'      =>  $request->customer_address,
                'customer_type'         =>  "member",
                ]
            );
            $data["message"] = "Successfully created.";
            $data["status"] = 200;
        }
        return redirect("/");
    }
}