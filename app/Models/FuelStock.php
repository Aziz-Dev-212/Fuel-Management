<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuelStock extends Model {
    use HasFactory;
    protected $primaryKey = 'fuel_type_id';
    public $incrementing = false;

    protected $fillable = ['fuel_type_id', 'quantity'];

    public function fuelType() {
        return $this->belongsTo(FuelType::class);
    }
}
