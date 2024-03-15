<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_asisten',
        'id_material',
        'id_kelas',
        'id_code',
        'start',
        'end',
        'date',
        'teaching_role',
        'duration',
    ];

    public function material()
    {
        return $this->belongsTo(Material::class, 'id_material');
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_asisten', 'id_asisten');
    }
    public function code()
    {
        return $this->hasOne(Code::class, 'id', 'id_code');
    }
}
