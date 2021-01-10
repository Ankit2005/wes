<?php

namespace App\Http\Controllers\restApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Physical_stock_group;
use Illuminate\Database\QueryException;
class physicalstockgroupApi extends Controller
{
    public $response;
    public $handleError;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->response = Physical_stock_group::get();
        if(count($this->response) != 0){
            return response(array("response" => $this->response),200)->header("Content-Type","application/json");
        }else{
            return response(array("response" => "Not Found"),404)->header("Content-Type","application/json");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // print_r($request);
        echo 'is done create';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            Physical_stock_group::create($request->all());
            return response(array("response" => "Group Created Successfully."),200)->header("Content-Type","application/json");

        }catch(QueryException $error){
            $this->handleError = $error->errorInfo[1];
            if($this->handleError == '1062'){
                return response(array("response" => "Category Name Is Already Exists"),409)->header("Content-Type","application/json");
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo 'is done show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
