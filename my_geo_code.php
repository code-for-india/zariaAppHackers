<?php
    require('credentials.php');
    class geocoder{

        static private $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=";

        static public function getLocation($address){
            $url = self::$url.urlencode($address);
           
            $resp_json = self::urlfetch_file_get_contents($url);
            $resp = json_decode($resp_json, true);

            if($resp['status']=='OK'){
                return $resp['results'][0]['geometry']['location'];
            }else{
                return false;
            }
        }


        static private function urlfetch_file_get_contents($URL){
            $result = file_get_contents($URL);
            return $result;
        }
    }

    function get_geo_loc($addr="1600 Amphitheatre Parkway, Mountain View, CA") {
        $loc = geocoder::getLocation($addr);
        return $loc;
    };


?>
