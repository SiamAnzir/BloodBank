<?php

namespace App\Http\Controllers;

use App\BloodBankModel;
use App\User;
use Illuminate\Http\Request;
use Auth;

class BloodBankController extends Controller
{
    public function search(Request $request){
        $data['users'] = User::where('blood_group_id',$request->blood_group_id)
        ->where('address',$request->address)
        ->get();
        $data['bloodGroups'] = BloodBankModel::all();
        $data['address'] = $request->address;
        return view('welcome',$data);
    }
    public function viewProfile(){
        $data['user'] = Auth::user();
        $data['bloodGroups'] = BloodBankModel::all();
        return view('viewProfile',$data);
    }
    public function editProfile(){
        $data['editProfile'] = Auth::user();
        return view('editProfile',compact($data,'data'));
    }
    public function updateProfile(Request $request){
        Auth::user()->address = $request->address;
        Auth::user()->phone_no = $request->phone_no;
        Auth::user()->last_donation_date = $request->last_donation_date;
        Auth::user()->save();
    
        return redirect(route('viewProfile'));
    }
}

