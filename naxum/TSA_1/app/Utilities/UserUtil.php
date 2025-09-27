<?php

namespace App\Utilities;

class UserUtil
{
    public static function fullName(object $user): string
    {
        return $user->first_name.' '.$user->last_name;
    }
}
