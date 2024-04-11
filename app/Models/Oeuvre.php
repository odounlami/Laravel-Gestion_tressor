<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oeuvre extends Model
{
    use HasFactory;
    protected $table = 'Oeuvre';
      // Relation avec l'artiste (Chaque oeuvre appartient à un artiste)
      public function artiste()
      {
          return $this->belongsTo(Artiste::class, 'artiste_id', 'idArtiste');
      }
      public function categorie()
      {
          return $this->belongsTo(Artiste::class, 'categorie_id', 'idCategorie');
      }
    protected $primaryKey = 'idOeuvre';
    protected $fillable =[
        'idOeuvre',
        'categorie_id',
        'artiste_id',
        'nom',
        'description',
        'annee',
    ];
    
}
