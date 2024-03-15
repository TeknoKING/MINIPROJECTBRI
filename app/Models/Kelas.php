<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'jurusan',
        'fakultas',
        'tingkat',
        'nama_kelas',
    ];

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }
}
