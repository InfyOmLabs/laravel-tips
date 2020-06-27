<?php

use App\User;

if (!function_exists('retrieve_users')) {
    function retrieveFirstUser()
    {
        $cacheKey = 'users_list';

        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        $users = User::all();
        Cache::put($cacheKey, $users);

        return $users;
    }
}

if (!function_exists('retrieve_first_user')) {
    function retrieve_first_user()
    {
        static $user;

        if (empty($user)) {
            $user = User::first();
        }

        return $user;
    }
}

