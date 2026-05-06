<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class employee extends model
{
    protected $fillable = 
    [
        'date_embauche', 'user_id'
    ];

    // relation with user
    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    // relation with Inscription
    public function Inscription ()
    {
        return $this->hasMany(inscription::class);
    }

    // relation with formation a travert une table pivot
    public function Formation()
    {
        return $this->belongsToMany(formation::class)
                    ->withPivot('etat')
                    ->withtimestamps();
    }
}