<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\subscription;
use DataTables;
use Illuminate\Support\Facades\Session;

class SubscriptionController extends Controller
{
    public function index()
    {   
        $subscriptions =  Subscription::get();
        return view('admin.subscription.index',compact('subscriptions'));
    }


    public function list(Request $request)
    {   
        if ($request->ajax()) 
        {

            

                $subscription = subscription::orderBy('id', 'DESC')->select('*');
             
            
            return Datatables::of($subscription)
                ->addIndexColumn()
                ->addColumn('period', function ($row) {
                    if ($row->period == 1) {
                        return "Year";
                    } 
                    elseif($row->period == 2) {
                        return "Month";
                    }  
                    elseif($row->period == 3) {
                        return "Day";
                    } 
                  
                    
                }) 
                       ->addColumn('action', function ($row) {
                    return '<a href="'.route('subscription.edit', $row->id).'" type="button" title="EDIT"><i class="fa fa-pen"></i></a> &nbsp;
                            <a href="'.route('subscription.delete', $row->id).'" onclick="return confirm(\'Are you sure you want to delete this item?\');"   title="DELETE" ><i class="fa fa-trash"></i></a>';
                })




                ->rawColumns(['action','period'])
                ->make(true);
        }
        return view('admin.subscription.list');
    }

    public function add()
    {
        return view('admin.subscription.add');
    }
    public function store(Request $request)
    {
        $list_tags= implode(",", $request->list_tags);

        $subscription = new  subscription();
        $subscription->title = $request->title;
        $subscription->duration = $request->duration;
        $subscription->period = $request->period;
        $subscription->price = $request->price;
        $subscription->discount = $request->discount;
        $subscription->discription = $request->discription;
        $subscription->list_tags   = $list_tags;
        $subscription->price_month = $request->price_month;
        $subscription->price_year = $request->price_year;

        if ($request->hasFile('plan_logo')) {
            $file = $request->file('plan_logo');
            $destinationPath = public_path('planlogo');
            $fileName = $file->getClientOriginalName();
            $fileExtension = $file->getClientOriginalExtension();
            $newFileName = uniqid() . time() . '.' . $fileExtension;
            $file->move($destinationPath, $newFileName);
            $subscription->plan_logo = $newFileName;
        }
       
        $subscription->save();
        return redirect()->route('subscription.list')->with(Session::flash('success', 'Subscription Added Successfully'));

    }



    public function edit($id){
        $subscription =  subscription::find($id);
        return view('admin.subscription.edit',compact('subscription'));
    }
    public function update(Request $request)
    {

    
        $list_tags= implode(",", $request->list_tags);
        $subscription =subscription::find($request->editid);
        $subscription->title = $request->title;
        $subscription->duration = $request->duration;
        $subscription->period = $request->period;
        $subscription->price = $request->price;
        $subscription->discount = $request->discount;
        $subscription->discription = $request->discription;
        $subscription->list_tags   = $list_tags;
        $subscription->price_month = $request->price_month;
        $subscription->price_year = $request->price_year;
        if ($request->hasFile('plan_logo')) {
            $file = $request->file('plan_logo');
            $destinationPath = public_path('planlogo');
            $fileName = $file->getClientOriginalName();
            $fileExtension = $file->getClientOriginalExtension();
            $newFileName = uniqid() . time() . '.' . $fileExtension;
            $file->move($destinationPath, $newFileName);
            $subscription->plan_logo = $newFileName;
        }
        $subscription->save();
        return redirect()->route('subscription.list')->with(Session::flash('success', 'Subscription update Successfully'));

   

    }



    public function delete($id){
        $subscription =  subscription::find($id);
        $subscription->delete();
        return redirect()->route('subscription.list')->with(Session::flash('success', 'Subscription Deleted Successfully'));
    }
}

