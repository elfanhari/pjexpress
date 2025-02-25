<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supir extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kendaraan() {
      return $this->hasMany(Kendaraan::class);
    }

    public function user() {
      return $this->belongsTo(User::class);
    }

    public function getRouteKeyName() { //routeModelBindings
      return 'id';
    }
}
