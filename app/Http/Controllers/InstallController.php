<?php

namespace App\Http\Controllers;

use App\Models\System;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;

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
    public function step_4(){
        return view('install.step-4');
    }
    public function step_5(){
        return view('install.step-5');
    }
    public function completed(){
        return view('install.completed');
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

    public function save_logos(Request $request){
        if(empty($request->logo_header_white_data)){
            return response(["type" => "warning", "message" => __('install.result.type_logo_header_white')]);
        }
        if(empty($request->logo_footer_white_data)){
            return response(["type" => "warning", "message" => __('install.result.type_logo_footer_white')]);
        }
        if(empty($request->favicon_data)){
            return response(["type" => "warning", "message" => __('install.result.type_favicon')]);
        }

        if(empty($request->logo_header_dark_data)){
            $header_dark = $request->logo_header_white_data;
        }else{
            $header_dark = $request->logo_header_dark_data;
        }

        if(empty($request->logo_footer_dark_data)){
            $footer_dark = $request->logo_footer_white_data;
        }else{
            $footer_dark = $request->logo_footer_dark_data;
        }

        $system = System::first();
        $system->site_logo_header_white = $request->logo_header_white_data;
        $system->site_logo_header_dark = $header_dark;
        $system->site_logo_footer_white = $request->logo_footer_white_data;
        $system->site_logo_footer_dark = $footer_dark;
        $system->site_favicon = $request->favicon_data;

        if($system->save()){
            return response(["type" => "success", "message" => __('install.result.success'), "status" => true]);
        }else{
            return response(["type" => "error", "message" => __('install.result.error')]);
        }
    }

    public function save_colors(Request $request){
        if($request->primary_color == "#000000" || $request->primary_color == "#ffffff"){
            return response(["type" => "warning", "message" => __('install.result.type_primary_color')]);
        }
        if($request->secondary_color == "#000000" || $request->secondary_color == "#ffffff"){
            return response(["type" => "warning", "message" => __('install.result.type_secondary_color')]);
        }
        if($request->tertiary_color == "#000000" || $request->tertiary_color == "#ffffff"){
            return response(["type" => "warning", "message" => __('install.result.type_tertiary_color')]);
        }

        $system = System::first();
        $system->primary_color = $request->primary_color;
        $system->secondary_color = $request->secondary_color;
        $system->tertiary_color = $request->tertiary_color;
        $system->site_lang = "EN";
        $system->token = Hash::make($system->domain_name);

        if($system->save()){
            return response(["type" => "success", "message" => __('install.result.success'), "status" => true]);
        }else{
            return response(["type" => "error", "message" => __('install.result.error')]);
        }
    }

    public function save_user(Request $request){
        if(empty($request->name) || empty($request->email) || empty($request->password)){
            return response(["type" => "warning", "message" => __('install.result.type_user')]);
        }

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->branch_id = 0;
        $user->role = "SUPERADMIN";
        $user->access_level = 9;
        $user->status = 1;

        if($user->save()){
            return response(["type" => "success", "message" => __('install.result.success'), "status" => true]);
        }else{
            return response(["type" => "error", "message" => __('install.result.error')]);
        }
    }
}
