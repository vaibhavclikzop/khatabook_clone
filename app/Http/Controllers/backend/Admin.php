<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Admin extends Controller
{
      public function Dashboard(Request $request)
    {

        return view("backend.dashboard");
    }


    public function StartDay(Request $request)
    {

        $attendance = DB::table("attendance")->where("emp_id", $request->user->id)->whereDate('start_time', now())->first();
        if ($attendance) {
            return redirect()->back()->with("error", "Day already started");
        } else {


            $mst_id = DB::table('attendance')->insertGetId(array(
                "start_location" => $request->start_location,
                "emp_id" => $request->user->id,
            ));
            return redirect()->back()->with("success", "Day started successfully");
        }
    }

    public function EndDay(Request $request)
    {
        $attendance = DB::table("attendance")->where("emp_id", $request->user->id)->whereDate('start_time', now())->first();
        if ($attendance && $attendance->start_time && empty($attendance->end_time)) {
            $mst_id = DB::table('attendance')->where("id",$attendance->id)->update(array(
                "end_location" => $request->start_location,
                "end_time" => now(),
                
            ));
            return redirect()->back()->with("success", "Day ended successfully");
        } else if($attendance && $attendance->start_time && $attendance->end_time){
            return redirect()->back()->with("error", "Already Ended");
        }else if(empty($attendance)){
            return redirect()->back()->with("error", "Day not started yet.");
        }
    }

    public function Profile(Request $request){
        $user= DB::table("users")->where("id",$request->user->id)->first();
        return view("backend.profile",compact("user"));

    }

    public function SaveProfile(Request $request){
        $validator = Validator::make($request->all(), [

            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|min:10|max:10',
            'address' => 'required',
            'password' => 'required',

        ]);

        if ($validator->fails()) {
            $messages = $validator->errors();
            $count = 0;
            foreach ($messages->all() as $error) {
                if ($count == 0)
                    return redirect()->back()->with('error', $error);

                $count++;
            }
        }
        DB::table('users')->where("id", $request->user->id)->update(array(
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "address" => $request->address,
            "password" => $request->password,

        ));
        return  redirect()->back()->with("success", "Save Successfully");
    }
}
