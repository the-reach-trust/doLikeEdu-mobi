<?php

namespace App\Models;

class Page {
    const PAGE_MISSING = 404;

    const MAP = [
        Page::PAGE_MISSING => 'Page missing',
    ];

    Public static function get_next_page($levelup,$parent_id,$page_id)
	{
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
