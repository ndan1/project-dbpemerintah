<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanjangSim extends Model
{
    use HasFactory;
    protected $table = 'perpanjang_sim';
    protected $primaryKey ='id_perpanjang';
    public $incrementing = true;
    protected $fillable = [
        'id_customer',
        'foto_ktp',
        'pas_foto',
        'surat_sehat',
        'foto_sim'
    ];
}
