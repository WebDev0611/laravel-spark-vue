<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Show the application splash screen.
     *
     * @return Response
     */
    public function index()
    {
        return view('clients');
    }
}
