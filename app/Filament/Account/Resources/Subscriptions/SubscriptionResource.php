<?php

namespace App\Filament\Account\Resources\Subscriptions;

use App\Filament\Account\Resources\Subscriptions\Pages\CreateSubscription;
use App\Filament\Account\Resources\Subscriptions\Pages\EditSubscription;
use App\Filament\Account\Resources\Subscriptions\Pages\ListSubscriptions;
use App\Filament\Account\Resources\Subscriptions\Schemas\SubscriptionForm;
use App\Filament\Account\Resources\Subscriptions\Tables\SubscriptionsTable;
use App\Models\Subscription;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SubscriptionResource extends Resource
{
    protected static ?string $model = Subscription::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::CalendarDateRange;

    public static function form(Schema $schema): Schema
    {
        return SubscriptionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SubscriptionsTable::configure($table);
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
            'index' => ListSubscriptions::route('/'),
        ];
    }
}
