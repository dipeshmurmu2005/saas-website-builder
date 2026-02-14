<?php

namespace App\Filament\Account\Resources\Subscriptions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SubscriptionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tenant.name'),
                TextColumn::make('business.name'),
                TextColumn::make('tenant.domain'),
                TextColumn::make('plan.name'),
                TextColumn::make('total_amount'),
                TextColumn::make('paid_amount'),
                TextColumn::make('status')->badge(),
                TextColumn::make('expires_at')->dateTime()
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
