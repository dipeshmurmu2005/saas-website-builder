<?php

namespace App\Models;

use App\Enums\TenantStatusEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $guarded = [];

    protected $casts = [
        'status' => TenantStatusEnum::class,
        'password' => 'hashed',
    ];

    public function Business()
    {
        return $this->belongsTo(Business::class);
    }

    protected static function booted()
    {
        static::addGlobalScope('tenant', function (Builder $builder) {
            if ($user = auth()->user()) {
                $builder->where('user_id', $user->id);
            }
        });
    }

    public function subscription()
    {
        return $this->hasOne(Subscription::class, 'tenant_id');
    }
}
