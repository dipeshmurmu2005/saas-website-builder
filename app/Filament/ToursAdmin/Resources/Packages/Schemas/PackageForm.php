<?php

namespace App\Filament\ToursAdmin\Resources\Packages\Schemas;

use App\Enums\Business\Tours\PackageTypeEnum;
use App\Models\Business\Tours\Destination;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Schema;
use Guava\IconPicker\Forms\Components\IconPicker;
use Illuminate\Support\Str;

class PackageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Wizard::make([
                    Step::make('Basic Details')->schema([
                        TextInput::make('title')->required(),
                        Select::make('destinations')->required()
                            ->preload()
                            ->multiple()
                            ->live()
                            ->options(Destination::pluck('name', 'id')),
                        TextInput::make('duration_days')
                            ->required()
                            ->numeric(),
                        TextInput::make('original_price')
                            ->required()
                            ->numeric()
                            ->prefix('Rs. '),
                        TextInput::make('discounted_price')
                            ->required()
                            ->numeric()->prefix('Rs. '),
                        Select::make('type')
                            ->required()
                            ->options(PackageTypeEnum::class),
                        TextInput::make('slug')
                            ->live()
                            ->afterStateUpdated(
                                fn($state, callable $set) =>
                                $set('slug', Str::slug(strtolower($state)))
                            )
                            ->unique()
                            ->required(),
                        DatePicker::make('trip_start_date')
                            ->hint('Optional')
                            ->native(false)
                            ->placeholder('Pick Date'),
                        DatePicker::make('trip_end_date')
                            ->hint('Optional')
                            ->native(false)
                            ->placeholder('Pick Date'),
                    ])->columns(3),
                    Step::make('Package Content')->schema([
                        Textarea::make('short_description'),
                        RichEditor::make('description')
                            ->columnSpanFull(),
                        Repeater::make('services')->schema([
                            IconPicker::make('icon'),
                            TextInput::make('title'),
                            TextInput::make('value')
                        ])->grid(3)->columnSpanFull(),
                    ]),
                    Step::make('Package Itineraries')->schema([
                        Repeater::make('itineraries')
                            ->relationship('itineraries')
                            ->schema([
                                TextInput::make('title')->required(),
                                TextInput::make('day')->numeric()->belowContent('Eg. Day 1, Day 2')->required(),
                                Select::make('destination_id')->label('Destination')->options(function (Get $get) {
                                    $selectedDestinations = $get('../../destinations') ?? [];
                                    return Destination::whereIn('id', $selectedDestinations)
                                        ->pluck('name', 'id')
                                        ->toArray();
                                })->required(),
                                Textarea::make('description')->required()
                            ])->grid(3)
                    ]),
                    Step::make('Images')->schema([
                        FileUpload::make('images')
                            ->disk('public')
                            ->multiple()
                            ->columnSpanFull()
                    ])
                ])->columnSpanFull(),
            ]);
    }
}
