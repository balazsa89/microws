<?php

class mws_client{

    public $service_url;
    public $endpoint;
    public $inputData;
    public $user;
    public $key;
    public $rawResult;

    public function do_request(){
        if($this->service_url != NULL and $this->service_url != NULL and $this->service_url != NULL){
            define('heof',"\r\n");
            try{
                $data = http_build_query(array("inpData" => mws_crypt::encrypt($this->inputData,$this->key)));
                $opts = array('http' =>
                    array(
                        'method'  => 'POST',
                        'header'  => 'Content-type: application/x-www-form-urlencoded' . heof 
                                    . "WPAUTH: ". $this->user. heof
                                    . "FUNC: " . $this->endpoint . heof,
                        'content' => $data
                    )
                );
                $context = stream_context_create($opts);
                $return = file_get_contents($this->service_url, false, $context);
                $this->rawResult = $return;
                if($return != false){
                    return mws_crypt::decrypt($return,$this->key);
                }
            }catch(Exception $e){
                if(debug){
                    var_dump($e);
                }
                die("mws_client: an error occured while try to post data to remote server.");
            }
        }else{
            die("mws_client: init faild. Missing required config values. (service_url, endpoint, key)");
        }
    }   

}