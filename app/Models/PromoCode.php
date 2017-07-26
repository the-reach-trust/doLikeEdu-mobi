<?php

namespace App\Models;

class PromoCode {
    const PROMO_CODE_VALID = 200;
    const PROMO_CODE_INVALID = 404;
    const PROMO_EXPIRED = 410;
    const PROMO_ALREADY_CLAIMED = 423;
    const PROMO_DEPLETED = 429;

    const MAP = [
        PromoCode::PROMO_CODE_VALID => 'promo code valid',
        PromoCode::PROMO_CODE_INVALID => 'Promo code NOT valid',
        PromoCode::PROMO_EXPIRED => 'promo code has expired',
        PromoCode::PROMO_ALREADY_CLAIMED => 'promo code has already been claimed',
        PromoCode::PROMO_DEPLETED => 'promo code has depleted',
    ];
}
