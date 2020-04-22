<?php
    namespace App\Http\Controllers;

    class ProtectedController extends Controller
    {
        public function __construct()
        {
            $this->middleware('auth');
        }
    }
