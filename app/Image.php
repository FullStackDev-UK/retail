<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * Get the product for the image
     */

    public function product()
    {
        $this->belongsTo('App\Product');
    }

}
