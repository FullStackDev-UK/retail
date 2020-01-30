<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'type' => "Unset",
        'name' => "Unset",
        'description' => "Unset",
        'size' => 0,
        'price' => 0.00,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'name', 'description', 'size', 'price'
    ];

    public function scopelistAll()
    {
        $list = Product::listAll()->latest()->paginate(5);
        return $list;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function images()
    {
        $this->hasMany('App\Image');
    }
}
