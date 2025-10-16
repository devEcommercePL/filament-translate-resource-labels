<?php

use DevEcommercePL\FilamentTranslateResourceLabels\Tests\Stubs\Models\StubModel;
use DevEcommercePL\FilamentTranslateResourceLabels\Tests\Stubs\Resources\StubModelResource;
use DevEcommercePL\FilamentTranslateResourceLabels\Tests\Stubs\Resources\StubModelResource\Pages\CreateStubModel;
use DevEcommercePL\FilamentTranslateResourceLabels\Tests\Stubs\Resources\StubModelResource\Pages\EditStubModel;
use DevEcommercePL\FilamentTranslateResourceLabels\Tests\Stubs\Resources\StubModelResource\Pages\ListStubModel;
use DevEcommercePL\FilamentTranslateResourceLabels\Tests\Stubs\Resources\StubModelResource\Pages\ViewStubModel;
use DevEcommercePL\FilamentTranslateResourceLabels\TranslateResourceLabelsPlugin;
use Filament\Facades\Filament;
use Filament\Panel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;

use function Pest\Livewire\livewire;

uses(RefreshDatabase::class);

beforeEach(function () {
    $panel = Panel::make()
        ->id('testing')
        ->plugin(TranslateResourceLabelsPlugin::make());

    Filament::registerPanel($panel);
    Filament::setCurrentPanel($panel);
    StubModelResource::registerStub();

    StubModel::migrate();
    StubModel::create();
});

it('translates table column', function () {
    $translation = addTranslation('stub-model.name');

    livewire(ListStubModel::class)
        ->assertSeeText($translation);
});

it('uses global translation for table column', function () {
    $translation = addTranslation('*.Created at');

    livewire(ListStubModel::class)
        ->assertSeeText($translation);
});

it('translates table filter', function () {
    $translation = addTranslation('stub-model.filter');

    livewire(ListStubModel::class)
        ->assertSeeText($translation);
});

it('uses global translation for table filter', function () {
    $translation = addTranslation('*.Updated at');

    livewire(ListStubModel::class)
        ->assertSeeText($translation);
});

it('translates list records heading', function () {
    $translation = addTranslation('stub-model.title.plural');

    livewire(ListStubModel::class)
        ->assertSeeText($translation);
});

it('translates edit form field', function () {
    $translation = addTranslation('stub-model.name');

    livewire(EditStubModel::class, ['record' => StubModel::first()->getKey()])
        ->assertSeeText($translation);
});

it('uses global translation for edit form field', function () {
    $translation = addTranslation('*.Created at');

    livewire(EditStubModel::class, ['record' => StubModel::first()->getKey()])
        ->assertSeeText($translation);
});

it('translates edit record heading', function () {
    $translation = addTranslation('stub-model.title.singular');

    livewire(EditStubModel::class, ['record' => StubModel::first()->getKey()])
        ->assertSeeText("Edit $translation");
});

it('translates create form field', function () {
    $translation = addTranslation('stub-model.name');

    livewire(CreateStubModel::class)
        ->assertSeeText($translation);
});

it('uses global translation for create form field', function () {
    $translation = addTranslation('*.Created at');

    livewire(CreateStubModel::class)
        ->assertSeeText($translation);
});

it('translates create record heading', function () {
    $translation = addTranslation('stub-model.title.singular');

    livewire(CreateStubModel::class)
        ->assertSeeText("Create $translation");
});

it('translates infolist entry', function () {
    $translation = addTranslation('stub-model.name');

    livewire(ViewStubModel::class, ['record' => StubModel::first()->getKey()])
        ->assertSeeText($translation);
});

it('uses global translation for infolist entry', function () {
    $translation = addTranslation('*.Created at');

    livewire(ViewStubModel::class, ['record' => StubModel::first()->getKey()])
        ->assertSeeText($translation);
});

it('translates view record heading', function () {
    $translation = addTranslation('stub-model.title.singular');

    livewire(ViewStubModel::class, ['record' => StubModel::first()->getKey()])
        ->assertSeeText("View $translation");
});

function addTranslation(string $key): string {
    Lang::addLines([
        $key => $translation = ucfirst(Str::random()),
    ], app()->getLocale());

    return $translation;
}
