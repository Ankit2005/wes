<?php

namespace App\Http\Controllers\restApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jobrole;
$store_data;
$get_all_data;
class jobroleApi extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request['type'] == 'jobrole'){
            $this->get_all_data = Jobrole::latest()->paginate(5);
            if(count($this->get_all_data) != 0){
                return response(array("response" => $this->get_all_data),200)->header("Content-Type","application/json");
            }else{
                return response(array("response" => "No Jobrole Found "),404)->header("Content-Type","application/json");
            }
        }
        else if($request['type'] == 'show-only-jobRole-adn-salary'){
            $this->get_all_data = Jobrole::get(['salary','job_role']);
            if(count($this->get_all_data) != 0){
                return response(array("response" => $this->get_all_data),200)->header("Content-Type","application/json");
            }else{
                return response(array("response" => "No Jobrole Found "),404)->header("Content-Type","application/json");
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->store_data = jobrole::create($request->all());
        // print_r($request->all());
        // exit;
        if($this->store_data){
            return response(array("response" => "Add New Role Successfully"),200)->header("Content-Type","application/json");
        }else{
            return response(array("response" => "Something Went Roang !"),400)->header("Content-Type","application/json");
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
        $this->get_all_data = jobrole::where("id", $id)->update(array(
            "job_role" => $request['job_role'],
            "qualification" => $request['qualification'],
            "certification" => $request['certification'],
            "experience" => $request['experience'],
            "salary" => $request['salary'],
            "team_name" => $request['team_name']
        ));

        if($this->get_all_data){
            return response(array("response" => "Update Role Successfully"),200)->header("Content-Type","application/json");
        }else{
            return response(array("response" => "Update Failed "),400)->header("Content-Type","application/json");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$post = jobrole::find($id);
        $post = jobrole::where("id",$id)->delete();

        // $this->get_all_data = jobrole::where("id", $id)->update(array(
        //     "job_role" => $request['job_role'],
        //     "salary" => $request['salary'],
        //     "team_name" => $request['team_name']
        // ));

        return response(array("response" => "Delete Role Successfully"),200)->header("Content-Type","application/json");
        // if($this->post == 1){
        // }else{
        //     return response(array("response" => "Delete Failed "),400)->header("Content-Type","application/json");
        // }
    }
}
