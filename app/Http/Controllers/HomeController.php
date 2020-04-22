<?php

namespace App\Http\Controllers;

use App\Repositories\TimeclockRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends ProtectedController
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $viewData = [
            'record' => TimeclockRepository::getLatestForUser(Auth::user())
        ];

        return view('home', $viewData);
    }
}
