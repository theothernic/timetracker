<?php
    namespace App\Http\Controllers;

    use Illuminate\Support\Facades\Auth;

    class ReportingController extends ProtectedController
    {

        public function timesheet()
        {
            $viewData = [
                'user' => Auth::user()
            ];

            return view('reporting.timesheet', $viewData);
        }
    }
