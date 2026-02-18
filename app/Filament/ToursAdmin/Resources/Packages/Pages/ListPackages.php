<?php

namespace App\Filament\ToursAdmin\Resources\Packages\Pages;

use App\Enums\Business\Tours\PackageStatusEnum;
use App\Filament\ToursAdmin\Resources\Packages\PackageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListPackages extends ListRecords
{
    protected static string $resource = PackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make('Create Package')
        ];
    }


    public function getTabs(): array
    {
        return [
            'all' => Tab::make(),
            'Featured' =>  Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('is_featured', true)),
            'Deals / Offers' =>  Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('is_offer', true)),
            'active' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', PackageStatusEnum::ACTIVE)),
            'inactive' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', PackageStatusEnum::INACTIVE)),
        ];
    }
}
