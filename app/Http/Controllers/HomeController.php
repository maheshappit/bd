<?php

namespace App\Http\Controllers;

use App\Models\BdModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users_data=BdModel::all();
        return view('home',compact('users_data'));
    }

    public function edit(Request $request){
        $user=BdModel::find($request->id);

        return view('edit',compact('user'));
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

        return redirect()->route('home')->with('message', 'User Updated Successfully.');

    }
}
