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

        /**
         * Returns the latest timeclock entry for a specified user, null if none found.
         *
         * @param User $user
         * @param string $orderBy
         * @return mixed
         */
        public static function getLatestForUser(User $user)
        {
            return self::getAllForUserDescending($user)->first();
        }


        public static function getAllForUserDescending(User $user)
        {
            return Timeclock::where(['user_id' => $user->id])
                ->orderBy('stamp', 'DESC');
        }

        /**
         * Determine the next direction in sequence, and add punch to database.
         *
         * @param User $user
         * @param $data
         * @return mixed
         *
         *
         */
        public static function punchClock(User $user, $data)
        {

            // find the latest punch to get the last direction the user punched.
            $nextDirection = 'in';
            $latestPunch = self::getLatestForUser($user);


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
