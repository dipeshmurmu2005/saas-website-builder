<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $guarded = [];

    protected $appends = [
        'total_tenants'
    ];

    public function themes()
    {
        return $this->hasMany(Theme::class, 'business_id');
    }

    public function tenants()
    {
        return $this->hasMany(Tenant::class, 'business_id');
    }

    protected function getTotalTenantsAttribute()
    {
        return $this->tenants->count();
    }

    public function plans()
    {
        return $this->hasMany(Plan::class, 'business_id');
    }
}
