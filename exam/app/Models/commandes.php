<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class commandes extends Model
{
    protected $fillable = [
        'date_commande',
        'etat',
        'client_id',
    ];

    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function  
}
