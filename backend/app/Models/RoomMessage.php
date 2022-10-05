<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    function messages()
    {
        return $this->hasMany(Message::class);
    }
}
