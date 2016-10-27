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

}
