<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    public $table = "jurusan";
    public $primaryKey = "id";
    public $guarded = ["id"];

    public function jurusan_siswa()
    {
        return $this->hasMany(Siswa::class, 'jurusan_id', "id");
    }
}
