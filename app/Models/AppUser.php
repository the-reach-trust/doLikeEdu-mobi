<?php

namespace App\Models;

class AppUser {
	const FEMALE = 0;
    const MALE = 1;

    const GENDERS = [
        AppUser::FEMALE => 'Girl',
        AppUser::MALE => 'Boy'
    ];

    const GRADES = [
        11 => 11
    ];

    public static function toMarkup($gender) {
        if (is_null($gender)) {
            return '<em>Unknown</em>';
        } else if (!array_key_exists($gender, Gender::MAP)) {
            return $gender;             // TODO: catch this?
        }

        return Gender::GENDERS[$gender];
    }

    public static function exists($levelup, $mode, $identifier){
        if($levelup->authcheck($mode,$identifier)->userid == null){
            return false;
        }
        return true;
    }
}
