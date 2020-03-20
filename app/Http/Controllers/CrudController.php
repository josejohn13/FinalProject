<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\crud;
use Redirect;

class CrudController extends Controller
{
    protected $model;

    public function __construct(crud $model)
    {
    	$this->model = $model;
    }
    public function index()
    {
        $data["item"]   = $this->model->get();
        $data["action"] = "/add";
       return view("crud", $data);
    }
    public function get_data(Request $request)
    {

        $data["item"]   = $this->model->find($request->id);
        $data["action"] = "/update";
        return $data;
    }
    public function store(Request $request)
    {
        $this->model = $this->model->create([
            'first_name'    =>  $request->first,
            'middle_name'   =>  $request->middle,
            'last_name'     =>  $request->last,
            ]
        );
        $data["message"] = "Successfully created.";
        $data["status"] = 200;
    
        return Redirect::to('/crud_index');
    }
    public function update(Request $request)
    {
        $this->model = $this->model->find($request->id);

        $this->model->fill([
            'first_name'    =>  $request->first,
            'middle_name'   =>  $request->middle,
            'last_name'     =>  $request->last,
        ]);
        $this->model->save();
        $data["message"] = "Successfully updated.";
        $data["status"] = 200;

        return Redirect::to('/crud_index');
    }

}
