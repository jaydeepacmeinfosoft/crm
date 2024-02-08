<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;
use App\Models\Activity;
use Auth;
use Illuminate\Support\Facades\Validator;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (\request()->ajax()) {
             if(Auth::user()->user_type == 2)
                   $data = Activity::select("activity.*","tbl_lead.vFullname","tbl_lead.vTitle","tbl_lead.vleadType")->leftJoin('tbl_lead', 'tbl_lead.iid', '=', 'activity.lead_id')->where("tbl_lead.vCompany",Auth::user()->company_id)->get();
            else
                $data = Activity::leftJoin('activity', 'activity.iid', '=', 'lead.iid')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.activity.index');
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),  [
            'activityStartDate' => 'required',
            'activityStartDate' => 'required',
            'activity_type' => 'required',
            // 'metting' => 'required',
            'activityEndDate' => 'required',
            'location' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => $validator->messages(),
            ], 500);
        }

        $input = $request->except(["_token,id"]);
        if ($input["activity_type"] != "Meetinng") {
            $input["metting"]  = "";
        }

        $activity = Activity::updateOrCreate(["id" => $request->id], $input);
        if ($activity) {
            if ($request->id > 0) {
                Session::flash('success', "Activity Updated Successfully");
            } else {
                Session::flash('success', "Activity Added Successfully");
            }
            return response()->json(["status" => true, "data" => $activity]);
        } else {
            Session::flash('error', "Something went wrong please try again letter..!!");
            return response()->json([
                'status' => false,
                'error' => "Something went wrong please try again letter..!!",
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        $activity = Activity::where("id", $activity->id)->first();
        // print_r($activity); exit;
        $editForm = view("admin.activity._form", compact("activity"))->render();
        return response()->json(["data" => $editForm]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {


        return response()->json($activity);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        if ($activity) {
            if ($activity->delete()) {
                Activity::where("id", $activity->id)->delete();
                return response()->json([
                    'status' => true,
                    'message' => "Activity Deleted successfully",
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
            ], 400);
        }
    }

    public function add_schedule(Request $request)
    {
        $validator = Validator::make($request->all(), [
         
            'lead_id' => 'required',
            'company_id' => 'required',
            // 'location'=>'required',
            'activity_type' => 'required',
            'description' => 'required',
            'schedule' => 'required',
            // 'date' =>'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'errors' => $validator->errors(),
            ], 500);
        }
        $activity = new Activity();
        $activity->lead_id = $request->lead_id;
        $activity->location = $request->location;
        $activity->activity_type = $request->activity_type;
        $activity->description = $request->description;
        $activity->company_id = $request->company_id;
          $activity->schedule = $request->schedule;
        
        // Save the activity to the database
        $activity->save(); 

       
        // Flash a success message (optional)
       
        return response()->json(["status" => true, "data" => $activity]);
        Session::flash('success', "Activity Added Successfully");

    }
    public function whatsup_schedule(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lead_id' => 'required',
            'location' => 'required',
            'activity_type' => 'required',
            'description' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'errors' => $validator->errors(),
            ], 500);
        }
        $activity = new Activity();
        $activity->lead_id = $request->lead_id;
        $activity->location = $request->location;
        $activity->activity_type = $request->activity_type;
        $activity->description = $request->description;
        $activity->schedule =date('Y-m-d');
        
        // Save the activity to the database
        $activity->save();

        // Flash a success message (optional)
       
        return response()->json(["status" => true, "data" => $activity]);
        Session::flash('success', "Activity Added Successfully");



 } }   
