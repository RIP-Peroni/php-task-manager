<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

class HomePageController extends Controller
{
    public function home()
    {
        Log::debug('Test debug message');
        return view('welcome');
    }
}
