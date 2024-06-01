<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $table = 'quiz';
    protected $primaryKey = 'question_id';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'questions',
        'opsiA',
        'opsiB',
        'opsiC',
        'opsiD',
        'answer',
        'jenis_sim'
    ];
}
