<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RumahSakit extends Model
{
    use HasFactory;

    protected $fillable = [
    	'nama', 'email', 'alamat', 'telepon'
    ];

    public function pasiens()
    {
    	return $this->hasOne('App\Models\Pasien');
    }
}	
