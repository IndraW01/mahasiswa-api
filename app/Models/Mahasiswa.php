<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'jurusan_id',
        'nim',
        'jenis_kelamin',
    ];

    // relation
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
