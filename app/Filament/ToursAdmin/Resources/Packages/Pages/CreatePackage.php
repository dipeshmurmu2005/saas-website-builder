<?php

namespace App\Filament\ToursAdmin\Resources\Packages\Pages;

use App\Filament\ToursAdmin\Resources\Packages\PackageResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePackage extends CreateRecord
{
    protected static string $resource = PackageResource::class;
}
