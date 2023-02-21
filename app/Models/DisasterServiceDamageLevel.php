<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisasterServiceDamageLevel extends Model
{
    use HasFactory;
    protected $table = 'disaster_service_damage_level';

    protected $fillable = ['disaster_id', 'public_service_id', 'damage_level_id'];

    public $timestamps = false;

    protected $casts = [

    ];
}
