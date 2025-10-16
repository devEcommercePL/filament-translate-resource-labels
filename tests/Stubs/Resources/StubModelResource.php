<?php

namespace DevEcommercePL\FilamentTranslateResourceLabels\Tests\Stubs\Resources;

use DevEcommercePL\FilamentTranslateResourceLabels\Tests\Stubs\Models\StubModel;
use DevEcommercePL\FilamentTranslateResourceLabels\Tests\Stubs\Resources\StubModelResource\Pages;
use DevEcommercePL\FilamentTranslateResourceLabels\TranslatesLabels;
use Filament\Facades\Filament;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Route;

class StubModelResource extends Resource {
    use TranslatesLabels;

    protected static ?string $model = StubModel::class;

    public static function infolist(Infolist $infolist): Infolist {
        return $infolist
            ->schema([
                TextEntry::make('name'),
                TextEntry::make('created_at')
                    ->translateLabel(),
            ]);
    }

    public static function form(Form $form): Form {
        return $form
            ->schema([
                TextInput::make('name'),
                TextInput::make('created_at')
                    ->translateLabel()
                    ->disabled(),
            ]);
    }

    public static function table(Table $table): Table {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('created_at')
                    ->translateLabel()
                    ->dateTime(),
            ])
            ->filters([
                Filter::make('filter')
                    ->toggle(),
                Filter::make('updated_at')
                    ->translateLabel(),
            ]);
    }

    public static function getPages(): array {
        return [
            'index' => Pages\ListStubModel::route('/'),
            'view' => Pages\ViewStubModel::route('/{record}'),
            'create' => Pages\CreateStubModel::route('/create'),
            'edit' => Pages\EditStubModel::route('/{record}/edit'),
        ];
    }

    public static function registerStub(): void {
        $panel = Filament::getCurrentPanel();

        if (!$panel) {
            return;
        }

        $panel->resources([
            static::class,
        ]);

        $id = $panel->getId();

        Route::name("filament.$id.")->group(function () use ($panel) {
            static::registerRoutes($panel);
        });
    }
}
