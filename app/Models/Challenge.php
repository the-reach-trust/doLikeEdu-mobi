<?php

namespace App\Models;

class Challenge {
    const CHALLENGE_NOT_FOUND = 404;
    const CHALLENGE_EXPIRED = 410;

    const MAP = [
        Challenge::CHALLENGE_NOT_FOUND => 'Challenge not found',
        Challenge::CHALLENGE_EXPIRED => 'Challenge has expired',
    ];

    public static function completed_featured_challenges($levelup)
    {
        $challenges_param = array('type' => "featured");
        $challenges_featured = $levelup->get_challenges($challenges_param);

        foreach ($challenges_featured as $challenge) {
            if($challenge->remaining_attempts > 0) return false;
        }

        return true;
    }
}
