<?php

namespace App\Services;

use App\Models\Report;
use Pratiksh\Adminetic\Contracts\DashboardInterface;

class MyDashboard implements DashboardInterface
{
    public function view()
    {
        $reports = Report::latest()->get();
        $view = view()->exists('admin.dashboard.index') ? 'admin.dashboard.index' : 'adminetic::admin.dashboard.index';
        return view($view, compact('reports'));
    }
}
