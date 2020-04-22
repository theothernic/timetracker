<?php
    namespace App\Http\Controllers;

    use App\Repositories\TimeclockRepository;
    use Illuminate\Support\Facades\Auth;

    class ReportingController extends ProtectedController
    {

        /**
         * Generate the timesheet report.
         *
         * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function timesheet()
        {
            $viewData = [
                'records' => TimeclockRepository::getAllForUserDescending(Auth::user())->paginate(6)

            ];

            return view('reporting.timesheet', $viewData);
        }
    }
