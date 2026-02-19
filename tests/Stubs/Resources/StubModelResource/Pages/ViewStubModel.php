<?php

namespace DevEcommercePL\FilamentTranslateResourceLabels\Tests\Stubs\Resources\StubModelResource\Pages;

use DevEcommercePL\FilamentTranslateResourceLabels\Tests\Stubs\Resources\HasErrorBag;
use DevEcommercePL\FilamentTranslateResourceLabels\Tests\Stubs\Resources\StubModelResource;
use Filament\Resources\Pages\ViewRecord;

class ViewStubModel extends ViewRecord {
    use HasErrorBag;

    protected static string $resource = StubModelResource::class;
}
