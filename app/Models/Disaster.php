<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disaster extends Model
{
    use HasFactory;

    protected $visible = ['id', 'lstring', 'casualties', 'description','date', 'time', 'damage_level', 'disaster_type'];
    protected $fillable = ['location', 'casualties', 'description', 'damage_level_id', 'city_id', 'date', 'time', 'disaster_type_id', 'city_id'];

    public function getLocationAttribute($value) {
        
        return [];
    }

    public function getLstringAttribute($value) {
      
        $location = str_replace("POINT(", '', $value);
        $location = str_replace(")", '', $location);
        $location = explode(' ', $location);
        
        return ["latitude" => $location[1], "longitude" => $location[0]];
    }

    public function damage_level() {
        return $this->belongsTo(DamageLevel::class)->select('id', 'name');
    }

    public function disaster_type() {
        return $this->belongsTo(DisasterType::class)->select('id', 'name');
    }

    public function disaster_type_all_fields() {
        //class, foreign, key
        return $this->belongsTo(DisasterType::class, 'disaster_type_id', 'id');
    }

    public function disaster_services() {
        return $this->hasMany(DisasterServiceDamageLevel::class);
    }
}
