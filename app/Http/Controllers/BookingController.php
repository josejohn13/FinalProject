<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\booking;
use App\destination;
use Redirect;

class BookingController extends Controller
{
    
    protected $model;

    public function __construct(booking $model)
    {
    	$this->model = $model;
    }
    public function index()
    {
        $data["item"]   = booking::with("destination.destination","member.member","payment.payment")->get();
        return view("admin.book.bookingList",$data);
    }
    public function get_destination()
    {
        $return["destination"] = destination::get();
        // dd($return["destination"]);
        return $return;
    }

    public function store(Request $request)
    {
        $this->model = $this->model->create([
            'book_date'             =>  $request->book_date,
            'book_type'             =>  $request->book_type,
            'book_description'      =>  $request->book_description,
            'destination_id'        =>  $request->destination,
            ]
        );
        $data["message"] = "Successfully created.";
        $data["status"] = 200;
        return Redirect::to('admin/booking/list');
    }
    public function get_data(Request $request)
    {
        $data["item"]   = $this->model->find($request->id);
        return $data;
    }
    public function update(Request $request)
    {
        $this->model = $this->model->find($request->id);

        $this->model->fill([
            'book_date'             =>  $request->book_date,
            'book_type'             =>  $request->book_type,
            'book_description'      =>  $request->book_description,
            'destination_id'        =>  $request->destination,
        ]);
        $this->model->save();
        $data["message"] = "Successfully updated.";
        $data["status"] = 200;

        return Redirect::to('admin/booking/list');
    }

}
