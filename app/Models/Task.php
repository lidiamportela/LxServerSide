<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['name', 'user_id'])]

class Task extends Model
{
    const STATUS_COMPLETED = 1;
    const STATUS_NOTDONE = 0;

    function scopeTaskByUser($query, $user){
    $query->where('id', $user)->get();
   }
}
