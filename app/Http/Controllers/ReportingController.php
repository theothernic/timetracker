<?php
    namespace App\Http\Controllers;

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
