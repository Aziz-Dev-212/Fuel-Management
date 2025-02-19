<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model {
    use HasFactory;
    protected $fillable = ['name'];

    public function cars() {
        return $this->hasMany(Car::class);
    }

    public function transactions() {
        return $this->hasMany(FuelTransaction::class);
    }
}
