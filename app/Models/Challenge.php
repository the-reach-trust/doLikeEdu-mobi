<?php

namespace App\Models;

class Challenge {
    const CHALLENGE_NOT_FOUND = 404;
    const CHALLENGE_EXPIRED = 410;

    const MAP = [
        Challenge::CHALLENGE_NOT_FOUND => 'Challenge not found',
        Challenge::CHALLENGE_EXPIRED => 'Challenge has expired',
    ];
}
