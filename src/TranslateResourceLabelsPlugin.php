<?php

namespace DevEcommercePL\FilamentTranslateResourceLabels;

use Filament\Contracts\Plugin;
use Filament\Forms\Components\Component as FormComponent;
use Filament\Forms\Components\Field;
use Filament\Infolists\Components\Component as InfolistComponent;
use Filament\Infolists\Components\Entry;
use Filament\Panel;
use Filament\Tables\Columns\Column;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use function Filament\Support\get_model_label;

class TranslateResourceLabelsPlugin implements Plugin {
    public function getId(): string {
        return 'translate-resource-labels';
    }

    public function register(Panel $panel): void {
        $this->configureColumn();
        $this->configureField();
        $this->configureEntry();
        $this->configureFilter();
    }

    public function boot(Panel $panel): void {
        //
    }

    public static function make(): static {
        return app(static::class);
    }

    public static function get(): static {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }

    protected function configureColumn(): void {
        Column::macro('translateResourceLabel', function () {
            /** @phpstan-ignore method.notFound */
            return $this->label(function (Table $table, Column $column) {
                $name = $column->getName();

                /** @phpstan-ignore property.protected */
                if ($column->shouldTranslateLabel) {
                    $label = (string) str($name)
                        ->beforeLast('.')
                        ->afterLast('.')
                        ->kebab()
                        ->replace(['-', '_'], ' ')
                        ->ucfirst();

                    return __($label);
                }

                $slug = Str::slug(get_model_label($table->getModel()));

                return __("$slug." . $name);
            });
        });

        Column::configureUsing(function (Column $column): void {
            /** @phpstan-ignore method.notFound */
            $column->translateResourceLabel();
        });
    }

    protected function configureField(): void {
        Field::macro('translateResourceLabel', function () {
            /** @phpstan-ignore method.notFound */
            return $this->label(function (string $model, FormComponent $component) {
                /** @phpstan-ignore method.notFound */
                $name = $component->getName();

                /** @phpstan-ignore property.protected */
                if ($component->shouldTranslateLabel) {
                    $label = (string) str($name)
                        ->afterLast('.')
                        ->kebab()
                        ->replace(['-', '_'], ' ')
                        ->ucfirst();

                    return __($label);
                }

                $slug = Str::slug(get_model_label($model));

                return __("$slug." . $name);
            });
        });

        Field::configureUsing(function (Field $field): void {
            /** @phpstan-ignore method.notFound */
            $field->translateResourceLabel();
        });
    }

    protected function configureEntry(): void {
        Entry::macro('translateResourceLabel', function () {
            /** @phpstan-ignore method.notFound */
            return $this->label(function (Model $record, InfolistComponent $component) {
                /** @phpstan-ignore method.notFound */
                $name = $component->getName();

                /** @phpstan-ignore property.protected */
                if ($component->shouldTranslateLabel) {
                    $label = (string) str($name)
                        ->before('.')
                        ->kebab()
                        ->replace(['-', '_'], ' ')
                        ->ucfirst();

                    return __($label);
                }

                $slug = Str::slug(get_model_label($record::class));

                return __("$slug." . $name);
            });
        });

        Entry::configureUsing(function (Entry $entry): void {
            /** @phpstan-ignore method.notFound */
            $entry->translateResourceLabel();
        });
    }

    protected function configureFilter(): void {
        Filter::macro('translateResourceLabel', function () {
            /** @phpstan-ignore method.notFound */
            return $this->label(function (Table $table, Filter $filter) {
                $name = $filter->getName();

                /** @phpstan-ignore property.protected */
                if ($filter->shouldTranslateLabel) {
                    $label = (string) str($name)
                        ->beforeLast('.')
                        ->afterLast('.')
                        ->kebab()
                        ->replace(['-', '_'], ' ')
                        ->ucfirst();

                    return __($label);
                }

                $slug = Str::slug(get_model_label($table->getModel()));

                return __("$slug." . $name);
            });
        });

        Filter::configureUsing(function (Filter $filter): void {
            /** @phpstan-ignore method.notFound */
            $filter->translateResourceLabel();
        });
    }
}
