<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserAccountController extends Controller
{
    protected $table = 'Users';
    public function show(){
        $userId = auth()->user()->id;
        $user = DB::table($this->table)->where('id', $userId)->first();
        return view('user.account', compact('user'));
    }

    public function update(Request $request){
        if($request->password){
            if(!Hash::check($request->password, auth()->user()->password)){
                return back()->with('error', 'Old Password Doesn\'t match!');
            }
            $request->validate([
                'new_password' => 'required|min:8',
                'confirm_new_password' => 'required|same:new_password'
            ]);
            DB::table($this->table)
                ->where('id', auth()->user()->id)
                ->update([
                    'password' => Hash::make($request->new_password)
                ]);
        }
        DB::table($this->table)
                ->where('id', auth()->user()->id)
                ->update([
                    'fname' => $request->fname,
                    'lname' => $request->lname,
                    'address' => $request->address,
                ]);
            return redirect()->route('user.show');
    }
}
