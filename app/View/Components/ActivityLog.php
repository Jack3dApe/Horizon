<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\ActivityLog as ActivityLogModel;

class ActivityLog extends Component
{
    public $logs;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->logs = ActivityLogModel::latest()->take(10)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.activity-log');
    }
}
