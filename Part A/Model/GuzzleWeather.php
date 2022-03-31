<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Weather
 *
 * @author webre
 */
class GuzzleWeather implements Weather_Interface {

    //put your code here
    private $url;
    private $string;

    public function __construct() {
       
    }

    public function get_cities() {
        $this->string = file_get_contents('resources/city.list.json');
        return $this->string;
    }

    public function get_weather($cityid) {
        try {
           $endpoint_url = api_url . $cityid . "&APPID=" . api_key;
           $this->url=str_replace("{{cityid}}",$cityid,$endpoint_url);
           $client=new \GuzzleHttp\Client();
        } catch (\Exception $th) {
            echo $th->getMessage("There is a problem with this webservice");
        }
        $response=$client->get($this->url);
        
        return $response;
    }

    public function get_current_time() {
        
    }

}
