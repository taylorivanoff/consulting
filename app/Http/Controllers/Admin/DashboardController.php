<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    const PAGINATION_SIZE = 10;

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {   
        $data = [
            'leads' => Lead::latest()->paginate(self::PAGINATION_SIZE),
            'users' => User::latest()->paginate(self::PAGINATION_SIZE),
        ];

        return view('admin.dashboard', ['data' => $data]);
    }
}
