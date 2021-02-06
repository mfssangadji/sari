<?php

namespace App\Http\Controllers;

use App\Models\Reklame;
use App\Models\TitikReklame;
use Illuminate\Http\Request;

class TitikReklameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titik = TitikReklame::all();
        return view('auths.titik.index', compact('titik'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reklame = Reklame::all();
        return view('auths.titik.create', compact('reklame'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TitikReklame::create([
            'reklame_id' => $request->reklame_id,
            'lokasi' => $request->lokasi,
        ]);

        return redirect()->route('titik');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TitikReklame  $titikReklame
     * @return \Illuminate\Http\Response
     */
    public function show(TitikReklame $titikReklame)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TitikReklame  $titikReklame
     * @return \Illuminate\Http\Response
     */
    public function edit(TitikReklame $titikReklame, $id)
    {
        $reklame = Reklame::all();
        $titik = TitikReklame::find($id);
        return view('auths.titik.edit', compact('reklame', 'titik'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TitikReklame  $titikReklame
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TitikReklame $titikReklame, $id)
    {
        TitikReklame::where('id', $id)
        ->update([
            'reklame_id' => $request->reklame_id,
            'lokasi' => $request->lokasi,
        ]);

        return redirect()->route('titik');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TitikReklame  $titikReklame
     * @return \Illuminate\Http\Response
     */
    public function destroy(TitikReklame $titikReklame, $id)
    {
        TitikReklame::destroy($id);
        return redirect()->route('titik');
    }
}
