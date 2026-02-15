<?php

namespace App\Services;

use Illuminate\Support\Facades\Schema;

class SettingService
{
    public function getSettings()
    {
        $business = app('tenant')->business->name;
        $modelClass = "App\\Models\\business\\{$business}\\Setting";

        if (class_exists($modelClass)) {
            $instance = new $modelClass;

            $table = $instance->getTable();
            $connection = $instance->getConnectionName();

            if (Schema::connection($connection)->hasTable($table)) {
                $setting = $modelClass::first();
                return $setting;
            }
        }
        return false;
    }
}
