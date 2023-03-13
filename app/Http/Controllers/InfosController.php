<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InfosController extends Controller
{
    public function livraisons()
    {
        return view('livraisons');
    }

    public function conditions()
    {
        return view('conditions');
    }

    public function politiques()
    {
        return view('politiques');
    }
}
