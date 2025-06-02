<?php

namespace App\Http\Middleware;

use App\Models\users;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\View;
use Flasher\Laravel\Facade\Flasher;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (empty(session('token'))) 
        {
            Flasher::addError('Error '. 'Session expired');
            return redirect()->route('login');
        } 
        else 
        {
            $user = users::where('token', session('token'))->first();
            if (empty($user)) 
            {
                Flasher::addError('Error '. 'Session expired or someone login your account');
                return redirect()->route('login');
            } 
            else 
            {
                $child_ids = [];
                $iterable = [];
                array_push($iterable, $user->id);
                while (is_countable($iterable) && sizeof($iterable) > 0)
                {
                    $child_ids = array_merge($child_ids, $iterable);
                    try 
                    {
                        $users = DB::table("users")->whereIn("parent_id", $iterable)->get();
                        $iterable = [];
                        foreach ($users as $value) 
                        {
                            array_push($iterable, $value->id);
                        }
                    } 
                    catch (\Throwable $th) 
                    {
                        echo $msg = $th->getMessage();
                        break;
                    }
                }
                $child_id = implode(', ', $child_ids);
                $child_id = explode(',', $child_id);
                $rolePermissions = DB::table("role_permission")->where("role_id", $user->role_id)->get();
                $attendance = DB::table("attendance")->where("emp_id", $user->id)->whereDate("start_time",now())->first();

                View::share('rolePermissions', $rolePermissions);
                View::share('attendance', $attendance);
                $request->merge(["user" => $user, "userIds" => $child_id]);
                return $next($request);
            }
        }
    }
}