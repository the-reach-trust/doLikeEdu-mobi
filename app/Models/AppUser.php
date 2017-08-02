<?php

namespace App\Models;

class AppUser {
	const NO_SET = '';
	const FEMALE = 0;
    const MALE = 1;

    const GENDERS = [
    	AppUser::NO_SET => 'Not set',
    	AppUser::FEMALE => 'Female',
    	AppUser::MALE => 'Male'
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
}
