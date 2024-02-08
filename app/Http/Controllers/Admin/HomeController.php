<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;
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
        $activityList = Activity::with("lead")->orderBy("activityStartDate","desc")->get();
        return view('admin.home',compact("activityList"));
    }

    public function changeProfile() {
        $result = Auth::user();
        return view('admin.auth.profile', compact('result'));
    }

    public function updateProfile(Request $request) {
        $this->validate($request, [
            'name'         => ['required', 'string', 'max:255'],
            'email'        => ['required', 'string', 'email', 'max:255', 'unique:admins,id,' . Auth::user()->id]
        ]);
        $input = $request->except(['token']);
        $authUser = Auth::user();
        $admin = Admin::whereId($authUser->id)->first();
        if ($admin) {
            $status = $admin->update($input);
            if ($status) {
                return redirect()->back()->with('success', 'Profile Updated Successfully');
            }
        }
        return redirect()->back()->with('error', 'Sorry, Something went wrong please try again');
    }
}
