<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tin extends Model
{
    use HasFactory;
    protected $table = 'tin';
    protected $fillable = ['tieuDe', 'tomTat', 'noiDung', 'urlHinh', 'created_at', 'updated_at', 'xem', 'idLT', 'id_user'];
}
