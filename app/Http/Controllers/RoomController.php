<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\BedResident;
use App\Models\Resident;
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

    public function detail($id){
        return view('admin.room.detail', ['room' => Room::find($id), 'residents' => Resident::all()]);
    }

    public function empty(Request $request){
        if(empty($request->empty_reason)){
            return response(["type" => "warning", "message" => __('validate.room.choose_empty_reason')]);
        }
        $bed_resident = BedResident::where('bed_id',$request->bed)->where('status',1)->first();

        if($bed_resident){
            $bed_resident->status = 0;
            $bed_resident->empty_reason = $request->empty_reason;
            if($bed_resident->save()){
                $bed = Bed::find($request->bed);
                $bed->status = 1;
                $bed->save();
                return response(["type" => "success", "message" => __('validate.room.success'), "status" => true]);
            }else{
                return response(["type" => "error", "message" => __('validate.error')]);
            }
        }
    }

    public function new_bed(Request $request){
        if(empty($request->type)){
            return response(["type" => "warning", "message" => __('validate.room.choose_bed_type')]);
        }

        $bed = new Bed;
        $bed->room_id = $request->room;
        $bed->type = $request->type;
        $bed->status = 1;

        if($bed->save()){
            return response(["type" => "success", "message" => __('validate.room.success'), "status" => true]);
        }else{
            return response(["type" => "error", "message" => __('validate.error')]);
        }
    }

    public function bed_assigment(Request $request){
        if(empty($request->resident)){
            return response(["type" => "warning", "message" => __('validate.room.choose_resident')]);
        }


        $bed_residents = BedResident::where('resident_id', $request->resident)->where('status', 1)->first();
        if($bed_residents){
            return response(["type" => "warning", "message" => __('validate.room.already_in_bed')]);
        }

        $bed_residents = BedResident::where('bed_id',$request->bed)->where('status',1)->first();
        if($bed_residents){
            return response(["type" => "warning", "message" => __('validate.room.bed_is_full')]);
        }

        $new = new BedResident;
        $new->room_id = $request->room;
        $new->bed_id = $request->bed;
        $new->resident_id = $request->resident;
        $new->status = 1;

        if($new->save()){
            $bed = Bed::find($request->bed);
            $bed->status = 2;
            $bed->save();
            return response(["type" => "success", "message" => __('validate.room.success'), "status" => true]);
        }else{
            return response(["type" => "error", "message" => __('validate.error')]);
        }
    }
}
