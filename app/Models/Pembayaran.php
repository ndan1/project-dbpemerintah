<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';
    protected $primaryKey ='pembayaran_id';
    public $incrementing = true;
    protected $fillable = [
        'id_pembuatan',
        'id_perpanjang',
        'id_customer',
        'amount',
        'payment_proof',
        'status',
        'comments',
    ];

    public function pembuatanSim()
    {
        return $this->belongsTo(BuatSim::class, 'id_pembuatan', 'id_pembuatan');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_customer', 'customer_id');
    }

    public function perpanjanganSim()
    {
        return $this->belongsTo(PanjangSim::class, 'id_perpanjang');
    }
}
