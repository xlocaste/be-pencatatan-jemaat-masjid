<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jemaat extends Model
{
    use HasFactory;

    protected $table = 'jemaat';

    protected $fillable = [
        'nama',
        'masjid_id',
        'gender',
        'alamat',
        'telepon',
    ];

    public function Masjid()
    {
        return $this->belongsTo(Masjid::class);
    }
}
