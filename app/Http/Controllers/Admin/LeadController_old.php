<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Lead;
use App\Models\LeadItem;
use App\Models\PipelineCategory;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;
use App\Http\Requests\LeadRequest;
use App\Http\Helpers\CommonFunction;
use App\Models\Company;

use App\Imports\BulkLeadImport;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Auth;
class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,$type=null)
    {   
        $countries = \DB::table('countries')
            ->get();
        
        
        $customeArr = config("customeArr");
        $currency = $customeArr["currency"];
        $leadTypeArr = PipelineCategory::get();
        // $leadTypeArr = CommonFunction::getLeadType();
        if($request->ajax()){
            if(auth()->user()->user_type == 2) {
                 $leads = Lead::with(["pipelinectegory","companies"])->where("vCompany",auth()->user()->company_id)->orderBy('iid','desc')->get();
            } else if(auth()->user()->user_type == 3) {
                $user = User::find(Auth::user()->user_id);
                $leads = Lead::with(["pipelinectegory","companies"])->where("vCompany", $user->company_id)->orderBy('iid','desc')->get();
            }
            else {
                 $leads = Lead::with(["pipelinectegory","companies"])->orderBy('iid','desc')->get();
            }
           
            if($request->has("leadType") && $request->leadType != ""){
                $leads = Lead::with(["pipelinectegory","companies"])->where("vPipeline", $request->leadType)->get();
            }
            return DataTables::of($leads)->addIndexColumn()->make(true);
        }
        $leadTypeName = "";
        if($type){
            $leadTypeName = $leadTypeArr->find($type);
        }
        $companies = Company::get();
        return view("admin.lead.index",compact("leadTypeArr","currency","type","leadTypeName","companies","countries"));
    }

    public function pipelineView(){
        // $leadTypeArr = CommonFunction::getLeadType();
        $leadTypeArr = PipelineCategory::get();
        $result = [];
        $typeIds = [] ;
        $c = 0;
        foreach($leadTypeArr as $key => $leadt){
            $result[$c]["lead_name"] = $leadt->category;
            $result[$c]["id"] = $leadt->id;
            if(Auth::user()->user_type == 2)
            $result[$c]["leadData"] = Lead::where(["vPipeline" => $leadt->id,"vCompany"=>Auth::user()->company_id])->orderBy("iid","desc")->limit(3)->get();
            else
            $result[$c]["leadData"] = Lead::where("vPipeline",$leadt->id)->orderBy("iid","desc")->limit(3)->get();
            $typeIds[] = $leadt->id;
            $c++;
        }
        // dd($result);
        return view("admin.lead.pipeline",compact("leadTypeArr","result","typeIds"));
    }
    
    // -------added by Hitesh Mistry at 03/12/23----------
    public function getSchedule($id){
         return view("admin.lead.schedule");
    }
    
    
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function leadReport()
    {
        $customeArr = config("customeArr");
        $currency = $customeArr["currency"];
        $qualifiedLead = Lead::where("vPipeline","qualified")->get();
        $contactLead = Lead::where("vPipeline","contact")->get();
        $demoLead = Lead::where("vPipeline","demo")->get();
        $quotationLead = Lead::where("vPipeline","quotation")->get();
        $inquiryLead = Lead::where("vPipeline","inquiry")->get();
        return view("admin.lead.lead_report",compact("currency","qualifiedLead","contactLead","demoLead","quotationLead","inquiryLead"));
    }

    public function changeLeadupdateType(Request $request)
    {
       $res = Lead::find($request->id)->update(["vPipeline" => $request->typeId]);
       if($res){
            return response()->json([
                "status" => true,
                "message" => "changes Suceesfully"
            ]);
       } else {
        return response()->json([
            "status" => false,
            "message" => "changes not Suceesfully"
        ],400);
       }

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(LeadRequest $request)
    {
        $validator = Validator::make($request->all(), $request->rules());
        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => $validator->messages(),
            ],500);
        }

         $input = $request->except("_token","id","item","quantity","price","tax","amount","count","leadTypeId");
        $input["vleadType"] = $request->vleadType??"qualified";
        if(auth()->user()->user_type == 2) {
            $input["vCompany"] = auth()->user()->company_id;
        }
        if($request->leadTypeId > 0){
            $input["vPipeline"] = $request->leadTypeId;
        }

        if($request->has("id") && $request->id > 0){
            $res = Lead::where("iid",$request->id)->update($input);
            if($res){
                if($request->has("item")){
                    LeadItem::where("iLeadId" , $request->id)->delete();
                    foreach ($request->item as $key => $value) {
                        if($request->item[$key]!="" && $request->quantity[$key] >0 && $request->price[$key] && $request->amount[$key]){
                            LeadItem::create([
                                "iLeadId" => $request->id,
                                "vItem" => $request->item[$key],
                                "fQuantity" => $request->quantity[$key],
                                "dPrice" => $request->price[$key],
                                "dTax" => $request->tax[$key],
                                "dAmount" => $request->amount[$key],
                            ]);
                        }
                    }
                }
                Session::flash('success', "Lead Updated Successfully");
                return response()->json([
                    'status' => true,
                    'success' => "Lead Updated Successfully",
                ]);
            }
        } else {
            $res = Lead::create($input);
            if($res){
                if($request->has("item")){
                    foreach ($request->item as $key => $value) {
                        if($request->item[$key]!="" && $request->quantity[$key] >0 && $request->price[$key] && $request->amount[$key]){
                            LeadItem::create([
                                "iLeadId" => $res->iid,
                                "vItem" => $request->item[$key],
                                "fQuantity" => $request->quantity[$key],
                                "dPrice" => $request->price[$key],
                                "dTax" => $request->tax[$key],
                                "dAmount" => $request->price[$key],
                            ]);
                        }
                    }
                }
                Session::flash('success', "Lead Added Successfully");
                return response()->json([
                    'status' => true,
                    'success' => "Lead Added Successfully",
                ]);
            }
        }
        return response()->json([
            'status' => false,
            'error' => "Something went wrong please try again letter..!!",
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lead $lead)
    {
        $countries = \DB::table('countries')
            ->get();
        $customeArr = config("customeArr");
        $currency = $customeArr["currency"];
        $leadItem = LeadItem::where("iLeadId" , $lead->iid)->get();
        $leadTypeArr = PipelineCategory::get();
        $companies = Company::get();
        $editForm = view("admin.lead._form",compact("companies","lead","leadTypeArr","customeArr","currency","leadItem","countries"))->render();
        return response()->json([
            "data" => $editForm
        ]);

    }
    
    public function clearFormData(Request $request)
    {
        $customeArr = config("customeArr");
        $currency = $customeArr["currency"];
        $leadTypeArr = PipelineCategory::get();
        $companies = Company::get();
        $type = $request->type??"";
        $editForm = view("admin.lead._form",compact("companies","leadTypeArr","customeArr","currency","type"))->render();
        return response()->json([
            "data" => $editForm
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lead $lead)
    {
        if($lead) {
            if($lead->delete()) {
                LeadItem::where("iLeadId", $lead->iid)->delete();
                return response()->json([
                    'status' => true,
                    'message' => "Lead Deleted successfully",
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
    
      public function bulklead(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv,txt', // Only allow .xlsx and .xls files
        ]);
        if ($request->has('file')) {
            $data = Excel::toArray(new BulkLeadImport, request()->file('file'));
            $data = $data[0];
            
             // Define the required column headers
        $requiredColumns = [
            'Fullname', 'Company', 'Whatsapp', 'Email', 'Product',
            'Plateform',  
        ];

        // Check if all required columns are present in the file
        $fileColumns = array_map('trim', $data[0]);
        if (count(array_diff($requiredColumns, $fileColumns)) > 0) {
            return response()->json([
                'status' => false,
                'error' => 'Please Download a Sample File',
            ]);
        }
            
            foreach ($data as $key => $row) {
                if ($key > 0) {
                    $vFullname = $row[0];
                      $vCompany = $row[1];
                    $vWhatsapp = $row[2];
                    $vEmail = $row[3];
                    $vTitle = $row[4];

                    $vPlateform = $row[5];
                //     $dValue = $row[6];
                //     $vCurrency = $row[7];
                //     $vPipeline = $row[8];
                //     $dProbability = $row[9];
                //     $startdateString = $row[10];
                //   $dExpectedStartDate = date('Y-m-d', strtotime(  $startdateString));
                //     $enddateString = $row[11];
                    
                //     $dExpectedCloseDate = date('Y-m-d', strtotime(  $enddateString));
                    
                //     $vRemark = $row[12];


                    

                    $vCompanyId = DB::table('companies')->select('id')->where('company_name', $vCompany)->first();
                    if ($vCompanyId) {
                       
                        $vCompanyId = $vCompanyId->id;
                    } else {
                       
                        $vCompanyId = null;
                    }


                    // $vPipelineUId = DB::table('pipelinecategories')->select('id')->where('category', $vPipeline)->first();
                    // if ($vPipelineUId) {
                    //     $vPipelineUId = $vPipelineUId->id;
                    // } else {

                    //     $vPipelineUId= null;
                    // }

                  
            
                    
                    $bulklead = new Lead();
                   
                    $bulklead->vFullname = $vFullname;
                    $bulklead->vCompany =$vCompanyId;
                    $bulklead->vWhatsapp = $vWhatsapp;
                    $bulklead->vEmail = $vEmail;
                    $bulklead->vTitle = $vTitle;
                    $bulklead->vPlateform = $vPlateform;
                    // $bulklead->dValue = $dValue;
                    // $bulklead->vCurrency = $vCurrency;
                    // $bulklead->vPipeline = $vPipelineUId;
                    // $bulklead->dProbability = $dProbability;
                    // $bulklead->dExpectedStartDate = $dExpectedStartDate;
                    // $bulklead->dExpectedCloseDate = $dExpectedCloseDate;
                    // $bulklead->vRemark = $vRemark;
                    $bulklead->save();
                     
                   
                //     $vItem = $row[13];
                //     $fQuantity =  explode(',', $row[14]) ;
                //     $dPrice = explode(',', $row[15]);
                //     $dTax = explode(',', $row[16]);
                //     $dAmount= explode(',', $row[17]);
                   
                //     $vItemArray = explode(',', $vItem);
                //     if ($row[0] != null && $row[13] != null ) {
                //     foreach ($vItemArray as $key => $i) {
                //         $leadItem = new LeadItem();
                //         $leadItem->iLeadId  = $bulklead->iid;
                //         $leadItem->vItem = $i;
                //         $leadItem->fQuantity = (double)$fQuantity[$key];


                //         $leadItem->dPrice = (double) $dPrice[$key];
                //         $leadItem->dTax = (double) $dTax[$key];
                //         $leadItem->dAmount = (double) $dAmount[$key];
                //         $leadItem->save();
                //     }
                // }
                }
             
            }
            Session::flash('success', "Bulk Lead Added Successfully"); 
            return response()->json([
                'status' => true,
                'success' => " Bulk Lead Added Successfully",
            ]);
        }
    }
    
    public function getStates(Request $request)
    {
        $states = \DB::table('states')
            ->where('country_id', $request->country_id)
            ->get();
        
        if (count($states) > 0) {
            return response()->json($states);
        }
    }
     public function getCities(Request $request)
    {
        $cities = \DB::table('cities')
            ->where('state_id', $request->state_id)
            ->get();
        
        if (count($cities) > 0) {
            return response()->json($cities);
        }
    }
}
