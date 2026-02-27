<?php

namespace App\Providers;

use Filament\Actions\CreateAction;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
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

        /**
         * Configure the Table to be reorderable and the Column to be toggleable by default.
         */
        Table::configureUsing(function (Table $table) {
            $table
                ->reorderableColumns();
        });

        /**
         * Configure the Column to be toggleable by default.
         */
        Column::configureUsing(function (Column $column) {
            $column
                ->toggleable();
        });

        /**
         * Configure the TextColumn to be sortable by default.
         */
        TextColumn::configureUsing(function (TextColumn $column) {
            $column
                ->sortable();
        });
    }
}
