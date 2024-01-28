<?php
// app/Models/Owner.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $fillable = ['name', 'email', 'password'];

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }
    public function shops()
    {
        return $this->hasMany(Shop::class);
    }
}

