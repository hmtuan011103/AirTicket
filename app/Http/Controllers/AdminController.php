<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.authentication.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.authentication.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminLoginRequest $request)
    {
        $credentials = $request->only('email','password');
        $remember = $request->filled('remember');
//        dd($credentials,$remember);
        if(Auth::guard('admin')->attempt($credentials,$remember)){
            toastr()->success('Successful login');
            return redirect()->intended('admin');
        } else {
            return redirect()->back()
                ->with('error','Invalid credentials');
        }
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        Auth::guard('admin')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/admin-auth');
    }
}
