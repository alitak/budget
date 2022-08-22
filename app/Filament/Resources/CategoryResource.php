<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\Traits\DetermineModelLabels;
use App\Filament\Resources\Traits\RedirectToIndex;
use App\Models\Category;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\TrashedFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryResource extends Resource
{
    use DetermineModelLabels;
    use RedirectToIndex;

    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 40;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('parent_id')->options(Category::toSelect(Category::query()->nonSummaries()->get(), true))->label(__('categories.parent')),
                TextInput::make('name')->required()->maxLength(255)->label(__('categories.name')),
                TextInput::make('position')->numeric()->label(__('categories.position')),
                Toggle::make('is_plan')->onIcon('heroicon-s-check-circle')->offIcon('heroicon-s-x-circle')->label(__('categories.is_income')),
                Toggle::make('is_summary')->onIcon('heroicon-s-check-circle')->offIcon('heroicon-s-x-circle')->label(__('categories.is_summary')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('parent.name')->label(__('categories.name')),
                TextColumn::make('name')->label(__('categories.name')),
                BooleanColumn::make('is_income')->label(__('categories.is_income')),
                BooleanColumn::make('is_summary')->label(__('categories.is_summary')),
                TextColumn::make('created_at')->dateTime()->label(__('global.created_at')),
                TextColumn::make('updated_at')->dateTime()->label(__('global.updated_at')),
            ])
            ->filters([
                TrashedFilter::make(),
                Filter::make('is_summary')->query(fn (Builder $query) => $query->where('is_summary', true))->label(__('categories.is_summary')),
                Filter::make('is_not_summary')->query(fn (Builder $query) => $query->where('is_summary', false))->label(__('categories.is_not_summary')),
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
                RestoreBulkAction::make(),
                ForceDeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
