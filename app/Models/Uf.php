<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uf extends Model
{
    use HasFactory;
    protected $fillable = [
        'ufname', 'uf', 'user' , 'updated_at'
    ];
}
