<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function store(Request $request)
    {
        $report = Report::create($this->validateData($request));
        return redirect(route('home'))->withSuccess('Report received we will contact you soon !');
    }

    protected function validateData($request)
    {
        return  $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'contact' => 'required|numeric',
            'imei1' => 'required|numeric',
            'imei2' => 'required|numeric',
            'lost_address' => 'required|max:255',
            'lost_time' => 'required|max:255',
            'brand' => 'required|max:255',
            'model' => 'required|max:255',
        ]);
    }
}
