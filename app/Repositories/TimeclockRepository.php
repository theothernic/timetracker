<?php
    namespace App\Repositories;


    use App\Models\Timeclock;
    use App\User;
    use Illuminate\Auth\Authenticatable;

    /**
     * Class TimeclockRepository
     * @package App\Repositories
     *
     * return a single Timeclock record for the specified $user;
     */
    class TimeclockRepository
    {

        public static function getLatestForUser(User $user, $orderBy = 'desc')
        {
            return Timeclock::where(['user_id' => $user->id])
                ->orderBy('stamp', $orderBy)
                ->first();
        }


        public static function getAllForUserDescending(User $user)
        {
            return Timeclock::where(['user_id' => $user->id])
                ->orderBy('stamp', 'DESC');
        }

        /**
         * @param User $user
         * @param $data
         * @return mixed
         *
         * Determine the next direction in sequence, and add punch to database.
         */
        public static function punchClock(User $user, $data)
        {

            // find the latest punch to get the last direction the user punched.
            $nextDirection = 'in';
            $latestPunch = Timeclock::where(['user_id' => $user->id])
                ->orderBy('created_at', 'DESC')
                ->first();


            if (!is_null($latestPunch) && $latestPunch->direction == 'in')
            {
                $nextDirection = 'out';
            }


            return Timeclock::create([
                'user_id' => $user->id,
                'direction' => $nextDirection,
                'stamp' => $data['stamp']
            ]);
        }
    }
