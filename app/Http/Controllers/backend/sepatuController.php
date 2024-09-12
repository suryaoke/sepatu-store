<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class sepatuController extends Controller
{
    public function index()
    {
        return view('backend.sepatu.index');
    }
}
