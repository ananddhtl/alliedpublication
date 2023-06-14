<?php

namespace App\Http\Controllers;

use App\Models\PublicUser;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PublicUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'mobile_number' => 'required|numeric',
            'password' => 'required|string',
            'user_district' => 'required',
            'user_city' => 'required|string',
            'user_school' => 'required|string',
            'user_category' => 'required',
        ]);

        $checkEmail = DB::table('public_users')->where('email', $request->email)->first();
        if ($checkEmail) {
            return redirect()->back()->with('message', 'You have already registered with this email');
        }

        $checkPhone = DB::table('public_users')->where('mobile_number', $request->mobile_number)->first();
        if ($checkPhone) {
            return redirect()->back()->with('message', 'Mobile Number already exists in the system');
        }

        $password = Hash::make($request->password);

        $publicUser = new PublicUser();
        $publicUser->name = $request->input('name');
        $publicUser->email = $request->input('email');
        $publicUser->mobile_number = $request->input('mobile_number');
        $publicUser->password = $password;
        $publicUser->user_district = $request->input('user_district');
        $publicUser->user_city = $request->input('user_city');
        $publicUser->user_school = $request->input('user_school');
        $publicUser->status = 0;
        $publicUser->user_catagory = $request->input('user_category');
        $publicUser->save();
        $request->session()->put('sessionUserPassword', $password);

        return redirect('/login')->with('message', 'You have been registered successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(PublicUser $publicUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PublicUser $publicUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PublicUser $publicUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PublicUser $publicUser)
    {
        //
    }
    public function login(Request $request)
    {
        $request->validate([
            'useremail' => 'required|email',
            'userpassword' => 'required',
        ]);

        $email = $request->useremail;
        $password = $request->userpassword;

        $user = PublicUser::where('email', $email)->first();

        if ($user) {
            if (Hash::check($password, $user->password)) {
                $request->session()->put('sessionUserPassword', $user->password);
                $request->session()->save();
                return redirect('/');
            } else {
                return redirect()->back()->withErrors(['userpassword' => 'Password is incorrect.']);
            }
        } else {
            return redirect()->back()->withErrors(['useremail' => 'Email is incorrect or does not exist.']);
        }
    }

    public function forgetPassword(Request $request)
    {
        $email = $request->email;
        $user = PublicUser::where('email', $email)->first();
        if (!$user) {
            return redirect()->back()->with('message', 'This email is not registered yet!');
        }
        $request->session()->put('sessionUserEmail', $user->email);
        $request->session()->save();
        $data = [
            'url' => url('/changepassword'),
            'email' => $request->email,
        ];
        Mail::send('frontend.emailtemplate.forgetpassword', $data, function ($message) use ($data) {
            $message->to($data['email']);
            $message->from(env('MAIL_USERNAME'));
            $message->subject('Send Link');
        });

        return redirect()->back()->with('message', 'Please check your mail');
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6',
        ]);

        $user = PublicUser::where('email', session()->get('sessionUserEmail'))->first();
        if (!$user) {
            return redirect()->back()->with('success', 'User not found');
        }

        if (Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('success', 'Old password cannot be your new password');
        }

        $user->password = Hash::make($request->password);
        $user->save();
        $request->session()->put('sessionUserPassword', $user->email);

        return redirect('/login')->with('success', 'Your password has been changed successfully');
    }
    public function getPublicUserDetails(Request $request)
    {
        $user = \DB::table('public_users')
            ->select('*')
            ->where('password', session()->get('sessionUserPassword'))
            ->get();

        if (count($user) > 0) {
            $id = $user[0]->id;

            $publicUsersDetails = \DB::table('public_users')
                ->where('id', '=', @$user[0]->id)
                ->select('*')
                ->first();

            return view('frontend.dashboard', compact('publicUsersDetails'))->with('status', 'Successful!');
        } else {
            return redirect('/login')->withErrors(['msg' => 'User not found. Please login or register.']);
        }
    }
    public function acceptuser()
    {
        $acceptUser = DB::table('public_users')
        ->join('user_districts', 'public_users.user_district', '=', 'user_districts.id')
        ->join('user_roles', 'public_users.user_catagory', '=', 'user_roles.id')
        ->select('public_users.*','user_districts.title as district_title','user_roles.title as role_title')
        ->where('public_users.status',0)->get();
        
        $acceptUserData = DB::table('public_users')->join('user_districts', 'public_users.user_district', '=', 'user_districts.id')
        ->join('user_roles', 'public_users.user_catagory', '=', 'user_roles.id')
        ->select('public_users.*','user_districts.title as district_title','user_roles.title as role_title')
        ->where('public_users.status',1)->get();
        return view('backend.acceptuser', compact('acceptUser','acceptUserData'));
    }
    
    public function updateUser(Request $request, $id)
{
    $acceptUser = PublicUser::findOrFail($id);
    $acceptUser->status = 1;
    $acceptUser->save();

    return redirect('/acceptuser')->with('message', 'User has been accepted successfully');
}
}