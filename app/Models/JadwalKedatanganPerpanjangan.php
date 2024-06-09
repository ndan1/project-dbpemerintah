<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKedatanganPerpanjangan extends Model
{
    use HasFactory;
    protected $table = 'jadwalkedatangan_perpanjang';
    protected $primaryKey ='kedatanganperpanjang_id';
    public $incrementing = true;
    protected $fillable = [
        'id_customer',
        'id_perpanjang',
        'schedule_date',
        'schedule_time',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_customer');
    }

    public function perpanjanganSim()
    {
        return $this->belongsTo(PanjangSim::class, 'perpanjangan_sim_id');
    }
}
