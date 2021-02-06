<?php

namespace App\Http\Controllers;

use App\Models\Reklame;
use App\Models\KategoriReklame;
use Illuminate\Http\Request;

class ReklameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reklame = Reklame::all();
        return view('auths.reklame.index', compact('reklame'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = KategoriReklame::all();
        return view('auths.reklame.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Reklame::create([
            'kategori_id' => $request->kategori_id,
            'nama_jenis_reklame' => $request->nama_jenis_reklame,
            'keterangan' => $request->keterangan,
            'harga' => $request->harga,
        ]);

        return redirect()->route('reklame');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reklame  $reklame
     * @return \Illuminate\Http\Response
     */
    public function show(Reklame $reklame)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reklame  $reklame
     * @return \Illuminate\Http\Response
     */
    public function edit(Reklame $reklame)
    {
        $kategori = KategoriReklame::all();
        $reklame = Reklame::find($reklame->id);
        return view('auths.reklame.edit', compact('reklame', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reklame  $reklame
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reklame $reklame)
    {
        Reklame::where('id', $reklame->id)
        ->update([
            'kategori_id' => $request->kategori_id,
            'nama_jenis_reklame' => $request->nama_jenis_reklame,
            'keterangan' => $request->keterangan,
            'harga' => $request->harga,
        ]);

        return redirect()->route('reklame');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reklame  $reklame
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reklame $reklame)
    {
        Reklame::destroy($reklame->id);
        return redirect()->route('reklame');
    }
}
