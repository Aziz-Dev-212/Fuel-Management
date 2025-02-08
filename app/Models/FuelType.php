<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuelType extends Model {
    use HasFactory;
    protected $fillable = ['type'];

    public function cars() {
        return $this->hasMany(Car::class);
    }

    public function transactions() {
        return $this->hasMany(FuelTransaction::class);
    }

    public function stock() {
        return $this->hasOne(FuelStock::class);
    }
}
