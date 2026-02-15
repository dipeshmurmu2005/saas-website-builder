<?php

namespace App\Models\Business\Tours;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $connection = 'tenant';

    protected $guarded = [];

    protected $casts = [
        'images' => 'array'
    ];

    public function destinations()
    {
        return $this->hasMany(Destination::class, 'country_id');
    }
}
