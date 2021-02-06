<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TitikReklame extends Model
{
    use HasFactory;
    protected $table = 'titik_reklame';
    protected $fillable = [
    	'reklame_id',
    	'lokasi',
    ];

    public function reklame()
    {
    	return $this->belongsTo(Reklame::class);
    }

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class);
    }
}
