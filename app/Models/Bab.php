<?php

namespace App\Models;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bab extends Model
{
    use HasFactory, UUID;
    protected $table = 'babs';
    public $primaryKey = 'id_bab';
    protected $fillable = [
        'bab',
    ];

    public function kitab()
    {
        return $this->hasMany(Kitab::class, 'bab_id');
    }
}
