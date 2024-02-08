<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use App\Models\Admin;
use Illuminate\Support\Facades\Password;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    public function showResetForm(Request $request){
        return view('admin.auth.passwords.reset',['token' => $request->route('token'),'email' => $request->get('email')]);
    }

    public function changePassword() {
        if (Auth::check()) {
            $admin = $user = Auth::user();
            return view('admin.auth.passwords.change', ['admin' => $admin]);
        }
        return redirect()->back()->with('failed', 'Failed! please login first');
    }

    public function updatePassword(Request $request) {
        $request->validate([
            'current_password'    => ['required'],
            'password'            => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return back()->with('error', "Old Password Doesn't match!");
        }
        $admin = Admin::find(Auth::user()->id);
        // $admin = Admin::where('email', $request->email)->first();

        if ($admin) {
            $admin['password'] = Hash::make($request->password);
            $admin->save();
            return redirect()->back()->with('success', 'Success! password has been changed');
        }
        return redirect()->back()->with('error', 'Failed! something went wrong');
    }
}
