<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'type', 'itemNumber', 'model', 'height', 'depth', 'width', 'outletHeight', 'volume', 'contents', 'bottomConeSlope', 'supplyAir', 'price'
    ];
}
