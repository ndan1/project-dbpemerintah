<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKedatangan extends Model
{
    use HasFactory;

    protected $table = 'jadwal_kedatangan';
    protected $primaryKey ='kedatangan_id';
    public $incrementing = true;
    protected $fillable = [
        'id_customer',
        'id_pembuatan',
        'id_perpanjang',
        'schedule_date',
        'schedule_time',
        'status',
        'attempt_count'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_customer');
    }

    public function pembuatanSim()
    {
        return $this->belongsTo(BuatSim::class, 'pembuatan_sim_id');
    }

    public function perpanjanganSim()
    {
        return $this->belongsTo(PanjangSim::class, 'perpanjangan_sim_id');
    }
}

