<?php

namespace App\Http\Controllers\restApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company_registration;
use App\Mail\sendEmail;


class company extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $data;
    public $encrypt_pass;
    public function index()
    {
        //
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
    public $email;
    public $erp_url;
    public $pass;

    public function store(Request $request)
    {
        // echo 'testing';
        // print_r($request->all());
        $this->data = $request->all();

        
        $this->email = $this->data['company_email'];
        $this->erp_url = $this->data['erp_url'];
        $this->pass = $this->data['password'];
        

        \Mail::to($this->email)->send(new sendEmail(
            array(   
                'subject' => "your emal and password is now ready",       
                'erp_url' => $this->erp_url,
                'pass' => $this->pass
            )
        ));



        $this->encrypt_pass = array('password' => bcrypt($this->data['password']));
        $this->data = array_replace($this->data, $this->encrypt_pass);

        
        


        
        Company_registration::create( $this->data);
         return  response()->view('congratulations',array("notice"=>"We Have Send Your Url And Password To Your Email !"))->header("Content-Type","text/html")->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $this->data = Company_registration::where("company_name",$id)->get();
         if(count($this->data) != 0){
            return response(array("notice"=>"Data is found !"),200)->header("Content-Type","application/json");
         }
         else{
            return response(array("notice"=>"Data is not found !"),404)->header("Content-Type","application/json");
         }
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
