<?php

namespace App\Filament\ToursAdmin\Resources\Packages\Tables;

use App\Enums\Business\Tours\PackageStatusEnum;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class PackagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('duration_days'),
                TextColumn::make('original_price')->prefix('Rs. ')->color('warning'),
                TextColumn::make('discounted_price')->prefix('Rs. ')->color('success'),
                TextColumn::make('type')->badge(),
                ToggleColumn::make('is_featured')->label('Feature'),
                ToggleColumn::make('is_offer')->label('Offer/Deal'),
                TextColumn::make('status')->badge(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                Action::make('Change Status')->action(function ($record) {
                    $record->status = $record->status == PackageStatusEnum::ACTIVE ? PackageStatusEnum::INACTIVE : PackageStatusEnum::ACTIVE;
                    $record->save();
                })->button(),
                EditAction::make()
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
