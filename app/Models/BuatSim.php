<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuatSim extends Model
{
    use HasFactory;
    protected $table = 'pembuatan_sim';
    protected $primaryKey ='id_pembuatan';
    public $incrementing = true;
    protected $fillable = [
        'id_customer',
        'foto_ktp',
        'pas_foto',
        'surat_sehat',
        'tipe_sim', // Add this
        'status',   // Add this
        'comments',
        'test_score',
        'last_test_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_customer');
    }
}
