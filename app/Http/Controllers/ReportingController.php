<?php
    namespace App\Http\Controllers;

    use App\Repositories\TimeclockRepository;
    use Illuminate\Support\Facades\Auth;

    class ReportingController extends ProtectedController
    {

        public function timesheet()
        {
            $viewData = [
                'records' => TimeclockRepository::getAllForUserDescending(Auth::user())->paginate(5)

            ];

            return view('reporting.timesheet', $viewData);
        }
    }
