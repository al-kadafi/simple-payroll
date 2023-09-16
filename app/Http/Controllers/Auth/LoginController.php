<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * login
     *
     * @param  mixed $request
     * @return void
     */
    public function login(Request $request)
    {
        /**
         * validate request
         */
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //get email and password from request
        $credentials = $request->only('email', 'password');

        //attempt to login
        if (Auth::attempt($credentials)) {
            //regenerate session
            $request->session()->regenerate();

            //redirect route dashboard
            return redirect()->route('salary')->with('message', [
                'title' => 'Success',
                'type' => 'success',
                'msg' => 'You have been successfully login',
            ]);
        }

        //if login fails
        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ]);
        return redirect()
            ->back()
            ->withInput()
            ->with('message', [
                'title' => 'Error',
                'type' => 'error',
                'msg' => 'The provided credentials do not match our records',
            ]);
    }

    /**
     * destroy
     *
     * @return void
     */
    public function logout()
    {
        auth()->logout();

        return redirect('/')->with('message', [
            'title' => 'Success',
            'type' => 'success',
            'msg' => 'You have been successfully logged out',
        ]);
    }
}
