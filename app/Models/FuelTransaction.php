<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuelTransaction extends Model {
    use HasFactory;
    protected $fillable = ['fuel_type_id', 'quantity', 'action', 'car_id', 'service_id', 'transaction_date', 'notes'];

    protected $casts = [
        'transaction_date' => 'datetime',
    ];
    
    public function fuelType() {
        return $this->belongsTo(FuelType::class);
    }

    public function car() {
        return $this->belongsTo(Car::class);
    }

    public function service() {
        return $this->belongsTo(Service::class);
    }
}
