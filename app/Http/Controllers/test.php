<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class test extends Controller
{

    public $all_data;
    public $user_file;
    public $file;
    public $filesize;
    public $filename;
    public $location;
    public $open_file;
    public $read_file;
    public $newfile;
    public $binary;
    public $starts_from;
    public function result(Request $data)
    {
        $this->file = $data->file('uploded_file');
    	$this->location = $this->file->getPathName();
        $this->filename = $this->file->getClientOriginalName();
        $this->filesize = filesize($this->location);

        if($this->filesize < 100)
        {
           $this->file->storeAs("public",$this->filename);
        }

        else{
            $this->open_file = fopen($this->location,"rb");

            $this->newfile = fopen($this->filename,"w");

            $this->starts_from = 0;

            echo "<h1 id='chunks'></h1>";

            while($this->starts_from < $this->filesize)
            {
            $this->binary = fread($this->open_file,100);
            fwrite($this->newfile,$this->binary);

            $this->starts_from += strlen($this->binary);

            fseek($this->open_file,$this->starts_from);
            echo "<script>
            document.querySelector('#chunks').innerHTML = '".$this->starts_from."';
            </script>";
            }

            fclose($this->open_file);
            fclose($this->newfile);
            unlink($this->location);


    	}
    }
}
