<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function supir() {
      return $this->belongsTo(Supir::class);
    }

    public function pengiriman() {
      return $this->hasMany(Pengiriman::class);
    }

}
