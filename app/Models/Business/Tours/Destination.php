<?php

namespace App\Models\Business\Tours;

use App\Enums\Business\Tours\DestinationTypeEnum;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $connection = 'tenant';

    protected $guarded = [];

    protected $casts = [
        'type' => DestinationTypeEnum::class,
        'images' => 'array'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function packages()
    {
        return $this->belongsToMany(
            Package::class,
            'package_destinations',
            'destination_id',
            'package_id'
        );
    }
}
