<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MonthPicker extends Component
{
    public int $year = 0;

    public int $month = 0;

    public function mount()
    {
        $this->year = now()->year;
        $this->month = now()->month;
    }

    public function render()
    {
        $this->emit('dateChanged', [
            'year' => $this->year,
            'month' => $this->month,
        ]);

        return view('livewire.month-picker');
    }
}
