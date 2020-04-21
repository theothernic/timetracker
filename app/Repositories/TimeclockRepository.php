<?php
    namespace App\Repositories;


    use App\Models\Timeclock;
    use App\User;
    use Illuminate\Auth\Authenticatable;

    class TimeclockRepository
    {

        public static function punchClock(User $user, $data)
        {

            // find the latest punch to get the last direction the user punched.
            $direction = 'in';
            $latestPunch = Timeclock::orderBy('created_at', 'DESC')
                ->first();

            dd($latestPunch);


            return Timeclock::create([
                'user_id' => $user->id,
                'direction' => $direction,
                'stamp' => $data['stamp']
            ]);
        }
    }
