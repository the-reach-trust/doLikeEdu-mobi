<?php

namespace App\Models;

class AccessMode {
    const FACEBOOK_ACCESS = 1;
    const GOOGLE_ACCESS = 2;
    const GUEST_ACCESS = 4;

    const MAP = [
        AccessMode::FACEBOOK_ACCESS => 'Facebook user',
        AccessMode::GOOGLE_ACCESS => 'Google User',
        AccessMode::GUEST_ACCESS => 'Guest',
    ];
}
