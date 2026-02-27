<?php

namespace App\Providers;

use Filament\Actions\CreateAction;
use Illuminate\Support\ServiceProvider;

class FilamentUiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {   
        /**
         * Configure the CreateAction to uppercase the first letter of the model label in its default label.
         */
        CreateAction::configureUsing(function (CreateAction $action) {
            $action
                ->label(label: fn(): string => __(
                    key: 'filament-actions::create.single.label',
                    replace: ['label' => ucwords($action->getModelLabel())]
                ));
        });
    }
}
