<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\member;
use App\booking;
use App\destination;
use Session;
use Redirect;
use DB;

class MemberController extends Controller
{
    protected $model;
    public function __construct(booking $model)
    {
    	$this->model = $model;
    }

    public function index()
    {
        $return["member"] = member::where("id",session()->get('user_id'))->first();
        $return["book"] = booking::where("destination_id","!=",null)->with("destination.destination")->get();
        // dd($return["book"]);
        return view("member.dashboard",$return);
    }

    public function get_destination()
    {
        return booking::where("destination_id","!=",null)->with("destination.destination")->get();
    }

    public function book_now()
    {
        $return["status"] = "error";
        $return["message"] = "Error";

        $this->model = $this->model->find(request("id"));
        if($this->model && session()->get('user_id')){

            $update["member_id"] = session()->get('user_id');
            DB::table("bookings")->where("id",request("id"))->update($update);

            $return["status"] = "success";
            $return["message"] = "Success.";
        }
        return $return; 
    }
}
