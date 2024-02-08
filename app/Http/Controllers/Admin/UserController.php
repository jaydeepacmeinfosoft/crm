<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Company;
use Validator;
use DataTables;
use Illuminate\Support\Facades\Session;
class UserController extends Controller
{
    public function index(){
        return view('admin.user.index');
    }

    //store record
    // public function store(Request $request)
    // {
    //     $data = $request->input('group-a');
    //     $validatedData = [];
    //     foreach ($data as $key => $userData) {
    //         $validator = $this->validateUser($userData);
    //         if ($validator->fails()) {
    //             return response()->json([
    //                 'key' => $key,
    //                 'status'  => false,
    //                 'errors' => $validator->messages(),
    //             ],500);
    //         }
    //         $validatedData[] = $userData;
    //     }

    //     foreach ($validatedData as $key => $data) {
    //         $result = array_diff_key($data, array_flip(["password"]));
    //         $res = User::create($result);
    //         if($res){
    //             $admin["user_id"] = $res->id;
    //             $admin["name"] = $data["name"];
    //             $admin["email"] = $data["email"];
    //             $admin["password"] = Hash::make($data["password"]);
    //             $admin["user_type"] = 3;
    //             \Log::info(json_encode($admin));
    //             Admin::create($admin);
    //         }
    //     }

    //     return response()->json(['success' => true]);
    // }

    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|unique:add_users',
        //     'password' => 'required|string|min:8|confirmed',
        // ]);
     
        if (auth()->user()->user_type == 1){
             $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'company_id' => 'required',
                 'password' => 'required|string|min:8|confirmed',
               'email' => 'required|email|unique:add_users',
               'user_roll'=>'required',
               'logo' => 'mimes:jpeg,png,jpg,gif|max:2048',
            
            ]);
        } 
       
        if(auth()->user()->user_type == 2){
             $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'password' => 'required|string|min:8|confirmed',
                'email' => 'required|email|unique:add_users',
                'user_roll'=>'required',
                'logo' => 'mimes:jpeg,png,jpg,gif|max:2048',
            ]);
        } 
            if ($validator->fails()) {
                return response()->json([
                    'status'  => false,
                    'errors' => $validator->messages(),
                ],500);
            }
            $data = $request->except(["_token","id"]);
            if ($request->has('logo')) {
                $data["logo"] = rand(1111, 9999) . "-" . $request->file('logo')->getClientOriginalName();
                $request->logo->move(public_path('userlogos'), $data["logo"]);
            }
            if(auth()->user()->user_type == 2){
            $data["company_id"] = auth()->user()->company_id;
         } else {
             $data["company_id"] = $request->input('company_id');
         }
            $res = User::create($data);
            if($res){
                $admin["user_id"] = $res->id;
                $admin["name"] = $data["name"];
                $admin["email"] = $data["email"];
                $admin["password"] = Hash::make($data["password"]);
                $admin["user_type"] = 3;
                Admin::create($admin);
            }
            Session::flash('success', "User Added Successfully");
        return response()->json(['success' => "User Added Successfully"]);
    }


    //validation code
    protected function validateUser($userData)
    {
        return Validator::make($userData, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:add_users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    }

    //View User
    public function viewuser(Request $request){
        $companies = Company::get();
         
        if($request->ajax()){
             if(auth()->user()->user_type == 2) {
                
                  $user = User::with("companies")->where("company_id",auth()->user()->company_id)->get();
                 
             } else {
                  $user = User::with("companies")->get();
             }
       

        return DataTables::of($user)->addIndexColumn()->make(true);
    }
        return view('admin.user.viewuser',compact("companies"));
    }

    public function updateuser(Request $request, $id)
    {
        if (auth()->user()->user_type == 1){
             $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'company_id' => 'required',
                'email' => ['required', 'string', 'email', 'max:255', 'unique:add_users,email,' . $id],
                'user_roll'=>'required',
                'password' => 'required|string|min:8|confirmed',
                'logo' => 'mimes:jpeg,png,jpg,gif|max:2048',
            ]);
        } 

        if(auth()->user()->user_type == 2){
             $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => ['required', 'string', 'email', 'max:255', 'unique:add_users,email,' . $id],
                'user_roll'=>'required',
                'password' => 'required|string|min:8|confirmed',
                'logo' => 'mimes:jpeg,png,jpg,gif|max:2048',
            ]);
        } 

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'errors' => $validator->messages(),
            ],500);
        }
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
         if(auth()->user()->user_type == 2){
            $user->company_id = auth()->user()->company_id;
         } else {
             $user->company_id = $request->input('company_id');
         }
        $user->email = $request->input('email');
        $user->user_roll = $request->input('user_roll');
        if ($request->has('logo')) {
            $data["logo"] = rand(1111, 9999) . "-" . $request->file('logo')->getClientOriginalName();
            $request->logo->move(public_path('userlogos'), $data["logo"]);
        }
        $user->save();
        Admin::where(["user_id" => $id])->first()->update(["name" => $request->input('name'), "email" =>$request->input('email')]);
        Session::flash('success', "User updated successfully.");
        return response()->json(['success' => 'User updated successfully.']);
    }


public function destroy($id)
{
    $user = User::find($id);
    if($user) {
        if($user->delete()) {
            Admin::where("user_id",$id)->delete();
            return response()->json([
                'status' => true,
                'message' => "User Deleted successfully",
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Something went wrong please try again letter..!!",
            ]);
        }
    } else {
        return response()->json([
            'status' => false,
            'message' => "No Data Found",
        ],400);
    }

}

}
