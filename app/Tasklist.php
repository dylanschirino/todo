<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasklist extends Model
{
    protected $fillable = ['title','user_id'];
    public function tasks()
    {
        return $this->hasMany(Task::class); // Les listes ont plusieurs taches
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id'); // on lui passe la clé etangère en deuxieme argument
    }
}
