<?php

namespace App\Filament\ToursAdmin\Resources\Packages;

use App\Filament\ToursAdmin\Resources\Packages\Pages\CreatePackage;
use App\Filament\ToursAdmin\Resources\Packages\Pages\EditPackage;
use App\Filament\ToursAdmin\Resources\Packages\Pages\ListPackages;
use App\Filament\ToursAdmin\Resources\Packages\Schemas\PackageForm;
use App\Filament\ToursAdmin\Resources\Packages\Tables\PackagesTable;
use App\Models\Business\Tours\Package;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class PackageResource extends Resource
{
    protected static ?string $model = Package::class;

    protected static string|UnitEnum|null $navigationGroup = 'Tour';

    public static function form(Schema $schema): Schema
    {
        return PackageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PackagesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPackages::route('/'),
            'create' => CreatePackage::route('/create'),
            'edit' => EditPackage::route('/{record}/edit'),
        ];
    }
}
