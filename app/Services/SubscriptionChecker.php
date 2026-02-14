<?php

namespace App\Services;

use App\Enums\SubscriptionStatusEnum;

class SubscriptionChecker
{
    public function hasActiveSubscription($tenant)
    {
        if (!$tenant->subscription) {
            abort(402);
        } else {

            if ($tenant->subscription->status == SubscriptionStatusEnum::EXPIRED) {
                abort(402);
            }

            if ($tenant->subscription->expires_at && $tenant->subscription->expires_at < now()) {
                abort(402);
            }
        }
    }
}
