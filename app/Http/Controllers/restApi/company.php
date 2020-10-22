<?php

namespace App\Http\Controllers\restApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company_registration;
use App\Mail\sendEmail;
use Illuminate\Support\Facades\Storage;


class company extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $data;
    public $encrypt_pass;
    public $query;
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
    public $file_data;
    public $file_name;
    public $file_path;
    public $mime;
    public $all_data;
    public $client_mac_address;

    public function store(Request $request)
    {
        $this->data = $request->all();
        // $this->file_data = $request->file('cmp_logo');

        // $this->file_name = $this->file_data->getClientOriginalName();
        // $this->file_path = $this->file_data->getPathName();
        // $this->mime = $this->file_data->getMimeType();


        // $document->getPathName();
        // $document->getClientOriginalName();
        // $document->getClientOriginalExtension();
        // $document->getSize();
        // $document->getMimeType();

        // print_r($this->file_data);
        // $this->file_name = $this->data['company_name'].'_logo.png';
        // $this->file_data->storeAs('public', $this->file_name);

        $this->email = $this->data['company_email'];
        $this->erp_url = $this->data['erp_url'];
        $this->pass =  $this->data['password'];


        // os9cAdM4
        \Mail::to($this->email)->send(new sendEmail(
            array(
                'subject' => "your emal and password is now ready",
                'erp_url' => $this->erp_url,
                'pass' => $this->pass,
                'file_name' => $this->file_name,
                'file_path' => $this->file_path,
                'mime' => $this->mime
            )
        ));

        // $this->encrypt_pass = array('password' => md5($this->data['password']));

        $this->encrypt_pass = array('password' => '12345');
        $this->data = array_replace($this->data, $this->encrypt_pass);

        // print_r($this->data);

        // exit;

         Company_registration::create($this->data);
        //  return  response()->view('congratulations',array("notice"=>"We Have Send Your Url And Password To Your Email !"))->header("Content-Type","text/html")->setStatusCode(201);

        // Ram Memory Release Code
        unset($_POST);
        unset($request);
        unset($data);
        unset($email);
        unset($erp_url);
        unset($pass);
        unset($file_data);
        unset($file_name);
        unset($file_path);
        unset($mime);
        return redirect('/congratulations');
        exit;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($query_data, Request $request)
    {
        $this->client_mac_address = new getMacAddress();
        $this->client_mac_address = $this->client_mac_address->macAddress();

      $this->query = json_decode(base64_decode($query_data));

        // company slug validations code
        if($this->query->query == 'erp'){
            $this->data = Company_registration::where('company_slug', $this->query->string)->get();
            if(count($this->data) != 0){
                if($request->ajax()){
                    return response(array("notice"=>"Data is found !"),200)->header("Content-Type","application/json");

                    // Ram Memory Release Code
                    unset($data);
                    unset($client_mac_address);
                }
                else{
                    session()->flash('auth', $this->query->string);
                    // find not registered admin
                    foreach ($this->data as $this->all_data) {
                        if(empty($this->all_data->admin_mac_address)){
                            session()->flash('mac_authentication', 'NotRegistered');
                        }else{
                            if($this->all_data->admin_mac_address == $this->client_mac_address){
                                session()->flash('mac_authentication', 'admin');
                            }else{
                                session()->flash('mac_authentication', 'employee');
                            }
                        }
                    }
                    return response()->view('erp.authenticate')->header('Content-Type','text/html')->setStatusCode(200);
                    // Ram Memory Release Code
                    unset($_GET);
                    unset($query);
                    unset($client_mac_address);
                    unset($all_data);
                }
            }else{
                unset($_GET);
                unset($query);
                unset($client_mac_address);
                unset($all_data);
                return redirect('/404');
                exit;
                // return response(array("notice"=>"Data is not found !"),404)->header("Content-Type","application/json");
            }
        }

        // next validations
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $data)
    {
        $admin_data = base64_decode($data);
        $admin_data = json_decode($admin_data);

        if($admin_data->authorized == 'admin_registered'){

            $this->client_mac_address = new getMacAddress();
            $this->client_mac_address = $this->client_mac_address->macAddress();

            $this->data = Company_registration::where([
                ['company_slug', $admin_data->company_slug],
                ['establish_in', $admin_data->company_estd],
                ['password', '12345']
            ])->update(array(
                'admin_mac_address' => $this->client_mac_address
            ));

            if($this->data){
                session()->put('admin_resignation', 'registered');
            }else{
                session()->put('admin_resignation', 'not registered');
                return response(array('notice' => 'authentication failed !'),404)->header('Content-Type', 'application/json');
            }

             // Ram Memory Release Code
             unset($_POST);
             unset($admin_data);
             unset($client_mac_address);

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
        //
    }
}


// get client mac address code

class getMacAddress{

    function macAddress(){
        exec('ipconfig/all', $client_info);

        foreach ($client_info as $data) {
            if(preg_match('/Physical Address/i', $data)){
                $data = preg_replace("/\s+\./","",$data);
                $data = explode(":",$data);
                return $data[1];
                break;
            }
        }
    }
}
