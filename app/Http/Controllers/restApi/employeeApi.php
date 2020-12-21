<?php

namespace App\Http\Controllers\restApi;
require_once("../vendor/autoload.php");

use Aws\S3\S3Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employee;
class employeeApi extends Controller
{
    private $store_data;
    private $get_all_data;
    private $all_files;
    private $file;
    private $fileName;
    private $key;
    private $path;
    private $url;
    private $index_loop = 0;
    private $id;
    private $folderName;
    private $paginationData;
    private $searchLimit = 0;
    private $img_url;
    private $allEmpData = [];
    private $getAll_salary_sleep = [];
    private $empData;
    private $empSalarySleepUrl = [];
    private $SalarySleepPath = [];
    private $index = 0;


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $allUrl = array(
        "emp_img" => "",
        "residential_proof" => "",
        "qualification_proof" => "",
        "certification_proof" => "",
        "prev_salary_sleep" => []
    );
    public function index(Request $request)
    {

        //$this->get_all_data = Employee::orderBy("id", "desc")->paginate(3);
        $this->searchLimit = $request['limit'];
        $this->get_all_data = Employee::paginate($this->searchLimit);
        if($request['fetch_type'] == 'pagination'){
            if(count($this->get_all_data) != 0){
                $this->paginationData = $this->get_all_data;
               foreach($this->get_all_data as $this->empData){
                    // if(count($this->empSalarySleepUrl) == 4){
                    //     //$this->empSalarySleepUrl = '';
                    //     unset($this->empSalarySleepUrl);
                    // }
                    $this->key = $this->empData->emp_img;
                    $this->img_url = generatUrl::url($this->key);
                    $this->empData->emp_img = $this->img_url;
                    // echo empty(json_decode($this->empData->prev_salary_sleep));
                    // exit;
                    if(!empty(json_decode($this->empData->prev_salary_sleep)) == 1 ){
                        $this->getAll_salary_sleep = json_decode($this->empData->prev_salary_sleep);
                        foreach($this->getAll_salary_sleep as $this->getAll_salary_sleep){
                            array_push($this->empSalarySleepUrl, generatUrl::url($this->getAll_salary_sleep));
                        }
                        $this->empData['prev_salary_sleep'] = $this->empSalarySleepUrl;
                        $this->empSalarySleepUrl = array();
                    }
                    array_push($this->allEmpData, $this->empData);
                }
                 return response(array("response" => $this->allEmpData, "pagination" =>  $this->paginationData),200)->header("Content-Type","application/json");
            }else{
                return response(array("response" => "Data Not Found"),404)->header("Content-Type","application/json");
            }
        }else{
            echo "other type";
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
       $this->id = Employee::orderBy("id","desc")->limit(1)->get();

       if(count($this->id) != 0){
           foreach($this->id as $this->id){
            $this->id = $this->id->id + 1;
            // echo $this->id;
            // exit;
           }
       }else{
           $this->id = 1;
       }

        $this->store_data = $request->all();
        $this->all_files = $request->file();

        if($request->hasFile("prev_salary_sleep")){
            $index = 0;
            foreach($request->file("prev_salary_sleep") as $this->file){
                $this->fileName = strtolower($this->file->getClientOriginalName());
                $this->folderName = $this->id .". ".$this->store_data['emp_name'];
                $this->path = $this->file->storeAs("employees/".$this->folderName."_salarySleep",$this->fileName, "s3");
                //$this->url = "https://s3.ap-south-1.amazonaws.com/thirdeye.erp.in/".urlencode($this->path);
                $this->url = $this->path;
                $this->allUrl["prev_salary_sleep"][$index] = $this->url;
                $index++;
            }
            unset($this->all_files['prev_salary_sleep']);
        }

        foreach($this->all_files as $this->key => $this->file){
            $this->fileName = strtolower($this->file->getClientOriginalName());
            $this->folderName = $this->id .". ".$this->store_data['emp_name'];

            $this->path = $this->file->storeAs("employees/".$this->folderName,$this->fileName, "s3");
            $this->url = $this->path;
            $this->allUrl[$this->key] = $this->url;
        }

        $this->store_data['emp_img'] = $this->allUrl['emp_img'];
        $this->store_data['residential_proof'] = $this->allUrl['residential_proof'];
        $this->store_data['qualification_proof'] = $this->allUrl['qualification_proof'];
        $this->store_data['certification_proof'] = $this->allUrl['certification_proof'];

        if($request->file("prev_salary_sleep")){
            $this->store_data['prev_salary_sleep'] = json_encode($this->allUrl['prev_salary_sleep']);
        }

        $this->store_data = Employee::create($this->store_data);
        if($this->store_data){
            return response(array("response" => "Employee Data Save Successfully"),200)->header("Content-Type","application/json");
        }else{
            return response(array("response" => "Somethign Want Rong"),400)->header("Content-Type","application/json");
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

class generatUrl {
    private static $secured_access;
    private static $s3;
    private static $signed_url;
    private static $url;
    private static $key;

    public static function url($key){
        self::$key = $key;
        self::$s3 = new S3Client(array(
            "version" => "latest",
            "region"  => "ap-south-1",
            "credentials" => array(
                "key" => "AKIAUJ6LL7BHBXUQTHCN",
                "secret" => "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",
            ),
        ));

        self::$secured_access = self::$s3->getCommand('GetObject',array(
            "Bucket" => "thirdeye.erp.in",
            "Key"	=> self::$key
        ));

        self::$url = self::$s3->createPresignedRequest(self::$secured_access,"+5000 seconds");

        self::$signed_url = self::$url->getUri();

       return strval(self::$signed_url);
    }

}
