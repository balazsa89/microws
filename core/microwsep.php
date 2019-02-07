<?php

class microwsep{

    protected $db;
    protected $input;
    protected $key;

    public function __construct($db = null,$input,$key){
        if($db == NULL){
            throw new Exception("Invalid data input");
        }else{
            $this->db = $db;
            $this->key = $key;
            $this->input = $input;
        }
    }

    public function processData(){}

    protected function invalidInput($inpType, $inpValue){
        die(mws_crypt::encrypt(array('error' => "invalid input got. Input type: " . $inpType . " value: " . $inpValue)));
    }

    protected function returnData($retArray){
        die(mws_crypt::encrypt($retArray,$this->key));
     

    }


}