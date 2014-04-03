<?php defined('SYSPATH') or die('No direct script access.');

class Net{

    public static function ip(){
        $ip = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
        return trim($ip);
    }

    public static function ip_data($ip=FALSE){

        $ip = (!$ip) ? Net::ip() : $ip;

        $url = 'http://freegeoip.net/json/'.$ip;
        try {
            $content = file_get_contents($url);
            $obj = json_decode($content);
            return $obj;

        } catch (Exception $e) {
            return FALSE;
        }

    }
    
}