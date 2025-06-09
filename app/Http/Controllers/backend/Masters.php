<?php

namespace App\Http\Controllers\backend;
use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Traits\CustomTrait;



class Masters extends Controller
{
    use CustomTrait;
        function generateRandomNumber($length = 12)
    {
        $number = '';
        while (strlen($number) < $length) {
            $number .= mt_rand(0, 9);
        }
        return substr($number, 0, $length);
    }

    public function GetCity(Request $request)
    {
        $state_city = DB::table("state_city")->distinct("state")->where("state", $request->state)->get();;
        return $state_city;
    }

    
    public function Customers(Request $request)
    {
    $customers = DB::table('customers')
    ->leftJoin('transactions', function($join) {
        $join->on('customers.id', '=', 'transactions.customer_id')
             ->where('transactions.type', '=', 'give');
    })
    ->where('customers.type', 'customer')
    ->select(
        'customers.id',
        'customers.name',
        DB::raw('SUM(transactions.amount) as total_take_amount')
    )
    ->groupBy('customers.id', 'customers.name') 
    ->get();



      $supplier = DB::table('customers')
    ->leftJoin('transactions', function($join) {
        $join->on('customers.id', '=', 'transactions.customer_id')
             ->where('transactions.type', '=', 'give');
    })
    ->where('customers.type', 'supplier')
    ->select(
        'customers.id',
        'customers.name',
        DB::raw('SUM(transactions.amount) as total_take_amount')
    )
    ->groupBy('customers.id', 'customers.name') 
    ->get();

        $giveTotalsum = Transaction::where('type','give')->sum('amount');
        $takeTotalsum = Transaction::where('type','take')->sum('amount');

       $takeTotal = $this->formatIndianRupee($takeTotalsum);
       $giveTotal = $this->formatIndianRupee($giveTotalsum);
    //    dd($takeTotal,$giveTotal);

        return view("backend.customers", compact('customers','supplier','giveTotal','takeTotal'));
    }


    public function SaveCustomer(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'number' => 'required|digits:10',
            'name' => 'required',
            'type' =>'required'

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

        try {
            if (empty($request->id)) {
                DB::table('customers')->insertGetId(array(

                    "name" => $request->name,
                    "number" => $request->number,
                    "email" => $request->email,
                    'type' => $request->type,
                    "address" => $request->address,
                    "active" => $request->active,
                    "dob" => $request->dob,
                ));
            } else {
                DB::table('customers')->where("id", $request->id)->update(array(

                    "name" => $request->name,
                    "number" => $request->number,
                    "email" => $request->email,
                    'type' => $request->type,
                    "address" => $request->address,
                    "active" => $request->active,
                    "dob" => $request->dob,
                ));
            }
        } catch (Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }

        return  redirect()->back()->with("success", "Save Successfully");
    }

    public function Settings(Request $request)
    {
        $settings = DB::table("company_settings")->where("id", 1)->first();



        return view("backend.settings", compact("settings"));
    }

    public function SaveSettings(Request $request)
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = time() . '.' . $request->image->extension();

            $request->image->move('logo', $image);
        } else {
            $company_settings = DB::table("company_settings")->where("id", 1)->first();
            $image = $company_settings->img;
        }


        DB::table('company_settings')->where("id", 1)->update(array(
            "img" => $image,
            "img_width" => $request->img_width,
            "company_name" => $request->company_name,
            "address" => $request->address,
            "contact_person" => $request->contact_person,
            "number" => $request->number,
            "email" => $request->email,
            "gst_no" => $request->gst_no,
        ));

        return  redirect()->back()->with("success", "Save Successfully");
    }


    public function Users(Request $request)
    {


        $users = DB::table("users as a")
            ->select("a.*", "b.name as user_type")
            ->join("role as b", "a.role_id", "b.id")
            ->where("user_type", "!=", "admin")
            ->whereIn("a.id", $request->userIds)
            ->get();
            $parent_users=DB::table("users as a")
            ->select("a.*", "b.name as user_type")
            ->join("role as b", "a.role_id", "b.id")
            ->whereIn("a.id", $request->userIds)
            ->get();

        $role = DB::table("role")->where("name", "!=", "admin")->get();
        return view("backend.users", compact("users", "role","parent_users"));
    }
    public function SaveUser(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'name' => 'required',
            'email' => 'required',
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


        try {
            if (empty($request->id)) {
                DB::table('users')->insertGetId(array(
                    "name" => $request->name,
                    "email" => $request->email,
                    "phone" => $request->phone,
                    "address" => $request->address,
                    "state" => $request->state,
                    "city" => $request->city,
                    "pincode" => $request->pincode,
                    "role_id" => $request->role_id,
                    "password" => $request->password,
                    "parent_id" => $request->parent_id,


                ));
            } else {
                DB::table('users')->where("id", $request->id)->update(array(
                    "name" => $request->name,
                    "email" => $request->email,
                    "phone" => $request->phone,
                    "address" => $request->address,
                    "state" => $request->state,
                    "city" => $request->city,
                    "pincode" => $request->pincode,
                    "role_id" => $request->role_id,
                    "password" => $request->password,
                    "parent_id" => $request->parent_id,
                ));
            }
        } catch (Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }

        return  redirect()->back()->with("success", "Save Successfully");
    }

    public function UserRole(Request $request)
    {
        $role = DB::table("role")->where("name", "!=", "admin")->get();
        // $role = DB::table("role")->get();
        return view("backend.user-role", compact("role"));
    }

    public function SaveRole(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
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

        try {
            if (empty($request->id)) {
                DB::table('role')->insertGetId(array(
                    "name" => $request->name,
                ));
            } else {
                DB::table('role')->where("id", $request->id)->update(array(
                    "name" => $request->name,
                ));
            }
        } catch (Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }
        return  redirect()->back()->with("success", "Save Successfully");
    }

    public function UserPermission(Request $request, $id)
    {

        $role = DB::table("role")->where("id", $id)->first();


        $permission_mst = DB::table("permission_mst as a")
            ->select("a.*")
            ->whereNotExists(function ($query) use ($role) {
                $query->select(DB::raw(1))
                    ->from("role_permission as b")
                    ->whereColumn("b.permission_id", "a.id")
                    ->where("b.role_id", $role->id);
            })
            ->get();



        $role_permission = DB::table("role_permission as a")
            ->select("a.*", "b.name as permission")
            ->join("permission_mst as b", "a.permission_id", "b.id")
            ->where("a.role_id", $role->id)
            ->get();

        return view("backend.user-permission", compact("role", "permission_mst", "role_permission", "id"));
    }

    public function SaveUserPermission(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'role_id' => 'required',
            'permission_id' => 'required',
            'view' => 'required',
            'edit' => 'required',
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

        $role_permission = DB::table("role_permission")->where("role_id", $request->role_id)->where("permission_id", $request->permission_id)->first();
        if ($role_permission) {
            return  redirect()->back()->with("error", "User permission already added");
        }
        try {
            if (empty($request->id)) {
                DB::table('role_permission')->insertGetId(array(
                    "role_id" => $request->role_id,
                    "permission_id" => $request->permission_id,
                    "edit" => $request->edit,
                    "view" => $request->view,
                ));
            } else {
                DB::table('role_permission')->where("id", $request->id)->update(array(

                    "edit" => $request->edit,
                    "view" => $request->view,
                ));
            }
        } catch (Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }
        return  redirect()->back()->with("success", "Save Successfully");
    }

    public function RemovePermission(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => 'required',

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

        DB::table('role_permission')->where("id", $request->id)->delete();
        return  redirect()->back()->with("success", "Save Successfully");
    }



    public function GetUserDetails(Request $request)
    {
        $users = DB::table("users")->where("id", $request->id)->first();
        return $users;
    }

    public function supplier(){
        $customers = DB::table("customers")->where('type','customer')->get();
        $supplier = DB::table("customers")->where('type','supplier')->get();
        return view("backend.customers", compact('customers','supplier'));
    }
}
