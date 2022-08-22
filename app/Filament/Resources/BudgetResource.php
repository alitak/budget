<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BudgetResource\Pages;
use App\Filament\Resources\Traits\DetermineModelLabels;
use App\Filament\Resources\Traits\RedirectToIndex;
use App\Models\Budget;
use App\Models\Category;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;

class BudgetResource extends Resource
{
    use DetermineModelLabels;
    use RedirectToIndex;

    protected static ?string $model = Budget::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static ?int $navigationSort = 30;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('category_id')->options(Category::toSelect(Category::query()->nonSummaries()->get(), true))->label(__('budgets.category_id')),
                DatePicker::make('date')->format('Y-m-d')->default(now())->label(__('budgets.date')),
                TextInput::make('value')->numeric()->label(__('budgets.value')),
                Toggle::make('is_plan')->onIcon('heroicon-s-map')->offIcon('heroicon-s-cash')->label(__('budgets.is_plan')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('category.name')->label(__('categories.name')),
                TextColumn::make('date')->date()->label(__('budgets.date')),
                TextColumn::make('value')->money('huf')->label(__('budgets.value')),
                BooleanColumn::make('is_plan')->label(__('budgets.is_plan')),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListBudgets::route('/'),
            'create' => Pages\CreateBudget::route('/create'),
            'edit' => Pages\EditBudget::route('/{record}/edit'),
        ];
    }
}
