<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Plan extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-paper-airplane';

    protected static string $view = 'filament.pages.plan';

    protected static ?int $navigationSort = 20;

    protected static function getNavigationLabel(): string
    {
        return __('plans.navigation_label');
    }

    protected function getTitle(): string
    {
        return __('plans.title');
    }

    protected function getBreadcrumbs(): array
    {
        return [
            route('filament.pages.plan') => __('plans.title'),
        ];
    }
}
