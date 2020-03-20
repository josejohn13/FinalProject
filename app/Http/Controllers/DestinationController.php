<?php

namespace App\Http\Controllers;

use App\destination;
use Redirect;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    protected $model;

    public function __construct(destination $model)
    {
    	$this->model = $model;
    }
    public function index()
    {
        $data["item"]   = $this->model->get();
        return view("admin.destination.destinationList",$data);
    }
    public function get_create()
    {
        return view("admin.destination.createDestination");
    }

    public function store(Request $request)
    {
        $this->model = $this->model->create([
            'destination_name'             =>  $request->destination_name,
            'destination_description'      =>  $request->destination_description,
            ]
        );
        $data["message"] = "Successfully created.";
        $data["status"] = 200;
        return Redirect::to('admin/destination/list');
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
            'destination_date'             =>  $request->destination_date,
            'destination_type'             =>  $request->destination_type,
            'destination_description'      =>  $request->destination_description,
        ]);
        $this->model->save();
        $data["message"] = "Successfully updated.";
        $data["status"] = 200;

        return Redirect::to('admin/destination/list');
    }
}
