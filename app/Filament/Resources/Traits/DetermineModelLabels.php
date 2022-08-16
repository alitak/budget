<?php

namespace App\Filament\Resources\Traits;

use Illuminate\Support\Str;

trait DetermineModelLabels
{
    public static function getModelLabel(): string
    {
        $class = Str::of((new \ReflectionClass(self::$model))->getShortName())->lower();

        return __($class->plural().'.'.$class);
    }

    public static function getPluralModelLabel(): string
    {
        $class = Str::of((new \ReflectionClass(self::$model))->getShortName())->lower()->plural();

        return __($class.'.'.$class);
    }
}
