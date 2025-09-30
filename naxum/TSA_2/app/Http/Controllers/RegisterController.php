<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Register;

class RegisterController
{
    public function store(RegisterRequest $request)
    {
        Register::create($request->validated());
    }
}
