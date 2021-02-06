<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reklame extends Model
{
    use HasFactory;
    protected $table = 'reklame';
    protected $fillable = [
        'kategori_id',
    	'nama_jenis_reklame',
    	'keterangan',
    	'harga',
    ];

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class);
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriReklame::class);
    }

    public function titik_reklame()
    {
        return $this->hasMany(TitikReklame::class);
    }
}
