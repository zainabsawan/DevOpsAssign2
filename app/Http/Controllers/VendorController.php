<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\VendorModel;

class VendorController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function store(Request $request){

        $vendor = new VendorModel();
        $vendor->user_Name = $request['name'];
        $vendor->user_Email = $request['email'];
        $vendor->user_Password = $request['password'];
        $vendor->save();
        return redirect("login");

    }

    public function login(Request $request){

        if ($request->isMethod('post')){
            $email = $request->input('email');
            $password = $request->input('password');
    
            $users = VendorModel::where('user_Email', $email)->where('user_Password', $password);
            $login_user = $users->first();
            if($login_user->exists()){
                $request->session()->put('email', $login_user->user_Email);
                $request->session()->put('name', $login_user->user_Name);
                return redirect('dashboard');
            }
    
            return view('login');
    
        }
    }

    public function logout(Request $request){
        $request->session()->forget('email');
        $request->session()->forget('name');

        return redirect('login');
    }

    // public function dashboard(Request $request) {
    //     if ($request->session()->has('email')){
    //         // $email = $request->session()->get('email');

    //         $users = VendorModel::where('user_Email', $request->session()->get('email'));
    //         $login_user = $users->first();
    //         if($login_user && $login_user->exists()){
    //             $name = $login_user->user_Name;
    //             $email = $login_user->user_Email;
    //             return view('dashboard', ['email' => $email, 'name' => $name]);
    //         }

    //         else
    //             return redirect('dashboard');

  
    //     }
    
    //     else 
    //         return redirect('login'); 
    // }




}
