<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pelanggan() {
      return $this->belongsTo(Pelanggan::class);
    }

    public function kendaraan() {
      return $this->belongsTo(Kendaraan::class);
    }

    public function getRouteKeyName() { //routeModelBindings
      return 'id';
    }

}
