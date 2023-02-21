<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserRole;
use App\User;
use App\Role;
use Session;

class UserRoleController extends Controller
{
    
    public function store(Request $request)
    {
        $checkUser = User::where('id', '=', $request->usrid)->exists();
        
        if(!$checkUser){
            Session::flash('error', 'User Not exists!');         
            return redirect()->back();
        }
        
        foreach($request->role as $id){
            $checkRole = Role::where('id', '=', $id)->exists(); 
            if(!$checkRole){
                Session::flash('error', 'Role Not exists!');         
                return redirect()->back();
            }
        }
        
        //delete all roles fo user
        
        $data = UserRole::where('user_id', '=', $request->usrid);
        $data->delete();
        
        foreach($request->role as $id){
            $usr = new UserRole();
            $usr->user_id = $request->usrid;
            $usr->role_id = $id;
            $usr->save();
        }
        
        Session::flash('success', 'User Role Assigned!');     
        return redirect()->back();
    }

}

