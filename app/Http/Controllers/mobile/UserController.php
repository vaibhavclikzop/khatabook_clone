<?php

namespace App\Http\Controllers\mobile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Flasher\Laravel\Facade\Flasher;
use App\Models\User;

class UserController extends Controller
{
    public function my_business(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'my_business' => 'required',
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
            $data = $validator->validated();
            User::where('id', $data['user_id'])->update([
                'my_business' => $data['my_business'],
            ]);

            Flasher::addSuccess('Business name updated successfully.');
            return redirect()->back();
        }
        catch (Exception $e)
        {
            Flasher::addError('Error '. $e->getMessage());
            return redirect()->back();
        }
    }

    public function add_customers(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'name' => 'required',
            'number' => 'required|unique:customers,number',
            'type' => 'required|in:customer,supplier',
        ]);

        if($validator->fails())
        {
           Flasher::addError('Error', $validator->errors()->first());
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }
        try
        {
            $data = $validator->validated();
            DB::table('customers')->insert([
                'user_id' => $data['user_id'],
                'name' => $data['name'],
                'number' => $data['number'],
                'type' => $data['type'],
            ]);
            Flasher::addSuccess($data['type'] . ' added successfully');
            return redirect()->back();
        }
        catch(Exception $e)
        {
            Flasher::addError('Error', $e->getMessage());
            return redirect()->back();
        }
    }

    public function filter_customer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'search' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) 
        {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ], 400);
        }

        $search = $request->input('search');
        $user_id = $request->input('user_id');

        $customers = DB::table('customers')
            ->where('user_id', $user_id)
            ->when($search, function ($query, $search) 
            {
                return $query->where('name', 'like', '%' . $search . '%');
            })
            ->select('name', 'number', 'id')
            ->limit(10)
            ->get();

        return response()->json([
            'status' => true,
            'customers' => $customers
        ]);
    }
}
