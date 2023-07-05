<?php

namespace App\Models;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kitab extends Model
{
    use HasFactory, UUID;
    protected $table = 'kitabs';
    public $primaryKey = 'id_kitab';
    protected $fillable = [
        'bab_id',
        'judul_kitab',
        'soal',
        'jawaban'
    ];

    public function bab()
    {
        return $this->belongsTo(Bab::class, 'bab_id', 'id_bab');
    }

}
