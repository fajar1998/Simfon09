<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecretUrlController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function Get()
    {
        return view('secret_view');
    }
}
