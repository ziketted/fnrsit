<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PrincipaleDepense extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable= [
        'user_id',
        'projet_id',
        'partie',
        'libelle',
        'cout',
        'duree',

    ];
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function projet()
    {
        return $this->belongsTo(\App\Models\Projet::class);
    }
}
