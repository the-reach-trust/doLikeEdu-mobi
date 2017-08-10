<?php

namespace App\Models;

class ChallengeType {
    const GENERAL = 1;
    const FEATURED = 2;
    const BONUS = 3;

    const MAP = [
        ChallengeType::GENERAL => 'General',
        ChallengeType::FEATURED => 'Featured',
        ChallengeType::BONUS => 'Bonus',
    ];

    public static function toMarkup($id) {
        if (is_null($id)) {
			return '<em>N/A</em>';
        } else if (!array_key_exists($id, ChallengeType::MAP)) {
			return $id;             // TODO: catch this?
        }

        if($id == ChallengeType::FEATURED){
			return '<b>' . strtoupper(ChallengeType::MAP[$id]) . '</b>';
        }

        //TODO: remove for prod
        return '<em>' . ChallengeType::MAP[$id] . '</em>';
    }
}
