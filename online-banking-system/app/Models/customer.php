<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    public function account()
    {
        return $this->hasMany(account::class);
    }
    public function contacts()
    {
        return $this->hasMany(contacts::class);
    }

}
