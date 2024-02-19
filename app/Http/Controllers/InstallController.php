<?php

namespace App\Http\Controllers;

use App\Models\System;
use Illuminate\Http\Request;

class InstallController extends Controller
{
    public function index(){
        return view('install.index');
    }

    public function step_1(){
        return view('install.step-1');
    }
    public function step_2(){
        return view('install.step-2');
    }
    public function step_3(){
        return view('install.step-3');
    }



    public function save(Request $request){
        if(empty($request->site_name)){
            return response(["type" => "warning", "message" => __('install.result.type_site_name')]);
        }

        if(empty($request->domain_name)){
            return response(["type" => "warning", "message" => __('install.result.type_domain_name')]);
        }

        if(empty($request->site_url)){
            return response(["type" => "warning", "message" => __('install.result.type_site_url')]);
        }

        if(!filter_var($request->site_url, FILTER_VALIDATE_URL)){
            return response(["type" => "warning", "message" => __('install.result.type_valid_url')]);
        }

        $system = new System;
        $system->site_title = trim($request->site_name);
        $system->site_url = trim($request->site_url);
        $system->site_domain = trim($request->domain_name);
        $system->site_description = trim($request->site_description);
        $system->site_keywords = trim($request->site_keywords);
        
        if($system->save()){
            return response(["type" => "success", "message" => __('install.result.success'), "status" => true]);
        }else{
            return response(["type" => "error", "message" => __('install.result.error')]);
        }
    }
}
