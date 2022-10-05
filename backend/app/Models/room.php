<?php

namespace App\Models;

use App\Models\message;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    use HasFactory;
    public function message(){
        return $this->hasMany(message::class);
    }
}
