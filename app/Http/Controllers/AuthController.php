<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('auth.registration');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $validatedData = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validatedData->fails()) {
            return Redirect::back()->with('errors', $validatedData->errors());

        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = User::where('email', $request->input('email'))->first();
            if($user->user_type == "facilitator"){
                return redirect("facilitator");
            }else if($user->user_type == "teamlead"){
                return redirect("lead");
            }else{
                return redirect("student");
            }
        }

        else{
            $message = "Oops! You have entered invalid credentials";
            return Redirect::back()->with('error', $message);
        }


    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {
        $validatedData = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/|confirmed',
        ]);

        if ($validatedData->fails()) {
            return Redirect::back()->with('errors', $validatedData->errors());

        }

        $data = $request->all();
        $check = $this->create($data);

        $user = $request->input('user_type');
        if($user == "facilitator"){
            return redirect("facilitator");
        }else if($user == "teamlead"){
            return redirect("lead");
        }else{
            return redirect("student");
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
        else{
            return Redirect::back()->withErrors('Opps! You do not have access');
        }
    }

    public function facilitatorPage()
    {
        return view('pages.facilitator');
    }

    public function studentPage(){
        return view('pages.student');
    }

    public function leadPage(){
        return view('pages.student');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'user_type' => $data['user_type'],
        'email' => $data['email'],
        'password' => FacadesHash::make($data['password'])
      ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        FacadesSession::flush();
        Auth::logout();

        return Redirect('login');
    }
}
