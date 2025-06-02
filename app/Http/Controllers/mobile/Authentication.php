<?php

namespace App\Http\Controllers\mobile;


use Illuminate\Http\Request;
 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Flasher\Laravel\Facade\Flasher;
use Jenssegers\Agent\Agent;

class Authentication extends Controller
{
    public function user()
    {
        if (!empty(session("token"))) 
        {
            $user =   DB::table("users")->where("token", session("token"))->first();
            if (!empty($user)) 
            {
                return redirect("dashboard");
            }
        }

        return view("mobile.login");
    }

    public function user_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) 
        {
            Flasher::addError('Error '. $validator->errors()->first());
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        try 
        {
            $user =   DB::table("users")->where("email", $request->email)->where("password", $request->password)->first();
            if (!empty($user)) 
            {
                $token = bin2hex(random_bytes(16));
                $agent = new Agent();
                $browser = $agent->browser();
                $version = $agent->version($browser);
                $platform = $agent->platform();
                DB::table('users')->where("id", $user->id)->update(array(
                    'token' => $token,
                    "last_ip" => $_SERVER['REMOTE_ADDR'],
                    'last_login' => date("Y-m-d H:m:s"),
                    'platform' => $browser . " / " . $version . ' / ' . $platform,
                ));
                session()->put('token', $token);
                session()->put('user', $user);
            } 
            else 
            {
                return redirect()->back()->with('error', "Incorrect Email or Password");
            }
        } 
        catch (\Throwable $th) 
        {
            return redirect()->back()->with('error', $th->getMessage());
        }
        Flasher::success('success', "login successfully");
        return redirect()->route('dashboard.view');
    }

    public function showDashboard()
    {
        return view("mobile.dashboard"); 
    }

    public function logout(Request $request)
    {
        DB::table('users')->where("token", session("token"))->update(array(
            'token' => "",
        ));
        return redirect()->route('login')->with("success", "logout successfully");
    }
}
