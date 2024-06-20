<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Berita extends Model
{
    use HasFactory;
    protected $table = 'berita';
    protected $primaryKey ='id_berita';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'judul_berita',
        'isi_berita',
        'foto_berita',
    ];

}
