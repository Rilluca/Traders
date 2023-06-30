<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model 
{
    use HasFactory;

    // Room belongs to Room Type
    function roomtype() {
        return $this->belongsTo(RoomType::class,'room_type_id');
    }

    function roomImgs(){
        return $this->hasMany(RoomImage::class,'room_id'); 
    }
}
