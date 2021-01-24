<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reklame extends Model
{
    use HasFactory;
    protected $table = 'reklame';
    protected $fillable = [
    	'nama_jenis_reklame',
    	'keterangan',
    	'harga',
    ];

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class);
    }
}
