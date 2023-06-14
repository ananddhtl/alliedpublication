<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class AdminUserController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AdminUser $adminUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdminUser $adminUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdminUser $adminUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdminUser $adminUser)
    {
        //
    }
    public function createAdmin(Request $request)
    {
        /** check if admin user is already generated */
        $checkUser = AdminUser::where('email', 'admin@alliedpublication.com')->first();
        if ($checkUser) {
            return response()->json(['error' => 'Admin Account Already Exists'], 200);
        }
    
        $admin = new AdminUser;
        $admin->name = "Allied Publication";
        $admin->email = "admin@alliedpublication.com";
        $adminPassword = 'admin@123'; // Set the password here
        $admin->password = Hash::make($adminPassword);
        $status = $admin->save();
        $request->session()->put('sessionAdminUserPassword', $adminPassword); // Store the password in the session
    
        if ($status) {
            return response()->json(['success' => 'Admin Account Created Successfully'], 200);
        }
        
        return response()->json(['error' => 'System is Having Trouble Creating Admin Account'], 200);
    }
    
    
}