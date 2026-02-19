# Filament Translate Resource Labels Plugin

This plugin allows you to translate resource labels in Filament automatically using your language files.
It searches for a translation key in the language files using the model name and component name.

### Example usage:

`UserResource.php`
```php
public function form(Form $form): Form {
    return $form
        ->schema([
            TextInput::make('name'),
        ]);
}
```

`lang/en/user.php`
```php
<?php

return [
    'name' => 'Customer name',
];
```

## Installation

1. Install the package via composer:

    ```bash
    composer require nodium/filament-translate-resource-labels
    ```

2. Register plugin in your panel:

    ```php
    use DevEcommercePL\FilamentTranslateResourceLabels\TranslateResourceLabelsPlugin;
   
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->plugins([
                TranslateResourceLabelsPlugin::make()
            ])
    }
    ```

## Testing

```bash
composer test
```

### Docker users:

You can bootstrap docker test environment and run the tests easily using the following commands:

```bash
make build
make run CMD="composer test"
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
