<?php
use Evolution\CodeIgniterDB as CI;

//micro webservice framework base contents goes here
class microWS{

    protected $db;
    protected $errorCodes;
    protected $pKeys;
    protected $config;
    protected $endPoint;
    protected $input;
    protected $encryptKey;
    protected $logFile = "log/ws.log";
    
    /*
        Constructor
        While the class is loading try to autenticate the request if it's not possible, do an error
        else load config file and init database
    */

    public function __construct($pks = null, $config = null, $errors = NULL){
        $this->errorCodes = $errors;

        if($pks == NULL or $config == null){
            $this->eReporter(9000);
        }else{
            $this->pKeys = $pks;
            $this->config = $config;
            if($this->checkBasicAuthTokenAndLoadKeyForEncryption()){
                $this->db =& CI\DB($this->config['db']);
                $this->input = mws_crypt::decrypt($_POST['inpData'],$this->encryptKey);
                $this->router();
 
            }
            
        }
    }

    protected function encryptData(){
        
    }

    protected function decryptData(){
        
    }

    /*
     Simple autoloader for endPoints
    */

    function __autoload($endPointName)
    {
        require_once endpoint .'/'.$endPointName.'_ep.php';
    }
    /*
        This function is will be load endpoint and passthru data to it
    */
    protected function router(){
        $func = $_SERVER['HTTP_FUNC'];
        
        if(is_file(endpoint . "/" . $func . "_ep.php")){
            try{
                $this->__autoload($func);
                $funcClass = $func . "_ep";
                $endpoint = new $funcClass($this->db,$this->input,$this->encryptKey);
                $endpoint->processData();
            }catch(Exception $e){
                if(debug){
                    var_dump($e);
                }
                $this->eReporter(9004);

            }
        }else{
            $this->eReporter(9003);
        }

    }

    protected function checkBasicAuthTokenAndLoadKeyForEncryption(){
        if(isset($_SERVER['HTTP_WPAUTH'])){
            if(isset($this->pKeys[$_SERVER['HTTP_WPAUTH']])){
                $this->encryptKey = $this->pKeys[$_SERVER['HTTP_WPAUTH']];
                return true;
            }else{
                $this->eReporter(9002);
            }
        }else{
            $this->eReporter(9001);
        }
    }

    /*
        Error reporter

        It'll load error text from the errors.php and show it in a json format

        @param string errorCode
        @param bool do_file_log 
        if its true the client will be write all errors to a local file
    */
    protected function eReporter( $errorCode,$do_file_log = true)
    {
        header('Content-Type: application/json');

        if($this->errorCodes != NULL){
            die(json_encode(array($errorCode => $this->errorCodes[$errorCode])));
        }else{
            die(json_encode(array($errorCode => "N/A")));
        }
    }

    /*
        Logger function

    */

    protected function l($l,$from = 'unknow',$file=true, $screen = false){
		$log =  "[" . $this->getDate(1) . "][".$from."] " . $l . PHP_EOL;
		
		
		if($file){
			file_put_contents($this->logFile,$log,FILE_APPEND);
		}
		if($screen){
			echo $log;
		}
	}


}