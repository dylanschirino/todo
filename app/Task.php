<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title','body','tasklist_id'];
    public function tasklist()
    {
        return $this->belongsTo(Tasklist::class);
    }

    public function isOwnedByUser($user){
        $tasklist = $this->tasklist;    // On accède a l'instance tasklist
        $user_id = $tasklist->user_id; // On récupere l'ID de l'user.
        return $user_id == $user->id; // On fait la comparaison.
    }

}
