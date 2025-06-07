<?php

namespace App\Http\Controllers\mobile;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Flasher\Laravel\Facade\Flasher;
use Jenssegers\Agent\Agent;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class Authentication extends Controller
{
    public function user()
    {
        if (!empty(session("token"))) {
            $user =   DB::table("users")->where("token", session("token"))->first();
            if (!empty($user)) {
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
        if ($validator->fails()) {
            Flasher::addError('Error ' . $validator->errors()->first());
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $user =   DB::table("users")->where("email", $request->email)->where("password", $request->password)->first();
            if (!empty($user)) {
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
                session()->put('user_id', $user->id);
                session()->put('user', $user);
            } else {
                return redirect()->back()->with('error', "Incorrect Email or Password");
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
        Flasher::success('success', "login successfully");
        return redirect()->route('dashboard.view');
    }

    public function showDashboard()
    {
        $user = DB::table('users')->where('id', session()->get('user_id'))->value('my_business');

        $customers_info = DB::table('customers')
            ->where('user_id', session()->get('user_id'))
            ->select('customers.id', 'customers.name', 'customers.number', 'customers.type')
            ->addSelect([
                'final_amount' => DB::table('transactions')
                    ->selectRaw('SUM(CASE WHEN type = "take" THEN amount ELSE -amount END)')
                    ->whereColumn('transactions.customer_id', 'customers.id'),
                'latest_transaction_type' => DB::table('transactions')
                    ->select('type')
                    ->whereColumn('transactions.customer_id', 'customers.id')
                    ->orderBy('created_at', 'desc')
                    ->limit(1),
            ])
            ->orderBy('updated_at', 'desc')
            ->paginate(10);

        $totalTakeQuery = DB::table('customers')
            ->where('transaction_type', 'take')
            ->where('user_id', session()->get('user_id'))
            ->sum('transaction_amount');

        $totalGiveQuery = DB::table('customers')
            ->where('transaction_type', 'give')
            ->where('user_id', session()->get('user_id'))
            ->sum('transaction_amount');

        $transactions = DB::table('transactions')
            ->where('transactions.user_id', session()->get('user_id'))
            ->get();

        $finalAmount = 0;
        foreach ($transactions as $transaction) 
        {
            if ($transaction->type === 'take') 
            {
                $finalAmount += $transaction->amount;
            } 
            elseif ($transaction->type === 'give') 
            {
                $finalAmount -= $transaction->amount;
            }
        }

        return view('mobile.dashboard', compact('user', 'customers_info', 'finalAmount', 'totalGiveQuery', 'totalTakeQuery'));
    }


    public function logout(Request $request)
    {
        DB::table('users')->where("token", session("token"))->update(array(
            'token' => "",
        ));
        return redirect()->route('login')->with("success", "logout successfully");
    }
}
