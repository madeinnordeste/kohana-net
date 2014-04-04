<?php defined('SYSPATH') OR die('No direct script access.');

class Net {

    const URL_GEOIP = 'http://freegeoip.net/json/';

    public function ip()
    {
        return Request::$client_ip;
    }

    /**
     * 
     * 
     * @link http://php.net/geoip-record-by-name
     * @link http://freegeoip.net
     */
    public function ip_data($ip = NULL)
    {
        if ( ! $ip)
        {
            $ip = $this->ip();
        }
        elseif ( ! Valid::ip($ip) OR ! Valid::url($ip))
        {
            throw new Kohana_Exception(
                ':method: invalid IP address :ip',
                array(':method' => __METHOD__, ':ip' => $ip)
            );
        }
        
        if (function_exists('geoip_record_by_name'))
        {
            return geoip_record_by_name($ip);
        }

        $options = class_exists('Cache') ? array('cache' => Cache::instance()) : array();
        $response = Request::factory(self::URL_GEOIP . $ip, $options)->execute()->body();
        
       return $response ? json_decode(trim($response), TRUE) : FALSE;
    }
    
}
