<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Projet extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable= [
        'user_id',
        'titre',
        'proprieteur',
        'budget',
        'secteur',
        'debut',
        'fin',
    ];
}
