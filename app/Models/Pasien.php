<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = [
    	'nama_pasien', 'id_rumahsakit', 'email', 'alamat', 'telepon'
    ];

    public function rumahsakit()
    {
    	return $this->belongsTo(RumahSakit::class, 'id');
    }
}
