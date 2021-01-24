<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PelaporanController extends Controller
{
    public function index()
    {
    	$pemesanan = Pemesanan::orderBy('id', 'DESC')->get();
    	return view('auths.pelaporan.create', compact('pemesanan'));
    }
}
