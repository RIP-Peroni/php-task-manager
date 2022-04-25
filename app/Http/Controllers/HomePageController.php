<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Rollbar\Rollbar;

class HomePageController extends Controller
{
    public function home()
    {
        Log::debug('Test debug message');
        return view('welcome');
    }
}
