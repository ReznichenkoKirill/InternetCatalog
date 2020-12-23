<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Manufacturer;

class Product extends Model
{
    protected $fillable = ['id','name', 'description', 'manufacturer_id', 'price', 'site_id','owner_id'];

    public function manufacturer(){
        return $this->belongsTo(Manufacturer::class);
    }
    public function site() {
        return $this->belongsTo(Site::class);
    }
}

