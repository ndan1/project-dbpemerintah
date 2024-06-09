<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranPerpanjangan extends Model
{
    use HasFactory;
    protected $table = 'pembayaran_perpanjangan';
    protected $primaryKey ='pembayaranperpanjang_id';
    public $incrementing = true;
    protected $fillable = [
        'id_perpanjang',
        'id_customer',
        'amount',
        'payment_proof',
        'status',
        'comments',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_customer', 'customer_id');
    }

    public function perpanjanganSim()
    {
        return $this->belongsTo(PanjangSim::class, 'id_perpanjang');
    }
}
