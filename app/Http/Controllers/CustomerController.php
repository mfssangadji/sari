<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = User::where('status', 4)->get();
        return view('auths.customer.index', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auths.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nik' => "required",
            'password' => "required",
            'nama_lengkap' => "required",
            'email' => "required",
            'no_telp' => "required",
            'status' => "required",
        ]);

        User::create([
            'nik' => $request->nik,
            'password' => bcrypt($request->password),
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'status' => $request->status,
        ]);

        return redirect()->route('customer');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $customer)
    {
        $customer = User::find($request->id);
        return view('auths.customer.edit', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(User $customer)
    {
        $customer = User::find($customer->id);
        return view('auths.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $customer)
    {
        $this->validate($request, [
            'nik' => "required",
            'nama_lengkap' => "required",
            'email' => "required",
            'no_telp' => "required",
            'status' => "required",
        ]);

        if(empty($request->password)){
            User::where('id', $customer->id)
            ->update([
                'nik' => $request->nik,
                'nama_lengkap' => $request->nama_lengkap,
                'email' => $request->email,
                'no_telp' => $request->no_telp,
                'status' => $request->status,
            ]);
        }else{
            User::where('id', $customer->id)
            ->update([
                'nik' => $request->nik,
                'password' => bcrypt($request->password),
                'nama_lengkap' => $request->nama_lengkap,
                'email' => $request->email,
                'no_telp' => $request->no_telp,
                'status' => $request->status,
            ]);
        }

        return redirect()->route('customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $customer)
    {
        User::destroy($customer->id);
        return redirect()->route('customer');
    }
}
