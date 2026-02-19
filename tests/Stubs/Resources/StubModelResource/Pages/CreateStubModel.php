<?php

namespace DevEcommercePL\FilamentTranslateResourceLabels\Tests\Stubs\Resources\StubModelResource\Pages;

use DevEcommercePL\FilamentTranslateResourceLabels\Tests\Stubs\Resources\HasErrorBag;
use DevEcommercePL\FilamentTranslateResourceLabels\Tests\Stubs\Resources\StubModelResource;
use Filament\Resources\Pages\CreateRecord;

class CreateStubModel extends CreateRecord {
    use HasErrorBag;

    protected static string $resource = StubModelResource::class;
}
