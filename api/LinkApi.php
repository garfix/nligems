<?php

namespace nligems\api;

/**
 * @author Patrick van Bergen
 */
class LinkApi
{
	public function getLink($page, $params = array())
	{
		if ($page == 'image') {
			$rel = 'page/img/people/' . $params['name'] . '.jpg';
			if (!file_exists(__DIR__ . '/../' . $rel)) {
				$rel = 'page/img/people/unknown.jpg';
			}

			return $rel;

		} else {
			return $page . '.php' . ($params ? '?' . http_build_query($params) : '');
		}
	}
}
