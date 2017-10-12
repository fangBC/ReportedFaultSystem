<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Models\User;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function updatePassword(Request $request)
    {

        $guard = Auth::guard();
//        if (! $guard->validate($request->only('password'))) {
//            return 403;
//        }

        $user = Auth::User()->email;
        User::where('email',$user)->update([
            'password' =>bcrypt($request->get('new_password'))
        ]);

        Session::set('_passwordUpdate', trans('messages.update_success', ['entity' => 'Your password']));

        return 200;
    }
}
