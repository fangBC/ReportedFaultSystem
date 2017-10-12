<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * 显示注册页面
     * */
    public function index()
    {
        return view('backend.register.register');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(Request $request)
    {
        $data = $request->all();

        $s = Validator::make($data, [
            'email' => 'required|max:255',
            'pwd'  => 'required|min:6',
            'type' => 'required'
        ]);

        if( $s->fails() ) {
            return "<script>alert('提交失败，请查看是否填写有误');window.history.back(-1);</script>";
        }

        $this->check_user($data['email']);

        $boole =  User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['pwd']),
            'is_admin' => $data['type']
        ]);
        if ($boole) {
            return "<script>alert('注册成功'); window.location.href='register'</script>";
        } else {
            return "<script>alert('注册失败');window.history.back(-1);</script>";
        }
    }

    public function check_user($user)
    {
        $e = User::where('email', $user)->first();
        if ($e != null){
             die("<script>alert('该帐号已经存在');window.history.back(-1);</script>");
        }
    }

}
