<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    protected $table = 'users';
    public function userInfo(Request $request){
        $users = DB::table($this->table);
        $search = $request->search;
        if($search){
            $users = $users->where('username', 'like', "%$search%")->orWhere('email', 'like', "%$search%");
        }
        $users = $users->get();
        return view('admin.user-info', compact('users'));
    }
    public function addUser(){
        return view('admin.user-add');
    }
    public function postAddUser(RegisterRequest $request){
        User::create($request->validated());
        return redirect()->route('admin.user.info');
    }
    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return  back();
    }
}
