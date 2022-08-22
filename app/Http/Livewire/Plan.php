<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\ListenToDateChanged;
use App\Models\Category;
use Livewire\Component;

class Plan extends Component
{
    use ListenToDateChanged;

    public int $year = 0;

    public int $month = 0;

    public array $summary = [];

    protected $listeners = [
        'dateChanged',
    ];

    public function mount()
    {
        $this->year = now()->year;
        $this->month = now()->month;
    }

    public function render()
    {
        $categories = Category::query()
            ->withSum(['budgets' => fn ($query) => $query->active($this->year, $this->month)], 'value')
            ->withSum(['budgetPlans' => fn ($query) => $query->active($this->year, $this->month)], 'value')
            ->nonSummaries()
            ->get()
            ->toTree();

        return view('livewire.plan', ['categories' => $categories]);
    }
}
