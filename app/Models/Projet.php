<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Projet extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable= [
        'titre',
        'budget',
        'debut',
        'fin',
        'secteur_id',
        'entrepreneur_id',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function secteur()
    {
        return $this->belongsTo(\App\Models\Secteur::class);
    }
    public function entrepreneur()
    {
        return $this->belongsTo(\App\Models\Entrepreneur::class);
    }




}
