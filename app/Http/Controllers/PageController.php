<?php
    namespace App\Http\Controllers;

    use Illuminate\Support\Facades\Auth;

    class PageController extends Controller
    {

        /**
         * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
         *
         * Handle the front door of the application.
         */
        public function index() {

            // 20200420, nbarr: redirect logged-in users to the home dashboard.
            if (Auth::check())
            {
                return redirect()->route('home');
            }

            return view('welcome');
        }
    }
