<?php

namespace App\Http\Controllers\restApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Team;
$response;


class teamApi extends Controller
{
    public $data;
    public $all_data;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        if($request['fetch_type'] == 'pagination'){
            // $this->response = Team::limit(4)->get();
            $this->response = Team::paginate(5);

            if(count($this->response) != 0){
                return response(array("all_team" => $this->response),200)->header("Content-Type","application/json");
            } else{
                return response(array("error" => "Team Not Found"),404)->header("Content-Type","application/json");
            }
        }

        // get all team for select-box add role

        if($request['fetch_type'] == 'select-box'){
            $this->response = Team::get(['team_name']);
            if(count($this->response) != 0){
                return response(array("all_team" =>  $this->response),200)->header("Content-Type","application/json");
            }else{
                return response(array("error" => "Team Not Fount for select box"),400)->header("Content-Type","application/json");
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
        $this->response = Team::create($request->all());

        if($this->response){
            return response(array("notice" => "Team Created Successfully ","data" => $this->response),200)->header("Content-Type","application/json");
        }
        else{
            return response(array("notice" => "Somethig Want Rong !" ),404)->header("Content-Type", "application/json");
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
        //
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
