<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artiste extends Model
{
    use HasFactory;
    protected $table = 'Artiste';
    protected $primarykey ='idArtiste';
    protected $fillable =[
        'idArtiste',
        'nom',
        'prenom',
        'telephone',
    ];
}
