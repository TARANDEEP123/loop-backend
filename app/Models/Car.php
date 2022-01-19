<?php

namespace App\Models;

use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table = 'car_tbl';

    public function getImageAttribute($value) {
        return public_path()."/images/".$value;
    }
    public function model() {
        return $this->hasOne(Variant::class, 'id','model_id');
    }
    public function brand() {
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }
    public function type() {
        return $this->hasOne(Type::class, 'id', 'type_id');
    }
}
