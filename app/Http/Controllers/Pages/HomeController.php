<?php

namespace App\Http\Controllers\Pages;

use App\Facades\Products;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('pages.home', [
            'newest' => Products::newest(4)
        ]);
    }
}
