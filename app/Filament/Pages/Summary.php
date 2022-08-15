<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Summary extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-switch-horizontal';

    protected static string $view = 'filament.pages.summary';

    protected static function getNavigationLabel(): string
    {
        return __('summary.navigation_label');
    }

    protected function getTitle(): string
    {
        return __('summary.title');
    }
}
