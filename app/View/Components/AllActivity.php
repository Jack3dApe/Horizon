<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\ActivityLog as ActivityLogModel;

class AllActivity extends Component
{
    /**
     * Create a new component instance.
     */

    public $logs;

    public function __construct()
    {
        $this->logs = ActivityLogModel::latest()->paginate(10);

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.all-activity');
    }
}
