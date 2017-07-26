<?php

namespace App\Models;

class Reward {
    const REWARD_UNKNOWN = 404;
    const REWARD_LIMIT = 430;

    const MAP = [
        Reward::CHALLENGE_NOT_FOUND => 'Unknown reward',
        Reward::CHALLENGE_EXPIRED => 'Reward limit reached',
    ];
}
