<?php

namespace App\Http\Livewire\Traits;

trait ListenToDateChanged
{
    public function dateChanged(array $values): void
    {
        $this->year = $values['year'];
        $this->month = $values['month'];
    }
}
