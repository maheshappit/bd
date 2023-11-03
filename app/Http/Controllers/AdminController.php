<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\BdModel;
class AdminController extends Controller
{
    //todo: admin login form
    public function login_form()
    {
        return view('admin.login-form');
    }

    //todo: admin login functionality
    public function login_functionality(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard');
        }else{
            Session::flash('error-message','Invalid Email or Password');
            return back();
        }
    }

    public function dashboard()
    {
        $users_data=BdModel::all();
        return view('admin.dashboard',compact('users_data'));
    }

    public function update(Request $request){


        $user= BdModel::find($request->id);
        $user->update([
            'create_date'=>$request->create_date,
            'email_sent_date'=>$request->email_sent_date,
            'company_source'=>$request->company_source,
            'contact_source'=>$request->contact_source,
            'database_creator_name'=>$request->database_creator_name,
            'technology'=>$request->technology,
            'client_speciality'=>$request->client_speciality,
            'client_name'=>$request->client_name,
            'street'=>$request->street,
            'city'=>$request->city,
            'state'=>$request->state,
            'zip_code'=>$request->zip_code,
            'country'=>$request->country,
            'website'=>$request->website,
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'designation'=>$request->designation,
            'email'=>$request->email,
            'email_response_1'=>$request->email_response_1,
            'email_response_2'=>$request->email_response_2,
            'rating'=>$request->rating,
            'followup'=>$request->followup,
            'linkedin_link'=>$request->linkedin_link,
            'employee_count'=>$request->employee_count,
        ]);

        return redirect()->route('dashboard')->with('message', 'User Logged out Successfully.');

    }

    public function delete(Request $request){


        $user=BdModel::find($request->id);
        $user->delete();
        return redirect()->route('dashboard')->with('message', 'User Deleted Successfully.');


    }


    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('message', 'User Deleted Successfully.');
    }
    public function edit(Request $request){
        $user=BdModel::find($request->id);

        return view('admin.edit',compact('user'));

    }
}