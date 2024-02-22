<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        return view('admin.room.list', ['rooms' => Room::all()]);
    }

    public function new(){
        return view('admin.room.new');
    }

    public function create(Request $request){
        if(empty($request->floor)){
            return response(["type" => "warning", "message" => __('validate.room.enter_floor')]);
        }
        if(empty($request->room)){
            return response(["type" => "warning", "message" => __('validate.room.enter_room_no')]);
        }

        $room = new Room();
        $room->floor = $request->floor;
        $room->room_no = $request->room;
        $room->bathroom = $request->bathroom;
        $room->toilet = $request->toilet;
        $room->window = $request->window;
        $room->heating = $request->heating;
        $room->facade = $request->facade;
        $room->flooring = $request->flooring;
        $room->width = $request->width;
        $room->height = $request->height;
        $room->status = 1;
        if($room->save()){
            return response(["type" => "success", "message" => __('validate.room.success'), "status" => true]);
        }else{
            return response(["type" => "error", "message" => __('validate.error')]);
        }
    }
}
