<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    protected $table = 'pemesanan';
    protected $dates = [
    	'tanggal_awal_pemasangan',
    	'tanggal_akhir_pemasangan',
    ];
    
    protected $fillable = [
    	'user_id',
    	'reklame_id',
    	'kode_pemesanan',
    	'tanggal_awal_pemasangan',
    	'tanggal_akhir_pemasangan',
    	'isi_reklame',
    	'harga',
    	'file_pendukung',
    	'status_perizinan',
    	'status_reklame',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reklame()
    {
        return $this->belongsTo(Reklame::class);
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }
}
