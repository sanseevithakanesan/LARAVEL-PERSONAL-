<?php

namespace App\Http\Controllers\testing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Route extends Controller
{
    public function printMessage() {
        return "this message from controller";
    }
}
