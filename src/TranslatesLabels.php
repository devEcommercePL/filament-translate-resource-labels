<?php

namespace DevEcommercePL\FilamentTranslateResourceLabels;

use Illuminate\Support\Str;

use function Filament\Support\get_model_label;

trait TranslatesLabels {
    public static function getOriginalModelLabel(): string {
        return Str::slug(get_model_label(static::getModel()));
    }

    public static function getModelLabel(): string {
        return __(static::getOriginalModelLabel() . '.title.singular');
    }

    public static function getPluralModelLabel(): string {
        return __(static::getOriginalModelLabel() . '.title.plural');
    }

    abstract public static function getModel(): string;
}
