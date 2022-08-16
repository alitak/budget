<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;

class Summary extends Component
{
    public int $year = 0;

    public int $month = 0;

    public array $values = ['assets' => [], 'depts' => []];

    public array $previousMonthValues = ['assets' => [], 'depts' => []];

    public array $total = ['assets' => 0, 'depts' => 0];

    public array $previousMonthTotal = ['assets' => 0, 'depts' => 0];

    public array $change = ['assets' => 0, 'depts' => 0];

    public array $sum = ['actual' => 0, 'previous' => 0, 'change' => 0];

    protected $listeners = [
        'dateChanged',
    ];

    public function dateChanged(array $values)
    {
        $this->year = $values['year'];
        $this->month = $values['month'];
    }

    public function mount()
    {
        $this->year = now()->year;
        $this->month = now()->month;
    }

    public function updatedValues($value, $index)
    {
        $category_id = Str::of($index)->beforeLast('.')->after('.')->toString();

        Category::query()
            ->find($category_id)
            ->values()
            ->whereYear('date', $this->year)
            ->whereMonth('date', $this->month)
            ->updateOrCreate([], [
                'date' => Carbon::createFromDate($this->year, $this->month, 1),
                'value' => $value ?: 0,
            ]);
    }

    public function render()
    {
        $this->generateValues();

        $this->calculateTotal();

        $this->calculateSum();

//        dump($this->values);
//        dd($this->previousMonthValues);
        return view('livewire.summary');
    }

    private function generateValues(): void
    {
        Category::query()
            ->with(['values' => fn ($query) => $query->whereYear('date', $this->year)->whereMonth('date', $this->month)])
            ->summaries()
            ->incomes()
            ->get()
            ->each(function (Category $category) {
                $this->values['assets'][$category->id] = [
                    'name' => $category->name,
                    'value' => count($category->values) > 0 ? $category->values[0]->value : 0,
                ];
            });
        Category::query()
            ->with(['values' => fn ($query) => $query->whereYear('date', $this->year)->whereMonth('date', $this->month)])
            ->summaries()
            ->expenditures()
            ->get()
            ->each(function (Category $category) {
                $this->values['depts'][$category->id] = [
                    'name' => $category->name,
                    'value' => count($category->values) > 0 ? $category->values[0]->value : 0,
                ];
            });

        $prevDate = Carbon::createFromDate($this->year, $this->month)->subMonth();
        Category::query()
            ->with(['values' => fn ($query) => $query->whereYear('date', $prevDate->year)->whereMonth('date', $prevDate->month)])
            ->summaries()
            ->incomes()
            ->get()
            ->each(function (Category $category) {
                $this->previousMonthValues['assets'][$category->id] = [
                    'value' => count($category->values) > 0 ? $category->values[0]->value : 0,
                    'change' => $this->values['assets'][$category->id]['value'] - (count($category->values) > 0 ? $category->values[0]->value : 0),
                ];
            });
        Category::query()
            ->with(['values' => fn ($query) => $query->whereYear('date', $prevDate->year)->whereMonth('date', $prevDate->month)])
            ->summaries()
            ->expenditures()
            ->get()
            ->each(function (Category $category) {
                $this->previousMonthValues['depts'][$category->id] = [
                    'value' => count($category->values) > 0 ? $category->values[0]->value : 0,
                    'change' => (count($category->values) > 0 ? $category->values[0]->value : 0) - (isset($this->values['depts'][$category->id]) ? $this->values['depts'][$category->id]['value'] : 0),
                ];
            });
    }

    private function calculateTotal(): void
    {
        foreach ($this->values as $key => $values) {
            $this->total[$key] = 0;
            foreach ($values as $value) {
                $this->total[$key] += $value['value'];
            }
        }

        foreach ($this->previousMonthValues as $key => $values) {
            $this->previousMonthTotal[$key] = 0;
            foreach ($values as $value) {
                $this->previousMonthTotal[$key] += $value['value'];
            }
        }

        $this->change['assets'] = $this->total['assets'] - $this->previousMonthTotal['assets'];
        $this->change['depts'] = $this->previousMonthTotal['depts'] - $this->total['depts'];
    }

    private function calculateSum(): void
    {
        $this->sum['actual'] = $this->total['assets'] - $this->total['depts'];
        $this->sum['previous'] = $this->previousMonthTotal['assets'] - $this->previousMonthTotal['depts'];
        $this->sum['change'] = $this->sum['actual'] - $this->sum['previous'];
    }
}
