<?php

namespace App\Filament\ToursAdmin\Resources\Countries\Pages;

use App\Filament\ToursAdmin\Resources\Countries\CountryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCountry extends CreateRecord
{
    protected static string $resource = CountryResource::class;
}
