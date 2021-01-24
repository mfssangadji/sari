<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemesanan = Pemesanan::orderBy('id', 'DESC')->get();
        return view('auths.pemesanan.index', compact('pemesanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Pemesanan $pemesanan)
    {
        $pemesanan = Pemesanan::find($request->id);
        return view('auths.pemesanan.edit', compact('pemesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemesanan $pemesanan)
    {
        Pemesanan::destroy($pemesanan->id);
        return redirect()->back();
    }

    public function perizinan(Request $request)
    {
        Pemesanan::where('id', $request->id)
        ->update([
            'status_perizinan' => 1,
        ]);

        return redirect()->back();
    }

    public function pembayaran(Request $request)
    {
        Pembayaran::where('pemesanan_id', $request->id)
        ->update([
            'status_pembayaran' => 1,
        ]);

        return redirect()->back();
    }

    public function reklame(Request $request)
    {
        Pemesanan::where('id', $request->id)
        ->update([
            'status_reklame' => 1,
        ]);

        return redirect()->back();
    }
}
