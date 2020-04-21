<?php
    namespace App\Http\Controllers;


    use App\Http\Requests\PunchClockRequest;
    use App\Repositories\TimeclockRepository;
    use Illuminate\Support\Facades\Auth;

    class TimeclockController extends Controller
    {
        // GET /clock
        public function clock()
        {
            $viewData = [];
            return view('timeclock.show', $viewData);
        }

        // POST /clock
        public function punch(PunchClockRequest $request)
        {
            $data = $request->validated();

            TimeclockRepository::punchClock(Auth::user(), $data);

            return redirect()->route('timeclock.show');
        }
    }
