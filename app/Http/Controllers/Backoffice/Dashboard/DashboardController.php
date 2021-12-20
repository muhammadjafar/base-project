<?php

namespace App\Http\Controllers\Backoffice\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Example\Example;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $examples = Example::all();
            return DataTables::of($examples)
                ->make(true);
        }
        return view('backoffice.dashboard.index');
    }
}
