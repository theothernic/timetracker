<?php
    namespace App\Http\Controllers;


    class TimeclockController extends Controller
    {
        // GET /clock
        public function clock()
        {
            $viewData = [];
            return view('clock.show', $viewData);
        }

        // POST /clock
        public function punch()
        {
            return redirect()->route('clock.show');
        }
    }
