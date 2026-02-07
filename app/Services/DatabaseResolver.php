<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class DatabaseResolver
{

    public static function connectDB()
    {
        $tenant = app('tenant');
        config([
            'database.connections.tenant' => [
                'driver'   => 'mysql',
                'host'     => $tenant->db_host,
                'database' => $tenant->db_name,
                'username' => $tenant->db_username,
                'password' => $tenant->db_password,
                // 'charset'  => 'utf8mb4',
                // 'collation' => 'utf8mb4_unicode_ci',
            ],
        ]);

        DB::purge('tenant');
        DB::setDefaultConnection('tenant');
    }
}
