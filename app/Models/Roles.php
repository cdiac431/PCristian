<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory, Loggable;
    
    public function user()
    {
      return $this->belongsToMany(User::class, 'id_roles', 'id');
    }

   

}