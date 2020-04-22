<?php
    namespace App\Http\Controllers;


    use App\Http\Requests\PunchClockRequest;
    use App\Repositories\TimeclockRepository;
    use Illuminate\Support\Facades\Auth;

    class TimeclockController extends ProtectedController
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

            if (!$timeclock = TimeclockRepository::punchClock(Auth::user(), $data))
            {
                return redirect()->route('timeclock.show')->withErrors('Could not save time punch to the database.');
            }

            return redirect()->route('timeclock.show')->with('success', 'Successfully punched ' . $timeclock->direction . '.');
        }
    }
