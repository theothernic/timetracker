<?php
    namespace App\Http\Controllers;


    use App\Helpers\TzHelper;
    use App\Http\Requests\PunchClockRequest;
    use App\Repositories\TimeclockRepository;
    use Illuminate\Support\Facades\Auth;

    class TimeclockController extends ProtectedController
    {
        /**
         * Display the time clock UI.
         *
         * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function clock()
        {
            $viewData = [];
            return view('timeclock.show', $viewData);
        }

        /**
         * Commit the timeclock request to the database.
         *
         * Redirects back to the punch with an error if save failed; otherwise returns a success message.
         *
         * @param PunchClockRequest $request
         * @return \Illuminate\Http\RedirectResponse
         */
        public function punch(PunchClockRequest $request)
        {
            $data = $request->validated();

            if (!$timeclock = TimeclockRepository::punchClock(Auth::user(), $data))
            {
                return redirect()->route('timeclock.show')->withErrors('Could not save time punch to the database.');
            }

            return redirect()->route('timeclock.show')->with('success', 'Successfully punched '
                . $timeclock->direction . ' on ' . $timeclock->stamp->tz('America/New_York')->format('D M d Y H:i:s O'));
        }
    }
