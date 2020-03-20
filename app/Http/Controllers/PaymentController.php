<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\payment;
use Redirect;

class PaymentController extends Controller
{
    protected $model;

    public function __construct(payment $model)
    {
    	$this->model = $model;
    }
    public function store(Request $request)
    {
        
        $this->model = $this->model->create([
            'payment_amount'        =>  $request->payment_amount,
            'payment_date'          =>  $request->payment_date,
            'payment_description'   =>  $request->payment_description,
            'member_id'             =>  $request->member_id,
            ]
        );
        $data["message"] = "Successfully created.";
        $data["status"] = 200;
        return Redirect::to('admin/booking/list');
    }
}
