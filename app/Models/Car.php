<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model {
    use HasFactory;
    protected $fillable = ['name', 'matricule', 'kilometrage', 'model', 'fuel_type_id', 'service_id'];

    public function fuelType() {
        return $this->belongsTo(FuelType::class);
    }

    public function service() {
        return $this->belongsTo(Service::class);
    }

    public function transactions() {
        return $this->hasMany(FuelTransaction::class);
    }
}
