<?php

use Illuminate\Support\Facades\Route;

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
