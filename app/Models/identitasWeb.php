<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class identitasWeb extends Model
{
    use HasFactory;

    public $table = "identitas_web";
    public $primaryKey = "id";
    public $guarded = ["id"];
}
