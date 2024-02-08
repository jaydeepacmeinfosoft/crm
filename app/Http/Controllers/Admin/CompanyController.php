<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $companies = Company::with("users")->orderBy('id', 'desc')->get();
            return DataTables::of($companies)
                ->addColumn('action', function ($company) {
                    $actions = '<a href="" id="editmodal"  data-id="' . $company->id . '"><i class="fas fa-pencil-alt"></i></a>';
                    $actions .= '<a href=""  id="deletemodal" data-id="' . $company->id . '" ><i  class="fas fa-trash ml-2" ></i></a>';
                    return $actions;
                })->addIndexColumn()
                ->rawColumns(['action']) // Allow HTML in the "action" column
                ->toJson();
        }
        return view('admin.company.index');
    }

    public function store(Request $request)
    {
        $id = $request->input('id', 0);

        $validator = Validator::make($request->all(),  [
            'company_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'number' => 'required|min:10',
            'address' => 'required',
            'logo' => 'mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'errors' => $validator->messages(),
            ], 500);
        }
        $input = $request->except(['_token,password']);
        if ($request->has('logo')) {
            $input["logo"] = rand(1111, 9999) . "-" . $request->file('logo')->getClientOriginalName();
            $request->logo->move(public_path('logos'), $input["logo"]);
        }
            $res = Company::create($input);
            if ($res) {
                $user["company_id"] = $res->id;
                $user["name"] = $input["company_name"];
                $user["email"] = $input["email"];
                $user["password"] = Hash::make($request->password);
                $user["user_type"] = 2;
                \Log::info(json_encode($user));
                Admin::create($user);
            }


        Session::flash('success', "Company Added Successfully");
        if ($res) {
            return response()->json(['success' => "Company Added Successfully"]);
        } else {
            return response()->json(['error' => "Something went wrong please try again letter..!!"]);
        }
    }

    public function update(Request $request)
    {
        $id = $request->input('id', 0);

        $validator = Validator::make($request->all(),  [
            'company_name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:companies,email,' . $id],
            'number' => 'required|min:10',
            'password' => 'required|string|min:8|confirmed',
            'address' => 'required',
            'logo' => 'mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'errors' => $validator->messages(),
            ], 500);
        }

        $input = $request->except(['_token,password']);
        if ($request->has('logo')) {
            $input["logo"] = rand(1111, 9999) . "-" . $request->file('logo')->getClientOriginalName();
            $request->logo->move(public_path('logos'), $input["logo"]);
        }

        if ($request->id > 0) {
            $res = Company::find($id)->update($input);
            Admin::where(["company_id" => $id])->first()->update(["name" => $request->input('company_name'), "email" =>$request->input('email')]);
            Session::flash('success', "Company updated Successfully");
            return response()->json(['success' => "Company updated Successfully"]);
        }

        Session::flash('error',  "Something went wrong please try again letter..!!");
            return response()->json(['error' => "Something went wrong please try again letter..!!"]);

    }


    //show data
    public function show($id)
    {
        $company = Company::find($id);
        if (!$company) {
            return response()->json(['error' => 'Company not found'], 404);
        }
        $company->logo_path = url('public/logos/'.$company->logo);
        $editForm = view("admin.company._form",compact("company"))->render();
        return response()->json([
            "data" => $editForm
        ]);
        // return response()->json($company);
    }
    
    public function clearFormData()
    {
        $editForm = view("admin.company._form")->render();
        return response()->json([
            "data" => $editForm
        ]);
    }
    
    public function destroy($id)
{
    $company = Company::find($id);
    if($company) {
        if($company->delete()) {
            Admin::where("company_id",$id)->delete();
            return response()->json([
                'status' => true,
                'message' => "Company Deleted successfully",
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

    // //delete code
    // public function destroy($id)
    // {
    //     $company = Company::find($id);

    //     if (!$company) {
    //         return response()->json(['error' => 'Company not found'], 404);
    //     }

    //     $company->delete();
    //     return response()->json(['message' => 'Company deleted successfully']);
    // }
    
     public function admincompany()
    {
        return view('admin.company_user.index');
    }

    public function usermodal($id)
    {
       $company = Company::find($id);
       
        $user= User::where('company_id',$id)->get();
        if (!$company) {
            return response()->json(['error' => 'Company not found'], 404);
        }
      
        $userForm = view("admin.company_user.index",compact("company"))->render();
       
        return response()->json([
            "data" => $userForm,
            "company" => $company,
            "user"=> $user,
            "usercount" => $user->count(),
        ]);
        // return response()->json($company);
    }
}
