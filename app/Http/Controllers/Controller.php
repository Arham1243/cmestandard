<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Config;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function getConfig(){
        $config = Config::where('is_active',1)->get();
        $data = array();
        foreach($config as $con){
            $data[$con->flag_type] = $con->flag_value;
        }
        return $data;
    }
}
