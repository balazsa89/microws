<?php

//show all available debug infromation and set PHP error riporting E_ALL
define('debug',true);
//define core folder
define('core','./core') ;
//define endpoint folder
define("endpoint","./endpoints");

if(debug){
	error_reporting(E_ALL);
}

//load resource files

require_once "./vendor/autoload.php";
require_once core. "/config.php";
require_once core. "/auth.php";
require_once core. "/errors.php";
require_once core. "/base.php";
require_once core. "/crypts.php";
require_once core. "/microwsep.php";

//init microWS framework, it will process the request by itself

$mws = new microWS($pks,$config,$errors);