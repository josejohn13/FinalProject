<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\member;
use Redirect;
use Session;
use Crypt;
use DB;

class loginController extends Controller
{
    public function __construct(member $model)
    {
    	$this->model = $model;
    }
    public function main()
    {
        return view("layout.frontlayout");
    }
    public function index()
    {
        return view("member.login");
    }
    public function submit()
    {
        $data = $this->model->where("customer_name",request("username"))->first(); 

        if($data){
            if(request("password") == Crypt::decrypt($data->customer_password)){
                session()->put('user_id', $data->id);
                if($data->customer_type  == "member"){
                    $return["message"] = "Success Login.";
                    $return["status"]  = "success";
                    $return["url"]     = "/member/dashboard";
                    return $return;
                    return redirect("/member/dashboard");
                }else{
                    $return["message"] = "Success Login.";
                    $return["status"]  = "success";
                    $return["url"]     = "/admin/dashboard";
                    return $return;
                    // return redirect("/admin/dashboard");
                }
            }else{
                $return["message"] = "Password Invalid!";
                $return["status"]  = "error";
                return $return;
            }
            
        }else{
            $return["message"] = "Sorry invalid account!";
            $return["status"]  = "error";
            return $return;
        }
        dd($return);
        // return view("member.login");
    }
}