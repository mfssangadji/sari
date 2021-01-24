<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Reklame;
use App\Models\Pemesanan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
    	return view('welcome');
    }

    public function cregister()
    {
    	return view('register');
    }

    public function pregister(Request $request)
    {
    	User::create([
    		'nik' => $request->nik,
    		'nama_lengkap' => $request->nama_lengkap,
    		'email' => $request->email,
    		'password' => bcrypt($request->password),
    		'pekerjaan' => $request->pekerjaan,
    		'jenis_kelamin' => $request->jenis_kelamin,
    		'no_telp' => $request->no_telp,
    		'nama_instansi' => $request->nama_instansi,
    		'alamat' => $request->alamat,
    		'status' => 4,
    	]);

    	return redirect()->route('clogin')->with(['login-success' => 'Registrasi berhasil, silahkan login menggunakan email dan password anda.']);
    }

    public function clogin()
    {
    	return view('login');
    }

    public function plogin(Request $request)
    {
    	if(Auth::attempt($request->only('email', 'password'))){
    		if(Auth::check() && auth()->user()->status == 4){
	    		return redirect()->route('welcome');
	    	}
    	}

    	return redirect()->route('clogin');
    }

    public function profil()
    {
    	$profil = User::where('id', auth()->user()->id)->first();
    	return view('profil', compact('profil'));
    }

    public function uprofil(Request $request)
    {
    	if(empty($request->password)){
    		User::where('id', auth()->user()->id)
    		->update([
	    		'nik' => $request->nik,
	    		'nama_lengkap' => $request->nama_lengkap,
	    		'email' => $request->email,
	    		'pekerjaan' => $request->pekerjaan,
	    		'jenis_kelamin' => $request->jenis_kelamin,
	    		'no_telp' => $request->no_telp,
	    		'nama_instansi' => $request->nama_instansi,
	    		'alamat' => $request->alamat,
	    	]);
    	}else{
    		User::where('id', auth()->user()->id)
    		->update([
	    		'nik' => $request->nik,
	    		'nama_lengkap' => $request->nama_lengkap,
	    		'email' => $request->email,
	    		'password' => bcrypt($request->password),
	    		'pekerjaan' => $request->pekerjaan,
	    		'jenis_kelamin' => $request->jenis_kelamin,
	    		'no_telp' => $request->no_telp,
	    		'nama_instansi' => $request->nama_instansi,
	    		'alamat' => $request->alamat,
	    	]);
    	}

    	return redirect()->back()->with(['ubah-success' => 'Profil berhasil dirubah.']);;
    }

    public function creklame()
    {
    	$reklame = Reklame::orderBy('id', 'DESC')->get();
    	return view('reklame', compact('reklame'));
    }

    public function order(Request $request)
    {
    	if(Auth::check() && auth()->user()->status == 4){
    		$reklame = Reklame::find($request->id);
    		return view('order', compact('reklame'));
    	}else{
    		return redirect()->route('clogin');
    	}
    }

    public function porder(Request $request)
    {
        $files = $request->file_pendukung;
        if($request->hasFile('file_pendukung'))
        {
            foreach ($files as $file) {
                $name = explode(".", $file->getClientOriginalName());
                $ext_file = $file->getClientOriginalExtension();
                $filex = str_replace(' ', '_', auth()->user()->id."_".$name[0]).'.'.$ext_file;
                $file_p[] = str_replace(' ', '_', auth()->user()->id."_".$name[0]).'.'.$ext_file;
                $file->move('uploads/', $filex);
            }

            Pemesanan::create([
                'user_id' => auth()->user()->id,
                'reklame_id' => $request->reklame_id,
                'kode_pemesanan' => rand(111119,999999),
                'tanggal_awal_pemasangan' => $request->tanggal_awal_pemasangan,
                'tanggal_akhir_pemasangan' => $request->tanggal_akhir_pemasangan,
                'isi_reklame' => $request->isi_reklame,
                'file_pendukung' => implode(", ", $file_p),
            ]);
        }

        return redirect()->route('riwayat')->with(['pemesanan-success' => 'Pemesanan berhasil, berikut merupakan data riwayat pemesanan anda.']);;
    }

    public function riwayat()
    {
        $pemesanan = Pemesanan::where('user_id', auth()->user()->id)->get();
        return view('riwayat', compact('pemesanan'));
    }

    public function driwayat(Request $request)
    {
        Pemesanan::destroy($request->id);
        return redirect()->back();
    }

    public function payment(Request $request)
    {
        $pemesanan = Pemesanan::find($request->id);
        return view('payment', compact('pemesanan'));
    }

    public function upayment(Request $request)
    {
        $ext_file = $request->file('file')->getClientOriginalExtension();
        $file = "bukti_bayar_".time().'.'.$ext_file;
        $request->file('file')->move('uploads/', $file);
        Pembayaran::create([
            'pemesanan_id' => $request->id,
            'file_bukti_transfer' => $file,
            'status_pembayaran' => 0,
        ]);

        return redirect()->route('riwayat')->with(['payment-success' => 'Upload Bukti Pembayaran berhasil.']);;
    }

    public function clogout()
    {
    	Auth::logout();
    	return redirect()->route('clogin');
    }
}
