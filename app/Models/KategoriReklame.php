<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriReklame extends Model
{
    use HasFactory;
    protected $table = 'kategori_reklame';
    protected $fillable = [
    	'nama_kategori'
    ];

    public function reklame()
    {
    	return $this->hasMany(Reklame::class);
    }
}
