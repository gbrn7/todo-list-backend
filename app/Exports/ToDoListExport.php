<?php

namespace App\Exports;

use App\Models\ToDoList;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ToDoListExport implements FromView
{
    public function __construct(
        protected $report,
        protected $totalTodos,
        protected $totalTimeTracked
    ) {}

    public function view(): View
    {
        return view('report', [
            'report' => $this->report,
            'totalTodos' => $this->totalTodos,
            'totalTimeTracked' => $this->totalTimeTracked,
        ]);
    }
}
