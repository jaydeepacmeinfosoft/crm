<?php

namespace App\Http\Helpers;
use Illuminate\Support\Facades\Route;

class CommonFunction {
    function isActiveRoute($route,$params=[],$output = 'active')
    {
        if($params != null && !empty($params)){
            $key = $params!=null?key($params):'';
            $currentParam = $params!=null && $key != ''?request()->route()->parameter($key):'';
            if (is_array($route)) {
                if (in_array(Route::currentRouteName(), $route) && $currentParam == $params[$key]) {
                    return $output;
                }
            } else {
                if (Route::currentRouteName() == $route && $currentParam == $params[$key]) {
                    return $output;
                }
            }
        } else {
            if (is_array($route)) {
                if (in_array(Route::currentRouteName(), $route)) {
                    return $output;
                }
            } else {
                if (Route::currentRouteName() == $route) {
                    return $output;
                }
            }
        }
    
    }
    public static function getLeadType(){
        $lead_type = [
            "general" => "General Lead",
            "qualified" => "Qualified Lead",
            "contact" => "Contact Lead",
            "demo" => "Demo Lead",
            "quotation" => "Quotation Lead",
            "inquiry" => "Inquiry Lead",
            "win" => "Win Lead",
            "lost" => "Lost Lead"
        ];
        return $lead_type;
    }
    public static function getMeetingType(){
        $meeting = [
            1 => "Zoom Meeting",
            2 => "Google Meet"
        ];

        return $meeting;

    }
}
