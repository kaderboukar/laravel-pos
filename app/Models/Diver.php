<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diver extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    public function total()
    {
        return $this->map(function (){
            return $this->price;
        })->sum();
    }
}
