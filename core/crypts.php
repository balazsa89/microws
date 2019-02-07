<?php

class mws_crypt{

    public static $iv;

    public static function encrypt($data,$key){
        $iv = mws_crypt::getIV($key);

        $encryted = base64_encode(openssl_encrypt(serialize($data), "AES-256-CBC", $key, OPENSSL_RAW_DATA, $iv));
        return $encryted;
    }

    public static function decrypt($data,$key){
        $iv = mws_crypt::getIV($key);

        $decrypt = openssl_decrypt(base64_decode($data), "AES-256-CBC", $key,OPENSSL_RAW_DATA,$iv);
        return unserialize($decrypt);
    }

    public static function getIV($key){
       return substr(hash("sha512",$key),0,16);
    }

}