<?php

namespace App\Models;

use App\Models\room;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    use HasFactory;

    public $guarded = [
        'id'
    ];


    public function room(){
        return $this->belongsTo(room::class);
    }
}
