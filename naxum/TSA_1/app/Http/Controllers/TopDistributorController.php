<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class TopDistributorController extends Controller
{
    public function __construct() {}

    public function index()
    {
        return view('pages.top-distributor');
    }
}
