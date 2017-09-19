<?php

namespace App\Models;

class Page {
    const PAGE_MISSING = 404;
    const PAGE_ANSWER_INCORRECT = 406;
    const PAGE_ANSWER_CORRECT = 200;

    const MAP = [
        Page::PAGE_MISSING => 'Page missing',
        Page::PAGE_ANSWER_INCORRECT => 'Page answer was incorrect',
        Page::PAGE_ANSWER_CORRECT => 'Page answer was correct'
    ];

    Public static function get_next_page($levelup,$parent_id,$page_id)
	{
		if(is_null($parent_id) || is_null($levelup) || is_null($page_id) ){
			return null;
		}
		$found = false;
		$page_parent = $levelup->get_page($parent_id,true);

		foreach ($page_parent->child as $child) {
			if($found == true)
			{
				return $child;
			}

			if($child->id == $page_id)
			{
				$found = true;
			}
		}

		return null;
	}
}
